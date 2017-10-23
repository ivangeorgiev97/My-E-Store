@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row"  id="firstRowIndex">
        
            <div class="col-md-3" id="leftMenu">
                
             <form method="get" action="">
                 <label for="search"><h4>Search (autocomplete): </h4></label>
                   <div class="input-group" id="input-group-search">
                    <input type="text" class="form-control" name="term" id="q" data-action="{{ route('search-autocomplete') }}" placeholder="Search with autocomplete function">
                    <div class="input-group-btn">
                    <button class="btn btn-default" type="button" id="searchButton">Search</button>
                    </div>
                   </div>
              </form>
                
            <div id="leftNav">
                    <nav>
                        <button name="btnProducts" id="btnProducts" class="btn btn-default">All Products</button>
                        @foreach($categories as $category)
                        <p class="categoriesMenu"><a href="/categories/{{$category['id']}}">{{$category['category_name']}}</a></p>
                        @endforeach
                    </nav>
            </div>
                
            </div>

            <div class="col-md-offset-1 col-md-8" id="rightContent">
                <section>
                    <h4>Products:</h4>
                     <hr class="hr">
                      @foreach($products as $product)
                      <div class="divImages col-sm-3">
                          <a href="/product/{{$product['id']}}"><img class="homeImages img-thumbnail" src="{{ asset('images') }}/{{$product['product_img']}}"></a>
                          <p><a href="/product/{{$product['id']}}">{{$product['product_name']}} | Click to view more details</a></p>
                          <p>Price: <b style="font-family: Arial;">{{$product['product_price']}} BGN</b></p>
    
                          
                      </div>
                      @endforeach
                      <br>
                      <div class="container-fluid"><div class="row"><div id="productsPagination" class="col-md-12">{{ $products->links() }}</div></div></div>
                </section>
            </div>
    
    </div>
</div>

@endsection