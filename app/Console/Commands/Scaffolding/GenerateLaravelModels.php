<?php

namespace App\Console\Commands\Scaffolding;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Console\Commands\WordSplitter;
use App\Console\Commands\ModelRelationHelper;

class GenerateLaravelModels extends Command
{
    protected $signature = 'generate:laravel-models';
    protected $description = 'Generate Laravel models from database schema with relationships, rules, fillable attributes, and table name';
    protected $wordSplitter;
    protected $relationHelper;

    public function __construct()
    {
        parent::__construct();
        $this->wordSplitter = new WordSplitter();
        $this->relationHelper = new ModelRelationHelper();
    }

    public function handle()
    {
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableArray = get_object_vars($table);
            $tableName = reset($tableArray);
            $cleanedTableName = preg_replace('/[^a-zA-Z]/', '', $tableName);
            $this->info("Processing table: $tableName (cleaned: $cleanedTableName)");

            $segmentationResult = $this->wordSplitter->split($cleanedTableName);
            $segmentedTableName = $segmentationResult['words'];
            $pascalTableName = implode('', array_map('ucfirst', $segmentedTableName));

            $modelName = Str::singular($pascalTableName);
            $columns = DB::select("SHOW COLUMNS FROM $tableName");

            $fillable = [];
            $rules = [];
            $relationships = [];
            $belongsToMethods = [];
            $hasManyMethods = [];
            $relations = $this->relationHelper->getModelRelations($tableName, $columns);

            $attributeNames = [];

            $autoIncrement = "";

            foreach ($columns as $column) {
                $fieldName = $column->Field;
                $nullable = $column->Null === 'YES';
                $isAutoIncrement = strpos($column->Extra, 'auto_increment') !== false;

                if (!$isAutoIncrement) {
                    $fillable[] = "'$fieldName'";
                    $rules[] = "'$fieldName' => '" . ($nullable ? 'nullable' : 'required') . "'";
                    $attributeNames[] = strtolower($fieldName);
                } else {
                    $autoIncrement = $fieldName;
                }

                if (in_array($fieldName, array_column($relations['foreignKeys'], 'COLUMN_NAME'))) {
                    $relationshipName = Str::camel(Str::singular(preg_replace('/(_?id)$/i', '', $fieldName)));
                    if (in_array(strtolower($relationshipName), $attributeNames)) {
                        $relationshipName .= 'Rel';
                    }

                    $relationshipName = Str::snake($relationshipName);

                    $relatedModel = $this->relationHelper->getRelatedModelName($fieldName, $relations['foreignKeys']);
                    $relationships[] = "'$relationshipName'";
                    $belongsToMethods[] = $this->generateBelongsToMethod($relatedModel, $relationshipName, $fieldName);
                }
            }

            $hasManyRelationsGrouped = $this->relationHelper->groupHasManyRelations($relations['hasMany']);
            foreach ($hasManyRelationsGrouped as $relationGroup) {
                foreach ($relationGroup as $relation) {
                    $relationshipName = Str::camel(Str::plural($relation['model']));
                    if (count($relationGroup) > 1) {
                        $relationshipName .= Str::studly($relation['COLUMN_NAME']);
                    }
                    if (in_array(strtolower($relationshipName), $attributeNames)) {
                        $relationshipName .= 'Rel';
                    }

                    $relationshipName = Str::snake($relationshipName);

                    $relationships[] = "'$relationshipName'";
                    $hasManyMethods[] = $this->generateHasManyMethod($relation['model'], $relationshipName, $relation['COLUMN_NAME']);
                }
            }

            $fillableString = implode(",\n        ", $fillable);
            $rulesString = implode(",\n            ", $rules);
            $relationshipsString = implode(",\n            ", $relationships);
            $belongsToMethodsString = implode("\n\n    ", $belongsToMethods);
            $hasManyMethodsString = implode("\n\n    ", $hasManyMethods);

            $phpModel = <<<EOT
<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class $modelName extends OrmApiBaseModel
{
    protected \$table = '$tableName';

    public \$timestamps = false;

    protected \$primaryKey = '$autoIncrement';

    public function relationships()
    {
        return [
            $relationshipsString
        ];
    }

    public function rules()
    {
        return [
            $rulesString
        ];
    }

    protected \$fillable = [
        $fillableString
    ];

    $belongsToMethodsString

    $hasManyMethodsString
}
EOT;

            $path = app_path("Models/{$modelName}.php");
            File::put($path, $phpModel);

            $this->info("Generated Laravel model for $tableName");
        }
    }

    protected function generateBelongsToMethod($relatedModel, $relationshipName, $fieldName)
    {
        $cleanedName = preg_replace('/[^a-zA-Z]/', '', $relatedModel);

        $segmentationResult = $this->wordSplitter->split($cleanedName);
        $segmentedTableName = $segmentationResult['words'];
        $pascalName = implode('', array_map('ucfirst', $segmentedTableName));

        $relatedModel = Str::singular($pascalName);
        return <<<EOT
    public function $relationshipName(): BelongsTo
    {
        return \$this->belongsTo($relatedModel::class, '$fieldName');
    }
EOT;
    }

    protected function generateHasManyMethod($relatedModel, $relationshipName, $foreignKey)
    {

        $cleanedName = preg_replace('/[^a-zA-Z]/', '', $relatedModel);

        $segmentationResult = $this->wordSplitter->split($cleanedName);
        $segmentedTableName = $segmentationResult['words'];
        $pascalName = implode('', array_map('ucfirst', $segmentedTableName));

        $relatedModel = Str::singular($pascalName);
        return <<<EOT
    public function $relationshipName(): HasMany
    {
        return \$this->hasMany($relatedModel::class, '$foreignKey');
    }
EOT;
    }
}
