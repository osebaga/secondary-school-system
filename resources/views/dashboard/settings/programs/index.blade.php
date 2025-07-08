@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Index</title>


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Programs </h2>

                <div class="boxpane-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            <a data-toggle="dropdown" href="#">
                                <i class="icon fa fa-tasks3" data-placement="left"
                                   title="{{"Actions"}}"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu"
                                aria-labelledby="dLabel">

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
                                <table id="programTable" class="table table-bordered table-hover table-striped" style="width: 100%;">
                                   <thead>
                                   <tr>
                                       <th>S/No</th>  
                                        <th>Program Name(Code)-(Acronym)</th>
                                         <th>program Type</th>
                                         <th>program Duration</th>
                                         <th>Program Total</th>
                                         <th>Tuition Fee</th>
                                         <th>Academic Year</th>
                                          <th>Actions</th>
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
    </section>
    @endsection

@section('scripts')
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#programTable').DataTable({
                processing: true,
                serverSide: true,
                responsive:true,
                ajax: '{{route('programs.get-programs')}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'program_name', name: 'program_name'},
                    {data: 'program_type', name: 'program_type'},
                    {data: 'program_duration', name: 'program_duration'},
                    {data: 'program_weight', name: 'program_weight'},
                    {data: 'tuition_fee', name: 'tuition_fee'},
                    
                    {data: 'year', name: 'year'},

                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>

    
@endsection
