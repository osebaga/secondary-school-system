@extends('layouts.dashboard')
@section('title-content')
    <title>{{ config('app.name') }} | Grade Scheme Shift</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">Shift Grade Scheme</h2>

                    <div class="boxpane-icon">
                        <ul class="btn-tasks">
                            <li class="dropdown">
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
                        <div class="col-lg-12">
                            <p class="introtext">
                                The following is the list of grade schemes which are used to grade students, click the
                                button to shift all grade schemes to next academic year.

                            </p>
                            <div class="card" id="grade-scheme-option">
                                <div class="card-body bg-light">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table
                                                class="table table-striped table-bordered table-hover table-responsive-sm"
                                                style="width: 100%">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Scheme Name</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($grade_scheme_only)>0)
                                                    @foreach($grade_scheme_only as $grade_scheme_onlys=>$item)
                                                        <tr>
                                                            <td class="text-center">{{$grade_scheme_onlys+1}}</td>
                                                            <td class="text-left"
                                                                style="padding-left: 10%">{{$item->name}}</td>
                                                            <td class="text-center">
                                                                @if($srs->check_scheme($item->scheme_id)==6 || $srs->check_scheme($item->scheme_id)==5)
                                                                    <a href="{{route('grades.shift.name',$srs->encode($item->scheme_id))}}"
                                                                       class="btn btn-sm btn-primary disabled"><i
                                                                            class="mdi mdi-share-outline"></i> Shift</a>
                                                                    @else
                                                                    <a href="{{route('grades.shift.name',$srs->encode($item->scheme_id))}}"
                                                                       class="btn btn-sm btn-primary"><i
                                                                            class="mdi mdi-share-outline"></i> Shift</a>
                                                                @endif
                                                                <a href="{{route('grades.unshift',$srs->encode($item->scheme_id))}}" class="btn btn-sm btn-danger"><i
                                                                        class="mdi mdi-undo-variant"></i> UnShift</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modals')
    {{--    @include('dashboard.settings.grade-schemes.modals.edit_grade_scheme_modal')--}}
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

    </script>


@endsection
