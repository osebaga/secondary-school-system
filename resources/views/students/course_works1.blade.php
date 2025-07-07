@extends('layouts.dashboard')
@section('title-content')
    <title>{{ config('app.name') }} | Course Work</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-customx">
                <ul class="nav nav-tabs tabs-bordered" id="tabMenu">
                    {{--                    @dd($student->studentyear->year)--}}
                    @for($y=1; $y<=count($student_campus);$y++)
                        <li class=" nav-item">
                            <a class="nav-link {{$y==1 ? 'active':''}}" href="#year-{{$y}}" data-toggle="tab"
                               aria-expanded="false">
                                {!!$srs->year_level($y)  !!}
                            </a>
                        </li>
                    @endfor
                </ul>
                <div class="tab-content">
                    @for($y=1; $y<=count($student_campus);$y++)
                        <div class="tab-pane {{$y==1 ? 'active':''}}" id="year-{{$y}}">
                            <div class="boxpane">
                                <div class="boxpane-header">
                                    <h2 class="blue"><i class="fa-fw fa fa-book nb"></i>
                                        The following is the list of course(s) that registered for <b
                                            class="black">[{{$student->reg_no}}]</b> in this
                                        academic year
                                    </h2>
                                </div>
                                <div class="boxpane-content">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="table-responsive">
                                                <?php
                                                $courses11 = $srs->calculateCourseWork($y, 1);
                                                $scheme_id = $courses11['scheme_id'];
                                                $year_id = $courses11['year_id'];
                                                $is_field_work = $courses11['is_field_work'];
                                                //                                                dump($year_id);
                                                $courses1 = $courses11['results'];
                                                $all_sups = $courses11['sups'];
                                                $all_carry = $courses11['carry'];
                                                $all_disco = $courses11['disco_course_name'];
                                                $disco_count = $courses11['disco_count'];
                                                $disco_reason = $courses11['disco_reason'];
                                                //dd($srs->calculate_student_gpa($courses1,$y,Auth::id(),null));
                                                $annual_gpa = $srs->calculateGPA($y);
                                                //$gpa1 = $srs->calculateGPA($y, 1);
                                                $gpa1 = $srs->calculate_student_gpa($courses1, $y, null, null);
                                                //                                                dump($year_id.'-'.$student->campus_id.'-'.$student->batch_id)
                                                ?>
                                                @if($courses1->count()>0)
                                                    {{--                                                    @dd($srs->check_status($year_id,$student->campus_id,$student->batch_id),$year_id,$student->campus_id,$student->batch_id)--}}
                                                    @if(count($srs->check_status($year_id,$student->campus_id,$student->batch_id))>0)
                                                        @foreach($srs->check_status($year_id,$student->campus_id,$student->batch_id) as $item)

                                                            @if($item->year_id ==$year_id)
                                                                @if(($item->sem1 =="1" && $item->batch_id==$student->batch_id))
                                                                    @if($disco_count>0)
                                                                        <table border="4" class="table  alert-danger"
                                                                               style="width: 100%;">
                                                                            <tr>
                                                                                <td>{!! $disco_reason !!}</td>
                                                                                <td>{!! $all_disco !!}</td>
                                                                            </tr>
                                                                        </table>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    <div class="table-responsive">
                                                        @if(count($srs->check_status($year_id,$student->campus_id,$student->batch_id))>0)
                                                            @foreach($srs->check_status($year_id,$student->campus_id,$student->batch_id) as $item)
                                                                @if($item->sem1 ==1 && $item->sem2 ==1 && $item->batch_id==$student->batch_id)
                                                                    <table
                                                                        class="table-striped table-bordered table-hover"
                                                                        style="width: 100%;">
                                                                        <tbody>
                                                                        <?php
                                                                        // declaration for annual gpa calculation
                                                                        $courses2 = $srs->calculateCourseWork($y, 2);
                                                                        $courses2 = $courses2['results'];
                                                                        $gpa2 = $srs->calculate_student_gpa($courses2, $y, null, null);
                                                                        ?>
                                                                        {{--                                                                        @dd($gpa1,$gpa2,property_exists($gpa1['gpa'],'gpa'),$gpa1['gpa'])--}}
                                                                        <tr>
                                                                            <th width="20%">Total Credit</th>
                                                                            <td>{{$annual_gpa['total_credit']}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Total Grade Point</th>
                                                                            <td>
                                                                                {{--                                                                                @dd($gpa1,array_key_exists($gpa1,'gpa'))--}}
                                                                                {{--                                                                                @if(!property_exists($gpa1,'gpa'))--}}
                                                                                {{--                                                                                    {{"0.00"}}--}}
                                                                                {{--                                                                                @else--}}
                                                                                @if($courses1->count()>0 && $courses2->count()>0)
                                                                                    {{$gpa1['total_grade_point']+$gpa2['total_grade_point']}}</td>
                                                                            @else
                                                                                {{"0.00"}}
                                                                            @endif
                                                                            {{--                                                                            @endif--}}
                                                                        </tr>
                                                                        <tr>
                                                                            <th>GPA</th>
                                                                            <td>
                                                                                {{--                                                                                @if(!property_exists($gpa1,"gpa"))--}}
                                                                                {{--                                                                                    {{"0.00"}}--}}
                                                                                {{--                                                                                @else--}}
                                                                                @if($courses1->count()>0 && $courses2->count()>0)
                                                                                    {{($gpa1['gpa']+$gpa2['gpa'])/2}}
                                                                                @else
                                                                                    {{"0.00"}}
                                                                                @endif
                                                                                {{--                                                                                @endif--}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Remark</th>
                                                                            <td>
                                                                                @if($courses1->count()>0 && $courses2->count()>0)
                                                                                    @if(($gpa1['gpa']+$gpa2['gpa'])/2>=2.0)
                                                                                        PASS
                                                                                    @else
                                                                                        FAIL
                                                                                    @endif
                                                                                @else

                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div class="table-responsive">
                                                        @if(count($srs->check_status($year_id,$student->campus_id,$student->batch_id))>0)
                                                            @foreach($srs->check_status($year_id,$student->campus_id,$student->batch_id) as $item)
                                                                @if($item->year_id ==$year_id)
                                                                    @if(($item->sem1 =="1" || $item->sem1_ca=="1") && $item->batch_id==$student->batch_id)
                                                                        <table
                                                                            class="text-center mt-1 table-hover table-bordered table-striped"
                                                                            width="100%">
                                                                            <thead class="bg-light black">
                                                                            <tr>
                                                                                @if($scheme_id==6||$scheme_id==7||$scheme_id==8)
                                                                                    {{--                                                                                    <th colspan="13">Semester 1</th>--}}
                                                                                    <th colspan="11">Semester 1</th>
                                                                                @else
                                                                                    {{--                                                                                    <th colspan="12">Semester 1</th>--}}
                                                                                    <th colspan="10">Semester 1</th>
                                                                                @endif
                                                                            </tr>
                                                                            <tr>
                                                                                <th rowspan="2">Code</th>
                                                                                <th rowspan="2">Course Name</th>
                                                                                <th rowspan="2">Credit</th>
                                                                                @if($scheme_id==6||$scheme_id==7||$scheme_id==8)
                                                                                    <th colspan="5">CA Scores</th>
                                                                                @else
                                                                                    <th colspan="4">CA Scores</th>
                                                                                @endif
                                                                                {{--                                                                        <th colspan="4">CA Score</th>--}}
                                                                                <th rowspan="2">Total CA Score</th>
                                                                                {{--                                                                                <th rowspan="2">SE</th>--}}
                                                                                {{--                                                                                <th rowspan="2">Total</th>--}}
                                                                                <th rowspan="2">Grade</th>


                                                                                <th rowspan="2">Remark</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Assignment 1</th>
                                                                                <th>Assignment 2</th>
                                                                                <th>Test 1</th>
                                                                                <th>Test 2</th>
                                                                                @if($scheme_id==6||$scheme_id==7||$scheme_id==8)
                                                                                    <th>Portfolio</th>
                                                                                @endif

                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach($courses1 as $course)
                                                                                <tr>
                                                                                    <td>
                                                                                        @if($course->carry_over>0)
                                                                                            <b><sup class="red">**</sup>{{$course->course_code}}
                                                                                                <sup
                                                                                                    class="red">**</sup></b>
                                                                                        @else
                                                                                            {{$course->course_code}}
                                                                                        @endif

                                                                                    </td>
                                                                                    <td class="text-left">{{$course->course_name}}</td>
                                                                                    <td>{{$course->unit}}</td>
                                                                                    @if($item->sem1_ca==1)
                                                                                        <td>{{$course->ass1}}</td>
                                                                                        <td>{{$course->ass2}}</td>
                                                                                        <td>{{$course->test1}}</td>
                                                                                        <td>{{$course->test2}}</td>
                                                                                        @if($scheme_id==6||$scheme_id==7||$scheme_id==8)
                                                                                            <td>{{$course->portfolio}}</td>
                                                                                        @endif
                                                                                        <td>{{$course->ca_total}}</td>
                                                                                    @else
                                                                                        <td colspan="5"><span
                                                                                                class="badge badge-danger">NO CA Published</span>
                                                                                        </td>
                                                                                    @endif
                                                                                    @if($item->sem1==1)
                                                                                        {{--                                                                                        <td>{{$course->score}}</td>--}}
                                                                                        {{--                                                                                        <td>{{$course->ca_ue_total}}</td>--}}
                                                                                        @if($course->sit>1)
                                                                                            <td>
                                                                                                {{$course->grade}}
                                                                                            </td>
                                                                                        @else
                                                                                            <td>{!!  $course->grade !!}</td>
                                                                                        @endif
                                                                                        <td
                                                                                            class="@if($course->remark=="RM" ||$course->remark=="FAIL") red font-weight-bold @endif"

                                                                                        >{!! $course->remark!!}</td>
                                                                                    @else
                                                                                        <td colspan="4"><span
                                                                                                class="badge badge-danger badge-sm">SE is not Published yet !</span>
                                                                                        </td>
                                                                                        {{--                                                                                    <td>-</td>--}}
                                                                                        {{--                                                                                    <td>-</td>--}}
                                                                                        {{--                                                                                    <td>-</td>--}}
                                                                                        {{--                                                                                    <td>-</td>--}}
                                                                                    @endif
                                                                                </tr>
                                                                                <?php
                                                                                $sups = $course->sups;
                                                                                $sups_name = $course->sups_course_name;
                                                                                $sup_count = $course->sup_count;
                                                                                $carry = $course->carry;
                                                                                $carry_name = $course->carry_course_name;
                                                                                $carry_count = $course->carry_count;
                                                                                ?>
                                                                            @endforeach
                                                                            </tbody>
                                                                            <tfoot class="text-left">
                                                                            <tr>
                                                                                @if($scheme_id==6||$scheme_id==7||$scheme_id==8)
                                                                                    {{--                                                                                    <th colspan="13"--}}
                                                                                    <th colspan="11"
                                                                                        class="bg-light text-center">
                                                                                        Grade
                                                                                        Summary
                                                                                    </th>
                                                                                @else
                                                                                    {{--                                                                                    <th colspan="12"--}}
                                                                                    <th colspan="10"
                                                                                        class="bg-light text-center">
                                                                                        Grade
                                                                                        Summary
                                                                                    </th>
                                                                                @endif
                                                                            </tr>
                                                                            <tr>
                                                                                @if($scheme_id==6||$scheme_id==7||$scheme_id==8)
                                                                                    <td rowspan="4" colspan="9">

                                                                                        specials:<br>
                                                                                        @if($sup_count>0)
                                                                                            Supplementary:({{$sup_count}}
                                                                                            )
                                                                                            <br>
                                                                                            {!!$all_sups!!}<br>
                                                                                            Courses:{!!$sups_name!!}<br>
                                                                                        @endif

                                                                                        @if($carry_count>0)
                                                                                            Repeat
                                                                                            Modules:({{$carry_count}}
                                                                                            )<br>
                                                                                            {!!$all_carry!!}<br>
                                                                                            Courses:{!!$carry_name!!}
                                                                                            <br>
                                                                                        @endif
                                                                                    </td>
                                                                                @else
                                                                                    <td rowspan="4" colspan="8">

                                                                                        specials:<br>
                                                                                        @if($sup_count>0)
                                                                                            Supplementary:({{$sup_count}}
                                                                                            )
                                                                                            <br>
                                                                                            {!!$all_sups!!}<br>
                                                                                            Courses:{!!$sups_name!!}<br>
                                                                                        @endif

                                                                                        @if($carry_count>0)
                                                                                            Repeat
                                                                                            Modules:({{$carry_count}}
                                                                                            )<br>
                                                                                            {!!$all_carry!!}<br>
                                                                                            Courses:{!!$carry_name!!}
                                                                                            <br>
                                                                                        @endif
                                                                                    </td>
                                                                                @endif
                                                                                <td>Total Credit</td>
                                                                                <td><b>{{$gpa1['total_credit']}}</b>
                                                                                </td>
                                                                            </tr>
                                                                            @if($item->sem1==1)
                                                                                <tr>
                                                                                    <td>Total Grade Point</td>
                                                                                    <td>
                                                                                        <b>{{$gpa1['total_grade_point']}}</b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>GPA</td>
                                                                                    <td><b>{{$gpa1['gpa']}}</b></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Remark</td>
                                                                                    <td>
                                                                                        @if(($gpa1['gpa'])>=2.0)
                                                                                            PASS
                                                                                        @else
                                                                                            FAIL
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                            </tfoot>
                                                                        </table>

                                                                    @else
                                                                        <div class="alert alert-primary" role="alert"
                                                                             style="font-size: large;font-family: Roboto">
                                                                            <b>Info!</b> Result is not Published yet For
                                                                            Semester I !!!
                                                                        </div>
                                                                    @endif
                                                                @endif

                                                            @endforeach
                                                        @endif

                                                    </div>
                                                @else
                                                    <div
                                                        class="alert alert-warning alert-dismissable">
                                                        Info! No coursework yet
                                                    </div>
                                                @endif
                                            </div>
                                            {{-- semester two--}}
                                            @if(count($srs->check_status($year_id,$student->campus_id,$student->batch_id))>0)
                                                @foreach($srs->check_status($year_id,$student->campus_id,$student->batch_id) as $item)
                                                    @if($item->year_id ==$year_id)
                                                        @if(($item->sem2 ==1 || $item->sem2_ca==1) && $item->batch_id==$student->batch_id)
                                                            <div class="table-responsive mt-5">
                                                                <?php
                                                                $courses2 = $srs->calculateCourseWork($y, 2);
                                                                $courses2 = $courses2['results'];
                                                                if (count($srs->calculateCourseWork($y, 2)['results']) > 0) {
                                                                    $scheme_id = $srs->calculateCourseWork($y, 2)['scheme_id'];
                                                                    $is_field_work = $srs->calculateCourseWork($y, 2)['is_field_work'];
                                                                }
                                                                $gpa2 = $srs->calculate_student_gpa($courses2, $y, null, null);
                                                                ?>
                                                                @if($courses2->count()>0)
                                                                    <table
                                                                        class="text-center table-hover table-bordered table-striped"
                                                                        width="100%">
                                                                        <thead class="bg-light black">
                                                                        <tr>
                                                                            @if($scheme_id==6 ||$scheme_id==7||$scheme_id==8)
                                                                                <th colspan="11">Semester 2</th>
                                                                            @else
                                                                                <th colspan="10">Semester 2</th>
                                                                            @endif
                                                                        </tr>
                                                                        <tr>
                                                                            <th rowspan="2">Code</th>
                                                                            <th rowspan="2">Course Name</th>
                                                                            <th rowspan="2">Credit</th>
                                                                            @if($scheme_id==6||$scheme_id==7||$scheme_id==8)
                                                                                <th colspan="5">CA Scores</th>
                                                                            @else
                                                                                <th colspan="4">CA Scores</th>
                                                                            @endif
                                                                            <th rowspan="2">Total CA Score</th>
                                                                            {{--                                                                            <th rowspan="2">SE</th>--}}
                                                                            {{--                                                                            <th rowspan="2">Total</th>--}}
                                                                            <th rowspan="2">Grade</th>
                                                                            <th rowspan="2">Remark</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Assignment 1</th>
                                                                            <th>Assignment 2</th>
                                                                            <th>Test 1</th>
                                                                            <th>Test 2</th>
                                                                            @if($scheme_id==6 ||$scheme_id==7||$scheme_id==8)
                                                                                <th>Portfolio</th>
                                                                            @endif
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($courses2 as $course)
                                                                            @if($course->is_field_work=="no")
                                                                                <tr>
                                                                                    <td>
                                                                                        @if($course->carry_over>0)
                                                                                            <b>{{$course->course_code}}</b>
                                                                                        @else
                                                                                            {{$course->course_code}}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td class="text-left">{{$course->course_name}}</td>
                                                                                    <td>{{$course->unit}}</td>
                                                                                    @if($item->sem2_ca==1)
                                                                                        <td>{{$course->ass1}}</td>
                                                                                        <td>{{$course->ass2}}</td>
                                                                                        <td>{{$course->test1}}</td>
                                                                                        <td>{{$course->test2}}</td>
                                                                                        @if($scheme_id==6||$scheme_id==7||$scheme_id==8)
                                                                                            <td>{{$course->portfolio}}</td>
                                                                                        @endif
                                                                                        <td>{{$course->ca_total}}</td>

                                                                                    @else
                                                                                        <td colspan="5"><span
                                                                                                class="badge badge-danger">NO CA Published</span>
                                                                                        </td>
                                                                                    @endif
                                                                                    @if($item->sem2==1)
                                                                                        {{--                                                                                        <td>{{$course->score}}</td>--}}
                                                                                        {{--                                                                                        <td>{{$course->ca_ue_total}}</td>--}}
                                                                                        @if($course->sit>1)
                                                                                            <td>{{$course->grade}}</td>
                                                                                        @else
                                                                                            <td>{!!  $course->grade !!}</td>
                                                                                        @endif
                                                                                        <td
                                                                                            class="@if($course->remark=="RM" ||$course->remark=="FAIL") red font-weight-bold @endif"
                                                                                        >{!! $course->remark!!}</td>

                                                                                    @else
                                                                                        <td colspan="4"><span
                                                                                                class="badge badge-danger badge-sm">SE is not Published yet !</span>
                                                                                        </td>
                                                                                    @endif
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                        </tbody>

                                                                        <tbody>
                                                                        @foreach($courses2 as $course)
                                                                            @if($course->is_field_work=="yes")
                                                                                <tr>
                                                                                    @if($scheme_id==6 ||$scheme_id==7||$scheme_id==8)
                                                                                        <th colspan="11"
                                                                                            class="text-success">Field
                                                                                            Course
                                                                                        </th>
                                                                                    @else
                                                                                        <th colspan="10"
                                                                                            class="text-success">Field
                                                                                            Course
                                                                                        </th>
                                                                                    @endif
                                                                                </tr>
                                                                                @if($scheme_id==6 ||$scheme_id==7||$scheme_id==8)
                                                                                    <tr>
                                                                                        <th>Code</th>
                                                                                        <th>Course Name</th>
                                                                                        <th>Credit</th>
                                                                                        <th>Field Attendance</th>
                                                                                        <th>Field
                                                                                            Performance/Practices
                                                                                        </th>
                                                                                        <th>Field Report</th>
                                                                                        @if($scheme_id==6||$scheme_id==7||$scheme_id==8)
                                                                                            <th colspan="3">Total</th>
                                                                                        @else
                                                                                            <th colspan="2">Total</th>
                                                                                        @endif
                                                                                        <th>Grade</th>
                                                                                        <th>Remark</th>
                                                                                    </tr>
                                                                                @else
                                                                                    <tr>
                                                                                        <th>Code</th>
                                                                                        <th>Course Name</th>
                                                                                        <th>Credit</th>
                                                                                        <th>Presentation</th>
                                                                                        <th>Field Attachment</th>
                                                                                        <th>Special Paper</th>
                                                                                        <th colspan="2">Total</th>
                                                                                        <th>Grade</th>
                                                                                        <th>Remark</th>
                                                                                    </tr>
                                                                                @endif
                                                                                <tr>
                                                                                    <td>
                                                                                        @if($course->carry_over>0)
                                                                                            <b>{{$course->course_code}}</b>
                                                                                        @else
                                                                                            {{$course->course_code}}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td class="text-left">{{$course->course_name}}</td>
                                                                                    <td>{{$course->unit}}</td>
                                                                                    @if($item->sem2_ca==1)
                                                                                        <td>{{$course->presentation}}</td>
                                                                                        <td>{{$course->field_attachment}}</td>
                                                                                        <td>{{$course->special_paper}}</td>
                                                                                        @if($scheme_id==6||$scheme_id==7||$scheme_id==8)
                                                                                            <td colspan="3">{{$course->ca_total}}</td>
                                                                                        @else
                                                                                            <td colspan="2">{{$course->ca_total}}</td>
                                                                                        @endif
                                                                                    @else
                                                                                        <td colspan="4"><span
                                                                                                class="badge badge-danger">NO CA Published</span>
                                                                                        </td>
                                                                                    @endif
                                                                                    @if($item->sem2==1)
                                                                                        @if($course->sit>1)
                                                                                            <td>{{$course->grade}}</td>
                                                                                        @else
                                                                                            <td>{!!  $course->grade !!}</td>
                                                                                        @endif
                                                                                        <td class="@if($course->remark=="RM" ||$course->remark=="FAIL") red font-weight-bold @endif"

                                                                                        >{!! $course->remark!!}</td>
                                                                                    @else
                                                                                        <td colspan="4"><span
                                                                                                class="badge badge-danger badge-sm">SE is not Published yet !</span>
                                                                                        </td>
                                                                                    @endif
                                                                                </tr>

                                                                            @endif
                                                                        @endforeach
                                                                        </tbody>
                                                                        <tfoot class="text-left">
                                                                        <tr>
                                                                            @if($scheme_id==6||$scheme_id==7||$scheme_id==8)
                                                                                <th colspan="11"
                                                                                    class="bg-light text-center">
                                                                                    Grade
                                                                                    Summary
                                                                                </th>
                                                                            @else
                                                                                <th colspan="10"
                                                                                    class="bg-light text-center">
                                                                                    Grade
                                                                                    Summary
                                                                                </th>
                                                                            @endif

                                                                        </tr>
                                                                        <tr>
                                                                            @if($scheme_id==6||$scheme_id==7||$scheme_id==8)
                                                                                <td rowspan="4" colspan="9"></td>
                                                                                <td>Total Credit</td>
                                                                                <td><b>{{$gpa2['total_credit']}}</b>
                                                                                </td>
                                                                            @else
                                                                                <td rowspan="4" colspan="8"></td>
                                                                                <td>Total Credit</td>
                                                                                <td><b>{{$gpa2['total_credit']}}</b>
                                                                                </td>
                                                                            @endif
                                                                        </tr>
                                                                        @if($item->sem1==1)
                                                                            <tr>
                                                                                <td>Total Grade Point</td>
                                                                                <td>
                                                                                    <b>{{$gpa2['total_grade_point']}}</b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>GPA</td>
                                                                                <td><b>{{$gpa2['gpa']}}</b></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Remark</td>
                                                                                <td>
                                                                                    @if(($gpa2['gpa'])>=2.0)
                                                                                        PASS
                                                                                    @else
                                                                                        FAIL
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                        </tfoot>
                                                                    </table>
                                                                @else

                                                                @endif
                                                            </div>
                                                        @else
                                                            <div class="alert alert-primary" role="alert"
                                                                 style="font-size: large;font-family: Roboto">
                                                                <b>Info!</b> Result is not Published yet For Semester II
                                                                !!!
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
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
        });
        $('#entry_qualification').select2({
            minimumResultsForSearch: -1,
        });
        $('#is_disabled').select2({
            minimumResultsForSearch: -1,
        });
        $('#sponsorship').select2({
            minimumResultsForSearch: -1,
        });
        $('#citizenship').select2({});
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


