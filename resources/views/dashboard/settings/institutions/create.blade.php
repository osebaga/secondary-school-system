@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Add Institutions</h2>

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
                                    <a href="{{route('institutions.index')}}">
                                        <i class="mdi mdi-18px mdi-view-list"></i>
                                        {{"View Institutions"}}
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
                        {!! Form::open(['route' => 'institutions.store','class'=>'create-institutions','method'=>'POST','role' => 'form']) !!}
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('institution_name','Institution Name*') !!}
                                            {!! Form::text('institution_name', old('institution_name'), $errors->has('institution_name') ? ['placeholder' => 'Institution Name','class' => 'form-control is-invalid'] : ['placeholder' => 'Institution Name','class' => 'form-control']) !!}
                                            @if($errors->has('institution_name'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('institution_name')}}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('institution_acronym','Institution Acronym*') !!}
                                            {!! Form::text('institution_acronym', old('institution_acronym'), $errors->has('institution_acronym') ? ['placeholder' => 'Institution Acronym','class' => 'form-control is-invalid'] : ['placeholder' => 'Institution Acronym','class' => 'form-control']) !!}
                                            @if($errors->has('institution_acronym'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('institution_acronym')}}</strong>
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
    </div>
    </div>
@endsection
