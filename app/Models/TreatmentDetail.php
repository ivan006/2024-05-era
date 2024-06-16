<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TreatmentDetail extends OrmApiBaseModel
{
    protected $table = 'treatmentdetails';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'service_request_report_rel',
            'servicerequestreports'
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

        public function service_request_report_rel(): BelongsTo
    {
        return $this->belongsTo(ServiceRequestReport::class, 'ServiceRequestReport');
    }

        public function servicerequestreports(): HasMany
    {
        return $this->hasMany(ServiceRequestReport::class, 'TreatmentDetails');
    }
}