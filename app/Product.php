<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'product_name', 'product_description', 'product_img', 'category_id', 'product_price', 'product_discount_price'
    ];
    
}
