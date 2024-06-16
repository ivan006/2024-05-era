<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ObjectValue extends OrmApiBaseModel
{
    protected $table = 'objectvalue';

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
            'Trait' => 'nullable',
            'Value' => 'nullable',
            'Instance' => 'nullable',
            'ValueJson' => 'nullable',
            'Object' => 'nullable',
            'Entity' => 'nullable'
        ];
    }

    protected $fillable = [
        'Trait',
        'Value',
        'Instance',
        'ValueJson',
        'Object',
        'Entity'
    ];

    

    
}