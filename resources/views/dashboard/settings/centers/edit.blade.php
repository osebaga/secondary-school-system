@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Center >> Edit</title>

@endsection

@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Edit center</h2>

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
                        {!! Form::model($center, ['method' => 'PATCH','route' => ['center.update', $center->id]]) !!}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">

                                            {!! Form::label('campus_id','Select campus') !!}
                                            {!! Form::select('campus_id', $campus,null, $errors->has('campus_id') ? ['class' => 'form-control is-invalid','id'=>'campus_id'] : ['class' => 'form-control','id'=>'campus_id']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('Center_name','Center Name*') !!}
                                            {!! Form::text('Center_name', old('Center_name'), $errors->has('Center_name') ? ['placeholder' => 'Center Name','class' => 'form-control is-invalid'] : ['placeholder' => 'Center Name','class' => 'form-control']) !!}
                                            @if($errors->has('Center_name'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('Center_name')}}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('Center_acronym','Center Acronym*') !!}
                                            {!! Form::text('Center_acronym', old('Center_acronym'), $errors->has('Center_acronym') ? ['placeholder' => 'Center Acronym','class' => 'form-control is-invalid'] : ['placeholder' => 'Center Acronym','class' => 'form-control']) !!}
                                            @if($errors->has('Center_acronym'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('Center_acronym')}}</strong>
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
                placeholder:  'Select campus',
            });
        })
    </script>
@endsection
