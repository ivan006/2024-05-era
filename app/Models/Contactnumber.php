<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contactnumber extends Model
{
    public function relationships()
    {
        return [
            'systemcode'
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
            'Number' => 'required',
            'Type' => 'required',
            'Person' => 'nullable',
            'Preferred' => 'required'
        ];
    }

    protected $fillable = [
        'Id',
        'Number',
        'Type',
        'Person',
        'Preferred'
    ];

        public function systemcode(): BelongsTo
    {
        return $this->belongsTo(Systemcode::class, 'Type');
    }

    
}