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
            'entityEntity',
            'addressAddresses',
            'addressAddresses1',
            'contactnumberContactnumbers',
            'emailEmails',
            'servicerequestfrequencyServicerequestfrequencies',
            'transactionTransactions',
            'userconfigurationUserconfigurations'
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

        public function entityEntity(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'Entity');
    }

        public function addressAddresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

        public function addressAddresses1(): HasMany
    {
        return $this->hasMany(Address::class);
    }

        public function contactnumberContactnumbers(): HasMany
    {
        return $this->hasMany(Contactnumber::class);
    }

        public function emailEmails(): HasMany
    {
        return $this->hasMany(Email::class);
    }

        public function servicerequestfrequencyServicerequestfrequencies(): HasMany
    {
        return $this->hasMany(Servicerequestfrequency::class);
    }

        public function transactionTransactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

        public function userconfigurationUserconfigurations(): HasMany
    {
        return $this->hasMany(Userconfiguration::class);
    }
}