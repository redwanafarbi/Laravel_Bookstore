<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function welcome()
    {
        return view('welcome');
    }

    public function index(Request $request)
    {

        //fetch books data from database

        if ($request->has('search')) {

            $books = Book::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('author', 'like', '%' . $request->search . '%')
                ->paginate(10);
        } else {
            $books = Book::paginate(10);
        }

        //pass books data to view
        return view('books.index')
            ->with('name', "Rahman's")
            ->with('books', $books);
    }

    public function show($bookId)
    {
        $book = Book::find($bookId);

        return view('books.show')
            ->with('book', $book);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {

        $rules = [
            'title'  => 'required|max:255',
            'author' => 'required|max:255',
            'isbn'   => 'required|numeric|digits:13',
            'price'  => 'required|numeric',
            'stock'  => 'required|numeric|integer|min:0'
        ];

        $this->validate($request, $rules);

        $book = new Book;

        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->stock = $request->stock;
        $book->price = $request->price;
        $book->save();

        return redirect()->route('books.show', $book->id);
    }

    public function edit($bookId)
    {

        $book = Book::find($bookId);

        return view('books.edit')->with('book', $book);
    }

    public function update(Request $request)
    {

        $rules = [
            'title'  => 'required|max:255',
            'author' => 'required|max:255',
            'isbn'   => 'required|numeric|digits:13',
            'price'  => 'required|numeric',
            'stock'  => 'required|numeric|integer|min:0'
        ];

        $this->validate($request, $rules);

        $book = Book::find($request->id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->stock = $request->stock;
        $book->price = $request->price;
        $book->save();

        echo '<pre>';
        print_r($request->all());
        echo '</pre>';

        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Request $request)
    {
        $book = Book::find($request->id);
        $book->delete();

        return redirect()->route('books.index');
    }
}
