<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'discount',
        'thumbnail',
        'stock',
        'brand',
        'connectivity',
        'compatibility',
        'product_color',
        'weight',
        'dimensions',
        'battery_life',
        'warranty',
        'release_date',
        'features',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')
            ->withDefault(['name' => '']);
    }
}