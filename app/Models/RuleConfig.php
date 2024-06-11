<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RuleConfig extends OrmApiBaseModel
{
    protected $table = 'ruleconfig';

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
            'ColumnType' => 'nullable',
            'Operand' => 'nullable',
            'Value' => 'nullable',
            'Description' => 'nullable',
            'SystemCodeValue' => 'nullable'
        ];
    }

    protected $fillable = [
        'Rule',
        'TableName',
        'ColumnName',
        'ColumnType',
        'Operand',
        'Value',
        'Description',
        'SystemCodeValue'
    ];




}
