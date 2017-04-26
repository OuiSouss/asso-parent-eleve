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

                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        {!! Form::label('first_name', 'Prénom Adhérent', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-10">
                            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        {!! Form::label('first_name', 'Nom Adhérent', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-10">
                            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}

                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
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