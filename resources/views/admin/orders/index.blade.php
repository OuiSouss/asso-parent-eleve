@extends('admin.admin_template')

@section('content_header')
    <a href="{{ route('admin.orders.create') }}" class="btn btn-success">
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
                            <th>Payée</th>
                            <th>Adhérent</th>
                            <th>Passée le</th>
                            <th>Action</th>
                        </tr>
                        <thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    @if ($order->active)
                                        <span class="badge bg-green">Oui</span>
                                    @else
                                        <span class="badge bg-red">Non</span>
                                    @endif
                                </td>
                                <td>
                                    @foreach($adherent as $adh)
                                        @if($adh->id == $order->adherent_id)
                                            {{$adh->first_name}}  {{ $adh->last_name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $order->created_at->format('d/m/Y') }} à {{ $order->created_at->format('H') }}h{{ $order->created_at->format('m') }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                       class="btn btn-primary"><i class="fa fa-info-circle"></i></a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                       data-target="#modal_orders_delete" data-id="{{ $order->id }}"><i
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

@include('admin.modals.orders_delete')

@section('scripts')
    <script>
        $('#modal_orders_delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var adherent_id = button.data('id');
            var modal = $(this);
            var url = '{{ route('admin.orders.destroy', ':orders_id') }}';
            url = url.replace(':orders_id', adherent_id);
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
