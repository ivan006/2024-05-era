<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entitygood extends Model
{
    public function relationships()
    {
        return [
            'entity',
            'good',
            'entitygoodapproval'
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
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
        'Id',
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

        public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'Entity');
    }

        public function good(): BelongsTo
    {
        return $this->belongsTo(Good::class, 'Good');
    }

        public function entitygoodapproval(): BelongsTo
    {
        return $this->belongsTo(Entitygoodapproval::class, 'Invoice');
    }

    
}