<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entity extends OrmApiBaseModel
{
    protected $table = 'entity';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'entitygoods',
            'entitygoodapprovals_approved_by',
            'entitygoodapprovals_invoice_approved_by',
            'entitygoodapprovals_entity',
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

        public function entitygoodapprovals_approved_by(): HasMany
    {
        return $this->hasMany(EntityGoodApproval::class, 'ApprovedBy');
    }

        public function entitygoodapprovals_invoice_approved_by(): HasMany
    {
        return $this->hasMany(EntityGoodApproval::class, 'InvoiceApprovedBy');
    }

        public function entitygoodapprovals_entity(): HasMany
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