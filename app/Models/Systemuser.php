<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Systemuser extends Model
{
    protected $table = 'systemuser';

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
        return $this->hasMany(Domainuser::class, 'SystemUser');
    }

        public function entityaudits(): HasMany
    {
        return $this->hasMany(Entityaudit::class, 'SystemUser');
    }

        public function servicerequests(): HasMany
    {
        return $this->hasMany(Servicerequest::class, 'CreatedBy');
    }

        public function servicerequestreports(): HasMany
    {
        return $this->hasMany(Servicerequestreport::class, 'CreatedBy');
    }

        public function useraccesses(): HasMany
    {
        return $this->hasMany(Useraccess::class, 'SystemUser');
    }

        public function userconfigurations(): HasMany
    {
        return $this->hasMany(Userconfiguration::class, 'SystemUser');
    }

        public function userdevices(): HasMany
    {
        return $this->hasMany(Userdevice::class, 'SystemUser');
    }
}