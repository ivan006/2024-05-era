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
            'service_request_report_rel'
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

        public function service_request_report_rel(): BelongsTo
    {
        return $this->belongsTo(ServiceRequestReport::class, 'ServiceRequestReport');
    }

    
}