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
                @if (!empty($success))
                <h4>{{ $success }}</h4>
                @else
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{url('/makeOrder')}}">
                    {{ csrf_field() }}
                    <label for="receiver_name">Your name:</label>
                    <input class="form form-control" type="text" name="receiver_name">
                    <label for="phone">Phone number:</label>
                    <input class="form form-control" type="text" name="phone">
                    <label for="address">Address: </label>
                    <input class="form form-control" type="text" name="address">
                    <label for="pymethod">Payment method:</label>
                    <select name="pymethod">
                        <option value="cash">Cash</option>
                    </select>
                    <br>
                    <input type="submit" class="btn btn-primary" name="submitOrderForm" value="Submit">
                </form>

                @endif
            </section>
        </div>

    </div>
</div>

@endsection