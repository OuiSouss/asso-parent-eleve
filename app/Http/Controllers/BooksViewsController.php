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
        $books = Book::where('book_reference_id', $book_reference->id)->get();
        $books = $books->where('available', $availability)->where('state', $state);
        //return response($books);
        return view('admin.books_views.show', ['page_title' => 'Information complémentaire à l\'histogramme', 'book_reference' => $book_reference, 'books' => $books, 'availability' => $availability, 'state' => $state]);
    }

    public function destroy(BookReference $book_reference, $availability, $state )
    {
        if ( $availability == 0)
            return response()->json([
                'status' => 'impossible',
            ]);

        $books = Book::where('book_reference_id', $book_reference->id)->get();
        $books = $books->where('available', $availability)->where('state', $state);

        foreach ($books as $book)
        {
            $book->delete();
        }
        return response()->json([
        'status' => 'success',
        ]);
    }
}
