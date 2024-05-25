<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Treatmentdetail extends Model
{
    public function relationships()
    {
        return [
            'servicerequestreport',
            'servicerequestreports'
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
            'ServiceRequestReport' => 'nullable',
            'OpeningBalance' => 'nullable',
            'Refurbished' => 'nullable',
            'Recovered' => 'nullable',
            'Export' => 'nullable',
            'Energy' => 'nullable',
            'Landfill' => 'nullable',
            'LocalSecondaryProducts' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'ServiceRequestReport',
        'OpeningBalance',
        'Refurbished',
        'Recovered',
        'Export',
        'Energy',
        'Landfill',
        'LocalSecondaryProducts'
    ];

        public function servicerequestreport(): BelongsTo
    {
        return $this->belongsTo(Servicerequestreport::class, 'ServiceRequestReport');
    }

        public function servicerequestreports(): HasMany
    {
        return $this->hasMany(Servicerequestreport::class);
    }
}