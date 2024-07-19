<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EntityRelationship extends OrmApiBaseModel
{
    protected $table = 'entityrelationship';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
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