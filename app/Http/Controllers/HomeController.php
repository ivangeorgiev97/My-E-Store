<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;


class HomeController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;
    
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    
    public function index() {
       $products = $this->productRepository->getLatestProducts(8);     
       $categories = $this->categoryRepository->getAll();   
       
       return View::make('index')
            ->with('products',$products)
            ->with('categories',$categories);
    }
}
