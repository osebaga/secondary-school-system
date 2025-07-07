@extends('layouts.dashboard')
@section('title-content')

    <title>{{ config('app.name') }} | Course Registration</title>

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-customx">
                <ul class="nav nav-tabs tabs-bordered" id="tabMenu">

                    <li class=" nav-item">
                        <a class="nav-link active" href="#semester-1" data-toggle="tab"
                           aria-expanded="false">
                            1 <sup>st</sup> Semester Registered Courses
                        </a>
                    </li>
                    <li class=" nav-item">
                        <a class="nav-link" href="#semester1-edit" data-toggle="tab"
                           aria-expanded="false">
                            Register/Edit 1 <sup>st</sup> Semester Courses
                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="semester-1">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue">
                                    Course Registration-<b class="black">{{$academic_year}}</b>
                                </h2>

                            </div>
                            <div class="boxpane-content">

                                @if(count($registered_courses_sem_one)>0)

                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="introtext">
                                            Below here is the list of all courses that your have registered for this Academic year


                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered"
                                                   style="width: 100%;">
                                                <thead>
                                                <th>
                                                    Status
                                                </th>
                                                <th>Code</th>
                                                <th>Course Name</th>
                                                <th>Type</th>
                                                <th>Credit</th>
                                                </thead>
                                                <tbody>
                                                @foreach($registered_courses_sem_one as $course)

                                                    <tr>
                                                        <td>
                                                            <div class="icheck-primary">
                                                                {{Form::checkbox('course_id[]',true,['id'=>'course_id'.$course->id, 'disabled'=>'disabled'])}}
                                                                {!! Form::label('course_id'.$course->id,' ') !!}

                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{\App\Models\Course::find($course->course_id)->course_code ?? ''}}</td>
                                                        <td>
                                                            {{\App\Models\Course::find($course->course_id)->course_name ?? ''}}
                                                        </td>
                                                        <td>{{SRS::course_option($course->core)}}</td>
                                                        <td>
                                                            {{\App\Models\Course::find($course->course_id)->unit ?? ''}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                    @else
                                    <div class="alert alert-warning alert-dismissable">
                                        Info! No courses Registered  for Semester One
                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="semester1-edit">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue">
                                    Course Registration-<b class="black">{{$academic_year}}</b>
                                </h2>

                            </div>
                            <div class="boxpane-content">

                                @if(!is_null($academic_courses_sem_one))

                                    <div class="row">
                                    <div class="col-lg-12">
                                        <p class="introtext">
                                            Below here is the list of all courses that your allowed to take, to register
                                            please click here
                                        </p>
                                        {!! Form::open(['route' => 'students.store-courses','class'=>'store-courses','method'=>'POST','role' => 'form']) !!}
                                        {!! Form::hidden('program_weight',$program_weight) !!}
                                        {!! Form::hidden('semester',1) !!}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                   <div class="table-responsive">
                                            <table class="table table-striped table-bordered text-center"
                                                   style="width: 100%;">
                                                <thead>
                                                <th>
                                                    Status
                                                </th>
                                                <th>Code</th>
                                                <th>Course Name</th>
                                                <th>Type</th>
                                                <th>Credit</th>
                                                </thead>
                                                <tbody>
                                               @if(!is_null($academic_courses_sem_one->program))
                                                @foreach($academic_courses_sem_one->program->courses as $course)

                                                    <?php  $reg_course=$academic_courses_sem_one->courses()->where('courses.id','=',$course->id)->first() ?>

                                                    <tr>
                                                        <td>
                                                            <div class="icheck-primary">

                                                            @if($course->pivot->core==1)
                                                                    {{Form::checkbox('course_id_core[]',$course->id,$course->pivot->core==1 ? true:false,['id'=>'course_id_reg'.$course->id,$course->pivot->core==1 ? 'disabled':''])}}
                                                                    {!! Form::label('course_id_reg'.$course->id,' ') !!}

                                                                    {{Form::hidden('course_id[]',$course->id)}}

                                                                @endif

                                                                @if($reg_course!=null)
                                                                @if($course->pivot->core==0&& $reg_course->pivot->carry_over >=1)
                                                                    {{Form::checkbox('course_id_core[]',$course->id,$reg_course->pivot->carry_over >=1 ? true:false,['id'=>'course_id_reg'.$course->id,$reg_course->pivot->carry_over >=1 ? 'disabled':''])}}
                                                                    {!! Form::label('course_id_reg'.$course->id,' ') !!}

                                                                    {{Form::hidden('course_id[]',$course->id)}}

                                                                @endif
                                                                @if($course->pivot->core==0&& $reg_course->pivot->carry_over <1)
                                                                    {{Form::checkbox('course_id[]',$course->id,true,['id'=>'course_id_reg'.$course->id])}}
                                                                    {!! Form::label('course_id_reg'.$course->id,' ') !!}

                                                                @endif

                                                                    @else
                                                                    @if($course->pivot->core==0)
                                                                        {{Form::checkbox('course_id[]',$course->id,null,['id'=>'course_id_reg'.$course->id])}}
                                                                        {!! Form::label('course_id_reg'.$course->id,' ') !!}

                                                                    @endif
                                                                    @endif


                                                            </div>
                                                        </td>
                                                        <td>{{$course->course_code}}</td>
                                                        <td>{{$course->course_name}}</td>
                                                        <td>{{SRS::course_option($course->pivot->core)}}</td>
                                                        <td>{{$course->unit}}</td>
                                                    </tr>

                                                @endforeach
                                                   @else
                                                   No program configured
                                                @endif

                                                </tbody>
                                            </table>
                                        </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{Form::button('Register Module',['type'=>'submit','class'=>'btn btn-primary  pull-right'])}}
                                                </div>
                                            </div>
                                        </div>

                                        {!! Form::close() !!}

                                    </div>
                                </div>
                                @else
                                    <div class="alert alert-warning alert-dismissable">
                                        Info! No courses available for Semester One
                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="nav-tabs-customx">
                <ul class="nav nav-tabs tabs-bordered" id="tabMenu">

                    <li class=" nav-item">
                        <a class="nav-link active" href="#semester-2" data-toggle="tab"
                           aria-expanded="false">
                            2 <sup>nd</sup> Semester Registered Courses
                        </a>
                    </li>
                    <li class=" nav-item">
                        <a class="nav-link" href="#semester2-edit" data-toggle="tab"
                           aria-expanded="false">
                            Register/Edit 2 <sup>nd</sup> Semester Courses
                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="semester-2">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue">
                                    Course Registration-<b class="black">{{$academic_year}}</b>
                                </h2>

                            </div>
                            <div class="boxpane-content">
                                @if(count($registered_courses_sem_two)>0)

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="introtext">
                                                Below here is the list of all courses that your have registered for this Academic year


                                            </p>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered"
                                                       style="width: 100%;">
                                                    <thead>
                                                    <th>
                                                        Status
                                                    </th>
                                                    <th>Code</th>
                                                    <th>Course Name</th>
                                                    <th>Type</th>
                                                    <th>Credit</th>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($registered_courses_sem_two as $course)

                                                        <tr>
                                                            <td>
                                                                <div class="icheck-primary">
                                                                    {{Form::checkbox('course_id[]',true,['id'=>'course_id'.$course->id, 'disabled'=>'disabled'])}}
                                                                    {!! Form::label('course_id'.$course->id,' ') !!}

                                                                </div>
                                                            </td>
                                                             <td>
                                                            {{\App\Models\Course::find($course->course_id)->course_code ?? ''}}</td>
                                                        <td>
                                                            {{\App\Models\Course::find($course->course_id)->course_name ?? ''}}
                                                        </td>
                                                        <td>{{SRS::course_option($course->core)}}</td>
                                                        <td>
                                                            {{\App\Models\Course::find($course->course_id)->unit ?? ''}}
                                                        </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-warning alert-dismissable">
                                        Info! No courses Registered  for Semester Two
                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="semester2-edit">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue">
                                    Course Registration-<b class="black">{{$academic_year}}</b>
                                </h2>

                            </div>
                            <div class="boxpane-content">
                               @if(!is_null($academic_courses_sem_two)&& !is_null($academic_courses_sem_two->program))
                                 @if(count($academic_courses_sem_two->program->courses)>0)
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="introtext">
                                                Below here is the list of all courses that your allowed to take, to register
                                                please click here
                                            </p>
                                            {!! Form::open(['route' => 'students.store-courses','class'=>'store-courses','method'=>'POST','role' => 'form']) !!}
                                            {!! Form::hidden('program_weight',$program_weight) !!}
                                            {!! Form::hidden('semester',2) !!}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered text-center"
                                                               style="width: 100%;">
                                                            <thead>
                                                            <th>
                                                                Status
                                                            </th>
                                                            <th>Code</th>
                                                            <th>Course Name</th>
                                                            <th>Type</th>
                                                            <th>Credit</th>
                                                            </thead>
                                                            <tbody>

                                                            @foreach($academic_courses_sem_two->program->courses as $course)

                                                                <?php  $reg_course=$academic_courses_sem_two->courses()->where('courses.id','=',$course->id)->first() ?>

                                                                <tr>
                                                                    <td>
                                                                        <div class="icheck-primary">

                                                                            @if($course->pivot->core==1)
                                                                                {{Form::checkbox('course_id_core[]',$course->id,$course->pivot->core==1 ? true:false,['id'=>'course_id_reg'.$course->id,$course->pivot->core==1 ? 'disabled':''])}}
                                                                                {!! Form::label('course_id_reg'.$course->id,' ') !!}

                                                                                {{Form::hidden('course_id[]',$course->id)}}

                                                                            @endif

                                                                            @if($reg_course!=null)
                                                                                @if($course->pivot->core==0&& $reg_course->pivot->carry_over >=1)
                                                                                    {{Form::checkbox('course_id_core[]',$course->id,$reg_course->pivot->carry_over >=1 ? true:false,['id'=>'course_id_reg'.$course->id,$reg_course->pivot->carry_over >=1 ? 'disabled':''])}}
                                                                                    {!! Form::label('course_id_reg'.$course->id,' ') !!}

                                                                                    {{Form::hidden('course_id[]',$course->id)}}

                                                                                @endif
                                                                                @if($course->pivot->core==0&& $reg_course->pivot->carry_over <1)
                                                                                    {{Form::checkbox('course_id[]',$course->id,true,['id'=>'course_id_reg'.$course->id])}}
                                                                                    {!! Form::label('course_id_reg'.$course->id,' ') !!}

                                                                                @endif

                                                                            @else
                                                                                @if($course->pivot->core==0)
                                                                                    {{Form::checkbox('course_id[]',$course->id,null,['id'=>'course_id_reg'.$course->id])}}
                                                                                    {!! Form::label('course_id_reg'.$course->id,' ') !!}

                                                                                @endif
                                                                            @endif


                                                                        </div>
                                                                    </td>
                                                                    <td>{{$course->course_code}}</td>
                                                                    <td>{{$course->course_name}}</td>
                                                                    <td>{{SRS::course_option($course->pivot->core)}}</td>
                                                                    <td>{{$course->unit}}</td>
                                                                </tr>

                                                            @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        {{Form::button('Register/Change/Confirm Courses',['type'=>'submit','class'=>'btn btn-lg btn-success  pull-right'])}}
                                                    </div>
                                                </div>
                                            </div>

                                            {!! Form::close() !!}

                                        </div>
                                    </div>
                                     @else
                                        <div class="alert alert-warning alert-dismissable">
                                            Info! No Programme configured
                                        </div>
                                    @endif
                                @else
                                    <div class="alert alert-warning alert-dismissable">
                                        Info! No courses available for Semester Two
                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
