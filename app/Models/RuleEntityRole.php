<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RuleEntityRole extends OrmApiBaseModel
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
