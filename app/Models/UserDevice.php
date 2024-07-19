<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserDevice extends OrmApiBaseModel
{
    protected $table = 'userdevice';

    public $timestamps = false;

    protected $primaryKey = '';

    public function relationships()
    {
        return [
            'system_user_rel'
        ];
    }

    public function rules()
    {
        return [
            'SystemUser' => 'required',
            'DeviceKey' => 'required',
            'Name' => 'required',
            'LastUsed' => 'nullable',
            'FbId' => 'nullable'
        ];
    }

    protected $fillable = [
        'SystemUser',
        'DeviceKey',
        'Name',
        'LastUsed',
        'FbId'
    ];

        public function system_user_rel(): BelongsTo
    {
        return $this->belongsTo(SystemUser::class, 'SystemUser');
    }

    
}