<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Crm extends Model
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
            'Entity' => 'nullable',
            'EntityProduct' => 'nullable',
            'Contact' => 'nullable',
            'Description' => 'nullable',
            'Status' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'Entity',
        'EntityProduct',
        'Contact',
        'Description',
        'Status'
    ];

    

    
}