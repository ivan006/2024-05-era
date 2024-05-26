<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Userconfiguration extends Model
{
    protected $table = 'userconfiguration';

    public function relationships()
    {
        return [
            'systemUser',
            'language'
        ];
    }

    public function rules()
    {
        return [
            'SystemUser' => 'required',
            'Language' => 'required',
            'FbId' => 'nullable'
        ];
    }

    protected $fillable = [
        'SystemUser',
        'Language',
        'FbId'
    ];

        public function systemUser(): BelongsTo
    {
        return $this->belongsTo(Systemuser::class, 'SystemUser');
    }

        public function language(): BelongsTo
    {
        return $this->belongsTo(Systemcode::class, 'Language');
    }

    
}