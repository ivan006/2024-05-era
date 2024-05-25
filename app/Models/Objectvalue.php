<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Objectvalue extends Model
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
            'Trait' => 'nullable',
            'Value' => 'nullable',
            'Instance' => 'nullable',
            'ValueJson' => 'nullable',
            'Object' => 'nullable',
            'Entity' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'Trait',
        'Value',
        'Instance',
        'ValueJson',
        'Object',
        'Entity'
    ];

    

    
}