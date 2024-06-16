<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InstanceNo extends OrmApiBaseModel
{
    protected $table = 'instanceno';

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
            'ObjectName' => 'required'
        ];
    }

    protected $fillable = [
        'ObjectName'
    ];

    

    
}