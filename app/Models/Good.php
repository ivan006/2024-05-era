<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Good extends Model
{
    public function relationships()
    {
        return [
            'entity',
            'entitygoods'
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
            'HSCode' => 'nullable',
            'Description' => 'nullable',
            'EU6' => 'nullable',
            'EU10' => 'nullable',
            'UNU' => 'nullable',
            'AvgKg' => 'required',
            'Category' => 'nullable',
            'HazardSubstance' => 'nullable',
            'Dimension' => 'nullable',
            'Sector' => 'required'
        ];
    }

    protected $fillable = [
        'Id',
        'HSCode',
        'Description',
        'EU6',
        'EU10',
        'UNU',
        'AvgKg',
        'Category',
        'HazardSubstance',
        'Dimension',
        'Sector'
    ];

        public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'Sector');
    }

        public function entitygoods(): HasMany
    {
        return $this->hasMany(Entitygood::class);
    }
}