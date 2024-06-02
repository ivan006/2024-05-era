<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entity extends Model
{
    protected $table = 'entity';

    public function relationships()
    {
        return [
            'entitygoods',
            'entitygoodapprovalsApprovedBy',
            'entitygoodapprovalsInvoiceApprovedBy',
            'entitygoodapprovalsEntity',
            'goods',
            'servicerequests',
            'servicerequestreports',
            'systemcodes'
        ];
    }

    public function rules()
    {
        return [
            'ExternalNo' => 'nullable',
            'Level' => 'nullable',
            'Type' => 'nullable',
            'Title' => 'nullable',
            'Name' => 'nullable',
            'Surname' => 'nullable',
            'Identity' => 'nullable',
            'BirthDate' => 'nullable',
            'Gender' => 'nullable',
            'Language' => 'nullable',
            'Status' => 'nullable',
            'Note' => 'nullable',
            'Passport' => 'nullable',
            'HasPhoto' => 'nullable',
            'IsPaid' => 'nullable'
        ];
    }

    protected $fillable = [
        'ExternalNo',
        'Level',
        'Type',
        'Title',
        'Name',
        'Surname',
        'Identity',
        'BirthDate',
        'Gender',
        'Language',
        'Status',
        'Note',
        'Passport',
        'HasPhoto',
        'IsPaid'
    ];

    

        public function entitygoods(): HasMany
    {
        return $this->hasMany(Entitygood::class, 'Entity');
    }

        public function entitygoodapprovalsApprovedBy(): HasMany
    {
        return $this->hasMany(Entitygoodapproval::class, 'ApprovedBy');
    }

        public function entitygoodapprovalsInvoiceApprovedBy(): HasMany
    {
        return $this->hasMany(Entitygoodapproval::class, 'InvoiceApprovedBy');
    }

        public function entitygoodapprovalsEntity(): HasMany
    {
        return $this->hasMany(Entitygoodapproval::class, 'Entity');
    }

        public function goods(): HasMany
    {
        return $this->hasMany(Good::class, 'Sector');
    }

        public function servicerequests(): HasMany
    {
        return $this->hasMany(Servicerequest::class, 'ServiceProvider');
    }

        public function servicerequestreports(): HasMany
    {
        return $this->hasMany(Servicerequestreport::class, 'ServiceProvider');
    }

        public function systemcodes(): HasMany
    {
        return $this->hasMany(Systemcode::class, 'Entity');
    }
}