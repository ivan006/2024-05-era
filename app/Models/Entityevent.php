<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entityevent extends Model
{
    protected $table = 'entityevent';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'TableID' => 'nullable',
            'TableName' => 'nullable',
            'Event' => 'nullable',
            'Date' => 'nullable',
            'Instance' => 'nullable'
        ];
    }

    protected $fillable = [
        'TableID',
        'TableName',
        'Event',
        'Date',
        'Instance'
    ];

    

    
}