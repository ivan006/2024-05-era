<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExternalProducer extends Model
{
    protected $table = 'externalproducers';

    public function relationships()
    {
        return [
            'serviceRequestReportRel'
        ];
    }

    public function rules()
    {
        return [
            'Name' => 'required',
            'ServiceRequestReport' => 'nullable'
        ];
    }

    protected $fillable = [
        'Name',
        'ServiceRequestReport'
    ];

        public function serviceRequestReportRel(): BelongsTo
    {
        return $this->belongsTo(ServiceRequestReport::class, 'ServiceRequestReport');
    }

    
}