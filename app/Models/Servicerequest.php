<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicerequest extends Model
{
    public function relationships()
    {
        return [
            'entity',
            'systemuser',
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

        public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'ServiceProvider');
    }

        public function systemuser(): BelongsTo
    {
        return $this->belongsTo(Systemuser::class, 'CreatedBy');
    }

        public function servicerequestfrequencies(): HasMany
    {
        return $this->hasMany(Servicerequestfrequency::class);
    }

        public function servicerequestreports(): HasMany
    {
        return $this->hasMany(Servicerequestreport::class);
    }
}