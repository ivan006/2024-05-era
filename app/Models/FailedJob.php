<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FailedJob extends OrmApiBaseModel
{
    protected $table = 'failed_jobs';

    public function relationships()
    {
        return [

        ];
    }

    public function rules()
    {
        return [
            'uuid' => 'required',
            'connection' => 'required',
            'queue' => 'required',
            'payload' => 'required',
            'exception' => 'required',
            'failed_at' => 'required'
        ];
    }

    protected $fillable = [
        'uuid',
        'connection',
        'queue',
        'payload',
        'exception',
        'failed_at'
    ];




}
