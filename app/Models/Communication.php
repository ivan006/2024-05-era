<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Communication extends OrmApiBaseModel
{
    protected $table = 'communication';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'sent_by_rel'
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

        public function sent_by_rel(): BelongsTo
    {
        return $this->belongsTo(SystemUser::class, 'SentBy');
    }

    
}