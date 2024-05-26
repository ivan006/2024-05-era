<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Userroleaccess extends Model
{
    protected $table = 'userroleaccess';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'UserRole' => 'required',
            'SystemAction' => 'required',
            'CreatedOn' => 'nullable',
            'CreatedBy' => 'nullable',
            'ChangedOn' => 'nullable',
            'ChangedBy' => 'nullable',
            'FbId' => 'nullable',
            'Rule' => 'nullable'
        ];
    }

    protected $fillable = [
        'UserRole',
        'SystemAction',
        'CreatedOn',
        'CreatedBy',
        'ChangedOn',
        'ChangedBy',
        'FbId',
        'Rule'
    ];

    

    
}