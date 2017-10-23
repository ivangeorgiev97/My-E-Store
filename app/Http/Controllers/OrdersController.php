<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order_product;
use App\Order;

use View;
use Auth;

use Gloudemans\Shoppingcart\Facades\Cart;

class OrdersController extends Controller
{
   public function index() {
       return view('orderDetails');
   }
   
   public function makeOrder(Request $request) {
       $this->validate($request, [
         'receiver_name' => 'required',
         'phone' => 'required|numeric', 
         'address' => 'required',
      
        ]);
       
       $receiver_name = $request->receiver_name;
       $phone = $request->phone;
       $address = $request->address;
       $pymethod = $request->pymethod;
       $price = Cart::total();
       $status = 0;
       $user_id = Auth::user()->id;
       
       Order::create(['receiver_name'=>$receiver_name,'phone'=>$phone,'pymethod'=>$pymethod,'price'=>$price,'status'=>$status,'user_id'=>$user_id,'address'=>$address]);
       
       $lastOrder = Order::orderBy('id','desc')->first();
       
       foreach(Cart::content() as $cartItem) {
           Order_product::create(['product_id'=>$cartItem->id,'order_product_price'=>$cartItem->total,'order_product_quantity'=>$cartItem->qty,'order_id'=>$lastOrder->id]);
       }
       
       Cart::destroy();
       
       $success = "You have successfully completed your order!";
       
       return View::make('orderDetails')->with('success',$success);
           
   }   
}

