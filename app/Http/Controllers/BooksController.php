<?php

namespace App\Http\Controllers;


use App\Book;
use App\BookReference;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_references = BookReference::all();
        return view('admin.books.index', ['page_title' => 'Liste des livres', 'book_references' => $book_references]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book_reference = new BookReference();
        return view('admin.books.form', ['page_title' => 'Nouveau livre', 'book_reference' => $book_reference] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book_reference = BookReference::create($request->all());
        return redirect()->route('books.show', $book_reference);
    }

    /**
     * Display the specified resource.
     *
     * @param  BookReference $book
     * @return \Illuminate\Http\Response
     */
    public function show(BookReference $book)
    {
        $a_book = Book::where('book_reference_id', $book->id)->count();
        //return response($book);
        return view('admin.books.show', ['page_title' => 'Informations sur le livre', 'book_reference' => $book, 'a_book' => $a_book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book_reference = BookReference::find($id);
        return view('admin.books.form', ['page_title' => 'Nouveau livre', 'book_reference' => $book_reference]);
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
        $book_reference = BookReference::find($id);
        $book_reference->update($request->all());
        return redirect()->route('admin.book.show', $book_reference);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book_reference = BookReference::find($id);

        if (!is_null($book_reference))
        {
            $book_reference->delete();

            return response()->json([
                'status' => 'success',
            ]);
        }
    }
}
