<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Externalproducer extends Model
{
    protected $table = 'externalproducers';

    public function relationships()
    {
        return [
            'servicerequestreportServiceRequestReport'
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

        public function servicerequestreportServiceRequestReport(): BelongsTo
    {
        return $this->belongsTo(Servicerequestreport::class, 'ServiceRequestReport');
    }

    
}