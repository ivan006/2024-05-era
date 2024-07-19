<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SystemUser extends OrmApiBaseModel
{
    protected $table = 'systemuser';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'communications',
            'domainusers',
            'entityaudits',
            'servicerequests',
            'servicerequestreports',
            'useraccesses',
            'userconfigurations',
            'userdevices'
        ];
    }

    public function rules()
    {
        return [
            'Entity' => 'required',
            'Username' => 'nullable',
            'Active' => 'required',
            'LastSeen' => 'nullable',
            'LoginCount' => 'nullable',
            'FailedLoginAttempts' => 'nullable',
            'LockedSince' => 'nullable',
            'Secret' => 'nullable',
            'Email' => 'nullable',
            'Phone' => 'nullable',
            'CreatedOn' => 'nullable',
            'CreatedBy' => 'nullable',
            'ChangedOn' => 'nullable',
            'ChangedBy' => 'nullable',
            'FbId' => 'nullable'
        ];
    }

    protected $fillable = [
        'Entity',
        'Username',
        'Active',
        'LastSeen',
        'LoginCount',
        'FailedLoginAttempts',
        'LockedSince',
        'Secret',
        'Email',
        'Phone',
        'CreatedOn',
        'CreatedBy',
        'ChangedOn',
        'ChangedBy',
        'FbId'
    ];

    

        public function communications(): HasMany
    {
        return $this->hasMany(Communication::class, 'SentBy');
    }

        public function domainusers(): HasMany
    {
        return $this->hasMany(DomainUser::class, 'SystemUser');
    }

        public function entityaudits(): HasMany
    {
        return $this->hasMany(EntityAudit::class, 'SystemUser');
    }

        public function servicerequests(): HasMany
    {
        return $this->hasMany(ServiceRequest::class, 'CreatedBy');
    }

        public function servicerequestreports(): HasMany
    {
        return $this->hasMany(ServiceRequestReport::class, 'CreatedBy');
    }

        public function useraccesses(): HasMany
    {
        return $this->hasMany(UserAccess::class, 'SystemUser');
    }

        public function userconfigurations(): HasMany
    {
        return $this->hasMany(UserConfiguration::class, 'SystemUser');
    }

        public function userdevices(): HasMany
    {
        return $this->hasMany(UserDevice::class, 'SystemUser');
    }
}