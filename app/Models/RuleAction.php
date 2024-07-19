<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RuleAction extends OrmApiBaseModel
{
    protected $table = 'ruleaction';

    public $timestamps = false;

    protected $primaryKey = 'Id';

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