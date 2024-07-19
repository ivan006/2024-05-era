<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dummy extends OrmApiBaseModel
{
    protected $table = 'dummy';

    public $timestamps = false;

    protected $primaryKey = '';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'textData' => 'nullable'
        ];
    }

    protected $fillable = [
        'textData'
    ];

    

    
}