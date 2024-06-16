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
            'serviceRequestRel',
            'serviceProviderRel',
            'createdByRel',
            'treatmentDetail',
            'externalproducers',
            'treatmentdetailsRel'
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

        public function serviceRequestRel(): BelongsTo
    {
        return $this->belongsTo(ServiceRequest::class, 'ServiceRequest');
    }

        public function serviceProviderRel(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'ServiceProvider');
    }

        public function createdByRel(): BelongsTo
    {
        return $this->belongsTo(SystemUser::class, 'CreatedBy');
    }

        public function treatmentDetail(): BelongsTo
    {
        return $this->belongsTo(TreatmentDetail::class, 'TreatmentDetails');
    }

        public function externalproducers(): HasMany
    {
        return $this->hasMany(ExternalProducer::class, 'ServiceRequestReport');
    }

        public function treatmentdetailsRel(): HasMany
    {
        return $this->hasMany(TreatmentDetail::class, 'ServiceRequestReport');
    }
}