<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function Tags(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class);
    }

    public function PostTags(): HasMany
    {
        return $this->hasMany(PostTag::class);
    }
}
