@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Accademic Years >> Create</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Add Permissions</h2>

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
                                    <a href="{{route('permissions.index')}}">
                                        <i class="mdi mdi-18px mdi-view-list"></i>
                                        {{"View Permissions"}}
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
                        {!! Form::open(['route' => 'permissions.store','class'=>'create-permission','method'=>'POST','role' => 'form']) !!}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('name','Permission Name*') !!}
                                            {!! Form::text('name', old('name'), $errors->has('name') ? ['placeholder' => 'Permission Name','class' => 'form-control is-invalid'] : ['placeholder' => 'Permission Name','class' => 'form-control']) !!}
                                            @if($errors->has('name'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('name')}}</strong>
                                        </span>
                                            @endif
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
            $('#status').select2({
                minimumResultsForSearch: -1,
                placeholder:  'Select Status',
            });
        })
    </script>
@endsection
