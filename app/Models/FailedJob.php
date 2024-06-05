<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FailedJob extends Model
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