<?php

namespace App\Http\Controllers;

use View;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class ProductsByCategoryController extends Controller
{
    protected $products;
    protected $categories;
    protected $categoryRepository;
    protected $productRepository;
    
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    
    public function getProductsFromCategroy($id) {
        $this->categories = $this->categoryRepository->getAll();
        
        $categoryId = $id;
        $numberOfProducts = 8;
        $this->products = $this->productRepository->getByCategoryPaginated($categoryId, $numberOfProducts);
        
        return View::make('productsByCategory')
                ->with('products',$this->products)
                ->with('categories',$this->categories);
    }
}
