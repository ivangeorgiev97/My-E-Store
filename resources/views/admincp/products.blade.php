@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div id="mainAdminContainer">
        <h1> Products </h1>
        <a href="{{route('admincp.index')}}">Back to admin panel</a>
        <hr class="hr">
        
        @include('shared.message')

        <a href="{{route('admincp.addProduct')}}"><button class="btn btn-primary" id="addProduct">Add Product</button></a>
        <hr class="hr">

        <h3>All products</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr><th>Product Name</th><th>Product Description</th><th>Product Price</th><th>Product Image</th><th>Category</th><th>Edit</th><th>Delete</th></tr>
                @foreach($products as $product)
                <tr><td>{{ $product['product_name'] }}</td><td>{{ substr($product['product_description'],0,200) }}...</td><td>{{ $product['product_price'] }}</td><td>{{ $product['product_img'] }}</td><td>{{ $product['category_name'] }}</td>
                    <td><a href="{{ route('admincp.editProduct', $product->id) }}"><button class="btn btn-success">Edit</button></a></td>
                    <td><form method="post" action="{{ route('admincp.deleteProduct', $product->id) }}">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <button class="btn btn-danger" type="submit" onclick="return confirm(\'Are you sure you want to delete this product?\');">Delete</button>
                        </form></td></tr>
                @endforeach
            </table>
        </div>
        {{ $products->links() }}    </div>
</div>


@endsection
