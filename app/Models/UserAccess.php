<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserAccess extends Model
{
    protected $table = 'useraccess';

    public function relationships()
    {
        return [
            'systemUserRel',
            'userRoleRel',
            'systemActionRel'
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

        public function systemUserRel(): BelongsTo
    {
        return $this->belongsTo(SystemUser::class, 'SystemUser');
    }

        public function userRoleRel(): BelongsTo
    {
        return $this->belongsTo(UserRole::class, 'UserRole');
    }

        public function systemActionRel(): BelongsTo
    {
        return $this->belongsTo(SystemAction::class, 'SystemAction');
    }

    
}