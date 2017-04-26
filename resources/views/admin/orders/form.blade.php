@extends('admin.admin_template')

@section('content')
    <div class='row show'>
        <div class='col-md-12'>
            <div class="box">
                <div class="box-body">
                    @if (is_null($order->id))
                        {!! Form::model($order, ['route' => ['admin.orders.store'], 'class' => 'form-horizontal', 'method' => 'post']) !!}
                    @else
                        {!! Form::model($order, ['route' => ['admin.orders.update', $order->id],'class' => 'form-horizontal', 'method' => 'put']) !!}
                    @endif

                    <div class="form-group{{ $errors->has('adherent_id') ? ' has-error' : '' }}">
                        {!! Form::label('adherent_id', 'Adherent', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-10">
                            {!! Form::select('adherent_id', $adherents, null, ['class' => 'form-control', 'select' => $order->adherent_id]) !!}

                            @if ($errors->has('adherent_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('adherent_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('begin_adhesion') ? ' has-error' : '' }}">
                        {!! Form::label('begin_adhesion', 'Date de commande ', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-3">
                            {!! Form::date('created_at', null, ['class' => 'form-control', 'placeholder' => 'Date de commande']) !!}

                            @if ($errors->has('created_at'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('created_at') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="form-group">
                        {!! Form::submit('Envoyer', ['class' => 'btn btn-info pull-right']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
@endsection