<?php

namespace App\Console\Commands\scafolding;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GenerateLaravelModels extends Command
{
    protected $signature = 'generate:laravel-models';
    protected $description = 'Generate Laravel models from database schema with relationships, rules, fillable attributes, and table name';

    public function handle()
    {
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableArray = get_object_vars($table);
            $tableName = reset($tableArray);
            $modelName = Str::studly(Str::singular($tableName));

            $columns = DB::select("SHOW COLUMNS FROM $tableName");

            $fillable = [];
            $rules = [];
            $relationships = [];
            $belongsToMethods = [];
            $hasManyMethods = [];
            $relations = $this->getModelRelations($tableName);

            $attributeNames = [];

            foreach ($columns as $column) {
                $fieldName = $column->Field;
                $nullable = $column->Null === 'YES';
                $autoIncrement = strpos($column->Extra, 'auto_increment') !== false;

                if (!$autoIncrement) {
                    $fillable[] = "'$fieldName'";
                    $rules[] = "'$fieldName' => '" . ($nullable ? 'nullable' : 'required') . "'";
                    $attributeNames[] = strtolower($fieldName); // Store attribute names in lowercase for case-insensitive comparison
                }

                if (in_array($fieldName, array_column($relations['foreignKeys'], 'COLUMN_NAME'))) {
                    // Remove the 'id', 'ID', '_id', '_ID', etc. suffix from the foreign key
                    $relationshipName = Str::camel(Str::singular(preg_replace('/(_?id)$/i', '', $fieldName)));
                    if (in_array(strtolower($relationshipName), $attributeNames)) { // Case-insensitive check for conflicts
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
                    if (in_array(strtolower($relationshipName), $attributeNames)) { // Case-insensitive check for conflicts
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
        }
    }

    protected function getModelRelations($tableName)
    {
        $foreignKeys = DB::select("SELECT
            COLUMN_NAME,
            REFERENCED_TABLE_NAME,
            REFERENCED_COLUMN_NAME,
            CONSTRAINT_NAME
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND REFERENCED_COLUMN_NAME IS NOT NULL", [env('DB_DATABASE'), $tableName]);

        $hasManyRelations = DB::select("SELECT
            TABLE_NAME,
            COLUMN_NAME,
            REFERENCED_COLUMN_NAME,
            CONSTRAINT_NAME
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
                'name' => Str::camel(Str::plural($relation->TABLE_NAME)),
                'COLUMN_NAME' => $relation->COLUMN_NAME,
                'KEY_COLUMN_NAME' => $relation->REFERENCED_COLUMN_NAME,
                'RELATED_MODEL' => Str::studly(Str::singular($relation->TABLE_NAME))
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
}
