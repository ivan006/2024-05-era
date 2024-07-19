<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SystemConfiguration extends OrmApiBaseModel
{
    protected $table = 'systemconfiguration';

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
            'Name' => 'required',
            'Value' => 'required'
        ];
    }

    protected $fillable = [
        'Name',
        'Value'
    ];

    

    
}