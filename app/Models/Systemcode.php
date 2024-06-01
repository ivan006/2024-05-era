<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Systemcode extends Model
{
    protected $table = 'systemcode';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'Context' => 'nullable',
            'Field' => 'nullable',
            'Description' => 'nullable',
            'Value' => 'required',
            'Code' => 'nullable',
            'Active' => 'nullable',
            'UserGenerated' => 'required',
            'ContextualId' => 'nullable',
            'CreatedOn' => 'nullable',
            'CreatedBy' => 'nullable',
            'ChangedOn' => 'nullable',
            'ChangedBy' => 'nullable',
            'Entity' => 'nullable'
        ];
    }

    protected $fillable = [
        'Context',
        'Field',
        'Description',
        'Value',
        'Code',
        'Active',
        'UserGenerated',
        'ContextualId',
        'CreatedOn',
        'CreatedBy',
        'ChangedOn',
        'ChangedBy',
        'Entity'
    ];

    

    
}