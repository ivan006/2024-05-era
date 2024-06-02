<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SystemLog extends Model
{
    protected $table = 'systemlog';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'LogDate' => 'required',
            'LogLevel' => 'nullable',
            'Logger' => 'nullable',
            'SystemUser' => 'nullable',
            'CallSite' => 'nullable',
            'Message' => 'nullable',
            'Exception' => 'nullable',
            'StackTrace' => 'nullable'
        ];
    }

    protected $fillable = [
        'LogDate',
        'LogLevel',
        'Logger',
        'SystemUser',
        'CallSite',
        'Message',
        'Exception',
        'StackTrace'
    ];

    

    
}