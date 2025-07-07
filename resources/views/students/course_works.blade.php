@extends('layouts.dashboard')
@section('title-content')
    <title>{{ config('app.name') }} | CA</title>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-customx">
            <ul class="nav nav-tabs tabs-bordered" id="tabMenu">
                @foreach($student_classes as $y => $class)
                    <li class="nav-item">
                        <a class="nav-link {{$class->year_of_study ? 'active':''}}" href="#year-{{$y+1}}" data-toggle="tab" aria-expanded="false">
                            {!! SRS::year_level($class->year_of_study) !!}
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach($student_classes as $k => $class)
                    <div class="tab-pane {{$k + 1 == 1 ? 'active':''}}" id="year-{{$k + 1}}">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue">
                                    <i class="fa-fw fa fa-book nb"></i>
                                    STUDENT CA RESULTS
                                </h2>
                            </div>
                            <div class="boxpane-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        @for ($semester = 1; $semester <= 2; $semester++)
                                            <table class="table table-bordered table-striped table-hover" width="100" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center font-bold" style="background-color: #f5f5f5; color: black;" colspan="9">
                                                            SEMESTER {{ $semester }} CA PUBLISHED RESULT
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Module Code</th>
                                                        <th>Course Name</th>
                                                        <th>CA Weight</th>
                                                        <th>Score/Marks</th>
                                                        <th>Remark</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($semesterResults = SRS::coursework($class->year_id, $semester))
                                                        @if($semesterResults->isEmpty())
                                                            <tr>
                                                                <td colspan="6" class="text-center">
                                                                    <div class="alert alert-warning">No results available for Semester {{ $semester }}.</div>
                                                                </td>
                                                            </tr>
                                                        @else
                                                            @foreach($semesterResults as $k => $cw)
                                                                <tr>
                                                                    <td scope="row">{{$k + 1}}</td>
                                                                    <td>{{$cw->course->course_code}}</td>
                                                                    <td>{{$cw->course->course_name}}</td>
                                                                    <td>{{$cw->course->cw}}</td>
                                                                    <td>{{$cw->ca_score}}</td>
                                                                    <td>{{SRS::CourseworkStatus($cw->course, $cw->ca_score)}}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    @else
                                                        <tr>
                                                            <td colspan="6" class="text-center">
                                                                <div class="alert alert-danger">Error retrieving results for Semester {{ $semester }}.</div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#tabMenu a[href="#{{old('tab')}}"]').tab('show')
        });
    </script>
@endsection