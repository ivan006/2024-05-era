<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceRequestFrequency extends Model
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
        return $this->belongsTo(Servicerequest::class, 'ServiceRequest');
    }

        public function reportFrequencyRel(): BelongsTo
    {
        return $this->belongsTo(Systemcode::class, 'ReportFrequency');
    }

    
}