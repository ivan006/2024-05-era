<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Audit extends Model
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
            'TableName' => 'nullable',
            'CRUD' => 'nullable',
            'Data' => 'nullable',
            'ChangeDate' => 'nullable',
            'Entity' => 'nullable',
            'PageNo' => 'nullable',
            'NoOfLines' => 'nullable',
            'CrudMessage' => 'nullable'
        ];
    }

    protected $fillable = [
        'Id',
        'TableName',
        'CRUD',
        'Data',
        'ChangeDate',
        'Entity',
        'PageNo',
        'NoOfLines',
        'CrudMessage'
    ];

    

    
}