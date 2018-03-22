<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use View;
use App\Product;
use App\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class SearchController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;
    
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    
    public function autocomplete() {
	$name = request('term');
        $result = $this->productRepository->getSuggestedProductsByName($name);
          
        return response()->json($result);
    }
    
    public function getSearchResult(Request $request) { 
        if (!empty($request->term)) {
        $name = $request->term;
        $numberOfProducts = 8;
        $products = $this->productRepository->getByNamePaginated($name, $numberOfProducts); //OLD VERSION /->get(['id']);
        $categories = $this->categoryRepository->getAll();
        
        // OLD VERSION
        // $id;
//        foreach($result as $res) {
//            $id = $res['id'];
//        }
        
        return View::make('productsByCategory')
                    ->with('products',$products)
                    ->with('categories',$categories);
        
       // return redirect('/product/'.$id); OLD VERSION
        }
        
        return redirect()->route('home');
    }

}
