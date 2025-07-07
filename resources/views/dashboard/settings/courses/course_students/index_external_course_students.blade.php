
@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Course Details | External</title>

@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        EE-Registered Student(s) on the course-<b class="black">{{$course->course_code}}</b>
                    </h2>
                    @if(count(\App\Lib\SRS::check_result_status())>0)
                        {{--  @dd(count(\App\Helpers\SRS::check_result_status()))--}}
                        @foreach(\App\Lib\SRS::check_result_status() as $item)
                            {{--  @dd($srs->decode($batch_id)[0],$item->batch_id,\App\Helpers\SRS::check_result_status())--}}

                            {{--   @dd($srs->decode($batch_id)[0]==$item->batch_id)--}}
                            @if(($item->sem1_upload==1 ||$item->sem2_upload==1) && $item->batch_id==$srs->decode($batch_id)[0])
                                {{--                            @if(($item->sem1_upload==1 ||$item->sem2_upload==1) && 1==1)--}}
                                <div class="boxpane-icon">
                                    <ul class="btn-tasks">
                                        <li class="dropdown">
                                            {{--                            <a href="{{route('courses.ca-exports',[$id,$batch_id])}}">--}}
                                            <a href="{{route('ca.external.export',[$id,$batch_id])}}">
                                                <i class="icon fa fa-file-excel-o" data-placement="left"></i>CA Sheet
                                            </a>
                                            {{--                            <a href="{{route('courses.ue-exports2',[$id,$batch_id])}}">--}}
                                            <a href="{{route('se.external.export',[$id,$batch_id])}}">
                                                <i class="icon fa fa-file-excel-o" data-placement="left"></i>SE Sheet(No
                                                QNS)
                                            </a>
                                            {{--                            <a href="{{route('courses.ue-exports',$id)}}">--}}
                                            {{--                                <i class="icon fa fa-file-excel-o" data-placement="left"></i>SE Sheet--}}
                                            {{--                            </a>--}}

                                            {{--                            <a href="{{route('courses.ca-ue-exports',$id)}}">--}}
                                            {{--                                <i class="icon fa fa-file-excel-o" data-placement="left"></i>Overall Sheet--}}
                                            {{--                            </a>--}}

                                            <a data-toggle="dropdown" href="#">
                                                <i class="icon fa fa-tasks3" data-placement="left"
                                                   title="{{"Actions"}}"></i>
                                            </a>

                                        </li>
                                    </ul>
                                </div>
                            @elseif($item->batch_id==$srs->decode($batch_id)[0])
                                @unlessrole('DAEO|HOD|SuperAdmin')
                                <div class="boxpane-icon">
                                    <h2 class="text-danger p-1 m-1"><i class="icon fa fa-warning"></i> Result Uploading
                                        is closed !! </h2>
                                </div>
                                @endunlessrole
                            @endif
                        @endforeach
                    @endif
                    @role('DAEO|HOD|SuperAdmin')
                    <div class="boxpane-icon">
                        <ul class="btn-tasks">
                            <li class="dropdown">
                                <a href="{{route('ca.external.export',[$id,$batch_id])}}">
                                    <i class="icon fa fa-file-excel-o" data-placement="left"></i>CA
                                    Sheet
                                </a>
                                {{--                            <a href="{{route('courses.ue-exports2',[$id,$batch_id])}}">--}}
                                <a href="{{route('se.external.export',[$id,$batch_id])}}">
                                    <i class="icon fa fa-file-excel-o" data-placement="left"></i>SE
                                    Sheet(No
                                    QNS)
                                </a>
                                <a data-toggle="dropdown" href="#">
                                    <i class="icon fa fa-tasks3" data-placement="left"
                                       title="{{"Actions"}}"></i>
                                </a>

                            </li>
                        </ul>
                    </div>
                    @endrole
                </div>
                @if(count(\App\Lib\SRS::check_result_status())>0)
                    {{--                    @dd($srs->decode($batch_id))--}}
                    @foreach(\App\Lib\SRS::check_result_status() as $item)
                        @if(($item->sem1_upload==1 ||$item->sem2_upload==1) && $item->batch_id==$srs->decode($batch_id)[0])
                            {{--                        @if(($item->sem1_upload==1 ||$item->sem2_upload==1) && 1==1)--}}
                            <div class="boxpane-header">
                                <div class="boxpane-icon">
                                    <ul class="btn-tasks">
                                        <li class="dropdown">
                                            <a href="{{route('courses.ca.external-uploads',$id)}}">
                                                <i class="icon fa fa-file-excel-o" data-placement="left"></i>CA Upload
                                            </a>
                                            <a href="{{route('courses.ue.external-uploads',$id)}}">
                                                <i class="icon fa fa-file-excel-o" data-placement="left"></i>SE Upload
                                            </a>
                                            <a data-toggle="dropdown" href="#">
                                                <i class="icon fa fa-tasks3" data-placement="left"
                                                   title="{{"Actions"}}"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        @endif
                    @endforeach
                @endif
                @role('DAEO|HOD|SuperAdmin')
                <div class="boxpane-header">
                    <div class="boxpane-icon">
                        <ul class="btn-tasks">
                            @if($course->is_field_work=="yes")
                                {{--  FIELD SHEET HANDLE  --}}
                                <li class="dropdown">
                                    <a href="{{route('field.export',[$id,$batch_id])}}">
                                        <i class="icon fa fa-file-excel-o" data-placement="left"></i>Sheet
                                        Export
                                    </a>
                                    <a href="{{route('courses.score.field-uploads',$id)}}">
                                        <i class="icon fa fa-file-excel-o" data-placement="left"></i>Sheet
                                        Upload
                                    </a>
                                    <a data-toggle="dropdown" href="#">
                                        <i class="icon fa fa-tasks3" data-placement="left"
                                           title="{{"Actions"}}"></i>
                                    </a>
                                </li>
                            @else
                                <li class="dropdown">
                                    <a href="{{route('courses.ca.external-uploads',$id)}}">
                                        <i class="icon fa fa-file-excel-o" data-placement="left"></i>CA
                                        Upload
                                    </a>
                                    <a href="{{route('courses.ue.external-uploads',$id)}}">
                                        <i class="icon fa fa-file-excel-o" data-placement="left"></i>SE
                                        Upload
                                    </a>
                                    <a data-toggle="dropdown" href="#">
                                        <i class="icon fa fa-tasks3" data-placement="left"
                                           title="{{"Actions"}}"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                @endrole
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-xs-12">

                        </div>
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table id="supplementaryTable"
                                       class="table table-striped table-bordered table-hover text-justify table-responsive-sm"
                                       style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th rowspan="2">Student Name</th>
                                        <th rowspan="2">Sex</th>
                                        <th rowspan="2">Registration No.</th>
                                        @if($course->scheme_id==6||$course->scheme_id==7||$course->scheme_id==8)
                                            <th colspan="5">CA Scores</th>
                                        @else
                                            <th colspan="4">CA Scores</th>
                                        @endif
                                        @if($course->cw==100)
                                            <th rowspan="2">{{$CA}}</th>
                                        @else
                                            @if($course->scheme_id==6||$course->scheme_id==7||$course->scheme_id==8)
                                                <th rowspan="2">{{$CA}}</th>
                                            @else
                                                <th rowspan="2">{{$CA}}</th>
                                            @endif

                                            <th rowspan="2">{{$UE}}</th>
                                            <th rowspan="2">{{$Total}}</th>
                                            <th rowspan="2">Grade</th>
                                            <th rowspan="2">CA.Remarks</th>
                                            <th rowspan="2">OV.Remarks</th>
                                            <th rowspan="2">Status</th>
                                        @endif

                                    </tr>
                                    <tr>
                                        <th>{{$ASSIGN1}}</th>
                                        <th>{{$ASSIGN2}}</th>
                                        <th>{{$T1}}</th>
                                        <th>{{$T2}}</th>

                                        @if($course->scheme_id==6||$course->scheme_id==7||$course->scheme_id==8)
                                            <th>{{$PORTFOLIO}}</th>
                                        @endif

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
                    @if($course->scheme_id==6||$course->scheme_id==7 || $course->scheme_id==8)
            let supplTable= $('#supplementaryTable').DataTable({
                    processing: true,
                    //serverSide: true,
                    ajax: '{{route('courses.get-external-students',[$id,$batch_id])}}',
                    columns: [
                        {data: 'DT_RowIndex'},
                        {data: 'full_name', name: 'users.first_name'},
                        {data: 'gender', name: 'users.gender'},
                        {data: 'reg_no', name: 'students.reg_no'},
                        {data: 'a1', name: 'course_works.a1'},
                        {data: 'a2', name: 'course_works.a2'},
                        {data: 't1', name: 'course_works.t1'},
                        {data: 't2', name: 'course_works.t2'},
                        {data: 'portfolio', name: 'course_works.portfolio'},
                        {data: 'total_ca', name: 'course_works.total_ca'},
                        {data: 'score', name: 'results.score'},
                        {data: 'total', name: 'total',orderable: false, searchable: false},
                        {data: 'grade', name: 'grade',orderable: false, searchable: false},
                        {data: 'ca_remark', name: 'ca_remark',orderable: false, searchable: false},
                        {data: 'remark', name: 'remark',orderable: false, searchable: false},
                        {data: 'cs_status', name: 'course_students.cs_status'}
                    ],
                    columnDefs: [
                        {className: 'text-center', targets: [2,4,5,6,7,8,9,10,11,12,13]}
                    ],

                });
                    @else
            let supplTable= $('#supplementaryTable').DataTable({
                    processing: true,
                    //serverSide: true,
                    ajax: '{{route('courses.get-external-students',[$id,$batch_id])}}',
                    columns: [
                        {data: 'DT_RowIndex'},
                        {data: 'full_name', name: 'users.first_name'},
                        {data: 'gender', name: 'users.gender'},
                        {data: 'reg_no', name: 'students.reg_no'},
                        {data: 'a1', name: 'course_works.a1'},
                        {data: 'a2', name: 'course_works.a2'},
                        {data: 't1', name: 'course_works.t1'},
                        {data: 't2', name: 'course_works.t2'},
                        {data: 'total_ca', name: 'course_works.total_ca'},
                        {data: 'score', name: 'results.score'},
                        {data: 'total', name: 'total',orderable: false, searchable: false},
                        {data: 'grade', name: 'grade',orderable: false, searchable: false},

                        {data: 'ca_remark', name: 'ca_remark',orderable: false, searchable: false},
                        {data: 'remark', name: 'remark',orderable: false, searchable: false},
                        {data: 'cs_status', name: 'course_students.cs_status'}
                    ],
                    columnDefs: [
                        {className: 'text-center', targets: [2,4,5,6,7,8,9,10,11,12,13]}
                    ],

                });
            @endif

            // courseTable.draw(false);
        })
    </script>
@endsection
@section('css')
    <style>
        /* Table Styles
    =================================================================== */
        /* cellpadding */
        table th, td {
            padding: 0;
        }

        /* cellspacing */
        table {
            border-collapse: separate;
            border-spacing: 0;
        }

        /* cellspacing="5" */
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        /* cellspacing="0" */

        /* valign */
        th, td {
            vertical-align: top;
        }

        /* align (center) */
        table {
            margin: 0;
        }

        table {
            font-size: 11px;
            font-family: Tahoma;
            font-weight: bold;
        }

    </style>
@endsection



