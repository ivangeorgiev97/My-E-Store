@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row"  id="firstRowIndex">
        
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
       
            </div>

            <div class="col-md-offset-1 col-md-8" id="rightContent">
                <section>
                    <h4>My items:</h4>
                     <hr class="hr">
                     <div class='table-responsive'>
                     <table class='table table-bordered'>
                         
   	             <thead>
       	                <tr>
           	<th>Product</th>
           	<th>Quantity</th>
           	<th>Price</th>
           	<th>Subtotal</th>
                <th>Actions</th>
                        </tr>
                     </thead>
                     
                     <tbody>
                     @foreach($cartItems as $cartItem)
                        
                     <tr>
                     <td>{{$cartItem->name}}</td>
                     <td>{{$cartItem->qty}}</td>
                     <td>{{$cartItem->price}} BGN</td>
                     <td>{{$cartItem->total}} BGN</td>
                     <td><a href='removeCartItem/{{$cartItem->rowId}}'><button class='btn btn-danger'>Remove</button></a></td>
                     </tr>
                     
                     @endforeach
                     </tbody>
                     
                     </table>
                         
                         <hr class='hr'>
                         
                         
                     <table class='table'>
                        		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Subtotal</td>
   			<td><?php echo Cart::subtotal(); ?></td>
   		</tr>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Tax</td>
   			<td><?php echo Cart::tax(); ?></td>
   		</tr>
   		<tr>
   			<td colspan="2">&nbsp;</td>
                        <td><strong>Total</strong></td>
                        <td><strong><?php echo Cart::total(); ?></strong></td>
   		</tr>
                     </table>
                     
                     
                  
                     </div>
                         
                     <div id="continueCart" class="alignCenter"><a href="order_details"><button class="btn btn-primary">Continue >></button></a></div>
          
             
                </section>
            </div>
    
    </div>
</div>

@endsection