@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Campus >> Index</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Add Faculties</h2>

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
                                    <a href="{{route('faculties.index')}}">
                                        <i class="mdi mdi-18px mdi-view-list"></i>
                                        {{"View Faculties"}}
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
                        {!! Form::model($faculty, ['method' => 'PATCH','route' => ['faculties.update', $faculty->id]]) !!}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">

                                            {!! Form::label('campus_id','Select Campus') !!}
                                            {!! Form::select('campus_id', $campuses,null, $errors->has('campus_id') ? ['class' => 'form-control is-invalid','id'=>'campus_id'] : ['class' => 'form-control','id'=>'campus_id']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('faculty_name','Faculty Name*') !!}
                                            {!! Form::text('faculty_name', old('faculty_name'), $errors->has('faculty_name') ? ['placeholder' => 'Faculty Name','class' => 'form-control is-invalid'] : ['placeholder' => 'Faculty Name','class' => 'form-control']) !!}
                                            @if($errors->has('faculty_name'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('faculty_name')}}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('faculty_acronym','Faculty Acronym*') !!}
                                            {!! Form::text('faculty_acronym', old('faculty_acronym'), $errors->has('faculty_acronym') ? ['placeholder' => 'Faculty Acronym','class' => 'form-control is-invalid'] : ['placeholder' => 'Faculty Acronym','class' => 'form-control']) !!}
                                            @if($errors->has('faculty_acronym'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('faculty_acronym')}}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{Form::button('Update',['type'=>'submit','class'=>'btn btn-lg btn-primary  pull-right'])}}
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
            $('#campus_id').select2({
                minimumResultsForSearch: -1,
                placeholder:  'Select Campus',
            });
        })
    </script>
@endsection
