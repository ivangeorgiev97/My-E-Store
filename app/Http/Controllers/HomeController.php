<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Category;
use App\Product;


class HomeController extends Controller
{
    public function index() {
       $products = Product::orderBy('id','desc')->limit(8)->get();     
       $categories = Category::all();   // TODO: Share it with all views 

       $counter = 0;
       $counter2 = 0;
       $temp = 0;
       $flag = false; 
       $allPrevious = array();
       
      
        return View::make('index')
            ->with('products',$products)
            ->with('categories',$categories)
            ->with('counter',$counter)
            ->with('counter2',$counter2)
            ->with('flag',$flag)
            ->with('temp',$temp)
            ->with('allPrevious',$allPrevious);
    }
}
