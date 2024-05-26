<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entitygoodapproval extends Model
{
    protected $table = 'entitygoodapproval';

    public function relationships()
    {
        return [
            'entityApprovedBy',
            'entityInvoiceApprovedBy',
            'entityEntity',
            'queryheaderQuery',
            'entitygoodEntitygoods'
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

        public function entityApprovedBy(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'ApprovedBy');
    }

        public function entityInvoiceApprovedBy(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'InvoiceApprovedBy');
    }

        public function entityEntity(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'Entity');
    }

        public function queryheaderQuery(): BelongsTo
    {
        return $this->belongsTo(Queryheader::class, 'Query');
    }

        public function entitygoodEntitygoods(): HasMany
    {
        return $this->hasMany(Entitygood::class);
    }
}