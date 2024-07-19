<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EntityGood extends OrmApiBaseModel
{
    protected $table = 'entitygood';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'entity_rel',
            'good_rel',
            'invoice_rel'
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

        public function entity_rel(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'Entity');
    }

        public function good_rel(): BelongsTo
    {
        return $this->belongsTo(Good::class, 'Good');
    }

        public function invoice_rel(): BelongsTo
    {
        return $this->belongsTo(EntityGoodApproval::class, 'Invoice');
    }

    
}