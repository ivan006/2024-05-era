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
            'communicationCommunications',
            'domainuserDomainusers',
            'entityauditEntityaudits',
            'servicerequestServicerequests',
            'servicerequestreportServicerequestreports',
            'useraccessUseraccesses',
            'userconfigurationUserconfigurations',
            'userdeviceUserdevices'
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

    

        public function communicationCommunications(): HasMany
    {
        return $this->hasMany(Communication::class);
    }

        public function domainuserDomainusers(): HasMany
    {
        return $this->hasMany(Domainuser::class);
    }

        public function entityauditEntityaudits(): HasMany
    {
        return $this->hasMany(Entityaudit::class);
    }

        public function servicerequestServicerequests(): HasMany
    {
        return $this->hasMany(Servicerequest::class);
    }

        public function servicerequestreportServicerequestreports(): HasMany
    {
        return $this->hasMany(Servicerequestreport::class);
    }

        public function useraccessUseraccesses(): HasMany
    {
        return $this->hasMany(Useraccess::class);
    }

        public function userconfigurationUserconfigurations(): HasMany
    {
        return $this->hasMany(Userconfiguration::class);
    }

        public function userdeviceUserdevices(): HasMany
    {
        return $this->hasMany(Userdevice::class);
    }
}