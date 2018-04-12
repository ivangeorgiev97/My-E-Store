@extends('layouts.app')

@section('content')

@include('shared.message')

<div class="container">

    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="{{url('/admincp/updateProduct')}}/{{ $product->id }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="control-label col-sm-2" for="product_name">Product Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="product_name" id="product_name" value="{{ $product->product_name }}">
            </div>
        </div>                                            
        <div class="form-group">
            <label class="control-label col-sm-2" for="procuct_description">Product Description:</label>
            <div class="col-sm-10">
                <textarea rows="8" class="form-control" name="product_description" id="product_description">{{ $product->product_description }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="product_price">Product Price:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="product_price" id="product_price" value="{{ $product->product_price }}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="product_img">Product Image:</label>
            <div class="col-sm-10">
                <input type="file" name="product_img" value="{{ $product->product_img }}"> 
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="category_id">Category:</label>
            <div class="col-sm-10">
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>  
        <div class="form-group">
            <div class="row">
                <div style="text-align: center;">
                    <input type="submit" class="btn btn-primary" value="Edit Product">
                </div>
            </div>
        </div>


    </form>
</div>
@endsection