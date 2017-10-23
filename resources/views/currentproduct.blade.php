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
                    @foreach($product as $prod)
                    <h4>{{ $prod['product_name'] }}</h4>
                     <hr class="hr">
                      
                     <div class="row">
                        <div class="col-md-6">
                             <img  class="img-responsive" src="{{ asset('images') }}/{{$prod['product_img']}}">
                        </div>
                        <div class="col-md-6">
                             {{ $prod['product_description'] }} 
                             <div id="buyNowForm">
                              Quantity: 
                             <form method="post" action="{{url('addToCart')}}">
                                 {{ csrf_field() }}
                             <select name="quantityCurrentProduct" id="quantityCurrentProduct" onchange="calculatePrice()">
                                 @foreach($quantity as $q)
                                 <option value="{{$q}}">{{$q}}</option>
                                 @endforeach
                             </select>
                                 <br>
                                 <input id="priceCurrProduct" name="priceCurrProduct" type="hidden" value="{{ $prod['product_price'] }}">
                                 <input type="hidden" name="product_id" value="{{$prod['id']}}">
                                 <p>Price: <span id="priceCurrentProduct" style="font-family: Arial"><strong>{{ $prod['product_price'] }}</strong></span> BGN</p>
                                 <p> <input id="submitBuyNow" class="btn btn-primary" type="submit" name="submitBuyNow" value="Add to cart"> </p>
                             </form>
                             </div>
                        </div>
                     </div>     
                      @endforeach
                </section>
            </div>
    
    </div>
</div>

@endsection
