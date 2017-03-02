@extends('admin.admin_template')

@section('content')
    <div class='row show'>
        <div class='col-md-12'>
            <div class="box">
                <div class="box-body">
                    @if (is_null($adherent->id))
                        {!! Form::model($adherent, ['route' => ['admin.adherents.store'], 'class' => 'form-horizontal', 'method' => 'post']) !!}
                    @else
                        {!! Form::model($adherent, ['route' => ['admin.adherents.update', $adherent->id],'class' => 'form-horizontal', 'method' => 'put']) !!}
                    @endif

                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        {!! Form::label('first_name', 'Prénom', ['class' => 'col-md-2 control-label']) !!}

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
                        {!! Form::label('first_name', 'Nom', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-10">
                            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}

                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        {!! Form::label('address', 'Adresse', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-10">
                            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Adresse']) !!}

                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        {!! Form::label('city', 'Ville', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-10">
                            {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Ville']) !!}

                            @if ($errors->has('city'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                        {!! Form::label('postal_code', 'Code postal', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-3">
                            {!! Form::text('postal_code', null, ['class' => 'form-control', 'placeholder' => 'Code postal']) !!}

                            @if ($errors->has('postal_code'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        {!! Form::label('phone', 'Numéro de téléphone', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-3">
                            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Numéro de téléphone']) !!}

                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('begin_adhesion') ? ' has-error' : '' }}">
                        {!! Form::label('begin_adhesion', 'Date de début d\'adhésion', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-3">
                            {!! Form::date('begin_adhesion', null, ['class' => 'form-control', 'placeholder' => 'Date de début d\'adhésion']) !!}

                            @if ($errors->has('begin_adhesion'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('begin_adhesion') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('end_adhesion') ? ' has-error' : '' }}">
                        {!! Form::label('end_adhesion', 'Date de fin d\'adhésion', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-3">
                            {!! Form::date('end_adhesion', null, ['class' => 'form-control', 'placeholder' => 'Date de fin d\'adhésion']) !!}

                            @if ($errors->has('end_adhesion'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('end_adhesion') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('contribution_id') ? ' has-error' : '' }}">
                        {!! Form::label('contribution_id', 'Contribution', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-10">
                            {!! Form::select('contribution_id', $contributions, null, ['class' => 'form-control', 'select' => $adherent->contribution_id]) !!}

                            @if ($errors->has('contribution_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('contribution_id') }}</strong>
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