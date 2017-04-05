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
                            {!! Form::text('ISBN', !is_null($book_reference->id) ? $book_reference->ISBN : null, ['class' => 'form-control', 'placeholder' => 'ISBN']) !!}

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
                                <input class="form-control" placeholder="Prix initial" type="number" name="initial_price" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" title="This should be a number with up to 2 decimal places." value="{{ isset($book_reference->id) ? $book_reference->initial_price : '0.00' }}" >
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
                                {!! Form::text('section_name',!is_null($book_reference->id) ? $book_reference->section->name : null, ['class' => 'form-control', 'placeholder' => 'Section']) !!}

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
                                {!! Form::text('level_name',!is_null($book_reference->id) ? $book_reference->level->name : null, ['class' => 'form-control', 'placeholder' => 'Niveau']) !!}

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
                                {!! Form::text('subject_name',!is_null($book_reference->id) ? $book_reference->subject->name : null, ['class' => 'form-control', 'placeholder' => 'Matière']) !!}

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