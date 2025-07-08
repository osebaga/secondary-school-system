@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Program</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Program/combination
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
                                        <i class="mdi mdi-30px mdi-view-list"></i>
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
                        {{-- <p class="introtext">@lang('app.intro-text')</p> --}}
                        {!! Form::open(['route' => 'programs.store','class'=>'create-program','method'=>'POST','role' => 'form']) !!}

                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row">
                                    <div class="col-sm-4">
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
                                    <div class="col-sm-4">
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
                                    <div class="col-sm-4">
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
                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">

                                            {!! Form::label('is_approved','Select Approval') !!}
                                            {!! Form::select('is_approved', $approval,null, $errors->has('is_approved') ? ['class' => 'form-control is-invalid','id'=>'is_approved'] : ['class' => 'form-control','id'=>'is_approved']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">

                                            {!! Form::label('program_type','Programme Type') !!}
                                            {!! Form::select('program_type', $program_types,null, $errors->has('program_type') ? ['class' => 'form-control is-invalid','id'=>'program_type'] : ['class' => 'form-control','id'=>'program_type']) !!}
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-3">
                                        <div class="form-group">

                                            {!! Form::label('program_category','Programme Category') !!}
                                            {!! Form::select('program_category', $program_category,null, $errors->has('program_category') ? ['class' => 'form-control is-invalid','id'=>'program_category'] : ['class' => 'form-control','id'=>'program_category']) !!}
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-4">
                                        <div class="form-group">

                                            {!! Form::label('program_duration','Duration') !!}
                                            {!! Form::select('program_duration', $program_duration,null, $errors->has('program_duration') ? ['class' => 'form-control is-invalid','id'=>'program_duration'] : ['class' => 'form-control','id'=>'program_duration']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{Form::button('Submit',['type'=>'submit','class'=>'btn btn-lg btn-success  pull-right'])}}
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
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#faculty_id').select2({
                //minimumResultsForSearch: -1,
                placeholder:  'Select Department',
            });
        });
        $('#year_id').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Year',
        });
        $('#is_approved').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Approval',
        });
        $('#program_type').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Type',
        });
        // $('#program_category').select2({
        //     minimumResultsForSearch: -1,
        //     placeholder:  'Select Program Category',
        // });
        $('#program_duration').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Duration',
        });
    </script>
@endsection