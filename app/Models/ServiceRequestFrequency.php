<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceRequestFrequency extends OrmApiBaseModel
{
    protected $table = 'servicerequestfrequency';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'service_request_rel',
            'report_frequency_rel'
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

        public function service_request_rel(): BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class, 'ServiceRequest');
    }

        public function report_frequency_rel(): BelongsTo
    {
        return $this->belongsTo(SystemCode::class, 'ReportFrequency');
    }

    
}