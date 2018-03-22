@extends('layouts.app')

@section('content')

<div class="container" id="categoryAdminContainer"> 

    <h2>Categories // TODO: ADD SIMPLE CRUD</h2>
    <a href=""><button class="btn btn-primary">New category</button></a>
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
            <td><a href=""><button class="btn btn-success">Edit</button></a></td>
            <td>
                <form method="post" action="">
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
