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
        return $this->hasMany(EntityGood::class, 'Entity');
    }

        public function entitygoodapprovalsApprovedBy(): HasMany
    {
        return $this->hasMany(EntityGoodApproval::class, 'ApprovedBy');
    }

        public function entitygoodapprovalsInvoiceApprovedBy(): HasMany
    {
        return $this->hasMany(EntityGoodApproval::class, 'InvoiceApprovedBy');
    }

        public function entitygoodapprovalsEntity(): HasMany
    {
        return $this->hasMany(EntityGoodApproval::class, 'Entity');
    }

        public function goods(): HasMany
    {
        return $this->hasMany(Good::class, 'Sector');
    }

        public function servicerequests(): HasMany
    {
        return $this->hasMany(ServiceRequest::class, 'ServiceProvider');
    }

        public function servicerequestreports(): HasMany
    {
        return $this->hasMany(ServiceRequestReport::class, 'ServiceProvider');
    }

        public function systemcodes(): HasMany
    {
        return $this->hasMany(SystemCode::class, 'Entity');
    }
}