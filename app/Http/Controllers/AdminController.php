<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use View;
use Auth;

use App\Category;
use App\Product;
use App\Order;
use App\User;

class AdminController extends Controller
{
    /////////// INDEX //////////////////
    
    public function index() {
        return view('admincp/admincp');
    }
    
    //////////// ORDERS - SHOULD BE ON SEPARATE CONTROLLER ////////////////
    
    public function getOrders() {
      $orders = Order::join('users','orders.user_id', '=', 'users.id')
              ->select('users.email', 'orders.*')->orderBy('id','desc')->paginate(1);
      
      $products = Product::join('order_products','products.id','=','order_products.product_id')->select('products.id','products.product_name','order_products.order_id', 'order_products.order_product_quantity')->get();
      
      $counter2 = 0;
      
      return View::make('admincp/orders')
              ->with('orders',$orders)
              ->with('products',$products)
              ->with('counter2',$counter2);
    }
    
    public function orderNotSent(Request $req) {
        $newStatus = 1;
        
        $order = Order::find($req->order_id);
        $order->status = 1;
        $order->save();
        
      return redirect('admincp/orders?page='.$req->current_page);
    }
    
    public function orderSent(Request $req) {
        $newStatus = 0;
        
        $order = Order::find($req->order_id);
        $order->status = 0;
        $order->save();
        
      return redirect('admincp/orders?page='.$req->current_page);
    }    
    
    /////////// PRODUCTS - SHOULD BE ON SEPARATE CONTROLLER ////////////////
    
    public function getProducts() {
        $products = Product::join('categories','products.category_id', '=', 'categories.id')->select('categories.category_name', 'products.*')->orderBy('id','desc')->paginate(8);
        $categories = Category::all();
        
        return View::make('admincp/products')
                ->with('products',$products)
                ->with('categories',$categories);
    }
    
    public function getAddProduct() {
        $categories = Category::all();
        
        return View::make('admincp/addproduct')
                ->with('categories',$categories);
    }
    
    public function addProduct(Request $request) {
          	$this->validate($request, [
         'product_name' => 'required',
         'product_description' => 'required',
          'product_price' => 'required',
      'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);
   
        $product_name = $request->product_name;
        $product_description = $request->product_description;
        $product_price = $request->product_price;
       
        $product_img_name = time();
        $product_img = $product_img_name .'.'.$request->product_img->getClientOriginalExtension();
        $request->product_img->move(public_path('images'), $product_img);
        
        $category_id = $request->category_id;
        
        Product::create(['product_name'=>$product_name, 'product_description'=>$product_description, 'product_price'=>$product_price, 'product_img'=>$product_img_name.'.'.$request->product_img->getClientOriginalExtension(), 'category_id'=>$category_id]);
    
        
        return redirect('admincp/products');
    }
    
    
    /////////// CATEGORIES - SHOULD BE ON SEPARATE CONTROLLER ////////////////

    public function getCategories() {
        $categories = Category::all();
        
        return View::make('admincp/categories')
                ->with('categories',$categories);
    }
    

}
