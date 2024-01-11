<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'slug';

    public $incrementing = false;

    protected $casts = [
        'tags' => 'array',
        'categories' => 'array'
    ];
    
    protected $fillable = [
        'thumbnail', 
        'title',
        'slug',
        'content', 
        'user_id',
        'contributor', 
        'categories',
        'tags',
        'meta',
        'template',
        'status'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany{
        return $this->hasMany(Comment::class);
    }

    public function categories(): BelongsToMany{
        return $this->belongsToMany(Category::class);
    }

    public function tags(): BelongsToMany{
        return $this->belongsToMany(Tag::class);
    }

    public function template(): BelongsTo{
        return $this->belongsTo(Template::class);
    }
}
