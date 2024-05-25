<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicerequestfrequency extends Model
{
    public function relationships()
    {
        return [
            'servicerequest',
            'systemcode'
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
            'ServiceRequest' => 'required',
            'ReportFrequency' => 'required',
            'Active' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'ServiceRequest',
        'ReportFrequency',
        'Active'
    ];

        public function servicerequest(): BelongsTo
    {
        return $this->belongsTo(Servicerequest::class, 'ServiceRequest');
    }

        public function systemcode(): BelongsTo
    {
        return $this->belongsTo(Systemcode::class, 'ReportFrequency');
    }

    
}