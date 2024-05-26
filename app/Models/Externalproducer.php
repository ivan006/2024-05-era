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
            'serviceRequestReport'
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

        public function serviceRequestReport(): BelongsTo
    {
        return $this->belongsTo(Servicerequestreport::class, 'ServiceRequestReport');
    }

    
}