
@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Course Details | Supplementary</title>

@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Supplementary Student(s) on the course-<b class="black">{{$course->course_code}}</b>
                    </h2>
                    <div class="boxpane-icon">
                                    <ul class="btn-tasks">
                                        <li class="dropdown">
                                            <a href="{{url('se.supp.export',[$id,$intake_id])}}">
                                                <i class="icon fa fa-file-excel-o" data-placement="left"></i>SE Sheet
                                            </a>


                                        </li>
                                    </ul>
                                </div>

                </div>
                <div class="boxpane-header">
                                <div class="boxpane-icon">
                                    <ul class="btn-tasks">
                                        <li class="dropdown">
                                         <b class="text-danger mr-1"><sup>*</sup>Upload SE only not CA</b>
                                            <a href="{{url('courses.ue.supp-uploads',$id)}}">
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



