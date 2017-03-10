@extends('admin.admin_template')

@section('content')
    <div class='row show'>
        <div class='col-md-12'>
            <div class="box">
                <div class="box-body">
                    @if (is_null($book->id))
                        {!! Form::model($book, ['route' => ['admin.books.store'], 'class' => 'form-horizontal', 'method' => 'post']) !!}
                    @else
                        {!! Form::model($book, ['route' => ['admin.books.update', $book->id],'class' => 'form-horizontal', 'method' => 'put']) !!}
                    @endif

                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        {!! Form::label('state', 'Etat du livre', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-3">
                            {!! Form::date('state', null, ['class' => 'form-control', 'placeholder' => '1']) !!}

                            @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                        <div class="form-group{{ $errors->has('available') ? ' has-error' : '' }}">
                            {!! Form::label('availaible', 'Disponibilité', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-3">
                                {!! Form::date('available', null, ['class' => 'form-control', 'placeholder' => 'Oui']) !!}

                                @if ($errors->has('available'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('available') }}</strong>
                                </span>
                                @endif
                            </div>
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
@endsection