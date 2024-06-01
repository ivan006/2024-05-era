<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Good extends Model
{
    protected $table = 'good';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'HSCode' => 'nullable',
            'Description' => 'nullable',
            'EU6' => 'nullable',
            'EU10' => 'nullable',
            'UNU' => 'nullable',
            'AvgKg' => 'required',
            'Category' => 'nullable',
            'HazardSubstance' => 'nullable',
            'Dimension' => 'nullable',
            'Sector' => 'required'
        ];
    }

    protected $fillable = [
        'HSCode',
        'Description',
        'EU6',
        'EU10',
        'UNU',
        'AvgKg',
        'Category',
        'HazardSubstance',
        'Dimension',
        'Sector'
    ];

    

    
}