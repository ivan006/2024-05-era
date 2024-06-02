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
            $relations = $this->getModelRelations($tableName);
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

            $hasManyRelationsGrouped = $this->groupHasManyRelations($relations['hasMany']);
            foreach ($hasManyRelationsGrouped as $relationGroup) {
                foreach ($relationGroup as $relation) {
                    $relationshipName = Str::camel(Str::plural($relation['model']));
                    if (count($relationGroup) > 1) {
                        $relationshipName .= Str::studly($relation['COLUMN_NAME']);
                    }
                    if (in_array(strtolower($relationshipName), $attributeNames)) {
                        $relationshipName .= 'Rel';
                    }
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

            // Add to report
            $this->report[] = [
                'table' => $tableName,
                'model' => $modelName,
                'fillable' => $fillable,
                'relationships' => $relationships,
                'belongsToMethods' => $belongsToMethods,
                'hasManyMethods' => $hasManyMethods,
                'foreignKeys' => $relations['foreignKeys'], // Log the fetched foreign keys
                'hasMany' => $relations['hasMany'] // Log the fetched hasMany relations
            ];
        }

        // Generate report
        $this->generateReport();
    }



    protected function getModelRelations($tableName)
    {
        $this->info("Fetching foreign keys for table: $tableName");
        $foreignKeys = DB::select("SELECT
        COLUMN_NAME,
        REFERENCED_TABLE_NAME,
        REFERENCED_COLUMN_NAME,
        CONSTRAINT_NAME
        FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
        WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND REFERENCED_COLUMN_NAME IS NOT NULL", [env('DB_DATABASE'), $tableName]);

        $this->info("Fetching hasMany relations for table: $tableName");
        $hasManyRelations = DB::select("SELECT
        TABLE_NAME,
        COLUMN_NAME,
        REFERENCED_COLUMN_NAME,
        CONSTRAINT_NAME
        FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
        WHERE TABLE_SCHEMA = ? AND REFERENCED_TABLE_NAME = ?", [env('DB_DATABASE'), $tableName]);

        $foreignKeysArray = [];
        $hasManyArray = [];

        $this->info("Processing foreign keys...");
        foreach ($foreignKeys as $foreignKey) {
            $foreignKeysArray[] = [
                'COLUMN_NAME' => $foreignKey->COLUMN_NAME,
                'REFERENCED_TABLE_NAME' => $foreignKey->REFERENCED_TABLE_NAME,
                'REFERENCED_COLUMN_NAME' => $foreignKey->REFERENCED_COLUMN_NAME,
                'RELATED_MODEL' => Str::studly(Str::singular($foreignKey->REFERENCED_TABLE_NAME))
            ];
        }

        $this->info("Processing hasMany relations...");
        foreach ($hasManyRelations as $relation) {
            if ($relation->REFERENCED_TABLE_NAME == $tableName) {
                $hasManyArray[] = [
                    'model' => Str::studly(Str::singular($relation->TABLE_NAME)),
                    'name' => Str::camel(Str::plural($relation->TABLE_NAME)),
                    'COLUMN_NAME' => $relation->COLUMN_NAME,
                    'KEY_COLUMN_NAME' => $relation->REFERENCED_COLUMN_NAME,
                    'RELATED_MODEL' => Str::studly(Str::singular($relation->TABLE_NAME))
                ];
            }
        }

        $this->info("Foreign Keys for $tableName: " . json_encode($foreignKeysArray));
        $this->info("HasMany Relations for $tableName: " . json_encode($hasManyArray));

        return ['foreignKeys' => $foreignKeysArray, 'hasMany' => $hasManyArray];
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
        $reportContent = "Laravel Model Generation Report\n\n";
        foreach ($this->report as $item) {
            $reportContent .= "Table: {$item['table']}\n";
            $reportContent .= "Model: {$item['model']}\n";
            $reportContent .= "Fillable: " . implode(', ', $item['fillable']) . "\n";
            $reportContent .= "Relationships: " . implode(', ', $item['relationships']) . "\n";
            $reportContent .= "BelongsTo Methods:\n" . implode("\n", array_map(function ($method) {
                    return $method;
                }, $item['belongsToMethods'])) . "\n";
            $reportContent .= "HasMany Methods:\n" . implode("\n", array_map(function ($method) {
                    return $method;
                }, $item['hasManyMethods'])) . "\n";
            $reportContent .= "Foreign Keys: " . json_encode($item['foreignKeys']) . "\n";
            $reportContent .= "HasMany Relations: " . json_encode($item['hasMany']) . "\n";
            $reportContent .= "\n";
        }

        $reportPath = storage_path('app/model_generation_report.txt');
        File::put($reportPath, $reportContent);
        $this->info("Model generation report generated at $reportPath");
    }


}
