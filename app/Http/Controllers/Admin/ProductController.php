<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Http\Requests\StoreProduct;

class ProductController extends Controller {

    protected $categoryRepository;
    protected $productRepository;

    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function getProducts() {
        $numberOfProducts = 8;

        $products = $this->productRepository->getAllPaginated($numberOfProducts);
        $categories = $this->categoryRepository->getAll();

        return View::make('admincp/products')
                        ->with('products', $products)
                        ->with('categories', $categories);
    }

    public function getAddProduct() {
        $categories = $this->categoryRepository->getAll();

        return View::make('admincp/addproduct')
                        ->with('categories', $categories);
    }

    public function addProduct(StoreProduct $request) {
        $product_name = $request->product_name;
        $product_description = $request->product_description;
        $product_price = $request->product_price;
        $product_img_name = time();
        $product_img = $product_img_name . '.' . $request->product_img->getClientOriginalExtension();
        $request->product_img->move(public_path('images'), $product_img);
        $category_id = $request->category_id;

        $product = ['product_name' => $product_name, 'product_description' => $product_description, 'product_price' => $product_price, 'product_img' => $product_img_name . '.' . $request->product_img->getClientOriginalExtension(), 'category_id' => $category_id];

        $this->productRepository->add($product);

        return redirect('admincp/products');
    }

    public function getEditProduct($id) {
        $product = $this->productRepository->getById($id);

        if (empty($product)) {
            return redirect()->route('admincp.products');
        }

        $categories = $this->categoryRepository->getAll();

        return View::make('admincp/editproduct')
                        ->with('categories', $categories)
                        ->with('product', $product);
    }

    public function updateProduct($id, Request $request) {
        $this->validate($request, [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        $product = $this->productRepository->getById($id);

        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product_img_name = time();
        $product_img = $product_img_name . '.' . $request->product_img->getClientOriginalExtension();
        $request->product_img->move(public_path('images'), $product_img);
        $product->product_img = $product_img_name . '.' . $request->product_img->getClientOriginalExtension();
        $product->category_id = $request->category_id;

        $this->productRepository->update($product);

        return redirect('admincp/products');
    }

    public function deleteProduct($id) {
        $product = $this->productRepository->getById($id);
        
        if (empty($product)) {
            return redirect()->route('admincp.products');
        }
        
        $this->productRepository->delete($product);
        
        return redirect('admincp/products');
    }

}
