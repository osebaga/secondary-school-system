@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Departments >> Create</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Add Departments</h2>

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
                                    <a href="{{route('departments.index')}}">
                                        <i class="mdi mdi-18px mdi-view-list"></i>
                                        {{"View Departments"}}
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
                        {!! Form::open(['route' => 'departments.store','class'=>'create-departments','method'=>'POST','role' => 'form']) !!}
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
                                            {!! Form::label('department_name','Department Name*') !!}
                                            {!! Form::text('department_name', old('department_name'), $errors->has('department_name') ? ['placeholder' => 'Department Name','class' => 'form-control is-invalid'] : ['placeholder' => 'Department Name','class' => 'form-control']) !!}
                                            @if($errors->has('department_name'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('department_name')}}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{Form::button('Submit',['type'=>'submit','class'=>'btn btn-lg btn-primary  pull-right'])}}
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
                minimumResultsForSearch: -1,
                placeholder:  'Select Faculty',
            });
        })
    </script>
@endsection
