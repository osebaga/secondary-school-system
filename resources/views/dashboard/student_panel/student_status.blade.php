@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Student Status</title>

@endsection

@section('content')
    <div class="row">
        <div class="col-sm-2 ">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div style="max-width:200px; margin: 0 auto;">

                        <img alt="" src="{{$student->user->present()->avatar}}" class="avatar">

                    </div>

                    <p  class="pt-1"><i class="fa fa-envelope"></i> {{$student->reg_no}}</p>
                    {{-- <h3 class="pt-4">Change Student Progression Status by clicking the link below</h3>
                    <hr class="line" />
                    <h3>
                        {{--                     @dd($student->status)--}
                        <a href="#" class="student_disco_status" id="inline-disco{{$student->id}}" data-type="select" data-name="status" data-pk="{{$student->id}}" data-value="{{$student->status}}" data-url="{{route('student-panel.update-student-disco-status')}}" data-title="Select Status"></a>
                        <hr class="line bg-danger"/>
                    </h3> --}}

                </div>
            </div>
        </div>
        <div class="col-md-9 offset-1">
         <div class="row">
             <div class="col-md-12">
                 <div class="boxpane">
                     <div class="boxpane-header">
                         <h2 class="blue">
                             Student Status-<b class="black">[{{$student->reg_no}}]</b>
                         </h2>
                     </div>
                     <div class="boxpane-content">
                         <div class="row">
                             <div class="col-lg-12">
                                 <p class="introtext">

                                     Below here is the list of all subjects that have been registered to this student for the year of study.

                                 </p>
                                 <div class="col-md-12">

                                     @if(count($registered_courses_sem_one)>0)

                                         <div class="row">
                                             <div class="col-lg-12">
                                                 <div class="table-responsive">
                                                     <table class="table table-striped table-bordered text-center"
                                                            style="width: 100%;">
                                                         <thead>

                                                         <th>
                                                             Status
                                                         </th>
                                                         <th>Code</th>
                                                         <th>Subject Name</th>
                                                         <th>Type</th>
                                                         {{-- <th>Credit</th> --}}
                                                         {{-- <th>Course Status</th> --}}
                                                         </thead>

                                                         <tbody>
                                                         <tr>
                                                         <td colspan="6" class="font-bold">Form I</td>
                                                         </tr>
                                                         @foreach($registered_courses_sem_one as $k=>$course)

                                                             <tr>
                                                                 <td>
                                                                     <div class="icheck-primary">
                                                                         {{Form::checkbox('course_id[]',true,['id'=>'course_id'.$course->id])}}
                                                                         {!! Form::label('course_id'.$course->id,' ') !!}

                                                                     </div>
                                                                 </td>
                                                                 <td>{{$course->course_code}}</td>
                                                                 <td class="text-left">{{$course->course_name}}</td>
                                                                 <td>{{SRS::course_option($course->core)}}</td>
                                                                 {{-- <td>{{$course->unit}}</td> --}}

                                                                 {{-- <td>
                                                                     <a href="#" class="student_status" id="inline-sex{{$k}}" data-type="select" data-name="cs_status" data-pk="{{$course->cs_id}}" data-value="{{$course->cs_status}}" data-url="{{route('student-panel.update-student-status')}}" data-title="Select Status"></a>
                                                                 </td> --}}

                                                             </tr>
                                                         @endforeach
                                                         </tbody>
                                                     </table>
                                                 </div>

                                             </div>
                                         </div>
                                     @else
                                         <div class="alert alert-warning alert-dismissable">
                                             Info! No subjects Registered
                                         </div>

                                     @endif
                                 </div>
                                 <hr class="line-dotted pt-4 bg-info font-weight-normal"/>
                                 <div class="col-md-12">

                                     @if(count($registered_courses_sem_two)>0)

                                         <div class="row">
                                             <div class="col-lg-12">
                                                 <div class="table-responsive">
                                                     <table class="table table-striped table-bordered text-center"
                                                            style="width: 100%;">
                                                         <thead>
                                                         <th>
                                                             Status
                                                         </th>
                                                         <th>Code</th>
                                                         <th>Subject Name</th>
                                                         <th>Type</th>
                                                         {{-- <th>Credit</th> --}}
                                                         {{-- <th>Course Status</th> --}}
                                                         </thead>

                                                         <tbody>
                                                         <tr>
                                                             <td colspan="6" class="font-bold">Form II</td>
                                                         </tr>
                                                         @foreach($registered_courses_sem_two as $k=>$course)

                                                             <tr>
                                                                 <td>
                                                                     <div class="icheck-primary">
                                                                         {{Form::checkbox('course_id[]',true,['id'=>'course_id'.$course->id])}}
                                                                         {!! Form::label('course_id'.$course->id,' ') !!}

                                                                     </div>
                                                                 </td>
                                                                 <td>{{$course->course_code}}</td>
                                                                 <td class="text-left">{{$course->course_name}}</td>
                                                                 <td>{{SRS::course_option($course->core)}}</td>
                                                                 {{-- <td>{{$course->unit}}</td> --}}

                                                                 {{-- <td>
                                                                     <a href="#" class="student_status" id="inline-sex{{$k}}" data-type="select" data-name="cs_status" data-pk="{{$course->cs_id}}" data-value="{{$course->cs_status}}" data-url="{{route('student-panel.update-student-status')}}" data-title="Select Status"></a>
                                                                 </td> --}}

                                                             </tr>
                                                         @endforeach
                                                         </tbody>
                                                     </table>
                                                 </div>

                                             </div>
                                         </div>
                                     @else
                                         <div class="alert alert-warning alert-dismissable">
                                            Info! No subjects Registered
                                         </div>

                                     @endif
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
@section('css')
    <!-- X-editable css -->
    <link type="text/css" href="{{asset('assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet" />
@endsection
@section('scripts')
    <!-- X-editable Plugin -->
    <script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.min.js')}}"></script>
{{--    <script type="text/javascript" src="{{asset('assets/dashboard/js/pages/jquery.xeditable.js')}}"></script>--}}
    <script>
        $(function() {
            //modify buttons style
            $.fn.editableform.buttons =
                '<button type="submit" class="btn btn-primary editable-submit btn-sm waves-effect waves-light"><i class="mdi mdi-check"></i></button>' +
                '<button type="button" class="btn btn-light editable-cancel btn-sm waves-effect"><i class="mdi mdi-close"></i></button>';
            // $.fn.editable.defaults.params = function (params) {
            //     params._token =$('meta[name="csrf-token"]').attr('content');
            //     return params;
            // };
        });
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        $('.student_status').editable({
            prepend: "Select Status",
            mode: 'inline',
            inputclass: 'form-control-sm',
            source: [
                {value:'In Progress', text: 'In Progress'},
                {value: 'SPECIAL', text: 'SPECIAL'},



            ],
            display: function(value, sourceData) {
                var colors = {"": "gray", 1: "green", 2: "blue"},
                    elem = $.grep(sourceData, function(o){return o.value == value;});

                if(elem.length) {
                    $(this).text(elem[0].text).css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            },
            params: function(params) {
                // add additional params from data-attributes of trigger element
                params._token = $('meta[name="csrf-token"]').attr('content');
               //// params.value = $(this).editable().data('value');
               // params.cs_id = $(this).editable().data('cs_id');
                return params;
            },
            send:'always',
            ajaxOptions: {
                dataType: 'json',
                type: 'post'
            },
            success:function (data) {
                console.log(data) ;
            },
            error:function (response,newValue) {

                console.log(response);
            }
        });
        $('.student_disco_status').editable({
            prepend: "Select Status",
            mode: 'inline',
            inputclass: 'form-control-sm',
            source: [
                {value:'Admitted', text: 'Admitted'},
                {value:'In Progress', text: 'In Progress'},
                {value: 'DISCONTINUE', text: 'DISCONTINUE'},
                {value: 'ABSCONDED', text: 'ABSCONDED'},
                {value: 'POSTPONED', text: 'POSTPONED'},



            ],
            display: function(value, sourceData) {
                var colors = {"": "gray", 1: "green", 2: "blue"},
                    elem = $.grep(sourceData, function(o){return o.value == value;});

                if(elem.length) {
                    $(this).text(elem[0].text).css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            },
            params: function(params) {
                // add additional params from data-attributes of trigger element
                params._token = $('meta[name="csrf-token"]').attr('content');
                //// params.value = $(this).editable().data('value');
                // params.cs_id = $(this).editable().data('cs_id');
                return params;
            },
            send:'always',
            ajaxOptions: {
                dataType: 'json',
                type: 'post'
            },
            success:function (data) {
                console.log(data) ;
            },
            error:function (response,newValue) {

                console.log(response);
            }
        });

    </script>
@endsection
