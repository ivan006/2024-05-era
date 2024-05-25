<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Externalproducer extends Model
{
    public function relationships()
    {
        return [
            'servicerequestreport'
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
            'Name' => 'required',
            'ServiceRequestReport' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'Name',
        'ServiceRequestReport'
    ];

        public function servicerequestreport(): BelongsTo
    {
        return $this->belongsTo(Servicerequestreport::class, 'ServiceRequestReport');
    }

    
}