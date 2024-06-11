<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rule extends OrmApiBaseModel
{
    protected $table = 'rule';

    public function relationships()
    {
        return [

        ];
    }

    public function rules()
    {
        return [
            'Name' => 'nullable',
            'Description' => 'nullable',
            'RuleType' => 'nullable',
            'NextRule' => 'nullable'
        ];
    }

    protected $fillable = [
        'Name',
        'Description',
        'RuleType',
        'NextRule'
    ];




}
