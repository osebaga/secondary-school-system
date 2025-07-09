@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Configure Subject in the program >> Create</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Edit Subject in the Program-<b class="black">{{$program->program_name}}</b>
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
                                        <a href="{{route('programs.index')}}">
                                            <i class="mdi mdi-18px mdi-view-list"></i>
                                            {{"View Programs"}}
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
                            <p class="introtext">@lang('app.intro-text')</p>
                            {!! Form::model($program_course, ['method' => 'PATCH','route' => ['program-courses.update',  SRS::encode($program_course->id)]]) !!}

                            {!! Form::hidden('program_id',$program_id) !!}
                            {!! Form::hidden('year',$yr) !!}

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">

                                                {!! Form::label('course_id','Select Subject') !!}
                                                {!! Form::select('course_id', $courses,null, $errors->has('corse_id') ? ['class' => 'form-control is-invalid','id'=>'course_id'] : ['class' => 'form-control','id'=>'course_id']) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">

                                                {!! Form::label('core','Select Subject Option') !!}
                                                {!! Form::select('core', $course_options,null, $errors->has('core') ? ['class' => 'form-control is-invalid','id'=>'core'] : ['class' => 'form-control','id'=>'core']) !!}
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-3">
                                            <div class="form-group">

                                                {!! Form::label('semester','Select Class') !!}
                                                {!! Form::select('semester', $course_semester,null, $errors->has('semester') ? ['class' => 'form-control is-invalid','id'=>'semester'] : ['class' => 'form-control','id'=>'semester']) !!}
                                            </div>
                                        </div> --}}


                                        <div class="col-sm-2">
                                            <div class="form-group" style="margin-top: 13%">
                                                {{Form::button('Change',['type'=>'submit','class'=>'btn btn-md btn-success'])}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#course_id').select2({
                //minimumResultsForSearch: -1,
                placeholder:  'Select Subject',
            });
        });
        $('#semester').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Class',
        });
        $('#core').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Course Option',
        });

    </script>
@endsection
