@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Dash Index</title>

@endsection

@section('content')
    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Dashboard -STUDENT CORE SUBJECT REGISTRATION
                </h2>

                <div class="boxpane-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            <a data-toggle="dropdown" href="#">
                                <i class="icon fa fa-wheelchair" data-placement="left"
                                   title="{{"Actions"}}"></i>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">

                            Student Process
                        </p>
                        {!! Form::open(['route' => 'register.core.subjects','class'=>'process-info','method'=>'POST','role' => 'form']) !!}
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">

                                    {!! Form::label('campus_id','Select Campus') !!}
                                    {!! Form::select('campus_id', $campuses,null, $errors->has('campus_id') ? ['class' => 'form-control is-invalid','id'=>'campus_id'] : ['class' => 'form-control','id'=>'campus_id']) !!}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">

                                    {!! Form::label('intake_category_id','Select Intake Category') !!}
                                    {!! Form::select('intake_category_id', $intakes,null, $errors->has('intake_category_id') ? ['class' => 'form-control is-invalid','id'=>'intake_category_id'] : ['class' => 'form-control','id'=>'intake_category_id']) !!}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">

                                    {!! Form::label('year','Select Year') !!}
                                    {!! Form::select('year', $years,null, $errors->has('year') ? ['class' => 'form-control is-invalid','id'=>'year'] : ['class' => 'form-control','id'=>'year']) !!}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">

                                    {!! Form::label('semester','Select Semester') !!}
                                    {!! Form::select('semester', $semesters,null, $errors->has('semester') ? ['class' => 'form-control is-invalid','id'=>'semester'] : ['class' => 'form-control','id'=>'semester']) !!}
                                </div>
                            </div>
                        </div>
                        {{Form::button('Register/Update',['type'=>'submit','class'=>'btn btn-lg btn-primary  pull-right'])}}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#year').select2({
                minimumResultsForSearch: -1,
                placeholder: 'Select Year',
            });
            $('#semester').select2({
                minimumResultsForSearch: -1,
                placeholder: 'Select Semester',
            });
            $('#intake_category_id').select2({
                minimumResultsForSearch: -1,
                placeholder: 'Select Intake Category',
            });
            $('#campus_id').select2({
                minimumResultsForSearch: -1,
                placeholder: 'Select Campus',
            });
        })
    </script>
@endsection
