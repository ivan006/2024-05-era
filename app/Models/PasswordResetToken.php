<?php

namespace App\Models;

use QuicklistsOrmApi\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PasswordResetToken extends OrmApiBaseModel
{
    protected $table = 'password_reset_tokens';

    public $timestamps = false;

    protected $primaryKey = '';

    public function relationships()
    {
        return [
            
        ];
    }

    public function rules()
    {
        return [
            'email' => 'required',
            'token' => 'required',
            'created_at' => 'nullable'
        ];
    }

    protected $fillable = [
        'email',
        'token',
        'created_at'
    ];

    

    
}