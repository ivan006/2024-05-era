<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Objectvalue extends Model
{
    protected $table = 'objectvalue';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Trait' => 'nullable',
            'Value' => 'nullable',
            'Instance' => 'nullable',
            'ValueJson' => 'nullable',
            'Object' => 'nullable',
            'Entity' => 'nullable'
        ];
    }

    protected $fillable = [
        'Trait',
        'Value',
        'Instance',
        'ValueJson',
        'Object',
        'Entity'
    ];

    

    
}