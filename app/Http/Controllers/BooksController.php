<?php

namespace App\Http\Controllers;


use App\Book;
use App\BookReference;
use App\Http\Requests\StoreBookReference;
use App\Level;
use App\OrderBook;
use App\Section;
use App\Subject;

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
        $levels = Level::all();
        $sections = Section::all();
        $subjects = Subject::all();
        //return response($book_reference);
        return view('admin.books.form', ['page_title' => 'Nouveau livre', 'book_reference' => $book_reference, 'levels' => $levels, 'sections' => $sections, 'subjects' => $subjects] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookReference $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookReference $request)
    {

        $n_section = $request->get('section_name');
        $section = Section::create(['name' =>$n_section]);

        $n_level = $request->get('level_name');
        $level = Level::create(['name' => $n_level]);

        $n_subject = $request->get('subject_name');
        $subject = Subject::create(['name' => $n_subject]);

        $request->replace($request->except('section_name', 'level_name', 'subject_name'));
        $request->merge(['section_id' => $section->id, 'level_id' => $level->id, 'subject_id' => $subject->id]);

        $book_reference = BookReference::create($request->all());
        return redirect()->route('admin.books.show', $book_reference);
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
        $books = Book::where('book_reference_id', $book->id)->get();
        //return response($books);
        return view('admin.books.show', ['page_title' => 'Informations sur le livre', 'book_reference' => $book, 'a_book' => $a_book, 'books' => $books]);
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
        //return response($book_reference);
        return view('admin.books.form', ['page_title' => 'Nouveau livre', 'book_reference' => $book_reference]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookReference $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBookReference $request, $id)
    {
        $book_reference = BookReference::find($id);

        $section = Section::find($book_reference->section_id);
        $level = Level::find($book_reference->level_id);
        $subject = Subject::find($book_reference->subject_id);

        $book_reference->update($request->except('ISBN','section','level', 'subject'));
        $isbn = ['ISBN' => $request->get('ISBN')];
        $n_section = ['name' => $request->get('section_name')];
        $n_level = ['name' => $request->get('level_name')];
        $n_subject = ['name' => $request->get('subject_name')];

        $book_reference->update($isbn);
        $section->update($n_section);
        $level->update($n_level);
        $subject->update($n_subject);

        return redirect()->route('admin.books.show', $book_reference);
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
            $books = Book::where('book_reference_id', $book_reference->id )->get();
            if ($books->count() != 0)
            {
                $books_orders = [];
                foreach ($books as $book)
                {
                    $books_orders = OrderBook::where('book_id', $book->id)->get();
                }
                if ($books_orders->count() != 0)
                {
                    foreach ($books as $book)
                    {
                        if (! in_array($book, $books_orders))
                        {
                            $book->delete();

                        }
                    }
                    return response()->json([
                        'status' => 'not totally complete',
                    ]);
                }
                else
                {
                    foreach ($books as $book)
                    {
                        $book->delete();
                    }
                }
            }

            //$book_reference->section->delete();
            //$book_reference->level->delete();
            //$book_reference->subject->delete();


            $book_reference->delete();

            return response()->json([
                'status' => 'success',
            ]);
        }
    }
}
