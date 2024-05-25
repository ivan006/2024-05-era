<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicerequestreport extends Model
{
    public function relationships()
    {
        return [
            'servicerequest',
            'entity',
            'systemuser',
            'treatmentdetail',
            'externalproducers',
            'treatmentdetails'
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

        public function servicerequest(): BelongsTo
    {
        return $this->belongsTo(Servicerequest::class, 'ServiceRequest');
    }

        public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'ServiceProvider');
    }

        public function systemuser(): BelongsTo
    {
        return $this->belongsTo(Systemuser::class, 'CreatedBy');
    }

        public function treatmentdetail(): BelongsTo
    {
        return $this->belongsTo(Treatmentdetail::class, 'TreatmentDetails');
    }

        public function externalproducers(): HasMany
    {
        return $this->hasMany(Externalproducer::class);
    }

        public function treatmentdetails(): HasMany
    {
        return $this->hasMany(Treatmentdetail::class);
    }
}