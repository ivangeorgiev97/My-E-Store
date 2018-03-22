<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use View;
use Auth;
use App\Repositories\CategoryRepository;
use App\Product;
use App\Order;
use App\User;

class CategoryController extends Controller{
    protected $categoryRepository;
    
    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }
   
    public function getCategories() {
        $categories = $this->categoryRepository->getAll();
        
        return View::make('admincp/categories')
                ->with('categories',$categories);
    }
    
}
