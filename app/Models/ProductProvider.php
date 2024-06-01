<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductProvider extends Model
{
    protected $table = 'productprovider';

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