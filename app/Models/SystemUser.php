<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SystemUser extends Model
{
    protected $table = 'systemuser';

    public function relationships()
    {
        return [
            
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

    

    
}