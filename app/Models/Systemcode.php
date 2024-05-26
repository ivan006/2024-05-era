<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Systemcode extends Model
{
    protected $table = 'systemcode';

    public function relationships()
    {
        return [
            'entity',
            'addressesCountry',
            'addressesType',
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

        public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'Entity');
    }

        public function addressesCountry(): HasMany
    {
        return $this->hasMany(Address::class, 'Country');
    }

        public function addressesType(): HasMany
    {
        return $this->hasMany(Address::class, 'Type');
    }

        public function contactnumbers(): HasMany
    {
        return $this->hasMany(Contactnumber::class, 'Type');
    }

        public function emails(): HasMany
    {
        return $this->hasMany(Email::class, 'Type');
    }

        public function servicerequestfrequencies(): HasMany
    {
        return $this->hasMany(Servicerequestfrequency::class, 'ReportFrequency');
    }

        public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'Type');
    }

        public function userconfigurations(): HasMany
    {
        return $this->hasMany(Userconfiguration::class, 'Language');
    }
}