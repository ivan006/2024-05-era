<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruleconfig extends Model
{
    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
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
        'Id',
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