@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Assign Subject</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    <b class="black">Program/Combination: {{$program->program_name .' '.(SRS::year_level($yr,$program->program_type)) ?? ''}}</b>
                </h2>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">Assign New Subject to {{$program->program_code ?? ''}} program</p>
                        {!! Form::open(['route' => 'program-courses.store','class'=>'create-program-course','method'=>'POST','role' => 'form']) !!}
                        {!! Form::hidden('program_id',$program_id) !!}
                        {!! Form::hidden('year',$yr) !!}

                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">

                                            {{-- {!! Form::label('coure_id','Course/Module') !!} --}}
                                            {!! Form::select('course_id', $courses,null, $errors->has('course_id') ? ['class' => 'form-control is-invalid','id'=>'course_id'] : ['class' => 'form-control','id'=>'course_id']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">

                                            {{-- {!! Form::label('core','Select Course Option') !!} --}}
                                            {!! Form::select('core', $course_options,null, $errors->has('core') ? ['class' => 'form-control is-invalid','id'=>'core'] : ['class' => 'form-control','id'=>'core']) !!}
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-3">
                                        <div class="form-group">

                                            {!! Form::label('semester','Select Semester') !!} 
                                            {!! Form::select('class_group', $course_semester,null, $errors->has('class_group') ? ['class' => 'form-control is-invalid','id'=>'class_group'] : ['class' => 'form-control','id'=>'class_group']) !!}
                                        </div>
                                    </div> --}}


                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            {{Form::button('Save Data',['type'=>'submit','class'=>'btn btn-success  pull-right'])}}
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
        $('#class_group').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Class',
        });
        $('#core').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Option',
        });

    </script>
@endsection