<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContactNumber extends OrmApiBaseModel
{
    protected $table = 'contactnumber';

    public $timestamps = false;

    protected $primaryKey = 'Id';

    public function relationships()
    {
        return [
            'type_rel'
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

        public function type_rel(): BelongsTo
    {
        return $this->belongsTo(SystemCode::class, 'Type');
    }

    
}