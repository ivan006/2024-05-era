<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExternalProducer extends OrmApiBaseModel
{
    protected $table = 'externalproducers';

    public $timestamps = false;

    protected $primaryKey = 'Id';

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