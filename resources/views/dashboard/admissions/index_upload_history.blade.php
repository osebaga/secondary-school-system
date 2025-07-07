@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">Colleges </h2>

                    <div class="boxpane-icon">
                        <ul class="btn-tasks">
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="#">
                                    <i class="icon fa fa-tasks3" data-placement="left"
                                       title="{{"Actions"}}"></i>
                                </a>
                                <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu"
                                    aria-labelledby="dLabel">
                                    <li>
                                        <a href="{{route('colleges.create')}}">
                                            <i class="fa fa-plus-circle"></i>
                                            {{"Add College"}}
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
                                <table id="collegeTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>   <th>College Name</th> <th>College Acronym</th><th>Institution</th> <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot></tfoot>
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
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#collegeTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('colleges.get-colleges')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'college_name', name: 'college_name'},
                    {data: 'college_acronym', name: 'college_acronym'},
                    {data: 'institution_id', name: 'institution_id'},

                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection