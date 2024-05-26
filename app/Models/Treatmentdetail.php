<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Treatmentdetail extends Model
{
    protected $table = 'treatmentdetails';

    public function relationships()
    {
        return [
            'servicerequestreportServiceRequestReport',
            'servicerequestreportServicerequestreports'
        ];
    }

    public function rules()
    {
        return [
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
        'ServiceRequestReport',
        'OpeningBalance',
        'Refurbished',
        'Recovered',
        'Export',
        'Energy',
        'Landfill',
        'LocalSecondaryProducts'
    ];

        public function servicerequestreportServiceRequestReport(): BelongsTo
    {
        return $this->belongsTo(Servicerequestreport::class, 'ServiceRequestReport');
    }

        public function servicerequestreportServicerequestreports(): HasMany
    {
        return $this->hasMany(Servicerequestreport::class);
    }
}