<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = '23810310255_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_visible'
    ];

    // Quan hệ: 1 Category có nhiều Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
