<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entitygood extends Model
{
    protected $table = 'entitygood';

    public function relationships()
    {
        return [
            'entityEntity',
            'goodGood',
            'entitygoodapprovalInvoice'
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

        public function entityEntity(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'Entity');
    }

        public function goodGood(): BelongsTo
    {
        return $this->belongsTo(Good::class, 'Good');
    }

        public function entitygoodapprovalInvoice(): BelongsTo
    {
        return $this->belongsTo(Entitygoodapproval::class, 'Invoice');
    }

    
}