<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceRequest extends OrmApiBaseModel
{
    protected $table = 'servicerequest';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'serviceProviderRel',
            'createdByRel',
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

        public function serviceProviderRel(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'ServiceProvider');
    }

        public function createdByRel(): BelongsTo
    {
        return $this->belongsTo(SystemUser::class, 'CreatedBy');
    }

        public function servicerequestfrequencies(): HasMany
    {
        return $this->hasMany(ServiceRequestFrequency::class, 'ServiceRequest');
    }

        public function servicerequestreports(): HasMany
    {
        return $this->hasMany(ServiceRequestReport::class, 'ServiceRequest');
    }
}