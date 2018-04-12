@extends('layouts.app')

@section('content')

@include('shared.message')

<div class="container">
    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="{{url('/admincp/addCategory')}}">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="control-label col-sm-2" for="category_name">Category Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="category_name" id="category_name">
            </div>
        </div>                                            

        <div class="form-group">
            <div class="row">
                <div style="text-align: center;">
                    <input type="submit" class="btn btn-primary" value="Add Category">
                </div>
            </div>
        </div>
    </form>
</div>

@endsection