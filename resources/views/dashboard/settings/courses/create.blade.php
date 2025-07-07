@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} |Subject</title>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">Subjects   
                    {{-- -[<b class="black">{{$department->department_name}}</b>] --}}
                    </h2>

                    <div class="boxpane-icon">

                        <a href="{{ route('manage.courses') }}" class="btn btn-sm btn-primary p-1 m-1">
                            <i class="mdi mdi-18px mdi-view-list"></i>
                            {{ 'View Subjects' }}
                        </a>

                    </div>
                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">@lang('app.intro-text')</p>
                            {!! Form::open(['route' => 'courses.store', 'class' => 'create-courses', 'method' => 'POST', 'role' => 'form']) !!}
                            {{-- {!! Form::hidden('department_id', $dep_id) !!} --}}

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('course_code', 'Subject Code*') !!}
                                                {!! Form::text(
                                                    'course_code',
                                                    old('course_code'),
                                                    $errors->has('course_code')
                                                        ? ['placeholder' => 'Subject Code', 'class' => 'form-control is-invalid']
                                                        : ['placeholder' => 'Subject Code', 'class' => 'form-control'],
                                                ) !!}
                                                @if ($errors->has('course_code'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('course_code') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('course_name', 'Subject Name*') !!}
                                                {!! Form::text(
                                                    'course_name',
                                                    old('course_name'),
                                                    $errors->has('course_name')
                                                        ? ['placeholder' => 'Subject Name', 'class' => 'form-control is-invalid']
                                                        : ['placeholder' => 'Subject Name', 'class' => 'form-control'],
                                                ) !!}
                                                @if ($errors->has('course_name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('course_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('unit', 'Credits*') !!}
                                                {!! Form::text(
                                                    'unit',
                                                    old('unit'),
                                                    $errors->has('unit')
                                                        ? ['placeholder' => 'Credits', 'class' => 'form-control is-invalid']
                                                        : ['placeholder' => 'Credits', 'class' => 'form-control'],
                                                ) !!}
                                                @if ($errors->has('unit'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('unit') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div> --}}


                                        <div class="col-sm-4">
                                            <div class="form-group">

                                                {!! Form::label('score_type', 'Select Score Type') !!}
                                                {!! Form::select(
                                                    'score_type',
                                                    $score_type,
                                                    null,
                                                    $errors->has('score_type')
                                                        ? ['class' => 'form-control is-invalid', 'id' => 'score_type']
                                                        : ['class' => 'form-control', 'id' => 'score_type'],
                                                ) !!}
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <div class="form-group">

                                                {!! Form::label('course_category', 'Select Subject Category') !!}
                                                {!! Form::select(
                                                    'course_category',
                                                    $course_category,
                                                    null,
                                                    $errors->has('course_category')
                                                        ? ['class' => 'form-control is-invalid', 'id' => 'course_category']
                                                        : ['class' => 'form-control', 'id' => 'course_category'],
                                                ) !!}
                                            </div>
                                        </div> --}}
                                        <div class="col-sm-4">
                                            <div class="form-group">

                                                {!! Form::label('study_level_id', 'Select School Level') !!}
                                                {!! Form::select(
                                                    'study_level_id',
                                                    $study_levels,
                                                    null,
                                                    $errors->has('study_level_id')
                                                        ? ['class' => 'form-control is-invalid', 'id' => 'study_level_id']
                                                        : ['class' => 'form-control', 'id' => 'study_level_id'],
                                                ) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">

                                                {!! Form::label('pass_grade', 'Select Pass Grade') !!}
                                                {!! Form::select(
                                                    'pass_grade',
                                                    $pass_grade,
                                                    null,
                                                    $errors->has('pass_grade')
                                                        ? ['class' => 'form-control is-invalid', 'id' => 'pass_grade']
                                                        : ['class' => 'form-control', 'id' => 'pass_grade'],
                                                ) !!}
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <div class="form-group">

                                                {!! Form::label('cw', 'Coursework(CA in %)') !!}
                                                {!! Form::select(
                                                    'cw',
                                                    $course_works,
                                                    null,
                                                    $errors->has('cw')
                                                        ? ['class' => 'form-control is-invalid', 'id' => 'cw']
                                                        : ['class' => 'form-control', 'id' => 'cw'],
                                                ) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                {!! Form::label('min_cw', 'Minimum(CA in Marks)') !!}
                                                {!! Form::select(
                                                    'min_cw',
                                                    $minimum_course_work,
                                                    null,
                                                    $errors->has('min_cw')
                                                        ? ['class' => 'form-control is-invalid', 'id' => 'min_cw']
                                                        : ['class' => 'form-control', 'id' => 'min_cw'],
                                                ) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                {!! Form::label('min_ue', 'Minimum(SE in Marks)') !!}
                                                {!! Form::select(
                                                    'min_ue',
                                                    $minimum_ue,
                                                    null,
                                                    $errors->has('min_ue')
                                                        ? ['class' => 'form-control is-invalid', 'id' => 'min_ue']
                                                        : ['class' => 'form-control', 'id' => 'min_ue'],
                                                ) !!}
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                {!! Form::label('Practical Status', 'Field/Research/Practical Status') !!}
                                                {!! Form::select(
                                                    'course_status',
                                                    $course_status,
                                                    null,
                                                    $errors->has('course_status')
                                                        ? ['class' => 'form-control is-invalid', 'id' => 'course_status']
                                                        : ['class' => 'form-control', 'id' => 'course_status'],
                                                ) !!}
                                            </div>
                                        </div> --}}

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::button('Submit', ['type' => 'submit', 'class' => 'btn btn-lg btn-success  pull-right']) }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#score_type').select2({
                minimumResultsForSearch: -1,
                placeholder: 'Select Score Type',
            });
            $('#course_category').select2({
                minimumResultsForSearch: -1,
                placeholder: 'Select Subject Category',
            });
            $('#study_level_id').select2({
                minimumResultsForSearch: -1,
                placeholder: 'Select Study Level',
            });
            $('#pass_grade').select2({
                minimumResultsForSearch: -1,
                placeholder: 'Select Pass Grade',
            });
        });
        $('#cw').select2({
            minimumResultsForSearch: -1,
            placeholder: 'Select Course Work',
        });
        $('#min_cw').select2({
            minimumResultsForSearch: -1,
            placeholder: 'Select Minimum CA',
        });
        $('#min_ue').select2({
            minimumResultsForSearch: -1,
            placeholder: 'Select Minimum SE',
        });

        $('#course_status').select2({
            minimumResultsForSearch: -1,
            placeholder: 'Select Status',
        });
        $('#field_work').select2({
            minimumResultsForSearch: -1,
            placeholder: 'Select Is Field Work',
        });
    </script>
@endsection
