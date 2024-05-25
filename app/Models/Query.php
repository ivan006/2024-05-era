<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Query extends Model
{
    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'ParentQuery' => 'required',
            'AssignedTo' => 'nullable',
            'Description' => 'nullable',
            'CreatedBy' => 'nullable',
            'CreatedOn' => 'nullable',
            'ClosedOn' => 'nullable',
            'ClosedBy' => 'nullable'
        ];
    }

    protected $fillable = [
        'ParentQuery',
        'AssignedTo',
        'Description',
        'CreatedBy',
        'CreatedOn',
        'ClosedOn',
        'ClosedBy'
    ];

    

    
}