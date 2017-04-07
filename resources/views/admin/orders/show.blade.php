@extends('admin.admin_template')

@section('content_header')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>Niveau</th>
                            <th>Section</th>
                            <th>Matière</th>
                            <th>État</th>
                            <th>Prix</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->books as $book)
                            <tr>
                                <td>{{ $book->book_reference->ISBN }}</td>
                                <td>{{ $book->book_reference->level->name }}</td>
                                <td>{{ $book->book_reference->section->name }}</td>
                                <td>{{ $book->book_reference->subject->name }}</td>
                                <td>{{ $book->state }}</td>
                                <td>{{ $book->actualised_price }} €</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection