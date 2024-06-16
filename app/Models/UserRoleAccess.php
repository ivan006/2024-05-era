<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserRoleAccess extends OrmApiBaseModel
{
    protected $table = 'userroleaccess';

    public $timestamps = false;

    protected $primaryKey = '';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'UserRole' => 'required',
            'SystemAction' => 'required',
            'CreatedOn' => 'nullable',
            'CreatedBy' => 'nullable',
            'ChangedOn' => 'nullable',
            'ChangedBy' => 'nullable',
            'FbId' => 'nullable',
            'Rule' => 'nullable'
        ];
    }

    protected $fillable = [
        'UserRole',
        'SystemAction',
        'CreatedOn',
        'CreatedBy',
        'ChangedOn',
        'ChangedBy',
        'FbId',
        'Rule'
    ];

    

    
}