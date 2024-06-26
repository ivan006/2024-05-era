<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ObjectModel extends OrmApiBaseModel
{
    protected $table = 'object';

    public function relationships()
    {
        return [

        ];
    }

    public function rules()
    {
        return [
            'Name' => 'required',
            'Description' => 'required',
            'Parent' => 'nullable',
            'ChildType' => 'nullable'
        ];
    }

    protected $fillable = [
        'Name',
        'Description',
        'Parent',
        'ChildType'
    ];




}
