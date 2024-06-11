<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceRequestFrequency extends OrmApiBaseModel
{
    protected $table = 'servicerequestfrequency';

    public function relationships()
    {
        return [
            'serviceRequestRel',
            'reportFrequencyRel'
        ];
    }

    public function rules()
    {
        return [
            'ServiceRequest' => 'required',
            'ReportFrequency' => 'required',
            'Active' => 'nullable'
        ];
    }

    protected $fillable = [
        'ServiceRequest',
        'ReportFrequency',
        'Active'
    ];

        public function serviceRequestRel(): BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class, 'ServiceRequest');
    }

        public function reportFrequencyRel(): BelongsTo
    {
        return $this->belongsTo(SystemCode::class, 'ReportFrequency');
    }


}
