<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    protected $table = 'address';

    public function relationships()
    {
        return [
            'countryRel',
            'typeRel'
        ];
    }

    public function rules()
    {
        return [
            'StreetNo' => 'nullable',
            'StreetName' => 'nullable',
            'Building' => 'nullable',
            'Postal' => 'nullable',
            'Suburb' => 'nullable',
            'City' => 'nullable',
            'Province' => 'nullable',
            'Country' => 'nullable',
            'PostCode' => 'nullable',
            'Type' => 'nullable',
            'Person' => 'nullable',
            'MoveDate' => 'nullable',
            'Preferred' => 'nullable',
            'Dispatch' => 'nullable',
            'Latitude' => 'nullable',
            'Longitude' => 'nullable'
        ];
    }

    protected $fillable = [
        'StreetNo',
        'StreetName',
        'Building',
        'Postal',
        'Suburb',
        'City',
        'Province',
        'Country',
        'PostCode',
        'Type',
        'Person',
        'MoveDate',
        'Preferred',
        'Dispatch',
        'Latitude',
        'Longitude'
    ];

        public function countryRel(): BelongsTo
    {
        return $this->belongsTo(SystemCode::class, 'Country');
    }

        public function typeRel(): BelongsTo
    {
        return $this->belongsTo(SystemCode::class, 'Type');
    }

    
}