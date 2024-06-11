<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserConfiguration extends OrmApiBaseModel
{
    protected $table = 'userconfiguration';

    public function relationships()
    {
        return [
            'systemUserRel',
            'languageRel'
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

        public function systemUserRel(): BelongsTo
    {
        return $this->belongsTo(SystemUser::class, 'SystemUser');
    }

        public function languageRel(): BelongsTo
    {
        return $this->belongsTo(SystemCode::class, 'Language');
    }


}
