<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends OrmApiBaseModel
{
    protected $table = 'tags';

    public function relationships()
    {
        return [

        ];
    }

    public function rules()
    {
        return [
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
            'name' => 'required'
        ];
    }

    protected $fillable = [
        'created_at',
        'updated_at',
        'name'
    ];




}
