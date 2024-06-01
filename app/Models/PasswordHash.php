<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PasswordHash extends Model
{
    protected $table = 'passwordhash';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'SystemUser' => 'required',
            'Hash' => 'required',
            'Salt' => 'required',
            'CreatedOn' => 'nullable',
            'CreatedBy' => 'nullable',
            'ChangedOn' => 'nullable',
            'ChangedBy' => 'nullable',
            'FbId' => 'nullable'
        ];
    }

    protected $fillable = [
        'SystemUser',
        'Hash',
        'Salt',
        'CreatedOn',
        'CreatedBy',
        'ChangedOn',
        'ChangedBy',
        'FbId'
    ];

    

    
}