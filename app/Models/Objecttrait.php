<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Objecttrait extends Model
{
    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Name' => 'required',
            'Description' => 'nullable',
            'Object' => 'required',
            'Type' => 'nullable',
            'Level' => 'nullable',
            'IsRule' => 'nullable',
            'SpecialType' => 'nullable',
            'IsDisabled' => 'nullable',
            'IsHidden' => 'nullable',
            'SystemCodeContext' => 'nullable',
            'SystemCodeField' => 'nullable'
        ];
    }

    protected $fillable = [
        'Name',
        'Description',
        'Object',
        'Type',
        'Level',
        'IsRule',
        'SpecialType',
        'IsDisabled',
        'IsHidden',
        'SystemCodeContext',
        'SystemCodeField'
    ];

    

    
}