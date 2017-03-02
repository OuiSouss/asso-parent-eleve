@extends('admin.admin_template')

@section('content_header')
    <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-success">
        <i class="fa fa-pencil-square-o"></i>
    </a>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box show">
                <div class="box-body">
                    <table>
                        <tr>
                            <td>Section</td>
                            <td>{{ $book->book_reference->section->name }}</td>
                        </tr>
                        <tr>
                            <td>Niveau</td>
                            <td>{{ $book->book_reference->level->name }}</td>
                        </tr>
                        <tr>
                            <td>Matière</td>
                            <td>{{ $book->book_reference->subject->name }}</td>
                        </tr>
                        <tr>
                            <td>Prix Initial</td>
                            <td>{{ $book->book_reference->initial_price }}</td>
                        </tr>
                        <tr>
                            <td>ISBN</td>
                            <td>{{ $book->book_reference->ISBN }}</td>
                        </tr>
                        <tr>
                            <td>Etat</td>
                            <td>{{ $book->state }}</td>
                        </tr>
                        <tr>
                            <td>Disponibilité</td>
                            <td>{{ $book->available}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection