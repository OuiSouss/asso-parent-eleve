@extends('admin.admin_template')

@section('content_header')
    <a href="{{ route('admin.books.show',$book_reference) }}" class="btn btn-success">
        <i class="fa fa-bar-chart"></i>
    </a>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box show">
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Etat</th>
                            <th>Disponibilité</th>
                        </tr>
                        <thead>

                        <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->state }}</td>
                                <td>{{ $book->available }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="box show">
                <div class="box-body">
                    <h4>Ces livres ont cette référence</h4>
                    <table class="table table-bordered">
                        <tr>
                            <td>ISBN</td>
                            <td>{{ $book_reference->ISBN }}</td>
                        </tr>
                        <tr>
                            <td>Prix initial</td>
                            <td>{{ $book_reference->initial_price }}</td>
                        </tr>
                        <tr>
                            <td>Section</td>
                            <td>{{ $book_reference->section->name }}</td>
                        </tr>
                        <tr>
                            <td>Niveau </td>
                            <td> {{ $book_reference->level->name }}</td>
                        </tr>
                        <tr>
                            <td>Matière</td>
                            <td>{{ $book_reference->subject->name }}</td>
                        </tr>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection