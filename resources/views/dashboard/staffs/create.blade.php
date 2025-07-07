@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Create</title>

@endsection


@section('content')
    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue"><i class="fa fa-user-plus"></i> Create New Staff</h2>
                <div class="boxpane-icon">
                    <h2 class="blue"><i class="fa fa-book" aria-hidden="true"></i><a href="{{route('staffs.register')}}"></a> </h2>
                </div>
            </div>
            <div class="boxpane-content">

                {!! Form::open(array('route' => 'staffs.store','method'=>'POST')) !!}
                <div class="row">
                    <div class="col-md-6">
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
                                   {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
                               </div>
                           </div>
                           <div class="col-xs-12 col-sm-6 col-md-6">
                               <div class="form-group">
                                   {!! Form::label('first_name','FirstName') !!}
                                   {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                               </div>
                           </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                {!! Form::label('middle_name','MiddleName') !!}
                                {!! Form::text('middle_name', null, array('placeholder' => 'Middle Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong></strong>
                                {!! Form::label('last_name','Last Name:') !!}
                                {!! Form::text('last_name', null, array('placeholder' => 'Surname','class' => 'form-control')) !!}
                            </div>
                        </div>
                           <div class="col-xs-12 col-sm-6 col-md-6">
                               <div class="form-group">
                                   {!! Form::label('email','Email:') !!}
                                   {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
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
                                   {!! Form::select('gender',['M'=>'Male','F'=>'Female'], null, array('id'=>'gender','placeholder' => 'Select Gender','class' => 'form-control')) !!}
                               </div>
                           </div>


                       </div>


                    </fieldset>
                </div>
                    <div class="col-md-5 offset-md-1">
                        <fieldset class="customLegend row">
                            <legend>
                                <h2 class="blue pb-0 mb-0">Basic Authentication</h2>
                            </legend>
                            <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Password:</strong>
                                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Confirm Password:</strong>
                                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                </div>
                            </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                    </div>
                                </div>

                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <fieldset class="customLegend row">
                            <legend>
                                <h2 class="blue pb-0 mb-0">Other Information</h2>
                            </legend>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('office_phone_number','Office Phone Number:') !!}
                                        {!! Form::text('office_phone_number', null, array('placeholder' => 'Office Phone Number','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('office_room_number','Office Room Number:') !!}
                                        {!! Form::text('office_room_number', null, array('placeholder' => 'Office Room Number','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('building_id','Select Office Location') !!}
                                        {!! Form::select('building_id', $buildings,null, $errors->has('building_id') ? ['class' => 'form-control is-invalid','id'=>'building_id'] : ['class' => 'form-control','id'=>'building_id']) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        {!! Form::label('department_id','Select Department') !!}
                                        {!! Form::select('department_id', $departments,null, $errors->has('department_id') ? ['class' => 'form-control is-invalid','id'=>'department_id'] : ['class' => 'form-control','id'=>'department_id']) !!}
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">

                                        {!! Form::label('campus_id','Select Campus') !!}
                                        {!! Form::select('campus_id', $campuses,null, $errors->has('campus_id') ? ['class' => 'form-control is-invalid','id'=>'campus_id'] : ['class' => 'form-control','id'=>'campus_id']) !!}
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">

                                        {!! Form::label('position_id','Select Position') !!}
                                        {!! Form::select('position_id', $positions,null, $errors->has('position_id') ? ['class' => 'form-control is-invalid','id'=>'position_id'] : ['class' => 'form-control','id'=>'position_id']) !!}
                                    </div>
                                </div>


                            </div>

                        </fieldset>
                    </div>

                    <div class="col-md-12 mt-1">
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#department_id').select2({
                //minimumResultsForSearch: -1,
                placeholder:  'Select Department',
            });
            $('#gender').select2({
                minimumResultsForSearch: -1,
            })
            $('#salutation').select2({
                //minimumResultsForSearch: -1,
                placeholder:  'Select Salutation',
            });
            $('#position_id').select2({
                //minimumResultsForSearch: -1,
                placeholder:  'Select Position',
            });
            $('#building_id').select2({
                //minimumResultsForSearch: -1,
                placeholder:  'Select Office Location',
            });
            $('#campus_id').select2({
                //minimumResultsForSearch: -1,
                placeholder:  'Select Campus',
            });
        });

    </script>
@endsection
