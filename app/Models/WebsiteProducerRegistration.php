<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsiteProducerRegistration extends OrmApiBaseModel
{
    protected $table = 'website_producer_registrations';

    public $timestamps = false;

    protected $primaryKey = 'Id';

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