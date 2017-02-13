@extends('admin.admin_template')

@section('content_header')
    <a href="{{ route('adherents.create') }}" class="btn btn-success">
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
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Numéro de téléphone</th>
                                <th>Contribution</th>
                                <th>Actif</th>
                                <th>Action</th>
                            </tr>
                        <thead>
                        <tbody>
                        @foreach ($adherents as $adherent)
                            <tr>
                                <td>{{ $adherent->id }}</td>
                                <td>{{ $adherent->first_name }}</td>
                                <td>{{ $adherent->last_name }}</td>
                                <td>{{ $adherent->user->email }}</td>
                                <td>{{ $adherent->phone }}</td>
                                <td>{{ $adherent->contribution }} €</td>
                                <td>
                                    @if ($adherent->active_account)
                                        <span class="badge bg-green">Oui</span>
                                    @else
                                        <span class="badge bg-red">Non</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('adherents.show', $adherent->id) }}" class="btn btn-primary"><i class="fa fa-info-circle"></i></a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal_adherents_delete" data-id="{{ $adherent->id }}"><i class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@include('admin.modals.adherents_delete')

@section('scripts')
    <script>
    $('#modal_adherents_delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var adherent_id = button.data('id');
        var modal = $(this);
        var url = '{{ route('adherents.destroy', ':adherent_id') }}';
        url = url.replace(':adherent_id', adherent_id);
        modal.find('.save').on('click', function (event) {
            $.ajax({
                url: url,
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
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