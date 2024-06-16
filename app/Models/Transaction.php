<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends OrmApiBaseModel
{
    protected $table = 'transactions';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'typeRel'
        ];
    }

    public function rules()
    {
        return [
            'TransNo' => 'required',
            'Description' => 'nullable',
            'TransactionDate' => 'nullable',
            'CaptureDate' => 'nullable',
            'AccountCode' => 'nullable',
            'Entity' => 'nullable',
            'EntityProduct' => 'nullable',
            'Debit' => 'nullable',
            'Credit' => 'nullable',
            'Source' => 'nullable',
            'Period' => 'nullable',
            'Reference' => 'nullable',
            'Type' => 'nullable'
        ];
    }

    protected $fillable = [
        'TransNo',
        'Description',
        'TransactionDate',
        'CaptureDate',
        'AccountCode',
        'Entity',
        'EntityProduct',
        'Debit',
        'Credit',
        'Source',
        'Period',
        'Reference',
        'Type'
    ];

        public function typeRel(): BelongsTo
    {
        return $this->belongsTo(SystemCode::class, 'Type');
    }

    
}