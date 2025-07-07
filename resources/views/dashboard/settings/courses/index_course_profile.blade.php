@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }}Subject | Index</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Subject's details
                </h2>

                <div class="boxpane-icon">
                    <ul class="btn-tasks">

                    </ul>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext"></p>
                        <div class="table-responsive">
                            <table  id="cprTable" class="tablex table-bordered table-hover table-striped" style="width: 100%;">
                                <tbody>
                                <tr>
                                    <th>Code</th><td>{{$course->course_code}}</td>
                                </tr>
                                <tr>
                                    <th>Subject</th><td>{{$course->course_name}}</td>
                                </tr>
                                <tr>
                                    <th>Department</th><td>{{$course->department->department_name}}</td>
                                </tr>
                                <tr>
                                    <th>Score Type</th><td>{{$course->score_type}}</td>
                                </tr>
                                <tr>
                                    {{-- <th>Unit/Credits</th><td>{{$course->unit}}</td> --}}
                                </tr>
                                <tr>
                                    <th>Pass Grade</th><td>{{$course->pass_grade}}</td>
                                </tr>
                                {{-- <tr>
                                    <th>CA(%)</th><td>{{$course->cw}}</td>
                                </tr>
                                <tr>
                                    <th>UE(%)</th><td>{{$course->final}}</td>
                                </tr>
                                <tr>
                                    <th>Min. CA(MARKS)</th><td>{{$course->min_cw}}</td>
                                </tr> --}}
                                <tr>
                                    <th>School Level</th><td>{{$course->study_level->name}}</td>
                                </tr>
                                {{-- <tr>
                                    <th>Faculty</th><td>{{$course->department->faculty->faculty_name}}</td>
                                </tr> --}}

                                <tr>
                                    <th>Institution</th><td>{{$course->department->faculty->institution->institution_name}}</td>
                                </tr>
                                </tbody>
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



@endsection
