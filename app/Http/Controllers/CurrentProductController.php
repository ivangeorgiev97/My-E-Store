<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Category;
use App\Product;

class CurrentProductController extends Controller
{
    private $product;
    private $categories;
    private $quantity;
    
    public function getCurrentProduct($id){
        $this->product = Product::where('id',$id)->get();
        $this->categories = Category::all();
        
        $this->quantity = array();
        for($i=0; $i<=4; $i++){
            $this->quantity[$i] = $i+1;
        }
        
        return View::make('currentProduct')
                ->with('product',$this->product)
                ->with('categories', $this->categories)
                ->with('quantity',$this->quantity);
    }
}
