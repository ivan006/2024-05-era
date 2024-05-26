<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Crm extends Model
{
    protected $table = 'crm';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Entity' => 'nullable',
            'EntityProduct' => 'nullable',
            'Contact' => 'nullable',
            'Description' => 'nullable',
            'Status' => 'nullable'
        ];
    }

    protected $fillable = [
        'Entity',
        'EntityProduct',
        'Contact',
        'Description',
        'Status'
    ];

    

    
}