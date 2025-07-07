@extends('layouts.dashboard')


@section('title-content')
    <title>{{ config('app.name') }} | Index</title>
@endsection


@section('content')
    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue"><i class="fa-fw fa fa-users"></i>Users </h2>

                <div class="boxpane-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            {{-- <a data-toggle="dropdown" href="#">
                                <i class="icon fa fa-chevron-circle-down tip" data-placement="left"
                                   title="{{"Actions"}}"></i>
                            </a> --}}
                            <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu" aria-labelledby="dLabel">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.create') }}">
                                        <i class="fa fa-plus-circle"></i>
                                        {{ 'Add User' }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">@lang('app.intro-text')</p>

                        <div class="table-responsive">
                            <div id="alerts"></div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <table id="usrTable" class="table-bordered data-table table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Roles</th>
                                        <th width="140px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        var userTable = $('#usrTable').DataTable({
            processing: true,
            serverSide: true,
            language: {
                sLoadingRecords: '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>'
            },
            ajax: '{{ route('get-users') }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return row.first_name + ' ' + row.middle_name + ' ' + row.last_name;
                    },
                    name: 'first_name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'role',
                    name: 'role',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }

            ],
            select: {
                style: 'multi'
            },
            columnDefs: [{
                className: 'text-center',
                targets: [4]
            }],
        })


        $('#usrTable').on('draw.dt', function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        < script >
    </script>

    </script>
@endsection
