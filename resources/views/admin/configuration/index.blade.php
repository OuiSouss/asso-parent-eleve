@extends('admin.admin_template')

@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box">
                <div class="box-header">
                    <h4>
                        Niveaux d'adhésion
                        <a href="{{ route('admin.configuration.contribution.create') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h4>

                </div>
                <div class="box-body">
                    <table class="table table-bordered" id="contributions-table">
                        <thead>
                        <tr>
                            <th>Intitulé</th>
                            <th>Prix</th>
                            <th>Action</th>
                        </tr>
                        <thead>
                        <tbody>
                            @foreach($contributions as $contribution)
                                <tr>
                                    <td>{{ $contribution->name }}</td>
                                    <td>{{ $contribution->cost }} €</td>
                                    <td>
                                    <a href="{{ route('admin.configuration.contribution.edit', $contribution->id) }}"
                                       class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                       data-target="#modal_contribution_delete" data-id="{{ $contribution->id }}"><i
                                                class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h4>Sections
                    <a href="{{ route('admin.configuration.section.create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                    </a>
                    </h4>
                </div>
                <div class="box-body">
                    <table class="table table-bordered" id="sections-table">
                        <thead>
                        <tr>
                            <th>Section</th>
                            <th>Action</th>
                        </tr>
                        <thead>
                        <tbody>
                        @foreach($sections as $section)
                            <tr>
                                <td>{{ $section->name }}</td>
                                <td>
                                    <a href="{{ route('admin.configuration.section.edit', $section->id) }}"
                                       class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                       data-target="#modal_section_delete" data-id="{{ $section->id }}"><i
                                                class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h4>Niveaux
                        <a href="{{ route('admin.configuration.level.create') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h4>
                </div>
                <div class="box-body">
                    <table class="table table-bordered" id="levels-table">
                        <thead>
                        <tr>
                            <th>Niveau</th>
                            <th>Action</th>
                        </tr>
                        <thead>
                        <tbody>
                        @foreach($levels as $level)
                            <tr>
                                <td>{{ $level->name }}</td>
                                <td>
                                    <a href="{{ route('admin.configuration.level.edit', $level->id) }}"
                                       class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                       data-target="#modal_level_delete" data-id="{{ $level->id }}"><i
                                                class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h4>Matières
                        <a href="{{ route('admin.configuration.subject.create') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h4>
                </div>
                <div class="box-body">
                    <table class="table table-bordered" id="subjects-table">
                        <thead>
                        <tr>
                            <th>Matière</th>
                            <th>Action</th>
                        </tr>
                        <thead>
                        <tbody>
                        @foreach($subjects as $subject)
                            <tr>
                                <td>{{ $subject->name }}</td>
                                <td>
                                    <a href="{{ route('admin.configuration.subject.edit', $subject->id) }}"
                                       class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                       data-target="#modal_subject_delete" data-id="{{ $subject->id }}"><i
                                                class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col -->
@endsection

@include('admin.modals.contribution_delete')
@include('admin.modals.section_delete')
@include('admin.modals.level_delete')
@include('admin.modals.subject_delete')

@section('scripts')
    <script>
        $('#modal_contribution_delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var contribution_id = button.data('id');
            var modal = $(this);
            var url = '{{ route('admin.configuration.contribution.destroy', ':contribution_id') }}';
            url = url.replace(':contribution_id', contribution_id);
            modal.find('.save').on('click', function (event) {
                $.ajax({
                    url: url,
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
                    type: 'DELETE',
                    dataType: 'JSON',
                    success: function (data, status) {
                        modal.modal('hide');
                        $(button.parent('td').parent('tr')).remove();
                    }
                });
            })
        });
    </script>
    <script>
        $('#modal_section_delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var section_id = button.data('id');
            var modal = $(this);
            var url = '{{ route('admin.configuration.section.destroy', ':section_id') }}';
            url = url.replace(':section_id', section_id);
            modal.find('.save').on('click', function (event) {
                $.ajax({
                    url: url,
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
                    type: 'DELETE',
                    dataType: 'JSON',
                    success: function (data, status) {
                        modal.modal('hide');
                        $(button.parent('td').parent('tr')).remove();
                    }
                });
            })
        });
    </script>
    <script>
        $('#modal_level_delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var level_id = button.data('id');
            var modal = $(this);
            var url = '{{ route('admin.configuration.level.destroy', ':level_id') }}';
            url = url.replace(':level_id', level_id);
            modal.find('.save').on('click', function (event) {
                $.ajax({
                    url: url,
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
                    type: 'DELETE',
                    dataType: 'JSON',
                    success: function (data, status) {
                        modal.modal('hide');
                        $(button.parent('td').parent('tr')).remove();
                    }
                });
            })
        });
    </script>
    <script>
        $('#modal_subject_delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var subject_id = button.data('id');
            var modal = $(this);
            var url = '{{ route('admin.configuration.subject.destroy', ':subject_id') }}';
            url = url.replace(':subject_id', subject_id);
            modal.find('.save').on('click', function (event) {
                $.ajax({
                    url: url,
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
                    type: 'DELETE',
                    dataType: 'JSON',
                    success: function (data, status) {
                        modal.modal('hide');
                        $(button.parent('td').parent('tr')).remove();
                    }
                });
            })
        });
    </script>
@endsection