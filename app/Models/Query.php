<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Query extends OrmApiBaseModel
{
    protected $table = 'query';

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
