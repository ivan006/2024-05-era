<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserRole extends OrmApiBaseModel
{
    protected $table = 'userrole';

    public function relationships()
    {
        return [
            'useraccesses'
        ];
    }

    public function rules()
    {
        return [
            'Name' => 'required',
            'Active' => 'required',
            'CreatedOn' => 'nullable',
            'CreatedBy' => 'nullable',
            'ChangedOn' => 'nullable',
            'ChangedBy' => 'nullable',
            'FbId' => 'nullable'
        ];
    }

    protected $fillable = [
        'Name',
        'Active',
        'CreatedOn',
        'CreatedBy',
        'ChangedOn',
        'ChangedBy',
        'FbId'
    ];



        public function useraccesses(): HasMany
    {
        return $this->hasMany(UserAccess::class, 'UserRole');
    }
}
