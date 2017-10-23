<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Category;
use App\Product;

class ProductsByCategoryController extends Controller
{
    private $products;
    private $categories;
    
    public function getProductsFromCategroy($id) {
        $this->categories = Category::all();
        
        $this->products = Product::where('category_id',$id)->orderBy('id','desc')->paginate(8);
        
        return View::make('productsByCategory')
                ->with('products',$this->products)
                ->with('categories',$this->categories);
    }
}
