<?php

namespace App\Repositories;

use App\Order_product;

class OrderProductRepository extends BaseRepository {
    protected $model;
    
    public function __construct(Order_product $model) {
        $this->model = $model;
    }
    
    public function addOrderedProducts($orderedProducts) {
        $this->model::create($orderedProducts);
    }
}
