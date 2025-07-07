@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Profile</title>

@endsection


@section('content')
    <div class="row">
        <div class="col-sm-2">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div style="max-width:200px; margin: 0 auto;">

                        <img alt="" src="{{$user->present()->avatar}}" class="avatar">

                    </div>
                    <h4>@lang('auth.login_email')</h4>

                    <p><i class="fa fa-envelope"></i> {{$user->email}}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-9 offset-1">

            <!-- Custom Tabs -->
            <div class="nav-tabs-customx">
                <ul class="nav nav-tabs tabs-bordered" id="tabMenu">
                    <li class=" nav-item"><a class="nav-link active" href="#edit" data-toggle="tab" aria-expanded="false">@lang('auth.edit')</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cpassword" data-toggle="tab" aria-expanded="false">@lang('auth.change_password')</a></li>
                    <li class="nav-item"><a class="nav-link" href="#avatar" data-toggle="tab" aria-expanded="false">@lang('auth.profile_picture')</a></li>

                    <li class="nav-item pull-right"><a href="#settings" class="nav-link text-muted" data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="edit">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue"><i class="fa-fw fa fa-edit nb"></i>@lang('auth.edit_profile')</h2>
                            </div>
                            <p class="introtext">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                </p>

                                <div class="boxpane-content">
                                    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update.details', $user->id]]) !!}

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('username','Username') !!}
                                                {!! Form::text('username', null, array('placeholder' => 'Username','disabled','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('first_name','First Name') !!}
                                                {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('middle_name','Middle Initial') !!}
                                                {!! Form::text('middle_name', null, array('placeholder' => 'Middle Initial','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('last_name','Surname') !!}
                                                {!! Form::text('last_name', null, array('placeholder' => 'Surname','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('gender','Gender') !!}
                                                {!! Form::select('gender',['M'=>'Male','F'=>'Female'], null, array('placeholder' => 'Select Gender','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('email','Email') !!}
                                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 pull-right">
                                            <div class="form-group">

                                                {!! Form::submit('Update',array('class' => 'btn btn-sm btn-primary')) !!}
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
                                {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update.password', $user->id]]) !!}

                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('current-password','Current Password') !!}
                                                {!! Form::password('current-password',array('placeholder' => 'Current Password','class' => 'form-control')) !!}
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
                                        <div class="col-xs-12 col-sm-12 col-md-6 pull-right">
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
                                {!! Form::model($user,['method' => 'PATCH','route' => ['users.update.avatar', $user->id], 'enctype' => 'multipart/form-data',]) !!}
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div style="position: relative;">

                                            <img alt="" src="{{$user->present()->avatar}}"
                                                 class="profile-image img-thumbnail">
                                            <a href="#" class="btn btn-danger btn-xs po"
                                               style="position: absolute; top: 0;" title="@lang('delete_avatar')"
                                               data-content="<p>@lang('app.r_u_sure')</p><a class='btn btn-block btn-danger po-delete' href='{{route('users.destroy',$user->id)}}'>@lang('app.i_m_sure')</a> <button class='btn btn-block po-close'>@lang('no')</button>"
                                               data-html="true" rel="popover"><i class="fa fa-trash-o"></i></a><br>
                                            <br>

                                        </div>
                                    </div>
                                    <div class="col-sm-6 offset-1">
                                      <div class="form-group">
                                          {!! Form::label('avatar', trans('app.avatar')) !!}
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


