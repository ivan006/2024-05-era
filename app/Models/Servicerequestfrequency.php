<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicerequestfrequency extends Model
{
    protected $table = 'servicerequestfrequency';

    public function relationships()
    {
        return [
            'servicerequestServiceRequest',
            'systemcodeReportFrequency'
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

        public function servicerequestServiceRequest(): BelongsTo
    {
        return $this->belongsTo(Servicerequest::class, 'ServiceRequest');
    }

        public function systemcodeReportFrequency(): BelongsTo
    {
        return $this->belongsTo(Systemcode::class, 'ReportFrequency');
    }

    
}