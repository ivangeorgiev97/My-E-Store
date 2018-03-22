<?php

namespace App\Http\Controllers;

use View;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class CurrentProductController extends Controller
{
    protected $product;
    protected $categories;
    protected $quantity;
    protected $categoryRepository;
    protected $productRepository;
    
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    
    public function getCurrentProduct($id){
        $this->product = $this->productRepository->getById($id);
        $this->categories = $this->categoryRepository->getAll();
        
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
