<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domainuser extends Model
{
    protected $table = 'domainuser';

    public function relationships()
    {
        return [
            'systemuserSystemUser'
        ];
    }

    public function rules()
    {
        return [
            'SystemUser' => 'required',
            'DomainName' => 'required',
            'DomainAccount' => 'required',
            'CreatedOn' => 'nullable',
            'CreatedBy' => 'nullable',
            'ChangedOn' => 'nullable',
            'ChangedBy' => 'nullable'
        ];
    }

    protected $fillable = [
        'SystemUser',
        'DomainName',
        'DomainAccount',
        'CreatedOn',
        'CreatedBy',
        'ChangedOn',
        'ChangedBy'
    ];

        public function systemuserSystemUser(): BelongsTo
    {
        return $this->belongsTo(Systemuser::class, 'SystemUser');
    }

    
}