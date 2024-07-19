<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends OrmApiBaseModel
{
    protected $table = 'users';

    public $timestamps = false;

    protected $primaryKey = 'id';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'email_verified_at' => 'nullable',
            'password' => 'required',
            'remember_token' => 'nullable',
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];
    }

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    

    
}