<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'icons',
        'is_menu',
        'auth',
        'class',
        'location'
    ]; 


    use HasFactory;
}
