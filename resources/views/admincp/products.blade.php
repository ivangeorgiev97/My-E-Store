@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div id="mainAdminContainer">
    <h1> Products </h1>
    <a href="{{route('admincp.index')}}">Back to admin panel</a>
    <hr class="hr">
      
    <a href="{{route('admincp.addProduct')}}"><button class="btn btn-primary" id="addProduct">Add Product</button></a>
    <hr class="hr">
    
    <h3>All products // TODO: ADD EDIT/DELETE</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr><th>Product Name</th><th>Product Description</th><th>Product Price</th><th>Product Image</th><th>Category</th></tr>
            @foreach($products as $product)
            <tr><td>{{ $product['product_name'] }}</td><td>{{ substr($product['product_description'],0,200) }}...</td><td>{{ $product['product_price'] }}</td><td>{{ $product['product_img'] }}</td><td>{{ $product['category_name'] }}</td></tr>
            @endforeach
        </table>
    </div>
      {{ $products->links() }}    </div>
</div>
 

@endsection
