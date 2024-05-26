<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Communication extends Model
{
    protected $table = 'communication';

    public function relationships()
    {
        return [
            'systemuserSentBy'
        ];
    }

    public function rules()
    {
        return [
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
        'Type',
        'Status',
        'SentBy',
        'SentTo',
        'SentOn',
        'Content',
        'RelativeName',
        'RelativeID'
    ];

        public function systemuserSentBy(): BelongsTo
    {
        return $this->belongsTo(Systemuser::class, 'SentBy');
    }

    
}