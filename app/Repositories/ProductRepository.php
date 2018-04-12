<?php

namespace App\Repositories;

use App\Product;

class ProductRepository extends BaseRepository {
    protected $model;
    
    public function __construct(Product $model) {
        $this->model = $model;
    }
    
    public function getAllPaginated($numberOfProducts) {
        return $this->model::join('categories','products.category_id', '=', 'categories.id')->select('categories.category_name', 'products.*')->orderBy('id','desc')->paginate($numberOfProducts);
    }
    
    public function getLatestProducts($numberOfProducts) {
        return $this->model::orderBy('id','desc')->limit($numberOfProducts)->get();
    }
    
    public function getProductsOfOrders(){
        return $this->model::join('order_products','products.id','=','order_products.product_id')
                ->select('products.id','products.product_name','order_products.order_id', 'order_products.order_product_quantity')->get();
    }
    
    public function getByCategoryPaginated($categoryId, $numberOfProducts) {
        return $this->model::where('category_id',$categoryId)->orderBy('id','desc')->paginate($numberOfProducts);
    }
    
    public function getSuggestedProductsByName($name) {
        return $this->model::where('product_name', 'LIKE', '%' . $name . '%')->get(['id', 'product_name as value']);
    }
    
    public function getByNamePaginated($name, $numberOfProducts) {
        return $this->model::where('product_name', 'LIKE', '%' . $name . '%')->paginate($numberOfProducts);
    }
    
}
