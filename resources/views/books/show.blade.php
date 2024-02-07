@extends('layout')

@section('page-content')
    <h1>Book Details</h1>
    <table class="table table-striped table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $book->id }}</td>
        </tr>
        <tr>
            <th> Title </th>
            <td>{{ $book->title }}</td>
        </tr>
        <tr>
            <th> Author </th>
            <td>{{ $book->author }}</td>
        </tr>
        <tr>
            <th> ISBN </th>
            <td>{{ $book->isbn }}</td>
        </tr>
        <tr>
            <th> Stock </th>
            <td>{{ $book->stock }}</td>
        </tr>
        <tr>
            <th> Price </th>
            <td>{{ $book->price }}</td>
        </tr>
        <tr>
            <th> Created_at </th>
            <td>{{ $book->created_at }}</td>
        </tr>
        <tr>
            <th> Updated_at </th>
            <td>{{ $book->updated_at }}</td>
        </tr>

    </table>

    <br>
    <a class="btn btn-success" href="{{ route('books.index') }}" role="button"> <i class="bi bi-arrow-left-circle"></i> Go
        Back</a>
    <a class="btn btn-danger" href="{{ route('books.edit', $book->id) }}" role="button"> <i class="bi bi-pencil-square"></i>
        Edit</a>
@endsection
