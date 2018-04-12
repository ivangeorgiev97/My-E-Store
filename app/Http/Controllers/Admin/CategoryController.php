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

class CategoryController extends Controller {

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategories() {
        $categories = $this->categoryRepository->getAll();

        return View::make('admincp/categories')
                        ->with('categories', $categories);
    }

    public function getAddCategory() {
        return view('admincp/addcategory');
    }

    public function addCategory(Request $request) {
        $this->validate($request, [
            'category_name' => 'required|min:4|max:100',
        ]);

        $category_name = $request->category_name;

        $category = ['category_name' => $category_name];

        $this->categoryRepository->add($category);

        return redirect()->route('admincp.categories')->with('success', 'Category has been created.');
    }

    public function getEditCategory($id) {
        $category = $this->categoryRepository->getById($id);

        if (empty($category)) {
            return redirect()->route('admin.categories');
        }

        return View::make('admincp.editcategory')
                        ->with('category', $category);
    }

    public function updateCategory($id, Request $request) {
        $this->validate($request, [
            'category_name' => 'required|min:4|max:100',
        ]);

        $category = $this->categoryRepository->getById($id);

        if (empty($category)) {
            return redirect()->route('admin.categories');
        }

        $category->category_name = $request->category_name;

        $this->categoryRepository->update($category);

        return redirect()->route('admincp.categories')->with('success', 'Category has been updated.');
    }

    public function deleteCategory($id) {
        $category = $this->categoryRepository->getById($id);

        if (empty($category)) {
            return redirect()->route('admincp.categories');
        }

        $this->categoryRepository->delete($category);

        return redirect('admincp/categories');
    }

}
