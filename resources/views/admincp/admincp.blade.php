@extends('layouts.app')

@section('content')

<div class="container">
    <div id="mainAdminContainer">
        <h1> AdminCP </h1>
        <hr class="hr">
        <a href="{{route('admincp.orders')}}"><h4>Manage Orders</h4></a>
        <a href="{{route('admincp.products')}}"><h4>Manage Products</h4></a>
        <a href="{{route('admincp.categories')}}"><h4>Manage Categories</h4></a> 
    </div>
</div>

@endsection