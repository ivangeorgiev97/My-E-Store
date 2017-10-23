<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    protected $fillable = [
        'product_id', 'order_product_price', 'order_product_quantity', 'order_id'
    ];
    
    public function order() {
        return $this->belongsTo('App\Order','order_id');
    }
    
    public function product() {
        return $this->belongsTo('App\Product','product_id');
    }    
}
