<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    private mixed $content;
    private mixed $created_at;

    public function getExcerptAttribute(): string
    {
        return substr($this->content,0,120);
    }

    public function getPublishedAtAttribute(): string{
        return $this->created_at->format('d/m/y');
    }
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
