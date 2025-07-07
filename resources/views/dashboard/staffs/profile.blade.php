@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Profile</title>

@endsection


@section('content')
    <div class="row">

        <div class="col-sm-9">

            <!-- Custom Tabs -->
            <div class="nav-tabs-customx">
                <ul class="nav nav-tabs tabs-bordered" id="tabMenu">
                    <li class=" nav-item"><a class="nav-link active" href="#details" data-toggle="tab" aria-expanded="false">@lang('auth.details')</a></li>
                    <li class=" nav-item"><a class="nav-link" href="#edit" data-toggle="tab" aria-expanded="false">@lang('auth.edit')</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cpassword" data-toggle="tab" aria-expanded="false">@lang('auth.change_password')</a></li>
                    <li class="nav-item"><a class="nav-link" href="#avatar" data-toggle="tab" aria-expanded="false">@lang('auth.profile_picture')</a></li>

                    {{-- <li class="nav-item pull-right"><a href="#settings" class="nav-link text-muted" data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i></a></li> --}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="details">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue"><i class="fa-fw fa fa-info nb"></i>@lang('staff details')</h2>
                            </div>
                            <div class="boxpane-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                        <table class="table-hover table-bordered table-striped" style="width: 100%">
                                            <tbody>
                                            <tr>
                                                <th>First Name:</th>
                                                <td>{{$staff->user->first_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Middle Name:</th>
                                                <td>{{$staff->user->middle_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Surname:</th>
                                                <td>{{$staff->user->last_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Gender:</th>
                                                <td>{{$staff->user->gender}}</td>
                                            </tr>

                                            <tr>
                                                <th>Department:</th>
                                                <td>{{$staff->department->department_name ?? ''}} </td>
                                            </tr>
                                            <tr>
                                                <th>faculty/School: </th>
                                                <td>{{$staff->department->faculty->faculty_name ?? ''}} </td>
                                            </tr>
                                            <tr>
                                                <th>College: </th>
                                                <td>{{$staff->department->faculty->college->college_name ?? ''}} </td>
                                            </tr>
                                            <tr>
                                                <th>Date of Birth</th>
                                                <td>{{SRS::formatDob($staff->dob)}} </td>
                                            </tr>

                                            <tr>
                                                <th>Mobile Number: </th>
                                                <td>{{$staff->mobile_no}} </td>
                                            </tr>
                                            <tr>
                                                <th>Email Address: </th>
                                                <td>{{$staff->email_address}} </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="edit">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue"><i class="fa-fw fa fa-edit nb"></i>@lang('auth.edit_profile')</h2>
                            </div>

                                <div class="boxpane-content">
                                    {!! Form::model($staff, ['method' => 'PATCH','route' => ['staffs.update.details', SRS::encode($staff->user->id)]]) !!}

                                    <div class="row">
                                        <fieldset class="customLegend row">
                                            <legend>
                                                <h2 class="blue pb-0 mb-0">Basic Information</h2>
                                            </legend>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="form-group">

                                                        {!! Form::label('salutation','Select Salutation') !!}
                                                        {!! Form::select('salutation', $salutations,null, $errors->has('salutation') ? ['class' => 'form-control is-invalid','id'=>'salutation'] : ['class' => 'form-control','id'=>'salutation']) !!}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="form-group">

                                                        {!! Form::label('username','Username/Identity:') !!}
                                                        {!! Form::text('username', $staff->user->username, array('placeholder' => 'Username','class' => 'form-control')) !!}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('first_name','FirstName') !!}
                                                        {!! Form::text('first_name', $staff->user->first_name, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('middle_name','MiddleName') !!}
                                                        {!! Form::text('middle_name', $staff->user->middle_name, array('placeholder' => 'Middle Name','class' => 'form-control')) !!}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        {!! Form::label('last_name','Surname:') !!}
                                                        {!! Form::text('last_name', $staff->user->last_name, array('placeholder' => 'Surname','class' => 'form-control')) !!}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('email','Email:') !!}
                                                        {!! Form::text('email',$staff->user->email, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('mobile_number','Mobile Number:') !!}
                                                        {!! Form::text('mobile_number', null, array('placeholder' => 'Mobile Number','class' => 'form-control')) !!}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('gender','Gender') !!}
                                                        {!! Form::select('gender',['M'=>'Male','F'=>'Female'], $staff->user->gender, array('id'=>'gender','placeholder' => 'Select Gender','class' => 'form-control')) !!}
                                                    </div>
                                                </div>


                                            </div>


                                        </fieldset>
                                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                                            <div class="form-group pull-right">

                                                {!! Form::submit('Update',array('class' => 'btn btn-lg btn-warning')) !!}
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="cpassword">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue"><i class="fa-fw fa fa-key nb"></i>@lang('auth.change_password')</h2>
                            </div>
                            <div class="boxpane-content">
                                {!! Form::model($staff->user, ['method' => 'PATCH','route' => ['staffs.update.password', SRS::encode($staff->user->id)]]) !!}

                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('current-password','Old Password') !!}
                                                {!! Form::password('current-password',array('placeholder' => 'Old Password','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('new-password','New Password') !!}
                                                {!! Form::password('new-password',array('placeholder' => 'New Password','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('new-password-confirm','New Password Confirm') !!}
                                                {!! Form::password('new-password-confirm',array('placeholder' => 'New Password Confirm','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 float-right">
                                            <div class="form-group">

                                                {!! Form::submit('Update',array('class' => 'btn btn-sm btn-primary')) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="avatar">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue"><i
                                            class="fa-fw fa fa-file-picture-o nb"></i>@lang('auth.change_avatar')
                                </h2>
                            </div>
                            <div class="boxpane-content">
                                {!! Form::model($staff->user,['method' => 'PATCH','route' => ['staffs.update.avatar', SRS::encode($staff->user->id)], 'enctype' => 'multipart/form-data',]) !!}
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div style="position: relative;">
                                             
                                            <img alt="" src="{{$staff->user->present()->avatar}}"
                                                 class="profile-image img-thumbnail">

                                            

                                        </div>
                                    </div>
                                    <div class="col-sm-6 offset-1">
                                        <div class="form-group">
                                            {!! Form::label('avatar', trans('auth.avatar')) !!}
                                            {!! Form::file('avatar', array('id'=>'avatar','class' => 'form-control file','data-show-upload'=>"false", 'data-show-preview'=>"true", 'accept'=>"image/*")) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->


        </div>
        <div class="col-sm-2  offset-1">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div style="max-width:200px; margin: 0 auto;">

                        <img alt="" src="{{$staff->user->present()->avatar}}" class="avatar">

                    </div>
                    <h4>@lang('auth.login_username')</h4>

                    <p><i class="fa fa-envelope"></i> {{$staff->reg_no}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/select')}}/select2.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap')}}/fileinput.min.css"/>

@endsection
@section('scripts')
    <script src="{{asset('assets/js/select')}}/select2.min.js"></script>
    <script src="{{asset('assets/js/bootstrap')}}/fileinput.min.js"></script>

    <script>
        $('#gender').select2({
            minimumResultsForSearch: -1,
        })
        $('#entry_qualification').select2({
            minimumResultsForSearch: -1,
        })
        $('#is_disabled').select2({
            minimumResultsForSearch: -1,
        })
        $('#sponsorship').select2({
            minimumResultsForSearch: -1,
        })
        $('#citizenship').select2({
        })
        $(document).on('ready', function () {
            $("#avatar").fileinput({
                showUpload: false,
                dropZoneEnabled: false,
                mainClass: "input-group-lg"
            });
        });

        $(document).ready(function () {
            $('#tabMenu a[href="#{{old('tab')}}"]').tab('show')
        });

    </script>
@endsection


