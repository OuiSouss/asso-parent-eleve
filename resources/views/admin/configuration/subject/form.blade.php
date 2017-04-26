@extends('admin.admin_template')

@section('content')
    <div class='row show'>
        <div class='col-md-12'>
            <div class="box">
                <div class="box-body">
                    @if (is_null($subject->id))
                        {!! Form::model($subject, ['route' => ['admin.configuration.subject.store'], 'class' => 'form-horizontal', 'method' => 'post']) !!}
                    @else
                        {!! Form::model($subject, ['route' => ['admin.configuration.subject.update', $subject->id],'class' => 'form-horizontal', 'method' => 'put']) !!}
                    @endif

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Matière', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-10">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Matière']) !!}

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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