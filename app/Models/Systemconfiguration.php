<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Systemconfiguration extends Model
{
    protected $table = 'systemconfiguration';

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