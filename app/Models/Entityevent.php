<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entityevent extends Model
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
            'TableID' => 'nullable',
            'TableName' => 'nullable',
            'Event' => 'nullable',
            'Date' => 'nullable',
            'Instance' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'TableID',
        'TableName',
        'Event',
        'Date',
        'Instance'
    ];

    

    
}