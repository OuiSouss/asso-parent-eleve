@extends('admin.admin_template')

@section('content')
    <div class='row show'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box">
                <div class="box-body">
                    @if (is_null($adherent->id))
                        {!! Form::model($adherent, ['route' => ['adherents.store'], 'method' => 'post']) !!}
                    @else
                        {!! Form::model($adherent, ['route' => ['adherents.update', $adherent->id], 'method' => 'put']) !!}
                    @endif

                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        {!! Form::label('first_name', 'Prénom', ['class' => 'col-md-4 control-label']) !!}

                        <div class="col-md-8">
                            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        {!! Form::label('first_name', 'Nom', ['class' => 'col-md-4 control-label']) !!}

                        <div class="col-md-8">
                            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}

                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <?php
                    /*
            $table->text('address');
            $table->text('postal_code');
            $table->string('phone');
            $table->date('begin_adhesion');
            $table->date('end_adhesion');
            $table->integer('contribution');
            $table->boolean('active_account');
            $table->integer('user_id')->unsigned();
                    */
                    ?>

                    <div class="form-group">
                        {!! Form::submit() !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection