@extends('layouts.app')

@section('content')

<div class="container-fluid" id="mainAdminContainer">
   
    <h1> Orders </h1>
    <a href="/admincp">Back to admin panel</a>
    <hr class="hr">
          
            @foreach($orders as $order)
            <h4>Order:</h4>
     <div class="table-responsive">
        <table class="table table-bordered">
            <tr><th>ID</th><th>User's Email</th><th>Price</th><th>Address</th><th>Phone</th><th>Payment Method</th><th>Created At</th><th>Status</th></tr>
            <tr><td>{{$order['id']}}</td><td>{{$order['email']}}</td><td><strong>{{$order['price']}}</strong></td><td>{{$order['address']}}</td><td>{{$order['phone']}}</td>
                <td>{{$order['pymethod']}}</td><td>{{$order['created_at']}}</td>
                <td>
                    @if ($order['status']===0) 
                    <form method="post" action="{{url('/admincp/orderSent')}}"> 
                        {{ csrf_field() }}
                        <input type="hidden" name="order_id" id="order_id" value="{{$order['id']}}">
                        <input type="hidden" name="current_page" value="{{ $orders->currentPage() }}">
                        <input data-id="{{$order['id']}}" type="submit" class="btn btn-danger btn{{$order['id']}}" id="btnNotSent" value="Not Sent">
                    </form> 
                    @else 
                    <form method="post" action="{{url('/admincp/orderNotSent')}}"> 
                        {{ csrf_field() }} 
                        <input type="hidden" name="order_id" id="order_id" value="{{$order['id']}}">
                        <input type="hidden" name="current_page" value="{{ $orders->currentPage() }}">
                        <input data-id="{{$order['id']}}" type="submit" class="btn btn-success btn{{$order['id']}}" id="btnSent" value="Sent">
                    </form> 
                    @endif </td>
            </tr>
             </table>
       </div>
            <h4>Order #{{$order['id']}} Items:</h4>
            <div class='table-bordered'>
            <table class='table table-responsive'>
                <tr><th>Item</th><th>Quantity</th></tr>
           
            @foreach($products as $product)
            @if($product['order_id'] === $order['id'])
            <tr><td>{{$product['product_name']}}</td><td>{{$product['order_product_quantity']}}</td></tr>
            @endif
            @endforeach
            </table>
            </div>
            <hr class='hr'>
            @php $counter2++; @endphp
            @endforeach
            <br>
    
    <p> {{$orders->links()}} </p>
          
    
</div>

 

@endsection