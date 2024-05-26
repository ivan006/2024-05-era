<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Userdevice extends Model
{
    protected $table = 'userdevice';

    public function relationships()
    {
        return [
            'systemUserRel'
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

        public function systemUserRel(): BelongsTo
    {
        return $this->belongsTo(Systemuser::class, 'SystemUser');
    }

    
}