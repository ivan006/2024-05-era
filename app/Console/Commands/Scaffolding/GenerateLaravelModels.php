<?php

namespace App\Console\Commands\Scaffolding;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Console\Commands\WordSplitter;

class GenerateLaravelModels extends Command
{
    protected $signature = 'generate:laravel-models';
    protected $description = 'Generate Laravel models from database schema with relationships, rules, fillable attributes, and table name';
    protected $wordSplitter;
    protected $report = [];

    public function __construct()
    {
        parent::__construct();
        $this->wordSplitter = new WordSplitter();
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
            $this->info("Generated model name: $modelName");

            $columns = DB::select("SHOW COLUMNS FROM $tableName");
            $this->info("Fetched columns for table: $tableName");

            $fillable = [];
            $rules = [];
            $relationships = [];
            $belongsToMethods = [];
            $hasManyMethods = [];
            $relations = $this->getModelRelations($tableName, $columns);
            $this->info("Fetched relations for table: $tableName");

            $attributeNames = [];

            foreach ($columns as $column) {
                $fieldName = $column->Field;
                $nullable = $column->Null === 'YES';
                $autoIncrement = strpos($column->Extra, 'auto_increment') !== false;

                if (!$autoIncrement) {
                    $fillable[] = "'$fieldName'";
                    $rules[] = "'$fieldName' => '" . ($nullable ? 'nullable' : 'required') . "'";
                    $attributeNames[] = strtolower($fieldName);
                }

                if (in_array($fieldName, array_column($relations['foreignKeys'], 'COLUMN_NAME'))) {
                    $relationshipName = Str::camel(Str::singular(preg_replace('/(_?id)$/i', '', $fieldName)));
                    if (in_array(strtolower($relationshipName), $attributeNames)) {
                        $relationshipName .= 'Rel';
                    }
                    $relatedModel = $this->getRelatedModelName($fieldName, $relations['foreignKeys']);
                    $relationships[] = "'$relationshipName'";
                    $belongsToMethods[] = $this->generateBelongsToMethod($relatedModel, $relationshipName, $fieldName);
                }
            }

            foreach ($relations['hasMany'] as $relation) {
                $relationshipName = Str::camel(Str::plural($relation['model']));
                if (count($relations['hasMany']) > 1) {
                    $relationshipName .= Str::studly($relation['COLUMN_NAME']);
                }
                if (in_array(strtolower($relationshipName), $attributeNames)) {
                    $relationshipName .= 'Rel';
                }
                $relationships[] = "'$relationshipName'";
                $hasManyMethods[] = $this->generateHasManyMethod($relation['model'], $relationshipName, $relation['COLUMN_NAME']);
            }

            $fillableString = implode(",\n        ", $fillable);
            $rulesString = implode(",\n            ", $rules);
            $relationshipsString = implode(",\n            ", $relationships);
            $belongsToMethodsString = implode("\n\n    ", $belongsToMethods);
            $hasManyMethodsString = implode("\n\n    ", $hasManyMethods);

            $phpModel = <<<EOT
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class $modelName extends Model
{
    protected \$table = '$tableName';

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
        $this->generateReport();
    }

    protected function getModelRelations($tableName, $columns)
    {
        $this->info("Fetching foreign keys for table: $tableName");
        $foreignKeys = DB::select("SELECT
        COLUMN_NAME,
        REFERENCED_TABLE_NAME,
        REFERENCED_COLUMN_NAME,
        CONSTRAINT_NAME
        FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
        WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND REFERENCED_COLUMN_NAME IS NOT NULL", [env('DB_DATABASE'), $tableName]);

        $this->info("Foreign keys fetched: " . json_encode($foreignKeys));

        $this->info("Fetching hasMany relations for table: $tableName");
        $hasManyRelations = DB::select("SELECT
        TABLE_NAME,
        COLUMN_NAME,
        REFERENCED_COLUMN_NAME,
        CONSTRAINT_NAME
        FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
        WHERE TABLE_SCHEMA = ? AND REFERENCED_TABLE_NAME = ?", [env('DB_DATABASE'), $tableName]);

        $this->info("HasMany relations fetched: " . json_encode($hasManyRelations));

        $relations = [];
        $imports = [];
        $foreignKeysArray = [];
        $hasManyArray = [];
        $existingFields = array_map(function ($column) {
            return strtolower($column->Field);
        }, $columns);

        foreach ($foreignKeys as $foreignKey) {
            $relationFieldName = $foreignKey->COLUMN_NAME;
            $relatedModel = Str::studly(Str::singular($foreignKey->REFERENCED_TABLE_NAME));
            $relationName = $this->generateRelationName($relationFieldName, $existingFields);

            if (!in_array($relatedModel, $imports)) {
                $imports[] = $relatedModel;
            }

            $relations[] = "'$relationName': this.belongsTo($relatedModel, '$relationFieldName')";
            $foreignKeysArray[] = ['COLUMN_NAME' => $foreignKey->COLUMN_NAME, 'RELATED_MODEL' => $relatedModel];
        }

        $this->info("Processing hasMany relations...");
        foreach ($hasManyRelations as $relation) {
            $this->info("Processing hasMany relation: " . json_encode($relation));
            if (isset($relation->REFERENCED_TABLE_NAME) && $relation->REFERENCED_TABLE_NAME == $tableName) {
                $relationFieldName = $relation->COLUMN_NAME;
                $relationName = Str::camel(Str::plural($relation->TABLE_NAME));
                $relatedModel = Str::studly(Str::singular($relation->TABLE_NAME));

                // Check for conflicts in hasMany relation names
                if (isset($hasManyArray[$relationName])) {
                    $relationName .= ucfirst(Str::camel($relationFieldName));
                } else if (in_array(strtolower($relationName), $existingFields)) {
                    $relationName .= 'Rel';
                }

                if (!in_array($relatedModel, $imports)) {
                    $imports[] = $relatedModel;
                }

                $relations[] = "'$relationName': this.hasMany($relatedModel, '$relationFieldName')";
                $hasManyArray[] = ['COLUMN_NAME' => $relationFieldName, 'RELATED_MODEL' => $relatedModel];
            }
        }

        $this->info("Foreign Keys for $tableName: " . json_encode($foreignKeysArray));
        $this->info("HasMany Relations for $tableName: " . json_encode($relations));

        return ['relations' => $relations, 'imports' => $imports, 'foreignKeys' => $foreignKeysArray, 'hasMany' => $hasManyArray];
    }

    protected function getRelatedModelName($fieldName, $foreignKeys)
    {
        foreach ($foreignKeys as $foreignKey) {
            if ($foreignKey['COLUMN_NAME'] === $fieldName) {
                return $foreignKey['RELATED_MODEL'];
            }
        }
        return null;
    }

    protected function generateBelongsToMethod($relatedModel, $relationshipName, $fieldName)
    {
        return <<<EOT
    public function $relationshipName(): BelongsTo
    {
        return \$this->belongsTo($relatedModel::class, '$fieldName');
    }
EOT;
    }

    protected function generateHasManyMethod($relatedModel, $relationshipName, $foreignKey)
    {
        return <<<EOT
    public function $relationshipName(): HasMany
    {
        return \$this->hasMany($relatedModel::class, '$foreignKey');
    }
EOT;
    }

    protected function groupHasManyRelations($hasManyRelations)
    {
        $groupedRelations = [];
        foreach ($hasManyRelations as $relation) {
            $groupedRelations[$relation['model']][] = $relation;
        }
        return $groupedRelations;
    }


    protected function generateReport()
    {
        $reportPath = storage_path('app/model_generation_report.txt');
        $reportContent = '';

        foreach ($this->report as $entry) {
            $reportContent .= "Table: {$entry['table']}\n";
            $reportContent .= "Model: {$entry['model']}\n";
            $reportContent .= "Fillable: " . implode(', ', $entry['fillable']) . "\n";
            $reportContent .= "Relationships: " . implode(', ', $entry['relationships']) . "\n";
            $reportContent .= "BelongsTo Methods:\n" . implode("\n", $entry['belongsToMethods']) . "\n";
            $reportContent .= "HasMany Methods:\n" . implode("\n", $entry['hasManyMethods']) . "\n";
            $reportContent .= "Foreign Keys: " . json_encode($entry['logs']['foreignKeys']) . "\n";
            $reportContent .= "HasMany Relations: " . json_encode($entry['logs']['hasMany']) . "\n";
            $reportContent .= "\n";
        }

        File::put($reportPath, $reportContent);

        $this->info("Model generation report generated at $reportPath");
    }

    protected function generateRelationName($fieldName, $existingFields)
    {
        // Remove suffixes like _ID, _Id, _id, id, ID, Id
        $relationName = preg_replace('/(_ID|_Id|_id|id|ID|Id)$/', '', $fieldName);
        $relationName = Str::camel(Str::singular($relationName));

        // CheckI apologize for the cut-off. Here's the rest of the code:
        if (in_array(strtolower($relationName), $existingFields)) {
            $relationName .= 'Rel';
        }

        return $relationName;
    }



}
