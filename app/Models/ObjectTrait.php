<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ObjectTrait extends OrmApiBaseModel
{
    protected $table = 'objecttrait';

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