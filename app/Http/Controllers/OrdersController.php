<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\OrderRepository;
use App\Repositories\OrderProductRepository;

use View;
use Auth;

use Gloudemans\Shoppingcart\Facades\Cart;

class OrdersController extends Controller
{
    
    protected $orderRepository;
    protected $orderProductRepository;
    
    public function __construct(OrderRepository $orderRepository, OrderProductRepository $orderProductRepository) 
    {
        $this->orderRepository = $orderRepository;
        $this->orderProductRepository = $orderProductRepository;
    }
    
   public function index() 
   {
       return view('orderDetails');
   }
   
   public function makeOrder(Request $request) 
   {
       $this->validate($request, [
         'receiver_name' => 'required',
         'phone' => 'required|numeric', 
         'address' => 'required'
        ]);
       
       $receiver_name = $request->receiver_name;
       $phone = $request->phone;
       $address = $request->address;
       $pymethod = $request->pymethod;
       $price = Cart::total();
       $status = 0;
       $user_id = Auth::user()->id;
       
       $order = ['receiver_name'=>$receiver_name,'phone'=>$phone,'pymethod'=>$pymethod,'price'=>$price,'status'=>$status,'user_id'=>$user_id,'address'=>$address];
       
       $this->orderRepository->createOrder($order);
       
       $lastOrder = $this->orderRepository->getLastOne();
       
       foreach(Cart::content() as $cartItem) {
          // Order_product::create(['product_id'=>$cartItem->id,'order_product_price'=>$cartItem->total,'order_product_quantity'=>$cartItem->qty,'order_id'=>$lastOrder->id]);
          $this->orderProductRepository->addOrderedProducts(['product_id'=>$cartItem->id,'order_product_price'=>$cartItem->total,'order_product_quantity'=>$cartItem->qty,'order_id'=>$lastOrder->id]);
       }
       
       Cart::destroy();
       
       $success = "You have successfully completed your order!";
       
       return View::make('orderDetails')->with('success',$success);   
   }   
   
}

