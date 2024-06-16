<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SystemCode extends OrmApiBaseModel
{
    protected $table = 'systemcode';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'entity_rel',
            'addresses_country',
            'addresses_type',
            'contactnumbers',
            'emails',
            'servicerequestfrequencies',
            'transactions',
            'userconfigurations'
        ];
    }

    public function rules()
    {
        return [
            'Context' => 'nullable',
            'Field' => 'nullable',
            'Description' => 'nullable',
            'Value' => 'required',
            'Code' => 'nullable',
            'Active' => 'nullable',
            'UserGenerated' => 'required',
            'ContextualId' => 'nullable',
            'CreatedOn' => 'nullable',
            'CreatedBy' => 'nullable',
            'ChangedOn' => 'nullable',
            'ChangedBy' => 'nullable',
            'Entity' => 'nullable'
        ];
    }

    protected $fillable = [
        'Context',
        'Field',
        'Description',
        'Value',
        'Code',
        'Active',
        'UserGenerated',
        'ContextualId',
        'CreatedOn',
        'CreatedBy',
        'ChangedOn',
        'ChangedBy',
        'Entity'
    ];

        public function entity_rel(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'Entity');
    }

        public function addresses_country(): HasMany
    {
        return $this->hasMany(Address::class, 'Country');
    }

        public function addresses_type(): HasMany
    {
        return $this->hasMany(Address::class, 'Type');
    }

        public function contactnumbers(): HasMany
    {
        return $this->hasMany(ContactNumber::class, 'Type');
    }

        public function emails(): HasMany
    {
        return $this->hasMany(Email::class, 'Type');
    }

        public function servicerequestfrequencies(): HasMany
    {
        return $this->hasMany(ServiceRequestFrequency::class, 'ReportFrequency');
    }

        public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'Type');
    }

        public function userconfigurations(): HasMany
    {
        return $this->hasMany(UserConfiguration::class, 'Language');
    }
}