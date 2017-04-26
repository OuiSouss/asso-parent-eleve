@extends('admin.admin_template')

@section('content')
    <div class='row show'>
        <div class='col-md-12'>
            <div class="box">
                <div class="box-body">
                    @if (is_null($section->id))
                        {!! Form::model($section, ['route' => ['admin.configuration.section.store'], 'class' => 'form-horizontal', 'method' => 'post']) !!}
                    @else
                        {!! Form::model($section, ['route' => ['admin.configuration.section.update', $section->id],'class' => 'form-horizontal', 'method' => 'put']) !!}
                    @endif

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Section', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-10">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Section']) !!}

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