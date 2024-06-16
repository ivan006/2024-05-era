<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PasswordHash extends OrmApiBaseModel
{
    protected $table = 'passwordhash';

    public $timestamps = false;

    protected $primaryKey = '';

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