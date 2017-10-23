<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

use Gloudemans\Shoppingcart\Facades\Cart;

use App\Product;




class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cartItems = Cart::content();
        
        return View::make('cart')
                ->with('cartItems',$cartItems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->product_id;
        $quantity = $request->quantityCurrentProduct;
        
        $currentProduct = Product::find($id);
        
        Cart::add($id,$currentProduct->product_name,$quantity,$currentProduct->product_price);
        
//        $cartItems = Cart::content();
//        
//        return View::make('cart')
//                ->with('cartItems',$cartItems);
          return redirect('myCart');      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    
    public function removeItem($rowId)
    {
        Cart::remove($rowId);
        
        return redirect('myCart');       
    }
    
    
}
