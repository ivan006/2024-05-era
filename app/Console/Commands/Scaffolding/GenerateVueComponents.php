<?php

namespace App\Console\Commands\Scaffolding;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateVueComponents extends Command
{
    protected $signature = 'generate:vue-components';
    protected $description = 'Generate Vue component files for each model';

    public function handle()
    {
        $models = [
            ['name' => 'Address', 'kebab' => 'address'],
            ['name' => 'Attachment', 'kebab' => 'attachment'],
            ['name' => 'Audit', 'kebab' => 'audit'],
            ['name' => 'Bank', 'kebab' => 'bank'],
            ['name' => 'Communication', 'kebab' => 'communication'],
            ['name' => 'Contactnumber', 'kebab' => 'contactnumber'],
            ['name' => 'Crm', 'kebab' => 'crm'],
            ['name' => 'Document', 'kebab' => 'document'],
            ['name' => 'Documentdetail', 'kebab' => 'document-detail'],
            ['name' => 'Domainuser', 'kebab' => 'domain-user'],
            ['name' => 'Dummy', 'kebab' => 'dummy'],
            ['name' => 'Email', 'kebab' => 'email'],
            ['name' => 'Entity', 'kebab' => 'entity'],
            ['name' => 'Entityaudit', 'kebab' => 'entity-audit'],
            ['name' => 'Entityevent', 'kebab' => 'entity-event'],
            ['name' => 'Entitygood', 'kebab' => 'entity-good'],
            ['name' => 'Entitygoodapproval', 'kebab' => 'entity-good-approval'],
            ['name' => 'Entityrelationship', 'kebab' => 'entity-relationship'],
            ['name' => 'Externalproducer', 'kebab' => 'external-producer'],
            ['name' => 'Good', 'kebab' => 'good'],
            ['name' => 'Instanceno', 'kebab' => 'instance-no'],
            ['name' => 'Object', 'kebab' => 'object'],
            ['name' => 'Objecttrait', 'kebab' => 'object-trait'],
            ['name' => 'Objectvalue', 'kebab' => 'object-value'],
            ['name' => 'Passwordhash', 'kebab' => 'password-hash'],
            ['name' => 'Productprovider', 'kebab' => 'product-provider'],
            ['name' => 'Query', 'kebab' => 'query'],
            ['name' => 'Queryheader', 'kebab' => 'query-header'],
            ['name' => 'Relative', 'kebab' => 'relative'],
            ['name' => 'Requirement', 'kebab' => 'requirement'],
            ['name' => 'Requirementdetail', 'kebab' => 'requirement-detail'],
            ['name' => 'Rule', 'kebab' => 'rule'],
            ['name' => 'Ruleaction', 'kebab' => 'rule-action'],
            ['name' => 'Ruleactiondatum', 'kebab' => 'rule-action-datum'],
            ['name' => 'Ruleconfig', 'kebab' => 'rule-config'],
            ['name' => 'Ruleentityrole', 'kebab' => 'rule-entity-role'],
            ['name' => 'Servicerequest', 'kebab' => 'service-request'],
            ['name' => 'Servicerequestfrequency', 'kebab' => 'service-request-frequency'],
            ['name' => 'Servicerequestreport', 'kebab' => 'service-request-report'],
            ['name' => 'Systemaction', 'kebab' => 'system-action'],
            ['name' => 'Systemcode', 'kebab' => 'system-code'],
            ['name' => 'Systemconfiguration', 'kebab' => 'system-configuration'],
            ['name' => 'Systemlog', 'kebab' => 'system-log'],
            ['name' => 'Systemuser', 'kebab' => 'system-user'],
            ['name' => 'Transaction', 'kebab' => 'transaction'],
            ['name' => 'Treatmentdetail', 'kebab' => 'treatment-detail'],
            ['name' => 'Useraccess', 'kebab' => 'user-access'],
            ['name' => 'Userconfiguration', 'kebab' => 'user-configuration'],
            ['name' => 'Userdevice', 'kebab' => 'user-device'],
            ['name' => 'Userrole', 'kebab' => 'user-role'],
            ['name' => 'Userroleaccess', 'kebab' => 'user-role-access'],
            ['name' => 'WebsiteProducerRegistration', 'kebab' => 'website-producer-registration'],
        ];

        foreach ($models as $model) {
            $modelName = $model['name'];
            $kebabModel = $model['kebab'];

            $listComponentContent = $this->getListComponentContent($modelName, $kebabModel);
            $readComponentContent = $this->getReadComponentContent($modelName, $kebabModel);

            $listPath = base_path("resources/js/views/lists/$kebabModel/{$modelName}List.vue");
            $readPath = base_path("resources/js/views/lists/$kebabModel/{$modelName}Read.vue");

            File::ensureDirectoryExists(dirname($listPath));
            File::put($listPath, $listComponentContent);

            File::ensureDirectoryExists(dirname($readPath));
            File::put($readPath, $readComponentContent);

            $this->info("Generated Vue components for $modelName");
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
          // if (this.\$store.getters['entities/login-sessions/all']()?.[0]){
          //   const id = this.\$store.getters['entities/login-sessions/all']()?.[0]?.\$id
          //   result = this.\$store.state.entities['login-sessions'].data[id]?.user
          // }
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
