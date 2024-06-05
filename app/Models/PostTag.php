<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostTag extends Model
{
    protected $table = 'post_tags';

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
            'post_id' => 'required',
            'tag_id' => 'required'
        ];
    }

    protected $fillable = [
        'created_at',
        'updated_at',
        'post_id',
        'tag_id'
    ];

    

    
}