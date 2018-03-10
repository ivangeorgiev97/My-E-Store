@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row"  id="firstRowIndex">
        
            @include('shared.leftSidebar')

            <div class="col-md-offset-1 col-md-8" id="rightContent">
                <section>
                    <h4>Latest products:</h4>
                     <hr class="hr">
                      @foreach($products as $product)
                      <div class="divImages col-sm-3">
                          <a href="{{ route('product.show',$product['id']) }}"><img class="homeImages img-thumbnail" src="{{ asset('images') }}/{{$product['product_img']}}"></a>
                          <p><a href="{{ route('product.show',$product['id']) }}">{{$product['product_name']}} | Click to view more details</a></p>
                          <p>Price: <b style="font-family: Arial;">{{$product['product_price']}} BGN</b></p>
                          <p><a href="{{ route('category',$product['category_id']) }}">View more from this category</a></p>
                          
                      </div>
                      @endforeach
             
                </section>
            </div>
    
    </div>
</div>

@endsection