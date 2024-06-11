<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RuleActionDatum extends OrmApiBaseModel
{
    protected $table = 'ruleactiondata';

    public function relationships()
    {
        return [

        ];
    }

    public function rules()
    {
        return [
            'Rule' => 'nullable',
            'TableName' => 'nullable',
            'ColumnName' => 'nullable',
            'ColumnType' => 'nullable'
        ];
    }

    protected $fillable = [
        'Rule',
        'TableName',
        'ColumnName',
        'ColumnType'
    ];




}
