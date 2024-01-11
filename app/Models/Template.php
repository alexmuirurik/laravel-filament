<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'type',
        'content'
    ];

    public function posts(): HasMany{
        return $this->hasMany(Post::class);
    }

    public function pages(): HasMany{
        return $this->hasMany(Page::class);
    }
}
