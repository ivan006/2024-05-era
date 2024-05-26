<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicerequest extends Model
{
    protected $table = 'servicerequest';

    public function relationships()
    {
        return [
            'serviceProvider',
            'createdBy',
            'servicerequestfrequencies',
            'servicerequestreports'
        ];
    }

    public function rules()
    {
        return [
            'ServiceRequestNo' => 'nullable',
            'ServiceProvider' => 'required',
            'CreatedBy' => 'required',
            'CreatedOn' => 'required',
            'FromDate' => 'required',
            'ToDate' => 'required',
            'Services' => 'nullable',
            'Locations' => 'nullable',
            'Deliverables' => 'nullable',
            'DeliveryDate' => 'nullable'
        ];
    }

    protected $fillable = [
        'ServiceRequestNo',
        'ServiceProvider',
        'CreatedBy',
        'CreatedOn',
        'FromDate',
        'ToDate',
        'Services',
        'Locations',
        'Deliverables',
        'DeliveryDate'
    ];

        public function serviceProvider(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'ServiceProvider');
    }

        public function createdBy(): BelongsTo
    {
        return $this->belongsTo(Systemuser::class, 'CreatedBy');
    }

        public function servicerequestfrequencies(): HasMany
    {
        return $this->hasMany(Servicerequestfrequency::class, 'ServiceRequest');
    }

        public function servicerequestreports(): HasMany
    {
        return $this->hasMany(Servicerequestreport::class, 'ServiceRequest');
    }
}