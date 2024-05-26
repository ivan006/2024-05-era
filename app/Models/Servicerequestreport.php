<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicerequestreport extends Model
{
    protected $table = 'servicerequestreport';

    public function relationships()
    {
        return [
            'servicerequestServiceRequest',
            'entityServiceProvider',
            'systemuserCreatedBy',
            'treatmentdetailTreatmentDetails',
            'externalproducerExternalproducers',
            'treatmentdetailTreatmentdetails'
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

        public function servicerequestServiceRequest(): BelongsTo
    {
        return $this->belongsTo(Servicerequest::class, 'ServiceRequest');
    }

        public function entityServiceProvider(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'ServiceProvider');
    }

        public function systemuserCreatedBy(): BelongsTo
    {
        return $this->belongsTo(Systemuser::class, 'CreatedBy');
    }

        public function treatmentdetailTreatmentDetails(): BelongsTo
    {
        return $this->belongsTo(Treatmentdetail::class, 'TreatmentDetails');
    }

        public function externalproducerExternalproducers(): HasMany
    {
        return $this->hasMany(Externalproducer::class);
    }

        public function treatmentdetailTreatmentdetails(): HasMany
    {
        return $this->hasMany(Treatmentdetail::class);
    }
}