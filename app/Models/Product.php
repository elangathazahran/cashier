<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['image', 'name', 'price', 'stock', 'description'];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }    
}
