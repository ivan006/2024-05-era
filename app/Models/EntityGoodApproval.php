<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EntityGoodApproval extends OrmApiBaseModel
{
    protected $table = 'entitygoodapproval';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'approved_by_rel',
            'invoice_approved_by_rel',
            'entity_rel',
            'query_rel',
            'entitygoods'
        ];
    }

    public function rules()
    {
        return [
            'ApprovedBy' => 'required',
            'ApprovedOn' => 'required',
            'InvoiceApprovedBy' => 'nullable',
            'InvoiceApprovedOn' => 'nullable',
            'Entity' => 'required',
            'Period' => 'required',
            'PurchaseOrder' => 'nullable',
            'InvoiceNo' => 'nullable',
            'UseAR' => 'required',
            'UseVAT' => 'required',
            'Query' => 'nullable',
            'Status' => 'required'
        ];
    }

    protected $fillable = [
        'ApprovedBy',
        'ApprovedOn',
        'InvoiceApprovedBy',
        'InvoiceApprovedOn',
        'Entity',
        'Period',
        'PurchaseOrder',
        'InvoiceNo',
        'UseAR',
        'UseVAT',
        'Query',
        'Status'
    ];

        public function approved_by_rel(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'ApprovedBy');
    }

        public function invoice_approved_by_rel(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'InvoiceApprovedBy');
    }

        public function entity_rel(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'Entity');
    }

        public function query_rel(): BelongsTo
    {
        return $this->belongsTo(QueryHeader::class, 'Query');
    }

        public function entitygoods(): HasMany
    {
        return $this->hasMany(EntityGood::class, 'Invoice');
    }
}