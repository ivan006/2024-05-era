<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RuleActionDatum extends Model
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