<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entitygood extends Model
{
    protected $table = 'entitygood';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Entity' => 'required',
            'Good' => 'required',
            'Units' => 'required',
            'AvgKg' => 'required',
            'AvgKgOld' => 'nullable',
            'AvgLifeSpan' => 'nullable',
            'TotalKg' => 'nullable',
            'Tariff' => 'nullable',
            'Selected' => 'nullable',
            'Dimension' => 'nullable',
            'WasteClass' => 'nullable',
            'Period' => 'nullable',
            'Invoice' => 'nullable'
        ];
    }

    protected $fillable = [
        'Entity',
        'Good',
        'Units',
        'AvgKg',
        'AvgKgOld',
        'AvgLifeSpan',
        'TotalKg',
        'Tariff',
        'Selected',
        'Dimension',
        'WasteClass',
        'Period',
        'Invoice'
    ];

    

    
}