<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookReference;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        return view('admin.books.index', ['page_title' => 'Liste des livres', 'books' => $book]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book();
        $book_references = BookReference::all();
        return view('admin.books.form', ['page_title' => 'Nouvel livre', 'book' => $book, 'book_references' => $book_references] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return redirect()->route('books.show', $book);
    }

    /**
     * Display the specified resource.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.books.show', ['page_title' => 'Informations sur le livre', 'book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $bookReference = BookReference::all();
        return view('admin.books.form', ['page_title' => 'Nouveau livre', 'book' => $book, 'bookReference' => $bookReference ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->update($request->all());
        return redirect()->route('admin.book.show', $book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!is_null($book))
        {
            $book->delete();

            return response()->json([
                'status' => 'success',
            ]);
        }
    }
}
