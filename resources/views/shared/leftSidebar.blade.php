<div class="col-md-3" id="leftMenu">
                
             <form method="get" action="{{url('/search/searchresults')}}">
                 <label for="search"><h4>Search (autocomplete): </h4></label>
                   <div class="input-group" id="input-group-search">
                    <input type="text" class="form-control" name="term" id="q" data-action="{{ route('search-autocomplete') }}" placeholder="Search with autocomplete function">
                    <div class="input-group-btn">
                    <input type="submit" class="btn btn-default" type="button" id="searchButton" value="Search">
                    </div>
                   </div>
              </form>
                
            <div id="leftNav">
                    <nav>
                        <button name="btnProducts" id="btnProducts" class="btn btn-default">All Products</button>
                        @foreach($categories as $category)
                        <p class="categoriesMenu"><a href="categories/{{$category['id']}}">{{$category['category_name']}}</a></p>
                        @endforeach
                    </nav>
            </div>
                
</div>