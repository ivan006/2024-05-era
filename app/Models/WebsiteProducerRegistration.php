<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteProducerRegistration extends Model
{
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