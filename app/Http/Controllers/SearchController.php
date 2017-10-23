<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Product;

class SearchController extends Controller
{
    public function autocomplete() {
	$term = request('term');
        $result = Product::where('product_name', 'LIKE', '%' . $term . '%')->get(['id', 'product_name as value']);
        return response()->json($result);//term
      
    }
    
    public function getSearchResult(Request $request) {
        $term = $request->term;
        $result = Product::where('product_name', 'LIKE', '%' . $term . '%')->get(['id']);
        $id;
        foreach($result as $res) {
            $id = $res['id'];
        }
        
        return redirect('/product/'.$id);
    }

}
