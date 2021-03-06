@extends('admin/admin_template')

@section('content_header')
    <a href="{{ route('admin.books.create') }}" class="btn btn-success">
        <i class="fa fa-plus"></i>
    </a>
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Section</th>
                            <th>Niveau</th>
                            <th>Matière</th>
                            <th>Prix initial</th>
                            <th>ISBN</th>
                            <th>Action</th>
                        </tr>
                        <thead>

                        <tbody>
                        @foreach ($book_references as $book_reference)
                            <tr>
                                <td>{{ $book_reference->id }}</td>
                                <td>
                                    @if(is_null($book_reference->section))
                                        N/A
                                    @else
                                        {{ $book_reference->section->name }}
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($book_reference->level))
                                        N/A
                                    @else
                                        {{ $book_reference->level->name }}
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($book_reference->subject))
                                        N/A
                                    @else
                                        {{ $book_reference->subject->name }}
                                    @endif
                                </td>
                                <td>{{ $book_reference->initial_price }}</td>
                                <td>{{ $book_reference->ISBN }}</td>
                                <td>
                                    <a href="{{ route('admin.books.show', $book_reference->id) }}"
                                       class="btn btn-primary"><i class="fa fa-info-circle"></i></a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                       data-target="#modal_books_delete" data-id="{{ $book_reference->id }}"><i
                                                class="fa fa-remove"></i></a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@include('admin/modals/books_delete')

@section('scripts')
    <script>
        $('#modal_books_delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var book_reference_id = button.data('id');
            var modal = $(this);
            var url = '{{ route('admin.books.destroy', ':book_reference_id') }}';
            url = url.replace(':book_reference_id', book_reference_id);
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