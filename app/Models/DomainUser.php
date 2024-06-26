<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DomainUser extends OrmApiBaseModel
{
    protected $table = 'domainuser';

    public $timestamps = false;

    protected $primaryKey = '';

    public function relationships()
    {
        return [
            'system_user_rel'
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

        public function system_user_rel(): BelongsTo
    {
        return $this->belongsTo(SystemUser::class, 'SystemUser');
    }

    
}