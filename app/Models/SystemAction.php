<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SystemAction extends Model
{
    protected $table = 'systemaction';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Module' => 'required',
            'Context' => 'required',
            'Action' => 'required',
            'Description' => 'nullable',
            'Available' => 'nullable',
            'CreatedOn' => 'nullable',
            'CreatedBy' => 'nullable',
            'ChangedOn' => 'nullable',
            'ChangedBy' => 'nullable'
        ];
    }

    protected $fillable = [
        'Module',
        'Context',
        'Action',
        'Description',
        'Available',
        'CreatedOn',
        'CreatedBy',
        'ChangedOn',
        'ChangedBy'
    ];

    

    
}