@extends('admin.admin_template')

@section('content_header')
    <a href="{{ route('admin.books.show',$book_reference) }}" class="btn btn-success">
        <i class="fa fa-bar-chart"></i>
    </a>
    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal_books_delete" data-id="{{ $book_reference->id }}" data-available="{{ $availability }}" data-state="{{ $state }}">
        <i class="fa fa-remove"></i>
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
                            <th>URL</th>
                        </tr>
                        <thead>

                        <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->state }}</td>
                                <td>{{ $book->available }}</td>
                                <td> {{$availability}}</td>
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
@endsection

@include('admin/modals/books_delete')

@section('scripts')
    <script>
        $('#modal_books_delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var book_reference_id = button.data('id');
            var available = button.data('availability');
            var state = button.data('state');
            var modal = $(this);
            var url = '{{ route('admin.books_views.destroy', [':book_reference_id', ':availability', ':state']) }}';
            url = url.replace(':book_reference_id', book_reference_id);
            url = url.replace(':availability', 1);
            url = url.replace(':state', state);
            modal.find('.save').on('click', function (event) {
                $.ajax({
                    url: url,
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
                    type: 'DELETE',
                    dataType: 'JSON',
                    success: function (data, status) {
                        modal.modal('hide');
                        $(button.parent('td').parent('tr')).remove();
                    }
                });
            })
        });
    </script>
@endsection