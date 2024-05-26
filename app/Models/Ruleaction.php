<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruleaction extends Model
{
    protected $table = 'ruleaction';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
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