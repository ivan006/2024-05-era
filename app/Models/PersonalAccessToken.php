<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PersonalAccessToken extends OrmApiBaseModel
{
    protected $table = 'personal_access_tokens';

    public function relationships()
    {
        return [

        ];
    }

    public function rules()
    {
        return [
            'tokenable_type' => 'required',
            'tokenable_id' => 'required',
            'name' => 'required',
            'token' => 'required',
            'abilities' => 'nullable',
            'last_used_at' => 'nullable',
            'expires_at' => 'nullable',
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];
    }

    protected $fillable = [
        'tokenable_type',
        'tokenable_id',
        'name',
        'token',
        'abilities',
        'last_used_at',
        'expires_at',
        'created_at',
        'updated_at'
    ];




}
