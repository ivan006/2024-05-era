<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entitygoodapproval extends Model
{
    public function relationships()
    {
        return [
            'entity',
            'entity',
            'entity',
            'queryheader',
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

        public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'ApprovedBy');
    }

//        public function entity(): BelongsTo
//    {
//        return $this->belongsTo(Entity::class, 'InvoiceApprovedBy');
//    }

//        public function entity(): BelongsTo
//    {
//        return $this->belongsTo(Entity::class, 'Entity');
//    }

        public function queryheader(): BelongsTo
    {
        return $this->belongsTo(Queryheader::class, 'Query');
    }

        public function entitygoods(): HasMany
    {
        return $this->hasMany(Entitygood::class);
    }
}
