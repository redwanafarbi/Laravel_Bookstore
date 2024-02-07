@extends('layout')

@section('page-content')
    <h2>Create New Book</h2>

    <form method="POST" action="{{ route('books.store') }}">

        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Title</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Enter title">
            <div>{{ $errors->first('title') }}</div>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Author </label>
            <input type="text" class="form-control" name="author" value="{{old('author')}}" placeholder="Enter name">
            <div>{{ $errors->first('author') }}</div>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">ISBN</label>
            <input type="text" class="form-control" name="isbn" value="{{old('isbn')}}" placeholder="Enter ISBN">
            <div>{{ $errors->first('isbn') }}</div>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Stock</label>
            <input type="text" class="form-control" name="stock" value="{{old('stock')}}" placeholder="Enter Stock">
            <div>{{ $errors->first('stock') }}</div>

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" class="form-control" name="price" value="{{old('price')}}" placeholder="Enter Price">
            <div>{{ $errors->first('price') }}</div>

        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('books.index') }}" class="btn btn-danger" >Back</a>
    </form>
@endsection