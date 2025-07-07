@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Academic Program | Index</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Shift Programmes Year-<b class="black">{{$faculty->faculty_name}}</b>
                </h2>

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
                                    <a href="{{route('programs.create',$id)}}">
                                        <i class="fa fa-plus-circle"></i>
                                        {{"Add Programme"}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('courses.colleges-schools')}}">
                                        <i class="mdi mdi-view-list"></i>
                                        {{"V.College&Schools"}}
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
                        <p class="introtext">
                            The following is the list of programme(s) available in this school/faculty to add new
                            programme <b>click menu above <i class="fa fa-hand-o-right" aria-hidden="true"></i></b>
                        </p>
                        <div class="table-responsive">
                            <table id="programTable" class="table table-striped table-bordered table-hover"
                                   style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Program Type</th>
                                    <th>No of Programmes</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Bachelor</td>
                                    <td>{{count($bachelor_type)}}</td>
                                    <td>
                                        <a href="{{route('shift-program',['Bachelor',$srs->encode($id)])}}" class="btn btn-primary btn-sm">Shift</a>
                                        <a href="{{route('unshift-program',['Bachelor',$srs->encode($id)])}}" class="btn btn-danger btn-sm">UnShift</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Diploma</td>
                                    <td>{{count($diploma_type)}}</td>
                                    <td>
                                        <a href="{{route('shift-program',['Diploma',$srs->encode($id)])}}" class="btn btn-primary btn-sm">Shift</a>
                                        <a href="{{route('unshift-program',['Diploma',$srs->encode($id)])}}" class="btn btn-danger btn-sm">UnShift</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Certificate</td>
                                    <td>{{count($certificate_type)}}</td>
                                    <td>
                                        <a href="{{route('shift-program',['Certificate',$srs->encode($id)])}}" class="btn btn-primary btn-sm">Shift</a>
                                        <a href="{{route('unshift-program',['Certificate',$srs->encode($id)])}}" class="btn btn-danger btn-sm">UnShift</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Masters</td>
                                    <td>{{count($masters_type)}}</td>
                                    <td>
                                        <a href="{{route('shift-program',['Masters',$srs->encode($id)])}}" class="btn btn-primary btn-sm">Shift</a>
                                        <a href="{{route('unshift-program',['Masters',$srs->encode($id)])}}" class="btn btn-danger btn-sm">UnShift</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Postgraduate Diploma</td>
                                    <td>{{count($postgraduate_type)}}</td>
                                    <td>
                                        <a href="{{route('shift-program',['Postgraduate Diploma',$srs->encode($id)])}}" class="btn btn-primary btn-sm">Shift</a>
                                        <a href="{{route('unshift-program',['Postgraduate Diploma',$srs->encode($id)])}}" class="btn btn-danger btn-sm">UnShift</a>
                                    </td>
                                </tr>
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


    </script>


@endsection
