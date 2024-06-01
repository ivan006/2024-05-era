<?php

namespace App\Console\Commands\Scaffolding;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Console\Commands\WordSplitter;

class GenerateVueComponents extends Command
{
    protected $signature = 'generate:vue-components';
    protected $description = 'Generate Vue component files for each model';
    protected $wordSplitter;

    public function __construct()
    {
        parent::__construct();
        $this->wordSplitter = new WordSplitter();
    }

    public function handle()
    {
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            // Extract the table name dynamically
            $tableArray = get_object_vars($table);
            $tableName = reset($tableArray);
            $cleanedTableName = preg_replace('/[^a-zA-Z]/', '', $tableName);
            $this->info("Processing table: $tableName (cleaned: $cleanedTableName)");

            $segmentationResult = $this->wordSplitter->split($cleanedTableName);
            $segmentedTableName = $segmentationResult['words'];
            $this->info("Segmented table name: " . implode(' ', $segmentedTableName));

            $pascalTableName = implode('', array_map('ucfirst', $segmentedTableName));
            $modelName = Str::singular($pascalTableName);
            $kebabModel = Str::kebab(implode('-', $segmentedTableName));

            $listComponentContent = $this->getListComponentContent($modelName, $kebabModel);
            $readComponentContent = $this->getReadComponentContent($modelName, $kebabModel);

            $listPath = base_path("resources/js/views/lists/$kebabModel/{$modelName}List.vue");
            $readPath = base_path("resources/js/views/lists/$kebabModel/{$modelName}Read.vue");

            File::ensureDirectoryExists(dirname($listPath));
            File::put($listPath, $listComponentContent);

            File::ensureDirectoryExists(dirname($readPath));
            File::put($readPath, $readComponentContent);

            $this->info("Generated Vue components for $tableName");
        }
    }

    protected function getListComponentContent($modelName, $kebabModel)
    {
        return <<<EOT
<template>
    <div>
        <v-card class="pa-4 mt-4">
            <SuperTable
                :user="user"
                :showMap="true"
                :model="superTableModel"
                @update:modelValue="openRecord"
                :displayMapField="false"
            />
        </v-card>
    </div>
</template>

<script>
import { SuperTable } from 'quicklists-vue-orm-ui'
import $modelName from '@/models/$modelName'
import router from '@/router'

export default {
    name: '$modelName-list',
    components: {
        SuperTable,
    },

    computed: {
        superTableModel() {
            return $modelName
        },
        user() {
          let result = {}
          if (this.\$store.getters['entities/login-sessions/all']()?.[0]){
            const id = this.\$store.getters['entities/login-sessions/all']()?.[0]?.\$id
            result = this.\$store.state.entities['login-sessions'].data[id]?.user
          }
          return result
        },
    },
    methods: {
        openRecord(e) {
            //router.push({
            //    name: '/lists/$kebabModel/:rId',
            //    params: {
            //        rId: e.id,
            //    },
            //})
        },
    },
}
</script>
EOT;
    }

    protected function getReadComponentContent($modelName, $kebabModel)
    {
        return <<<EOT
<template>
    <div>
        <v-card class="pa-4 mt-4">
            <SuperRecord
                :model="superRecordModel"
                :id="+\$route.params.rId"
                :displayMapField="true"
                :user="user"
            >
            </SuperRecord>
        </v-card>
    </div>
</template>

<script>
import { SuperRecord } from 'quicklists-vue-orm-ui'
import $modelName from '@/models/$modelName'

export default {
    name: '$modelName-read',
    components: { SuperRecord },
    computed: {
        superRecordModel() {
            return $modelName
        },
        user() {
          let result = {}
          // if (this.\$store.getters['entities/login-sessions/all']()?.[0]){
          //   const id = this.\$store.getters['entities/login-sessions/all']()?.[0]?.\$id
          //   result = this.\$store.state.entities['login-sessions'].data[id]?.user
          // }
          return result
        },
    },
}
</script>

<style scoped></style>
EOT;
    }
}
