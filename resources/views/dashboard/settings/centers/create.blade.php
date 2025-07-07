@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Center >> Index</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Add centers</h2>

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
                                    <a href="{{route('center.index')}}">
                                        <i class="mdi mdi-18px mdi-view-list"></i>
                                        {{"View centers"}}
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
                        {!! Form::open(['route' => 'center.store','class'=>'create-center','method'=>'POST','role' => 'form']) !!}
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
                                            {!! Form::label('center_name','Center Name*') !!}
                                            {!! Form::text('center_name', old('center_name'), $errors->has('center_name') ? ['placeholder' => 'Center Name','class' => 'form-control is-invalid'] : ['placeholder' => 'Center Name','class' => 'form-control']) !!}
                                            @if($errors->has('center_name'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('center_name')}}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('Center_acronym','Center Acronym*') !!}
                                            {!! Form::text('Center_acronym', old('center_acronym'), $errors->has('center_acronym') ? ['placeholder' => 'Center Acronym','class' => 'form-control is-invalid'] : ['placeholder' => 'Center Acronym','class' => 'form-control']) !!}
                                            @if($errors->has('Center_acronym'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('center_acronym')}}</strong>
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
            $('#institution_id').select2({
                minimumResultsForSearch: -1,
                placeholder:  'Select Institution',
            });
        })
    </script>
@endsection
