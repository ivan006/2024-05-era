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
            'addresses',
            'addresses1',
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

        public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

        public function addresses1(): HasMany
    {
        return $this->hasMany(Address::class);
    }

        public function contactnumbers(): HasMany
    {
        return $this->hasMany(Contactnumber::class);
    }

        public function emails(): HasMany
    {
        return $this->hasMany(Email::class);
    }

        public function servicerequestfrequencies(): HasMany
    {
        return $this->hasMany(Servicerequestfrequency::class);
    }

        public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

        public function userconfigurations(): HasMany
    {
        return $this->hasMany(Userconfiguration::class);
    }
}