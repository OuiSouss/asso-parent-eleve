@extends('admin.admin_template')

@section('content')
    <h4>
        Niveaux d'adhésion
        <a href="{{ route('admin.configuration.contribution.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i>
        </a>
    </h4>

    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered" id="contributions-table">
                        <thead>
                        <tr>
                            <th>Intitulé</th>
                            <th>Prix</th>
                            <th>Action</th>
                        </tr>
                        <thead>
                        <tbody>
                            @foreach($contributions as $contribution)
                                <tr>
                                    <td>{{ $contribution->name }}</td>
                                    <td>{{ $contribution->cost }} €</td>
                                    <td>
                                    <a href="{{ route('admin.configuration.contribution.edit', $contribution->id) }}"
                                       class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                       data-target="#modal_contribution_delete" data-id="{{ $contribution->id }}"><i
                                                class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col -->
@endsection

@include('admin.modals.contribution_delete')

@section('scripts')
    <script>
        $('#modal_contribution_delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var contribution_id = button.data('id');
            var modal = $(this);
            var url = '{{ route('admin.configuration.contribution.destroy', ':contribution_id') }}';
            url = url.replace(':contribution_id', contribution_id);
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