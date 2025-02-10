<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'name',
        'url', 
        'thumbnail',
        'sort_by',
        'active'  
    ];
}
