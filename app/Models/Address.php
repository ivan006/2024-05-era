<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends OrmApiBaseModel
{
    protected $table = 'address';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'country_rel',
            'type_rel'
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

        public function country_rel(): BelongsTo
    {
        return $this->belongsTo(SystemCode::class, 'Country');
    }

        public function type_rel(): BelongsTo
    {
        return $this->belongsTo(SystemCode::class, 'Type');
    }

    
}