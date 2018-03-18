<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use View;
use App\Product;
use App\Category;

class SearchController extends Controller
{
    public function autocomplete() {
	$term = request('term');
        $result = Product::where('product_name', 'LIKE', '%' . $term . '%')->get(['id', 'product_name as value']);
          
        return response()->json($result);
    }
    
    public function getSearchResult(Request $request) { 
        if (!empty($request->term)) {
        $term = $request->term;
        $products = Product::where('product_name', 'LIKE', '%' . $term . '%')->paginate(8); //->get(['id']);
        $categories = Category::all();
        // $id;
//        foreach($result as $res) {
//            $id = $res['id'];
//        }
        
        return View::make('productsByCategory')
                    ->with('products',$products)
                    ->with('categories',$categories);
        
       // return redirect('/product/'.$id);
        }
        
        return redirect()->route('home');
    }

}
