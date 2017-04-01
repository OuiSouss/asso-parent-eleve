@extends('admin.admin_template')

@section('content')
    <div class='row show'>
        <div class='col-md-12'>
            <div class="box">
                <div class="box-body">
                    @if (is_null($book_reference->id))
                        {!! Form::model($book_reference, ['route' => ['admin.books.store'], 'class' => 'form-horizontal', 'method' => 'post']) !!}
                    @else
                        {!! Form::model($book_reference, ['route' => ['admin.books.update', $book_reference->id],'class' => 'form-horizontal', 'method' => 'put']) !!}
                    @endif

                    <div class="form-group{{ $errors->has('ISBN') ? ' has-error' : '' }}">
                        {!! Form::label('ISBN', 'ISBN', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-3">
                            {!! Form::text('ISBN', !is_null($book_reference->id) ? $book_reference->ISBN : null, ['class' => 'form-control', 'placeholder' => $book_reference->ISBN]) !!}

                            @if ($errors->has('ISBN'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ISBN') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                        <div class="form-group{{ $errors->has('initial_price') ? ' has-error' : '' }}">
                            {!! Form::label('initial_price', 'Prix initial', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-3">
                                {!! Form::number('initial_price', $book_reference->initial_price, ['class' => 'form-control', 'placeholder' => $book_reference->initial_price]) !!}

                                @if ($errors->has('initial_price'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('initial_price') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('section_name') ? ' has-error' : '' }}">
                            {!! Form::label('section_name', 'Section', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-3">
                                {!! Form::text('section_name', $book_reference->section->name, ['class' => 'form-control', 'placeholder' => $book_reference->section->name]) !!}

                                @if ($errors->has('section_name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('section_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('level_name') ? ' has-error' : '' }}">
                            {!! Form::label('level_name', 'Niveau', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-3">
                                {!! Form::text('level_name', $book_reference->level->name, ['class' => 'form-control', 'placeholder' => $book_reference->level->name]) !!}

                                @if ($errors->has('level_name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('level_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('subject_name') ? ' has-error' : '' }}">
                            {!! Form::label('subject_name', 'Matière', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-3">
                                {!! Form::text('subject_name', $book_reference->subject->name, ['class' => 'form-control', 'placeholder' => $book_reference->subject->name]) !!}

                                @if ($errors->has('subject_name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('subject_name') }}</strong>
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
@endsection