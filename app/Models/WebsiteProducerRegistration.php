<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteProducerRegistration extends Model
{
    protected $table = 'website_producer_registrations';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Data' => 'required',
            'ProducerId' => 'nullable'
        ];
    }

    protected $fillable = [
        'Data',
        'ProducerId'
    ];

    

    
}