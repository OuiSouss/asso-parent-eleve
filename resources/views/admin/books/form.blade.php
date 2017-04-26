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
                            {!! Form::text('ISBN', !is_null($book_reference->id) ? $book_reference->ISBN : null, ['class' => 'form-control', 'placeholder' => '979-2-2156-3255-4']) !!}

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
                                {!! Form::text('initial_price', !is_null($book_reference->id) ? $book_reference->initial_price : 0, ['class' => 'form-control', 'placeholder' => 'Prix Initial']) !!}
                                @if ($errors->has('initial_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('initial_price') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('section_id') ? ' has-error' : '' }}">
                            {!! Form::label('section_id', 'Section', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">
                                {!! Form::select('section_id', $sections, null, ['class' => 'form-control', 'select' => $book_reference->section_id ]) !!}

                                @if ($errors->has('section_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('section_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('level_id') ? ' has-error' : '' }}">
                            {!! Form::label('level_id', 'Niveau', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">
                                {!! Form::select('level_id', $levels, null, ['class' => 'form-control', 'select' => $book_reference->level_id ]) !!}

                                @if ($errors->has('level_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('subject_id') ? ' has-error' : '' }}">
                            {!! Form::label('subject_id', 'Matière', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">
                                {!! Form::select('subject_id', $subjects, null, ['class' => 'form-control', 'select' => $book_reference->subject_id ]) !!}

                                @if ($errors->has('subject_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if (is_null($book_reference->id))
                            <div class="form-group{{ $errors->has('number_books') ? ' has-error' : '' }}">
                                {!! Form::label('number_books', 'Nombres de livres à créer', ['class' => 'col-md-2 control-label']) !!}

                                <div class="col-md-10">
                                    {!! Form::number('number_books', 0, ['class' => 'form-control']) !!}

                                    @if ($errors->has('number_books'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('number_books') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        @endif





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