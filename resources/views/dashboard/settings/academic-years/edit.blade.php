@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Accademic Years >> Create</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Edit Academic Years</h2>

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
                                    <a href="{{route('academic-years.index')}}">
                                        <i class="mdi mdi-18px mdi-view-list"></i>
                                        {{"View Academic Years"}}
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

                        {!! Form::model($ac_year, ['method' => 'PATCH','route' => ['academic-years.update', $ac_year->id]]) !!}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('year','Academic NaYearme*') !!}
                                            {!! Form::text('year', old('year'), $errors->has('year') ? ['placeholder' => 'Academic Year','class' => 'form-control is-invalid'] : ['placeholder' => 'Academic Year','class' => 'form-control']) !!}
                                            @if($errors->has('year'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('year')}}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">

                                            {!! Form::label('status','Select Status') !!}
                                            {!! Form::select('status', $status,null, $errors->has('status') ? ['class' => 'form-control is-invalid','id'=>'status'] : ['class' => 'form-control','id'=>'status']) !!}
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
            $('#status').select2({
                minimumResultsForSearch: -1,
                placeholder:  'Select Status',
            });
        })
    </script>
@endsection
