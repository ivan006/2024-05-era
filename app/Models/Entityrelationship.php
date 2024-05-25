<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entityrelationship extends Model
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
            'EntityA' => 'nullable',
            'EntityB' => 'nullable',
            'EntityARelationship' => 'nullable',
            'EntityBRelationship' => 'nullable',
            'EntityAStatus' => 'nullable',
            'EntityBStatus' => 'nullable',
            'EntityAQualifier' => 'nullable',
            'EntityBQualifier' => 'nullable',
            'EntityALevel' => 'nullable',
            'EntityBLevel' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'EntityA',
        'EntityB',
        'EntityARelationship',
        'EntityBRelationship',
        'EntityAStatus',
        'EntityBStatus',
        'EntityAQualifier',
        'EntityBQualifier',
        'EntityALevel',
        'EntityBLevel'
    ];

    

    
}