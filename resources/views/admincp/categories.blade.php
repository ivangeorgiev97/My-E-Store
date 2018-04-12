@extends('layouts.app')

@section('content')

@include('shared.message')

<div class="container" id="categoryAdminContainer"> 

    <h2>Categories</h2>
    <a href="{{ route('admincp.addCategory') }}"><button class="btn btn-primary">New category</button></a>
    <hr class="hr">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category) 
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->category_name }}</td>
                <td><a href="{{route('admincp.editCategory',$category->id)}}"><button class="btn btn-success">Edit</button></a></td>
                <td>
                    <form method="post" action="{{route('admincp.deleteCategory',$category->id)}}">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
