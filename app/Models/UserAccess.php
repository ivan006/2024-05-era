<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserAccess extends OrmApiBaseModel
{
    protected $table = 'useraccess';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'system_user_rel',
            'user_role_rel',
            'system_action_rel'
        ];
    }

    public function rules()
    {
        return [
            'SystemUser' => 'nullable',
            'UserRole' => 'nullable',
            'SystemAction' => 'nullable',
            'Entity' => 'nullable',
            'CreatedOn' => 'nullable',
            'CreatedBy' => 'nullable',
            'ChangedOn' => 'nullable',
            'ChangedBy' => 'nullable',
            'FbId' => 'nullable'
        ];
    }

    protected $fillable = [
        'SystemUser',
        'UserRole',
        'SystemAction',
        'Entity',
        'CreatedOn',
        'CreatedBy',
        'ChangedOn',
        'ChangedBy',
        'FbId'
    ];

        public function system_user_rel(): BelongsTo
    {
        return $this->belongsTo(SystemUser::class, 'SystemUser');
    }

        public function user_role_rel(): BelongsTo
    {
        return $this->belongsTo(UserRole::class, 'UserRole');
    }

        public function system_action_rel(): BelongsTo
    {
        return $this->belongsTo(SystemAction::class, 'SystemAction');
    }

    
}