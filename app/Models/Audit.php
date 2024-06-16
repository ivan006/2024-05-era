<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Audit extends OrmApiBaseModel
{
    protected $table = 'audit';

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