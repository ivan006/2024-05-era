<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EntityEvent extends OrmApiBaseModel
{
    protected $table = 'entityevent';

    public function relationships()
    {
        return [

        ];
    }

    public function rules()
    {
        return [
            'TableID' => 'nullable',
            'TableName' => 'nullable',
            'Event' => 'nullable',
            'Date' => 'nullable',
            'Instance' => 'nullable'
        ];
    }

    protected $fillable = [
        'TableID',
        'TableName',
        'Event',
        'Date',
        'Instance'
    ];




}
