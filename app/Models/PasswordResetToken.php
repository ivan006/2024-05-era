<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PasswordResetToken extends Model
{
    protected $table = 'password_reset_tokens';

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