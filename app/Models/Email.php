<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Email extends OrmApiBaseModel
{
    protected $table = 'email';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'typeRel'
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

        public function typeRel(): BelongsTo
    {
        return $this->belongsTo(SystemCode::class, 'Type');
    }

    
}