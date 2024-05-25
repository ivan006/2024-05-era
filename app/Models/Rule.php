<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rule extends Model
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
            'Name' => 'nullable',
            'Description' => 'nullable',
            'RuleType' => 'nullable',
            'NextRule' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'Name',
        'Description',
        'RuleType',
        'NextRule'
    ];

    

    
}