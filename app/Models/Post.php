<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    protected $table = 'posts';

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