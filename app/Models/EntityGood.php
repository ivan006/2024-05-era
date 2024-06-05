<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EntityGood extends Model
{
    protected $table = 'entitygood';

    public function relationships()
    {
        return [
            'entityRel',
            'goodRel',
            'invoiceRel'
        ];
    }

    public function rules()
    {
        return [
            'Entity' => 'required',
            'Good' => 'required',
            'Units' => 'required',
            'AvgKg' => 'required',
            'AvgKgOld' => 'nullable',
            'AvgLifeSpan' => 'nullable',
            'TotalKg' => 'nullable',
            'Tariff' => 'nullable',
            'Selected' => 'nullable',
            'Dimension' => 'nullable',
            'WasteClass' => 'nullable',
            'Period' => 'nullable',
            'Invoice' => 'nullable'
        ];
    }

    protected $fillable = [
        'Entity',
        'Good',
        'Units',
        'AvgKg',
        'AvgKgOld',
        'AvgLifeSpan',
        'TotalKg',
        'Tariff',
        'Selected',
        'Dimension',
        'WasteClass',
        'Period',
        'Invoice'
    ];

        public function entityRel(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'Entity');
    }

        public function goodRel(): BelongsTo
    {
        return $this->belongsTo(Good::class, 'Good');
    }

        public function invoiceRel(): BelongsTo
    {
        return $this->belongsTo(EntityGoodApproval::class, 'Invoice');
    }

    
}