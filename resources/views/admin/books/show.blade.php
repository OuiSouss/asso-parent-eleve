@extends('admin.admin_template')

@section('content_header')
    <a href="{{ route('admin.books.edit',$book_reference) }}" class="btn btn-success">
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
                            {{ dump($book_reference) }}
                            <td>ISBN</td>
                            <td>{{ $book_reference->ISBN }}</td>
                        </tr>
                        <tr>
                            <td>Prix initial</td>
                            <td>{{ $book_reference->initial_price }}</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection