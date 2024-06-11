<?php

namespace App\Models\olf;

use App\Models\BelongsToMany;
use App\Models\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use QuicklistsOrmApi\OrmApiBaseModel;

class Tag extends OrmApiBaseModel
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
