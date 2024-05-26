<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Email extends Model
{
    protected $table = 'email';

    public function relationships()
    {
        return [
            'systemcodeType'
        ];
    }

    public function rules()
    {
        return [
            'Address' => 'required',
            'Type' => 'required',
            'Person' => 'nullable',
            'Preferred' => 'required'
        ];
    }

    protected $fillable = [
        'Address',
        'Type',
        'Person',
        'Preferred'
    ];

        public function systemcodeType(): BelongsTo
    {
        return $this->belongsTo(Systemcode::class, 'Type');
    }

    
}