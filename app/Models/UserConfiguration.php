<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserConfiguration extends OrmApiBaseModel
{
    protected $table = 'userconfiguration';

    public $timestamps = false;

    protected $primaryKey = '';

    public function relationships()
    {
        return [
            'system_user_rel',
            'language_rel'
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

        public function system_user_rel(): BelongsTo
    {
        return $this->belongsTo(SystemUser::class, 'SystemUser');
    }

        public function language_rel(): BelongsTo
    {
        return $this->belongsTo(SystemCode::class, 'Language');
    }

    
}