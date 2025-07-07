@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Campus >> Edit</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Edit campuses</h2>

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
                                    <a href="{{route('campus.index')}}">
                                        <i class="mdi mdi-18px mdi-view-list"></i>
                                        {{"View campuses"}}
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
                        {!! Form::model($campus, ['method' => 'PATCH','route' => ['campus.update', $campus->id]]) !!}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">

                                            {!! Form::label('institution_id','Select Institution') !!}
                                            {!! Form::select('institution_id', $institutions,null, $errors->has('institution_id') ? ['class' => 'form-control is-invalid','id'=>'institution_id'] : ['class' => 'form-control','id'=>'institution_id']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('campus_name','Campus Name*') !!}
                                            {!! Form::text('campus_name', old('campus_name'), $errors->has('campus_name') ? ['placeholder' => 'Campus Name','class' => 'form-control is-invalid'] : ['placeholder' => 'Campus Name','class' => 'form-control']) !!}
                                            @if($errors->has('campus_name'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('campus_name')}}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('campus_acronym','Campus Acronym*') !!}
                                            {!! Form::text('campus_acronym', old('campus_acronym'), $errors->has('campus_acronym') ? ['placeholder' => 'Campus Acronym','class' => 'form-control is-invalid'] : ['placeholder' => 'Campus Acronym','class' => 'form-control']) !!}
                                            @if($errors->has('campus_acronym'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('campus_acronym')}}</strong>
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
            $('#institution_id').select2({
                minimumResultsForSearch: -1,
                placeholder:  'Select Institution',
            });
        })
    </script>
@endsection
