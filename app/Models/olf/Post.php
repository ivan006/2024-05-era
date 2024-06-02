<?php

namespace App\Models\olf;

use App\Models\BelongsToMany;
use App\Models\HasMany;
use App\Models\Tags;
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
