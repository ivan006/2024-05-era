<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Systemlog extends Model
{
    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Id' => 'required',
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
        'Id',
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