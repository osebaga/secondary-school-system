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
                    <li class=" nav-item"><a class="nav-link active" href="#details" data-toggle="tab"
                                             aria-expanded="false">@lang('auth.details')</a></li>
                    <li class=" nav-item"><a class="nav-link" href="#edit" data-toggle="tab"
                                             aria-expanded="false">@lang('auth.edit')</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cpassword" data-toggle="tab"
                                            aria-expanded="false">@lang('auth.change_password')</a></li>
                    <li class="nav-item"><a class="nav-link" href="#avatar" data-toggle="tab"
                                            aria-expanded="false">@lang('auth.profile_picture')</a></li>

                    <li class="nav-item pull-right"><a href="#settings" class="nav-link text-muted" data-toggle="tab"
                                                       aria-expanded="false"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="details">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue"><i class="fa-fw fa fa-info nb"></i>@lang('auth.student_details')</h2>
                            </div>
                            <div class="boxpane-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table-hover table-bordered table-striped" style="width: 100%">
                                                <tbody>
                                                <tr>
                                                    <th>First Name:</th>
                                                    <td>{{$student->user->first_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Middle Name:</th>
                                                    <td>{{$student->user->middle_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Surname:</th>
                                                    <td>{{$student->user->last_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gender:</th>
                                                    <td>{{$student->user->gender}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Registration No:</th>
                                                    <td>{{$student->reg_no}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Program Name:</th>
                                                    <td>{{$student->program->program_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Program Type:</th>
                                                    <td>{{$student->program->program_type}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Year Of Study:</th>
                                                    <td>{!! SRS::year_level($student->year_of_study)!!} </td>
                                                </tr>
                                                <tr>
                                                    <th>Faculty:</th>
                                                    <td>{{$student->program->faculty->faculty_name}} </td>
                                                </tr>

                                                <tr>
                                                    <th>Campus:</th>
                                                    <td>{{$student->campus->campus_name}} </td>
                                                </tr>
                                                <tr>
                                                    <th>Date of Birth</th>
                                                    <td>{{$student->dob}} </td>
                                                </tr>
                                                <tr>
                                                    <th>Status:</th>
                                                    <td>{{$student->status}} </td>
                                                </tr>
                                                <tr>
                                                    <th>Registration Status:</th>
                                                    <td>{{SRS::registration_status($student->reg_status)}} </td>
                                                </tr>
                                                <tr>
                                                    <th>Admission Date:</th>
                                                    <td>{{$student->admission_date ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile Number:</th>
                                                    <td>{{$student->mobile_no}} </td>
                                                </tr>
                                                <tr>
                                                    <th>Email Address:</th>
                                                    <td>{{$student->email_address}} </td>
                                                </tr>
                                                <tr>
                                                    <th>Citizenship:</th>
                                                    <td>{{$student->citizenship ?? 'Tanzanian'}} </td>
                                                </tr>
                                                <tr>
                                                    <th>Sponsorship:</th>
                                                    <td> {{$student->sponsorship}}</td>
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
                                {!! Form::model($student, ['method' => 'PATCH','route' => ['students.update.details', SRS::encode($student->user->id)]]) !!}

                                <div class="row">
                                <!--<div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('form4_index_no','Form Four Index No') !!}
                                {!! Form::text('form4_index_no', null, array('placeholder' => 'Form Four Index No','class' => 'form-control')) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                 {!! Form::label('form6_index_no','Form Six Index No') !!}
                                {!! Form::text('form6_index_no', null, array('placeholder' => 'Form Six Index No','class' => 'form-control')) !!}
                                    </div>
                                </div>-->

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('gender','Gender') !!}
                                            {!! Form::select('gender',['M'=>'Male','F'=>'Female'], $student->user->gender, array('id'=>'gender','placeholder' => 'Select Gender','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('dob','Date Of Birth') !!}
                                            {!! Form::date('dob', null, array('placeholder' => 'Date Of Birth','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('dob_place','Place of Birth') !!}
                                            {!! Form::text('dob_place', null, array('placeholder' => 'Place of Birth','class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('mobile_no','Mobile Number') !!}
                                            {!! Form::text('mobile_no', null, array('placeholder' => 'Mobile Number','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('mailing_address','Mailing Address (Postal)') !!}
                                            {!! Form::text('mailing_address', null, array('placeholder' => 'Mailing Address (Postal)','class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('next_of_kin_mobile','Next of Kin Address (mobile number)') !!}
                                            {!! Form::text('next_of_kin_mobile', null, array('placeholder' => 'Next of Kin Address (mobile number)','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('email_address','Email') !!}
                                            {!! Form::text('email_address', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('citizenship','Select Citizenship') !!}
                                            {!! Form::select('citizenship',$countries, null, array('id'=>'citizenship','placeholder' => 'Select Citizenship','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('sponsorship','Select Sponsorship') !!}
                                            {!! Form::select('sponsorship',['HESLB'=>'HESLB','PRIVATE'=>'PRIVATE','OTHERS'=>'OTHERS'], null, array('id'=>'sponsorship','placeholder' => 'Select Sponsorship','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('account_no','Account Number') !!}
                                            {!! Form::text('account_no', null, array('placeholder' => 'Account Number','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('bank_name','Bank Name') !!}
                                            {!! Form::text('bank_name', null, array('placeholder' => 'Bank Name','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('is_disabled','Physical Challenges') !!}
                                            {!! Form::select('is_disabled',['1'=>'Disabled','0'=>'Non Disabled'], null, array('id'=>'is_disabled','placeholder' => 'Select Physical Challenges','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('entry_qualification','Entry Qualification') !!}
                                            {!! Form::select('entry_qualification',['Direct Entry'=>'Direct Entry','Equivalent Entry'=>'Equivalent Entry'], null, array('id'=>'entry_qualification','placeholder' => 'Select Entry Qualification','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 float-right">
                                        <div class="form-group">

                                            {!! Form::submit('Update',array('class' => 'btn btn-lg btn-primary pull-right')) !!}
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
                                {!! Form::model($student->user, ['method' => 'PATCH','route' => ['students.update.password', SRS::encode($student->user->id)]]) !!}

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
                                {!! Form::model($student->user,['method' => 'PATCH','route' => ['students.update.avatar', SRS::encode($student->user->id)], 'enctype' => 'multipart/form-data',]) !!}
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div style="position: relative;">

                                            <img alt="" src="{{$student->user->present()->avatar ?? ''}}"
                                                 class="profile-image img-thumbnail">
                                            {{--                                            <a href="#" class="btn btn-danger btn-xs po"--}}
                                            {{--                                               style="position: absolute; top: 0;" title="@lang('delete_avatar')"--}}
                                            {{--                                               data-content="<p>@lang('app.r_u_sure')</p><a class='btn btn-block btn-danger po-delete' href='{{route('students.destroy',$student->user->id)}}'>@lang('app.i_m_sure')</a> <button class='btn btn-block po-close'>@lang('no')</button>"--}}
                                            {{--                                               data-html="true" rel="popover"><i class="fa fa-trash-o"></i></a>--}}
                                            <br>
                                            <br>

                                        </div>
                                    </div>
                                    <div class="col-sm-6 offset-1">
                                        <div class="form-group">
                                            {!! Form::label('avatar', trans('auth.avatar')) !!}
                                            {!! Form::file('avatar', array('id'=>'avatar','class' => 'form-control file','data-show-upload'=>"false", 'data-show-preview'=>"true", 'accept'=>"image/*")) !!}
                                        </div>
                                        <div class="form-group pull-right">
                                            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control pull-right']) !!}
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

                        <img alt="" src="{{$student->user->present()->avatar ?? ''}}" class="avatar">

                    </div>
                    <h4>@lang('auth.login_username')</h4>

                    <p><i class="fa fa-envelope"></i> {{$student->reg_no}}</p>
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
        $('#citizenship').select2({})
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
