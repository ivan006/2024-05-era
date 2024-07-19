<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceRequestReport extends OrmApiBaseModel
{
    protected $table = 'servicerequestreport';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'service_request_rel',
            'service_provider_rel',
            'created_by_rel',
            'treatment_detail',
            'externalproducers',
            'treatmentdetails_rel'
        ];
    }

    public function rules()
    {
        return [
            'ServiceRequest' => 'required',
            'ServiceProvider' => 'required',
            'CreatedBy' => 'nullable',
            'TreatmentDetails' => 'nullable',
            'CreatedOn' => 'nullable',
            'ReportDate' => 'nullable',
            'Approved' => 'required',
            'Rejected' => 'required'
        ];
    }

    protected $fillable = [
        'ServiceRequest',
        'ServiceProvider',
        'CreatedBy',
        'TreatmentDetails',
        'CreatedOn',
        'ReportDate',
        'Approved',
        'Rejected'
    ];

        public function service_request_rel(): BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class, 'ServiceRequest');
    }

        public function service_provider_rel(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'ServiceProvider');
    }

        public function created_by_rel(): BelongsTo
    {
        return $this->belongsTo(SystemUser::class, 'CreatedBy');
    }

        public function treatment_detail(): BelongsTo
    {
        return $this->belongsTo(TreatmentDetail::class, 'TreatmentDetails');
    }

        public function externalproducers(): HasMany
    {
        return $this->hasMany(ExternalProducer::class, 'ServiceRequestReport');
    }

        public function treatmentdetails_rel(): HasMany
    {
        return $this->hasMany(TreatmentDetail::class, 'ServiceRequestReport');
    }
}