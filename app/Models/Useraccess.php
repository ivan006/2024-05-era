<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Useraccess extends Model
{
    public function relationships()
    {
        return [
            'systemuser',
            'userrole',
            'systemaction'
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
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
        'Id',
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

        public function systemuser(): BelongsTo
    {
        return $this->belongsTo(Systemuser::class, 'SystemUser');
    }

        public function userrole(): BelongsTo
    {
        return $this->belongsTo(Userrole::class, 'UserRole');
    }

        public function systemaction(): BelongsTo
    {
        return $this->belongsTo(Systemaction::class, 'SystemAction');
    }

    
}