@extends('layouts.dashboard')
@section('title-content')
    <title>{{ config('app.name') }} | Course Result</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-customx">
                <ul class="nav nav-tabs tabs-bordered" id="tabMenu">
                    @for($y=1; $y<=$student->year_of_study;$y++)
                        <li class=" nav-item">
                            <a class="nav-link {{$y==1 ? 'active':''}}" href="#year-{{$y}}" data-toggle="tab"
                               aria-expanded="false">
                                {!!$srs->year_level($y)  !!}
                            </a>
                        </li>
                    @endfor
                </ul>
                <div class="tab-content">
                    @for($y=1; $y<=$student->year_of_study;$y++)
                        <div class="tab-pane {{$y==1 ? 'active':''}}" id="year-{{$y}}">
                            <div class="boxpane">
                                <div class="boxpane-header">
                                    <h2 class="blue"><i class="fa-fw fa fa-book nb"></i>
                                        The following is the list of course(s) that you have registered for this
                                        academic year
                                    </h2>
                                </div>
                                <div class="boxpane-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if(count($check_status)>0)
                                                @foreach($check_status as $item)
                                                    @if($item->sem1==1)
                                                        <div class="table-responsive">
                                                            {{--                                                            @if($courses1->count()>0)--}}
                                                            {{--                                                                @if($disco_count>0)--}}
                                                            <table border="4" class="table  alert-danger"
                                                                   style="width: 100%;">
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </table>
                                                            {{--                                                                @endif--}}
                                                            <table
                                                                class="table-striped table-bordered table-hover"
                                                                style="width: 100%;">
                                                                <tbody>
                                                                <tr>
                                                                    <th width="20%">Total Credit</th>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total Grade Point</th>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>GPA</th>
                                                                    <td>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Remark</th>
                                                                    <td></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>

                                                            <table
                                                                class="text-center mt-1 table-hover table-bordered table-striped"
                                                                width="100%">
                                                                <thead class="bg-light black">
                                                                <tr>
                                                                    <th colspan="14">Semester 1</th>
                                                                </tr>
                                                                <tr>
                                                                    <th rowspan="2">Code</th>
                                                                    <th rowspan="2">Course Name</th>
                                                                    <th rowspan="2">Credit</th>
                                                                    <th colspan="4">CA Score</th>
                                                                    <th rowspan="2">Total CA Score</th>
                                                                    <th rowspan="2">SE</th>
                                                                    <th rowspan="2">Total</th>
                                                                    <th rowspan="2">Grade</th>
                                                                    <th rowspan="2">Remark</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Assignment 1</th>
                                                                    <th>Assignment 2</th>
                                                                    <th>Test 1</th>
                                                                    <th>Test 2</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($student as $students)
{{--                                                                    @dd($students)--}}
                                                                    <tr>
                                                                        <td>
                                                                        </td>
                                                                        <td class="text-left"></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                                <tfoot class="text-left">
                                                                <tr>
                                                                    <th colspan="12"
                                                                        class="bg-light text-center">Grade
                                                                        Summary
                                                                    </th>

                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="4" colspan="10">
                                                                        specials:
                                                                        Repeat Modules:
                                                                    </td>
                                                                    <td>Total Credit</td>
                                                                    <td><b></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total Grade Point</td>
                                                                    <td>
                                                                        <b></b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>GPA</td>
                                                                    <td><b></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Remark</td>
                                                                    <td></td>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                            {{--                                                            @else--}}
                                                            {{--                                                                <div--}}
                                                            {{--                                                                    class="alert alert-warning alert-dismissable">--}}
                                                            {{--                                                                    Info! No coursework yet--}}
                                                            {{--                                                                </div>--}}

                                                            {{--                                                            @endif--}}
                                                        </div>



                                                    @else
                                                        <div class="alert alert-primary" role="alert"
                                                             style="font-size: large;font-family: Roboto">
                                                            <b>Info!</b> Result is not Published yet For Semester I !!!
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif

                                            {{--                                            semister 2--}}
                                            {{--                                            @if(count($check_status)>0)--}}
                                            {{--                                                @foreach($check_status as $item)--}}
                                            {{--                                                    @if($item->sem2==1)--}}
                                            {{--                                                        <div class="table-responsive mt-5">--}}
                                            {{--                                                            <?php--}}
                                            {{--                                                            $courses2 = $srs->calculateCourseWork($y, 2);--}}
                                            {{--                                                            $courses2 = $courses2['results'];--}}
                                            {{--                                                            $gpa2 = $srs->calculate_student_gpa($courses2, $y, null, null);--}}
                                            {{--                                                            ?>--}}
                                            {{--                                                            @if($courses2->count()>0)--}}
                                            {{--                                                                <table--}}
                                            {{--                                                                    class="text-center table-hover table-bordered table-striped"--}}
                                            {{--                                                                    width="100%">--}}
                                            {{--                                                                    <thead class="bg-light black">--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <th colspan="14">Semester 2</th>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <th rowspan="2">Code</th>--}}
                                            {{--                                                                        <th rowspan="2">Course Name</th>--}}
                                            {{--                                                                        <th rowspan="2">Credit</th>--}}
                                            {{--                                                                        <th colspan="4">CA Score</th>--}}
                                            {{--                                                                        <th rowspan="2">Total CA Score</th>--}}
                                            {{--                                                                        <th rowspan="2">UE</th>--}}
                                            {{--                                                                        <th rowspan="2">Total</th>--}}
                                            {{--                                                                        <th rowspan="2">Grade</th>--}}

                                            {{--                                                                        <th rowspan="2">Remark</th>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <th>Assignment 1</th>--}}
                                            {{--                                                                        <th>Assignment 2</th>--}}
                                            {{--                                                                        <th>Test 1</th>--}}
                                            {{--                                                                        <th>Test 2</th>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    </thead>--}}
                                            {{--                                                                    <tbody>--}}
                                            {{--                                                                    @foreach($courses2 as $course)--}}
                                            {{--                                                                        <tr>--}}
                                            {{--                                                                            <td>--}}
                                            {{--                                                                                @if($course->carry_over>0)--}}
                                            {{--                                                                                    <b><sup class="red">*</sup>{{$course->course_code}}--}}
                                            {{--                                                                                        <sup class="red">*</sup></b>--}}
                                            {{--                                                                                @else--}}
                                            {{--                                                                                    {{$course->course_code}}--}}
                                            {{--                                                                                @endif--}}

                                            {{--                                                                            </td>--}}
                                            {{--                                                                            <td class="text-left">{{$course->course_name}}</td>--}}
                                            {{--                                                                            <td>{{$course->unit}}</td>--}}
                                            {{--                                                                            <td>{{$course->ass1}}</td>--}}
                                            {{--                                                                            <td>{{$course->ass2}}</td>--}}
                                            {{--                                                                            <td>{{$course->test1}}</td>--}}
                                            {{--                                                                            <td>{{$course->test2}}</td>--}}
                                            {{--                                                                            <td>{{$course->ca_total}}</td>--}}
                                            {{--                                                                            <td>{{$course->score}}</td>--}}
                                            {{--                                                                            <td>{{$course->ca_ue_total}}</td>--}}
                                            {{--                                                                            @if($course->sit>1)--}}
                                            {{--                                                                                <td><sup--}}
                                            {{--                                                                                        class="red">*</sup> {{$course->grade}}--}}
                                            {{--                                                                                    <sup--}}
                                            {{--                                                                                        class="red">*</sup></td>--}}
                                            {{--                                                                            @else--}}
                                            {{--                                                                                <td>{!!  $course->grade !!}</td>--}}
                                            {{--                                                                            @endif--}}
                                            {{--                                                                            <td>{!!$course->remark!!}</td>--}}
                                            {{--                                                                        </tr>--}}
                                            {{--                                                                    @endforeach--}}
                                            {{--                                                                    </tbody>--}}
                                            {{--                                                                    <tfoot class="text-left">--}}

                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <th colspan="12" class="bg-light text-center">--}}
                                            {{--                                                                            Grade--}}
                                            {{--                                                                            Summary--}}
                                            {{--                                                                        </th>--}}

                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <td rowspan="4" colspan="10"></td>--}}
                                            {{--                                                                        <td>Total Credit</td>--}}
                                            {{--                                                                        <td><b>{{$gpa2['total_credit']}}</b></td>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <td>Total Grade Point</td>--}}
                                            {{--                                                                        <td><b>{{$gpa2['total_grade_point']}}</b></td>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <td>GPA</td>--}}
                                            {{--                                                                        <td><b>{{$gpa2['gpa']}}</b></td>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <td>Remark</td>--}}
                                            {{--                                                                        <td></td>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    </tfoot>--}}
                                            {{--                                                                </table>--}}
                                            {{--                                                            @else--}}

                                            {{--                                                            @endif--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    @else--}}
                                            {{--                                                        <div class="alert alert-primary" role="alert"--}}
                                            {{--                                                             style="font-size: large;font-family: Roboto">--}}
                                            {{--                                                            <b>Info!</b> Result is not Published yet For Semester II !!!--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    @endif--}}
                                            {{--                                                @endforeach--}}
                                            {{--                                            @endif--}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->


        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/select')}}/select2.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap')}}/fileinput.min.css"/>

@endsection
@section('scripts')
    <script src="{{asset('assets/js/select')}}/select2.min.js"></script>
    <script src="{{asset('assets/js/bootstrap')}}/fileinput.min.js"></script>

    <script>
        $('#gender').select2({
            minimumResultsForSearch: -1,
        })
        $('#entry_qualification').select2({
            minimumResultsForSearch: -1,
        })
        $('#is_disabled').select2({
            minimumResultsForSearch: -1,
        })
        $('#sponsorship').select2({
            minimumResultsForSearch: -1,
        })
        $('#citizenship').select2({})
        $(document).on('ready', function () {
            $("#avatar").fileinput({
                showUpload: false,
                dropZoneEnabled: false,
                mainClass: "input-group-lg"
            });
        });

        $(document).ready(function () {
            $('#tabMenu a[href="#{{old('tab')}}"]').tab('show')
        });

    </script>
@endsection


