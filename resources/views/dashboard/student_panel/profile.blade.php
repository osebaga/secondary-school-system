@extends('layouts.dashboard')


@section('title-content')
    <title>{{ config('app.name') }} | Profile</title>
@endsection


@section('content')
    <div class="row">

        <div class="col-sm-12">

            <!-- Custom Tabs -->
            <div class="nav-tabs-customx">
                <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm pull-right">Back</a>
                <ul class="nav nav-tabs tabs-bordered" id="tabMenu">
                    <li class=" nav-item"><a class="nav-link active" href="#details" data-toggle="tab"
                            aria-expanded="false">@lang('student-profile')</a></li>

                    <li class="nav-item"><a class="nav-link" href="#cpassword" data-toggle="tab"
                            aria-expanded="false">@lang('auth.change_password')</a></li>

                    {{-- <li class=" nav-item"><a class="nav-link" href="#edit" data-toggle="tab" 
                                             aria-expanded="false">@lang('auth.edit')</a></li>
 9@ 
     
                   

                    <li class="nav-item"><a class="nav-link" href="#avatar" data-toggle="tab"
                                            aria-expanded="false">@lang('auth.profile_picture')</a></li>

                    <li class="nav-item pull-right"><a href="#settings" class="nav-link text-muted" data-toggle="tab"
                                                       aria-expanded="false"><i class="fa fa-gear"></i></a></li> --}}

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="details">
                        <!--start -->

                        <div class="content">
                            <div class="boxpane">
                                <div class="boxpane-header">
                                    <h2 class="blue">
                                        Student profile
                                    </h2>
                                </div>
                                <div class="boxpane-content">
                                    <div class="row">

                                        <div class="col-lg-5">
                                            <div class="row">
                                                <div class="col-12 m-1">
                                                    <div class="card-box">
                                                        <div class="text-center">

                                                            <img src="{{ $std->user->present()->avatar ?? '' }}"
                                                                alt="logo" class="thumb-lgx rounded-circle mb-3">
                                                            <p class="text-muted  font-14">
                                                                <a href="#"
                                                                    data-url="{{ route('admissions.modal.update.avatar', SRS::encode($std->user->id ?? '')) }}"
                                                                    class="btn btn-sm btn-outline-success p-1 m-1"
                                                                    id="resource-student-photo-edit-button"> <i
                                                                        class="fa fa-pencil"></i> Change Photo</a>
                                                            </p>
                                                        </div>


                                                        <table id="basicInfo"
                                                            class="table table-bordered table-hover table-striped  dt-responsive">
                                                            <a class="m-1" href="#"
                                                                data-url="{{ route('admissions.modal.update.studentinfo', SRS::encode($std->id)) }}"
                                                                id="resource-studentinfo-button"> <i
                                                                    class="fa fa-edit p-2"></i>Update Student Info</a>
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Name:</td>
                                                                    <td><strong>{{ $std->user->last_name . ', ' . $std->user->first_name . ' ' . $std->user->middle_name }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Form Four Index No:</td>
                                                                    <td><strong>{{ $std->form4_index_no ?? '' }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Form Six Index No</td>
                                                                    <td><strong>{{ $std->form6_index_no ?? '' }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Gender:</td>
                                                                    <td><strong>{{ $std->user->gender ?? '' }}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    {{--                                <td>Birth Date:</td><td>{{SRS::formatDob($std->dob)}}</td> --}}
                                                                    <td>Birth Date:</td>
                                                                    <td><strong>{{ $std->dob ?? '' }}</strong></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Admission Date:</td>
                                                                    <td><strong>{{ $std->admission_date ?? '' }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Academic Program:</td>
                                                                    <td><strong>{{ $std->program->program_name . '(' . $std->program_acronym . ')' }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Registration number:</td>
                                                                    <td><strong>{{ $std->reg_no }}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Room Allocation:</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nationality:</td>
                                                                    <td><strong>{{ $std->citizenship ?? 'Tanzanian' }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Registration Status:</td>
                                                                    <td>
                                                                        @if ($std->dvs == 1 || $std->dvs == 2)
                                                                            <strong>Registered</strong>
                                                                        @else
                                                                            <strong>Registered</strong>
                                                                            {{-- {{ $std->status }} --}}
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                    </div>
                                                </div>
                                                <div class="col-12 m-1">
                                                    <div class="boxpane">
                                                        <div class="boxpane-header">
                                                            <h2 class="blue"><i class="fa-fw fa fa-tasks"></i>
                                                                STUDY PROGRAMME INFORMATION
                                                            </h2>

                                                            <div class="boxpane-icon">


                                                                <a href="#"
                                                                    data-url="{{ route('admissions.modal.update.study-program', SRS::encode($std->id)) }}"
                                                                    id="resource-student-program-info-edit-button"> <i
                                                                        class="fa fa-edit p-2 m-1"></i> Update</a>


                                                            </div>
                                                        </div>
                                                        <div class="boxpane-content">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <table class="table table-responsive">
                                                                        <tbody>
                                                                            <tr>
                                                                                <!--
                                                                                <td>Admission No</td>
                                                                                <td>{{ $std->admission_no }}</td>
                                                                                -->
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Registration No:</td>
                                                                                <td>{{ $std->reg_no }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Year of Admission:</td>
                                                                                <td>{{ $std->admission_year }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Program Registered:</td>
                                                                                <td>{{ $std->program->program_name . '( ' . $std->program->program_code . ' )' }}
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td>Graduation Date:</td>
                                                                                <td>{{ $std->graduation_year }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Manner of Entry:</td>
                                                                                <td>{{ $std->mannerOfEntry->manner_of_entry ?? '' }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Year of Study:</td>
                                                                                <td>{!! SRS::year_level($std->year_of_study) !!}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Campus:</td>
                                                                                <td>{{ $std->campus->campus_name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Intake Category:</td>
                                                                                <td>{{ $std->intake_category->name }}</td>
                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>


                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>


                                            </div>


                                        </div>

                                        <div class="col-lg-7">
                                            <div class="row">

                                                <div class="col-12 m-3">
                                                    <div class="boxpane">
                                                        <div class="boxpane-header">
                                                            <h2 class="blue"><i class="fa-fw fa fa-phone-square"></i>
                                                                CONTACT INFORMATION
                                                            </h2>

                                                            <div class="boxpane-icon">

                                                                <a class="m-1" href="#"
                                                                    data-url="{{ route('admissions.modal.update.contact-info', SRS::encode($std->id)) }}"
                                                                    id="resource-student-contact-info-edit-button"> <i
                                                                        class="fa fa-edit p-2"></i>Update</a>


                                                            </div>
                                                        </div>
                                                        <div class="boxpane-content">
                                                            <div class="row">
                                                                <div class="col-12">

                                                                    <table class="table table-responsive table-bordered">
                                                                        <tbody>
                                                                            @if (!is_null($std->contact))
                                                                                <tr>
                                                                                    <td>Address: </td>
                                                                                    <td>{{ $std->contact->address }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Phone: </td>
                                                                                    <td>{{ $std->contact->phone1 }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Email: </td>
                                                                                    <td>{{ $std->contact->email1 }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Region : </td>
                                                                                    <td>{{ $std->contact->region }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>District : </td>
                                                                                    <td>{{ $std->contact->district }}</td>
                                                                                </tr>
                                                                            @else
                                                                                <div
                                                                                    class="alert alert-warning alert-dismissable">

                                                                                    <strong>Info!</strong> No Contact Found!
                                                                                </div>
                                                                            @endif

                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-12 m-3">
                                                    <div class="boxpane">
                                                        <div class="boxpane-header">
                                                            <h2 class="blue"><i class="fa-fw fa fa-graduation-cap"></i>
                                                                EDUCATION HISTORY
                                                            </h2>

                                                            <div class="boxpane-icon">

                                                                <a class="m-1" href="#"
                                                                    data-url="{{ route('admissions.modal.add.edu-history', SRS::encode($std->id)) }}"
                                                                    id="resource-student-edu-history-edit-button"> <i
                                                                        class="fa fa-plus-square-o p-2"></i>Add</a>

                                                            </div>
                                                        </div>
                                                        <div class="boxpane-content">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table table-responsive table-bordered">
                                                                        <tbody>
                                                                            @forelse($std->educationHistories as $edu)
                                                                                <tr>

                                                                                    <td>{{ $edu->level }}</td>
                                                                                    <td>{{ $edu->index_no }}</td>
                                                                                    <td>{{ $edu->start_year }} -
                                                                                        {{ $edu->end_year }}</td>
                                                                                    <td>{{ $edu->grade }}</td>
                                                                                    <td>{{ $edu->institution_name }}</td>
                                                                                </tr>

                                                                            @empty
                                                                                <div
                                                                                    class="alert alert-warning alert-dismissable">

                                                                                    <strong>Info!</strong> No Education
                                                                                    History Found!
                                                                                </div>
                                                                            @endforelse

                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12 m-3">
                                                    <div class="boxpane">
                                                        <div class="boxpane-header">
                                                            <h2 class="blue"><i class="fa-fw fa fa-git-square"></i>
                                                                SPONSOR
                                                            </h2>

                                                            <div class="boxpane-icon">

                                                                <a class="m-1" href="#"
                                                                    data-url="{{ route('admissions.modal.add.sponsor', SRS::encode($std->id)) }}"
                                                                    id="resource-studentsponsor-button"> <i
                                                                        class="fa fa-plus-square-o p-2"></i>Add</a>



                                                            </div>
                                                        </div>
                                                        <div class="boxpane-content">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table table-responsive table-bordered">
                                                                        <tbody>
                                                                            @forelse($std->sponsors as $std_sponsor)
                                                                                <tr>

                                                                                    <td>{{ $std_sponsor->sponsor->sponsor_name }}
                                                                                    </td>
                                                                                    <td>{{ $std_sponsor->sponsor->address }}
                                                                                    </td>
                                                                                    <td>{{ $std_sponsor->name }}</td>
                                                                                    <td>{{ $std_sponsor->phone }}</td>
                                                                                </tr>

                                                                            @empty
                                                                                <div
                                                                                    class="alert alert-warning alert-dismissable">

                                                                                    <strong>Info!</strong> No Sponsor Found!
                                                                                </div>
                                                                            @endforelse

                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-12 m-3">
                                                <div class="boxpane">
                                                    <div class="boxpane-header">
                                                        <h2 class="blue"><i class="fa-fw fa fa-money"></i>
                                                            PAYMENTS
                                                        </h2>
                
                                                        <div class="boxpane-icon">
                
                                                            <a href="{{route('staffs.create')}}">
                                                                <i class="fa fa-eye p-2 m-1"> Preview</i>
                                                            </a>
                
                                                        </div>
                                                    </div>
                                                    <div class="boxpane-content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table class="table table-responsive">
                                                                    <tbody>
                                                                    @forelse($std->payments as $payment)
                                                                        <tr>
                
                                                                            <td>{{ $payment->paymentType->name}}</td>
                                                                            <td>{{ $payment->year_of_study}}</td>
                                                                            <td>{{ $payment->semester}}
                                                                            <td>{{ $contact->amount}}</td>
                                                                            <td>{{ $contact->date_paid}}</td>
                                                                        </tr>
                
                                                                    @empty
                                                                        <div class="alert alert-warning alert-dismissable">
                
                                                                            <strong>Info!</strong> No Payment Found!
                                                                        </div>
                                                                    @endforelse
                
                                                                    </tbody>
                                                                </table>
                                                            </div>
                
                                                        </div>
                                                    </div>
                
                                                </div>
                                            </div> --}}
                                                <div class="col-12 m-3">
                                                    <div class="boxpane">
                                                        <div class="boxpane-header">
                                                            <h2 class="blue"><i class="fa-fw fa fa-bank"></i>
                                                                BANK INFORMATION
                                                            </h2>

                                                            <div class="boxpane-icon">

                                                                <a class="m-1" href="#"
                                                                    data-url="{{ route('admissions.modal.add.bank-info', SRS::encode($std->id)) }}"
                                                                    id="resource-student-bank-info-edit-button"> <i
                                                                        class="fa fa-plus-square-o p-2"></i>Add</a>



                                                            </div>
                                                        </div>
                                                        <div class="boxpane-content">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table table-responsive">
                                                                        <tbody>
                                                                            @forelse($std->banks as $bank)
                                                                                <tr>

                                                                                    <td>{{ $bank->bank_name }}</td>
                                                                                    <td>{{ $bank->account_number }}</td>
                                                                                    <td>{{ $bank->status }}</td>
                                                                                </tr>

                                                                            @empty
                                                                                <div
                                                                                    class="alert alert-warning alert-dismissable">

                                                                                    <strong>Info!</strong> No Bank Info.
                                                                                    Found!
                                                                                </div>
                                                                            @endforelse

                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-12 m-3">
                                                    <div class="boxpane">
                                                        <div class="boxpane-header">
                                                            <h2 class="blue"><i class="fa-fw fa fa-users"></i>
                                                                DEPENDANT
                                                            </h2>

                                                            <div class="boxpane-icon">

                                                                <a class="m-1" href="#"
                                                                    data-url="{{ route('admissions.modal.add.dependant', SRS::encode($std->id)) }}"
                                                                    id="resource-student-dependant-edit-button"> <i
                                                                        class="fa fa-plus-square-o p-2"></i>Add</a>



                                                            </div>
                                                        </div>
                                                        <div class="boxpane-content">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table table-responsive">
                                                                        <tbody>
                                                                            @forelse($std->dependants as $dependant)
                                                                                <tr>

                                                                                    <td>{{ $dependant->name }}</td>
                                                                                    <td>{{ $dependant->gender }}</td>
                                                                                    <td>{{ $dependant->relationship }}</td>
                                                                                    <td>{{ $dependant->phone1 }}</td>
                                                                                    <td>{{ $dependant->address }}</td>
                                                                                    <td>{{ $dependant->job }}</td>
                                                                                    <td>{{ $dependant->email }}</td>
                                                                                </tr>

                                                                            @empty
                                                                                <div
                                                                                    class="alert alert-warning alert-dismissable">

                                                                                    <strong>Info!</strong> No Dependent
                                                                                    Found!
                                                                                </div>
                                                                            @endforelse

                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12 m-3">
                                                    <div class="boxpane">
                                                        <div class="boxpane-header">
                                                            <h2 class="blue"><i class="fa-fw fa fa-user-circle-o"></i>
                                                                NEXT OF KIN
                                                            </h2>

                                                            <div class="boxpane-icon">
                                                                <a class="m-1" href="#"
                                                                    data-url="{{ route('admissions.modal.add.next-of-kin', SRS::encode($std->id)) }}"
                                                                    id="resource-student-next-of-kin-edit-button"> <i
                                                                        class="fa fa-plus-square-o p-2"></i>Add</a>



                                                            </div>
                                                        </div>
                                                        <div class="boxpane-content">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table table-responsive">
                                                                        <tbody>
                                                                            @forelse($std->nextOfKins as $kin)
                                                                                <tr>

                                                                                    <td>{{ $kin->name }}</td>
                                                                                    <td>{{ $kin->gender }}</td>
                                                                                    <td>{{ $kin->relationship }}</td>
                                                                                    <td>{{ $kin->address }}</td>
                                                                                    <td>{{ $kin->phone1 }}</td>
                                                                                    <td>{{ $kin->phone2 }}</td>

                                                                                </tr>

                                                                            @empty
                                                                                <div
                                                                                    class="alert alert-warning alert-dismissable">

                                                                                    <strong>Info!</strong> No Next-Of-Kin
                                                                                    Found!
                                                                                </div>
                                                                            @endforelse

                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--end-->
                    <div class="tab-pane" id="edit">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue"><i class="fa-fw fa fa-edit nb"></i>@lang('auth.edit_profile')</h2>
                            </div>

                            <div class="boxpane-content">


                                {!! Form::model($student->user ?? '', [
                                    'method' => 'PATCH',
                                    'route' => ['student-panel.students.update.details', SRS::encode($student->user->id ?? '')],
                                ]) !!}

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('username', 'Username') !!}
                                            {!! Form::text('username', null, ['placeholder' => 'Username', 'disabled', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('first_name', 'First Name') !!}
                                            {!! Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('middle_name', 'Middle Initial') !!}
                                            {!! Form::text('middle_name', null, ['placeholder' => 'Middle Initial', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('last_name', 'Surname') !!}
                                            {!! Form::text('last_name', null, ['placeholder' => 'Surname', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('form4_index_no', 'Form Four Index No') !!}
                                            {!! Form::text('form4_index_no', $student->form4_index_no ?? '', [
                                                'placeholder' => 'Form Four Index No',
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('form6_index_no', 'Form Six Index No') !!}
                                            {!! Form::text('form6_index_no', $student->form6_index_no ?? '', [
                                                'placeholder' => 'Form Six Index No',
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('gender', 'Gender') !!}
                                            {!! Form::select('gender', ['M' => 'Male', 'F' => 'Female'], $student->user->gender ?? '', [
                                                'id' => 'gender',
                                                'placeholder' => 'Select Gender',
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('dob', 'Date Of Birth') !!}
                                            {!! Form::text('dob', $student->dob, ['placeholder' => 'Date Of Birth', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('dob_place', 'Place of Birth') !!}
                                            {!! Form::text('dob_place', $student->dob_place, ['placeholder' => 'Place of Birth', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('mobile_no', 'Mobile Number') !!}
                                            {!! Form::text('mobile_no', $student->mobile_no, ['placeholder' => 'Mobile Number', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('mailing_address', 'Mailing Address (Postal)') !!}
                                            {!! Form::text('mailing_address', $student->mailing_address, [
                                                'placeholder' => 'Mailing Address (Postal)',
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('next_of_kin_mobile', 'Next of Kin Address (mobile number)') !!}
                                            {!! Form::text('next_of_kin_mobile', $student->next_of_kin_mobile, [
                                                'placeholder' => 'Next of Kin Address (mobile number)',
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('email_address', 'Email') !!}
                                            {!! Form::text('email_address', $student->email_address, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('citizenship', 'Select Citizenship') !!}
                                            {!! Form::select('citizenship', $countries, $student->citizenship, [
                                                'id' => 'citizenship',
                                                'placeholder' => 'Select Citizenship',
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('is_disabled', 'Physical Challenges') !!}
                                            {!! Form::select('is_disabled', ['1' => 'Disabled', '0' => 'Non Disabled'], $student->is_disabled, [
                                                'id' => 'is_disabled',
                                                'placeholder' => 'Select Physical Challenges',
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('intake_category_id', 'Select Intake Category') !!}
                                            {!! Form::select('intake_category_id', $intakes, $student->intake_category_id, [
                                                'id' => 'intake_category_id',
                                                'placeholder' => 'Select Intake',
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 pull-right">
                                        <div class="form-group">

                                            {!! Form::submit('Update', ['class' => 'btn btn-lg btn-primary pull-right']) !!}
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
                                {!! Form::model($student->user ?? '', [
                                    'method' => 'PATCH',
                                    'route' => ['student-panel.students.update.password', SRS::encode($student->user->id ?? '')],
                                ]) !!}

                                <div class="row">
                                    <div class="col-lg-8">

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('new-password', 'New Password') !!}
                                                {!! Form::password('new-password', ['placeholder' => 'New Password', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('new-password-confirm', 'Confirm New Password') !!}
                                                {!! Form::password('new-password-confirm', ['placeholder' => 'Confirm New Password', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 float-right">
                                            <div class="form-group">

                                                {!! Form::submit('Update', ['class' => 'btn btn-lg btn-primary pull-right']) !!}
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
                                <h2 class="blue"><i class="fa-fw fa fa-file-picture-o nb"></i>@lang('auth.change_avatar')
                                </h2>
                            </div>
                            <div class="boxpane-content">
                                {!! Form::model($student->user ?? '', [
                                    'method' => 'PATCH',
                                    'route' => ['student-panel.students.update.avatar', SRS::encode($student->user->id ?? '')],
                                    'enctype' => 'multipart/form-data',
                                ]) !!}
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div style="position: relative;">

                                            <img alt="" src="{{ $student->user->present()->avatar ?? '' }}"
                                                class="profile-image img-thumbnail">
                                            {{--                                            <a href="#" class="btn btn-danger btn-xs po" --}}
                                            {{--                                               style="position: absolute; top: 0;" title="@lang('delete_avatar')" --}}
                                            {{--                                               data-content="<p>@lang('app.r_u_sure')</p><a class='btn btn-block btn-danger po-delete' href='{{url('students',0)}}'>@lang('app.i_m_sure')</a> <button class='btn btn-block po-close'>@lang('no')</button>" --}}
                                            {{--                                               data-html="true" rel="popover"><i class="fa fa-trash-o"></i></a> --}}
                                            <br>
                                            <br>

                                        </div>
                                    </div>
                                    <div class="col-sm-6 offset-1">
                                        <div class="form-group">
                                            {!! Form::label('avatar', trans('auth.avatar')) !!}
                                            {!! Form::file('avatar', [
                                                'id' => 'avatar',
                                                'class' => 'form-control file',
                                                'data-show-upload' => 'false',
                                                'data-show-preview' => 'true',
                                                'accept' => 'image/*',
                                            ]) !!}
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

    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/select') }}/select2.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap') }}/fileinput.min.css" />
@endsection

@section('modals')
    @include('dashboard.admissions.modals.general_modal')
    {{--    @include('dashboard.admissions.modals.study-program-info.program_info_modal') --}}
@endsection

@section('scripts')
    <script type="text/javascript">
        // $('#basicInfo').DataTable({
        //     "paging":   false,
        //     "ordering": false,
        //     "info":     false,
        //     "searching":false
        // })
        $("#avatar").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            mainClass: "input-group-lg"
        });
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/select') }}/select2.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap') }}/fileinput.min.js"></script>

    <script>
        $('#gender,#batch_id').select2({
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
        $(document).on('ready', function() {
            $("#avatar").fileinput({
                showUpload: false,
                dropZoneEnabled: false,
                mainClass: "input-group-lg"
            });
        });

        $(document).ready(function() {
            $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
        });
    </script>
@endsection
