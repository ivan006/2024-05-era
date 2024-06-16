<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Good extends OrmApiBaseModel
{
    protected $table = 'good';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'sectorRel',
            'entitygoods'
        ];
    }

    public function rules()
    {
        return [
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

        public function sectorRel(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'Sector');
    }

        public function entitygoods(): HasMany
    {
        return $this->hasMany(EntityGood::class, 'Good');
    }
}