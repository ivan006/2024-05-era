<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instanceno extends Model
{
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