@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Programs >> Create</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Add Program
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
                        {!! Form::model($program, ['method' => 'PATCH','route' => ['programs.update',  SRS::encode($program->id)]]) !!}

                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">

                                            {!! Form::label('faculty_id','Select Faculty') !!}
                                            {!! Form::select('faculty_id', $faculties,null, $errors->has('faculty_id') ? ['class' => 'form-control is-invalid','id'=>'faculty_id'] : ['class' => 'form-control','id'=>'faculty_id']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">

                                            {!! Form::label('year_id','Select Academic Year') !!}
                                            {!! Form::select('year_id', $academic_years,null, $errors->has('year_id') ? ['class' => 'form-control is-invalid','id'=>'year_id'] : ['class' => 'form-control','id'=>'year_id']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('program_name','Program Name*') !!}
                                            {!! Form::text('program_name', old('program_name'), $errors->has('program_name') ? ['placeholder' => 'Program Name','class' => 'form-control is-invalid'] : ['placeholder' => 'Program Name','class' => 'form-control']) !!}
                                            @if($errors->has('program_name'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('program_name')}}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('program_acronym','Program Acronym*') !!}
                                            {!! Form::text('program_acronym', old('program_acronym'), $errors->has('program_acronym') ? ['placeholder' => 'Program Acronym','class' => 'form-control is-invalid'] : ['placeholder' => 'Program Acronym','class' => 'form-control']) !!}
                                            @if($errors->has('program_acronym'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('program_acronym')}}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('program_code','Program Code*') !!}
                                            {!! Form::text('program_code', old('program_code'), $errors->has('program_code') ? ['placeholder' => 'Program Code','class' => 'form-control is-invalid'] : ['placeholder' => 'Program Code','class' => 'form-control']) !!}
                                            @if($errors->has('program_code'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('program_code')}}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">

                                            {!! Form::label('is_approved','Select Approval') !!}
                                            {!! Form::select('is_approved', $approval,null, $errors->has('is_approved') ? ['class' => 'form-control is-invalid','id'=>'is_approved'] : ['class' => 'form-control','id'=>'is_approved']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">

                                            {!! Form::label('program_type','Select Type') !!}
                                            {!! Form::select('program_type', $program_types,null, $errors->has('program_type') ? ['class' => 'form-control is-invalid','id'=>'program_type'] : ['class' => 'form-control','id'=>'program_type']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">

                                            {!! Form::label('program_category','Select Category') !!}
                                            {!! Form::select('program_category', $program_category,null, $errors->has('program_category') ? ['class' => 'form-control is-invalid','id'=>'program_category'] : ['class' => 'form-control','id'=>'program_category']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">

                                            {!! Form::label('program_duration','Select Program Duration') !!}
                                            {!! Form::select('program_duration', $program_duration,null, $errors->has('program_duration') ? ['class' => 'form-control is-invalid','id'=>'program_duration'] : ['class' => 'form-control','id'=>'program_duration']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('program_weight','Program Weight*') !!}
                                            {!! Form::text('program_weight', old('program_weight'), $errors->has('program_weight') ? ['placeholder' => 'Program Weight','class' => 'form-control is-invalid'] : ['placeholder' => 'Program Weight','class' => 'form-control']) !!}
                                            @if($errors->has('program_weight'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('program_weight')}}</strong>
                                        </span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('tuition_fee','Program Fee*') !!}
                                            {!! Form::text('tuition_fee', old('tuition_fee'), $errors->has('tuition_fee') ? ['placeholder' => 'Program Fee','class' => 'form-control is-invalid'] : ['placeholder' => 'Program Fee','class' => 'form-control']) !!}
                                            @if($errors->has('tuition_fee'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('tuition_fee')}}</strong>
                                        </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{Form::button('Update',['type'=>'submit','class'=>'btn btn-lg btn-success  pull-right'])}}
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
            $('#faculty_id').select2({
                minimumResultsForSearch: -1,
                placeholder:  'Select Faculty',
            });
        });
        $('#year_id').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Academic Year',
        });
        $('#is_approved').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Approval',
        });
        $('#program_type').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Program Type',
        });
        $('#program_category').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Program Type',
        });
        $('#program_duration').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Program Duration',
        });
    </script>
@endsection
