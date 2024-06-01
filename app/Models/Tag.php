<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function Posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function PostTags(): HasMany
    {
        return $this->hasMany(PostTag::class);
    }
}
