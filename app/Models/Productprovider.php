<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Productprovider extends Model
{
    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
            'Name' => 'required',
            'Entity' => 'required'
        ];
    }

    protected $fillable = [
        'Id',
        'Name',
        'Entity'
    ];

    

    
}