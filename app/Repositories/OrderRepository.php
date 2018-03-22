<?php

namespace App\Repositories;

use App\Order;

class OrderRepository extends BaseRepository {
    
    protected $model;
    
    public function __construct(Order $model) {
        $this->model = $model;
    }
    
    public function getOrders() {
        return $this->model::join('users','orders.user_id', '=', 'users.id')
              ->select('users.email', 'orders.*')->orderBy('id','desc')->paginate(1);
    }
    
    public function updateOrderStatus($orderId, $orderStatus) {
        $order = $this->model::find($orderId);
        $order->status = $orderStatus;
        $order->save();
    }
    
    public function createOrder($order) {
        $this->model::create($order);
    }
            
}
