<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contactnumber extends Model
{
    protected $table = 'contactnumber';

    public function relationships()
    {
        return [
            'type'
        ];
    }

    public function rules()
    {
        return [
            'Number' => 'required',
            'Type' => 'required',
            'Person' => 'nullable',
            'Preferred' => 'required'
        ];
    }

    protected $fillable = [
        'Number',
        'Type',
        'Person',
        'Preferred'
    ];

        public function type(): BelongsTo
    {
        return $this->belongsTo(Systemcode::class, 'Type');
    }

    
}