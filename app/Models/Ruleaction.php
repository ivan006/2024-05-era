<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruleaction extends Model
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
            'Rule' => 'nullable',
            'Process' => 'nullable',
            'Result' => 'nullable',
            'ResultNegative' => 'nullable',
            'ResultType' => 'nullable',
            'Description' => 'nullable',
            'ResultSystemCode' => 'nullable',
            'NegativeSystemCode' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'Rule',
        'Process',
        'Result',
        'ResultNegative',
        'ResultType',
        'Description',
        'ResultSystemCode',
        'NegativeSystemCode'
    ];

    

    
}