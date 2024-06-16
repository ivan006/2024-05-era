<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductProvider extends OrmApiBaseModel
{
    protected $table = 'productprovider';

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
            'Entity' => 'required'
        ];
    }

    protected $fillable = [
        'Name',
        'Entity'
    ];

    

    
}