<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GenerateLaravelModels extends Command
{
    protected $signature = 'generate:laravel-models';
    protected $description = 'Generate Laravel models from database schema with relationships, rules, fillable attributes, and table name';

    public function handle()
    {
        $tables = DB::select('SHOW TABLES');
        $database = env('DB_DATABASE');

        foreach ($tables as $table) {
            $tableName = $table->{"Tables_in_$database"};
            $modelName = Str::studly(Str::singular($tableName));

            $columns = DB::select("SHOW COLUMNS FROM $tableName");

            $fillable = [];
            $rules = [];
            $relationships = [];
            $belongsToMethods = [];
            $hasManyMethods = [];
            $relations = $this->getModelRelations($tableName);
            $relationNames = [];

            foreach ($columns as $column) {
                $fieldName = $column->Field;
                $nullable = $column->Null === 'YES';
                $autoIncrement = strpos($column->Extra, 'auto_increment') !== false;

                if (!$autoIncrement) {
                    $fillable[] = "'$fieldName'";
                    $rules[] = "'$fieldName' => '" . ($nullable ? 'nullable' : 'required') . "'";
                }

                if (in_array($fieldName, array_column($relations['foreignKeys'], 'COLUMN_NAME'))) {
                    $relatedModel = $this->getRelatedModelName($fieldName, $relations['foreignKeys']);
                    $relationshipName = Str::camel(Str::singular($relatedModel));
                    $relationshipName = $this->ensureUniqueName($relationshipName, $relationNames);
                    $relationships[] = "'$relationshipName'";
                    $belongsToMethods[] = $this->generateBelongsToMethod($relatedModel, $relationshipName, $fieldName);
                    $relationNames[] = $relationshipName;
                }
            }

            foreach ($relations['hasMany'] as $relation) {
                $relationshipName = $relation['name'];
                $relationshipName = $this->ensureUniqueName($relationshipName, $relationNames);
                $relationships[] = "'$relationshipName'";
                $hasManyMethods[] = $this->generateHasManyMethod($relation['model'], $relationshipName);
                $relationNames[] = $relationshipName;
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
    }

    protected function getModelRelations($tableName)
    {
        $foreignKeys = DB::select("SELECT
            COLUMN_NAME,
            REFERENCED_TABLE_NAME,
            REFERENCED_COLUMN_NAME
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND REFERENCED_COLUMN_NAME IS NOT NULL", [env('DB_DATABASE'), $tableName]);

        $hasManyRelations = DB::select("SELECT
            TABLE_NAME,
            COLUMN_NAME
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = ? AND REFERENCED_TABLE_NAME = ?", [env('DB_DATABASE'), $tableName]);

        $foreignKeysArray = [];
        $hasManyArray = [];

        foreach ($foreignKeys as $foreignKey) {
            $foreignKeysArray[] = [
                'COLUMN_NAME' => $foreignKey->COLUMN_NAME,
                'RELATED_MODEL' => Str::studly(Str::singular($foreignKey->REFERENCED_TABLE_NAME))
            ];
        }

        foreach ($hasManyRelations as $relation) {
            $hasManyArray[] = [
                'model' => Str::studly(Str::singular($relation->TABLE_NAME)),
                'name' => Str::camel(Str::plural($relation->TABLE_NAME))
            ];
        }

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

    protected function generateHasManyMethod($relatedModel, $relationshipName)
    {
        return <<<EOT
    public function $relationshipName(): HasMany
    {
        return \$this->hasMany($relatedModel::class);
    }
EOT;
    }

    protected function ensureUniqueName($baseName, &$existingNames)
    {
        $name = $baseName;
        $counter = 1;
        while (in_array($name, $existingNames)) {
            $name = $baseName . $counter;
            $counter++;
        }
        return $name;
    }
}
