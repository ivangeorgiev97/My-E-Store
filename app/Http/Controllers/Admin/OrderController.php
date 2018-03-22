<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use View;
use Auth;

use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;

class OrderController extends Controller {
    
    protected $orderRepository;
    protected $productRepository;
    
    public function __construct(OrderRepository $orderRepository, ProductRepository $productRepository) {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }
    
    public function getOrders() {
      $orders = $this->orderRepository->getOrders();
      
      $products = $this->productRepository->getProductsOfOrders();
      
      $counter2 = 0;
      
      return View::make('admincp/orders')
              ->with('orders',$orders)
              ->with('products',$products)
              ->with('counter2',$counter2);
    }
    
    public function orderNotSent(Request $req) {
        $orderStatus = 1;
        $orderId = $req->order_id;
             
        $this->orderRepository->updateOrderStatus($orderId, $orderStatus);
        
      return redirect('admincp/orders?page='.$req->current_page);
    }
    
    public function orderSent(Request $req) {
        $orderStatus = 0;
        $orderId = $req->order_id;
             
        $this->orderRepository->updateOrderStatus($orderId, $orderStatus);
        
      return redirect('admincp/orders?page='.$req->current_page);
    }    
    
}
