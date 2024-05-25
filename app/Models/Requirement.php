<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Requirement extends Model
{
    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Service' => 'nullable',
            'Category' => 'nullable',
            'Code' => 'nullable',
            'Name' => 'nullable',
            'Required' => 'nullable',
            'Path' => 'nullable',
            'Display' => 'nullable',
            'SystemCodeContext' => 'nullable',
            'SystemCodeField' => 'nullable',
            'ValueType' => 'nullable'
        ];
    }

    protected $fillable = [
        'Service',
        'Category',
        'Code',
        'Name',
        'Required',
        'Path',
        'Display',
        'SystemCodeContext',
        'SystemCodeField',
        'ValueType'
    ];

    

    
}