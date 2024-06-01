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

    

    
}