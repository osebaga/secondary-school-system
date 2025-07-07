@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Edit Students</title>

@endsection


@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Edit Students-<b class="black">{{$student->user->last_name.', '.$student->user->first_name.' '.$student->user->middle_name.'('.$student->reg_no.')'}}</b>
                    </h2>
                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">
                                Here below is the list of information of the student to be edited,please you can edit
                                the information,then click the button save to save changes or cancel to go back.
                            </p>
                            <fieldset class="customLegend row">
                                <legend>
                                    <h2 class="blue pb-0 mb-0">Basic Information</h2>
                                </legend>
                                {!! Form::model($student, ['method' => 'PATCH','route' => ['admissions.update-student.details', SRS::encode($student->user->id)]]) !!}

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
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
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('gender','Gender') !!}
                                            {!! Form::select('gender',['M'=>'Male','F'=>'Female'], $student->user->gender, array('id'=>'gender','placeholder' => 'Select Gender','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('dob','Date Of Birth') !!}
                                            {!! Form::text('dob', null, array('placeholder' => 'Date Of Birth','class' => 'form-control')) !!}
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
                                            {!! Form::select('sponsorship',['Heslb'=>'Heslb','Private'=>'Private','Other'=>'Other'], null, array('id'=>'sponsorship','placeholder' => 'Select Sponsorship','class' => 'form-control')) !!}
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
                                            {!! html_entity_decode(link_to(route('admissions.student-info',[SRS::encode($student->user_id),SRS::encode($student->campus_id)]),'<span class="btn btn-lg btn-warning float-right p-2"><i class="fa fa-long-arrow-left " aria-hidden="true"></i>Cancel</span>')) !!}
                                            {!! Form::submit('Update',array('class' => 'btn btn-lg btn-primary float-right')) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </fieldset>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-2  offset-1">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div style="max-width:200px; margin: 0 auto;">

                        <img alt="" src="{{$student->user->present()->avatar}}" class="avatar">

                    </div>
                    <h4>@lang('auth.login_username')</h4>

                    <p><i class="fa fa-envelope"></i> {{$student->reg_no}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
