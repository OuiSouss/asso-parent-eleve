<?php

namespace App\Http\Controllers;


use App\Book;
use App\BookReference;
use App\Http\Requests\StoreBookReference;
use App\Level;
use App\Section;
use App\Subject;
use function MongoDB\BSON\toJSON;

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
        $section_id = $request->get('section_id') + 1 ;
        $level_id = $request->get('level_id') + 1;
        $subject_id = $request->get('subject_id') + 1;
        $nb_books = $request->get('number_books');

        $request->replace($request->except('section_id', 'level_id', 'subject_id', 'number_books'));
        $request->merge(['section_id' => $section_id , 'level_id' => $level_id , 'subject_id' => $subject_id]);
        $book_reference = BookReference::create($request->all());

        if ($nb_books > 0)
        {
            for ($i = 1; $i <= $nb_books; ++$i)
            {
                $book = Book::create(['state' => 1, 'available' => true, 'book_reference_id' => $book_reference->id]);
                $book->save();
            }
        }

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
        $bks = Book::where('book_reference_id', $book->id)->get();
        $un_a = $bks->where('available', 1)->where('state', 1)->count();
        $deux_a = $bks->where('available', 1)->where('state', 2)->count();
        $trois_a = $bks->where('available', 1)->where('state', 3)->count();
        $quatre_a = $bks->where('available', 1)->where('state', 4)->count();
        $cinq_a = $bks->where('available', 1)->where('state', 5)->count();
        $available = array( $cinq_a, $quatre_a, $trois_a, $deux_a, $un_a);
        $un_n = $bks->where('available', 0)->where('state', 1)->count();
        $deux_n = $bks->where('available', 0)->where('state', 2)->count();
        $trois_n = $bks->where('available', 0)->where('state', 3)->count();
        $quatre_n = $bks->where('available', 0)->where('state', 4)->count();
        $cinq_n = $bks->where('available', 0)->where('state', 5)->count();
        $not_available = array($cinq_n, $quatre_n, $trois_n, $deux_n, $un_n);
        //return response($not_available);
        return view('admin.books.show', ['page_title' => 'Informations sur le livre', 'book_reference' => $book, 'a_book' => $a_book, 'books' => $books, 'available' => json_encode($available), 'not_available' => json_encode($not_available)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book_reference = BookReference::findOrFail($id);
        $sections = Section::all();
        $levels = Level::all();
        $subjects = Subject::all();
        //return response($book_reference);
        return view('admin.books.form', ['page_title' => 'Nouveau livre', 'book_reference' => $book_reference, 'sections' => $sections, 'levels' => $levels, 'subjects' => $subjects]);
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
        $book_reference = BookReference::findOrFail($id);

        $section_id = $request->get('section_id') + 1 ;
        $level_id = $request->get('level_id') + 1;
        $subject_id = $request->get('subject_id') + 1;

        $request->replace($request->except('section_id', 'level_id', 'subject_id'));
        $request->merge(['section_id' => $section_id , 'level_id' => $level_id , 'subject_id' => $subject_id]);

        $book_reference->update($request->all());
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

        $book_reference = BookReference::findOrFail($id);

        $books = Book::where('book_reference_id', $book_reference->id )->get();
        $nb_books = 0;
        if ($books->count() != 0)
        {
            foreach ($books as $book)
            {
                if ($book->available == 1)
                {
                    $book->delete();
                    $nb_books += 1;

                }

            }
        }
        if ($nb_books != $books->count())
        {
            return response()->json([
                'status' => 'warning',
            ]);

        }
        $book_reference->delete();

        return response()->json([
            'status' => 'success',
        ]);
    }
}
