<?php

namespace App\Models\olf;

use App\Models\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use QuicklistsOrmApi\OrmApiBaseModel;

class PostTag extends OrmApiBaseModel
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'tag_id',
    ];

    public function Post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
