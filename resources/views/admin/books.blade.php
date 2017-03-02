@extends('admin/admin_template')

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

                    </table>
                </div>
            </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@include('admin/modals/adherents_delete')

@section('scripts')
    <script>
        $('#modal_adherents_delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var adherent_id = button.data('id');
            var modal = $(this);
            var url = '{{ route('admin.adherents.destroy', ':adherent_id') }}';
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