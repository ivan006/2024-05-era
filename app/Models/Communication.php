<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Communication extends Model
{
    public function relationships()
    {
        return [
            'systemuser'
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
            'Type' => 'nullable',
            'Status' => 'nullable',
            'SentBy' => 'nullable',
            'SentTo' => 'nullable',
            'SentOn' => 'nullable',
            'Content' => 'nullable',
            'RelativeName' => 'nullable',
            'RelativeID' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'Type',
        'Status',
        'SentBy',
        'SentTo',
        'SentOn',
        'Content',
        'RelativeName',
        'RelativeID'
    ];

        public function systemuser(): BelongsTo
    {
        return $this->belongsTo(Systemuser::class, 'SentBy');
    }

    
}