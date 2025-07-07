@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | Staffs</title>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Staff
                    </h2>

                    <div class="boxpane-icon">


                        <a class="btn btn-sm btn-primary p-1 m-1" href="{{ route('staffs.register') }}">
                            <i class="fa fa-plus-circle"></i>Add New Staff
                        </a>

                    </div>
                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">
                                The following is the list of staff
                            </p>

                            <div class="card mb-4 bg-light display-none" id="admission-filter-option">
                                <div class="card-body">
                                    {!! Form::open([
                                        null,
                                        'id' => 'filter-form',
                                        'class' => 'create-direct-cost',
                                        'method' => 'POST',
                                        'role' => 'form',
                                    ]) !!}

                                    <div class="row">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                {!! Form::label('index_type') !!}
                                                {!! Form::select(
                                                    'index_type',
                                                    $filter_by,
                                                    null,
                                                    $errors->has('form')
                                                        ? ['class' => 'form-control is-invalid', 'id' => 'index_type']
                                                        : ['class' => 'form-control', 'id' => 'index_type'],
                                                ) !!}

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                {!! Form::label('index_no', 'Enter Index No.') !!}
                                                {!! Form::text(
                                                    'index_no',
                                                    old('index_no'),
                                                    $errors->has('index_no')
                                                        ? ['placeholder' => 'Index No.', 'class' => 'form-control is-invalid']
                                                        : ['placeholder' => 'Index No.', 'class' => 'form-control'],
                                                ) !!}

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                {!! Form::label('surname', 'Type Surname.') !!}
                                                {!! Form::text(
                                                    'surname',
                                                    old('surname'),
                                                    $errors->has('surname')
                                                        ? ['placeholder' => 'Type Surname.', 'class' => 'form-control is-invalid']
                                                        : ['placeholder' => 'Type Surname.', 'class' => 'form-control'],
                                                ) !!}

                                            </div>
                                        </div>


                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                {!! Form::label('department_id', 'Department') !!}
                                                {!! Form::select(
                                                    'department_id',
                                                    $departments,
                                                    'All',
                                                    $errors->has('department_id')
                                                        ? ['class' => 'form-control is-invalid', 'id' => 'department_id']
                                                        : ['class' => 'form-control', 'id' => 'department_id'],
                                                ) !!}

                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group pt-4">

                                                {!! Form::button('Go', ['type' => 'submit', 'class' => 'btn btn-warning']) !!}

                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}

                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="staffTable" class="table table-bordered table-hover table-striped"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="width:20px">#</th>
                                            <th>Prefix</th>
                                            <th>Staff Name</th>
                                            <th>Sex</th>
                                            <th>Department</th>
                                            <th>Roles</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/dashboard/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        $('#index_type').select2({
            minimumResultsForSearch: -1,
            placeholder: 'Select Level Index',
        });
        $('#department_id').select2({
            minimumResultsForSearch: -1,
            // placeholder: 'Select SRS',
        });
        $(document).ready(function() {
            let staffTable = $('#staffTable').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Type Surname"
                },
                ajax: {
                    url: '{{ route('staffs.get-staffs', $faculty_id) }}',
                    data: function(d) {
                        d.index_type = $('select[name=index_type]').val();
                        d.index_no = $('input[name=index_no]').val();
                        d.surname = $('input[name=surname]').val();
                        d.All = $('select[name=All]').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'salutation',
                        name: 'salutation',
                        render: function(data, type, row) {
                            return data ?? '';
                        }
                    },
                    {
                        data: 'full_name',
                        name: 'full_name',
                        render: function(data, type, row) {
                            return data ?? '';
                        }
                    },
                    {
                        data: 'staff_gender',
                        name: 'staff_gender',
                        render: function(data, type, row) {
                            return data ?? '';
                        }
                    },
                    {
                        data: 'department.department_name',
                        name: 'department.department_name',
                        render: function(data, type, row) {
                            return data ?? '';
                        }
                    },
                    {
                        data: 'role',
                        name: 'role',
                        render: function(data, type, row) {
                            return data ?? '';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],


                columnDefs: [{
                    className: 'text-center',
                    targets: [6]
                }]

            });
            $('#filter-form').on('submit', function(e) {
                staffTable.draw();
                e.preventDefault();
            });

        })
    </script>
@endsection
