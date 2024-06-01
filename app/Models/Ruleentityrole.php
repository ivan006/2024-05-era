<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruleentityrole extends Model
{
    protected $table = 'ruleentityrole';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'EntityRole' => 'nullable',
            'Entity' => 'nullable',
            'UserRole' => 'nullable',
            'Rule' => 'required',
            'Priority' => 'nullable',
            'CRUD_Create' => 'nullable',
            'CRUD_Read' => 'nullable',
            'CRUD_Update' => 'nullable',
            'CRUD_Delete' => 'nullable'
        ];
    }

    protected $fillable = [
        'EntityRole',
        'Entity',
        'UserRole',
        'Rule',
        'Priority',
        'CRUD_Create',
        'CRUD_Read',
        'CRUD_Update',
        'CRUD_Delete'
    ];

    

    
}