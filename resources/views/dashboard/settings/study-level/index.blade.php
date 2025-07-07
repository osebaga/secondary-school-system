@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | School Level</title>
@endsection
@section('content')
    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue"><i class="fa fa-tachometer1"></i>School Level </h2>

                <div class="boxpane-icon">
                    <a href="#" data-url="{{route('study-level.create')}}" class="btn btn-sm btn-primary p-1 m-1"
                       id="resource-level-add-button"> <i class="fa fa-pencil"></i> Add School Level</a>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">The following is the list of School Level(s) available</p>
                        <div class="table-responsive">
                            <table id="levelTable" class="table table-bordered table-hover table-striped" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>S/No</th>
                                    <th>Level Name</th>
                                    <th>Grade Configuration</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('modals')
    @include('dashboard.settings.study-level.modals.level_modal')
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/custombox.min.css')}}">

@endsection
@section('scripts')
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/custombox.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/legacy.min.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#levelTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('study-level.get-levels')}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'level_name', name: 'level_name'},
                    {data: 'grade_configuration', name: 'grade_configuration',orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection
