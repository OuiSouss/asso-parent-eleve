<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookReference;
use Illuminate\Http\Request;

class BooksViewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /*
     * @param BookReference $book_reference
     * @param string $availability
     * @param int $state
     * @return \Illuminate\Http\Response
     */
    public function show(BookReference $book_reference, $availability, $state)
    {
        $available = 0;
        if ( strcmp($availability, 'Available') == 0)
            $available = 1;
        $books = Book::where('book_reference_id', $book_reference->id)->get();
        $books = $books->where('available', $available)->where('state', $state);
        //return response($books);
        return view('admin.books_views.show', ['page_title' => 'Information complémentaire à l\'histogramme', 'book_reference' => $book_reference, 'books' => $books]);

    }
}
