@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Registered Students</title>

@endsection


@section('content')
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
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="text-center">
                                        <img src="{{$std->user->present()->avatar}}" alt="logo"
                                             class="thumb-lgx rounded-circle mb-3">
                                        <p class="text-muted  font-14">
                                            <a href="#" data-url="{{route('admissions.modal.update.avatar',SRS::encode($std->user->id))}}" class="btn btn-sm btn-outline-success p-1 m-1"
                                               id="resource-student-photo-edit-button"> <i class="fa fa-pencil"></i> Change Photo</a>
                                        </p>
                                    </div>


                                    <table id="basicInfo" class="table table-bordered table-hover table-striped  dt-responsive">
                                        <a class="m-1" href="#" data-url="{{route('admissions.modal.update.studentinfo',SRS::encode($std->id))}}"
                                            id="resource-studentinfo-button"> <i class="fa fa-edit p-2"></i>Update Student Info</a>
                                       <thead>
                                       <tr>
                                           <th></th>
                                           <th></th>
                                       </tr>
                                       </thead>
                                        <tbody>
                                        <tr>
                                            <td>Name:</td>
                                            <td>{{$std->user->last_name.', '.$std->user->first_name.' '.$std->user->middle_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Form Four Index No:</td>
                                            <td>{{$std->form4_index_no}}</td>
                                        </tr>
                                        <tr>
                                            <td>Form Six Index No</td>
                                            <td>{{$std->form6_index_no}}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender:</td>
                                            <td>{{$std->user->gender}}</td>
                                        </tr>
                                        <tr>
                                            {{--                                <td>Birth Date:</td><td>{{SRS::formatDob($std->dob)}}</td>--}}
                                            <td>Birth Date:</td>
                                            <td>{{$std->dob}}</td>
                                        </tr>

                                        <tr>
                                            <td>Admission Date:</td>
                                            <td>{{$std->admission_date}}</td>
                                        </tr>
                                        <tr>
                                            <td>Academic Program:</td>
                                            <td>{{$std->program->program_name.'('.$std->program_acronym.')'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Registration number:</td>
                                            <td>{{$std->reg_no}}</td>
                                        </tr>
                                        <tr>
                                            <td>Room Allocation:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Registration Status:</td>
                                            <td>
                                                @if($std->dvs==1||$std->dvs==2)
                                                    <strong>Registered</strong>
                                                @else
                                                    {{$std->status}}
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="boxpane">
                                    <div class="boxpane-header">
                                        <h2 class="blue"><i class="fa-fw fa fa-phone-square"></i>
                                            CONTACT INFORMATION
                                        </h2>

                                        <div class="boxpane-icon">

                                            <a class="m-1" href="#" data-url="{{route('admissions.modal.update.contact-info',SRS::encode($std->id))}}"
                                               id="resource-student-contact-info-edit-button"> <i class="fa fa-edit p-2"></i>Update</a>


                                        </div>
                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-md-12">



                                                <table class="table table-responsive table-bordered">
                                                    <tbody>
                                                    @if(!is_null($std->contact))

                                                        <tr>
                                                            <td>Address: </td>
                                                            <td>{{ $std->contact->address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone: </td>
                                                            <td>{{ $std->contact->phone1}}</td>
                                                        </tr>
                                                    <tr>
                                                        <td>Email: </td>
                                                        <td>{{ $std->contact->email1}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Region : </td>
                                                            <td>{{ $std->contact->region}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>District : </td>
                                                            <td>{{ $std->contact->district}}</td>
                                                        </tr>

                                                    @else
                                                        <div class="alert alert-warning alert-dismissable">

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
                        </div>


                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-12 m-3">
                                <div class="boxpane">
                                    <div class="boxpane-header">
                                        <h2 class="blue"><i class="fa-fw fa fa-tasks"></i>
                                            STUDY PROGRAMME INFORMATION
                                        </h2>

                                        <div class="boxpane-icon">


                                            <a href="#" data-url="{{route('admissions.modal.update.study-program',SRS::encode($std->id))}}"
                                               id="resource-student-program-info-edit-button"> <i class="fa fa-edit p-2 m-1"></i> Update</a>


                                        </div>
                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    <tr>
                                                        <td>Admission No</td>
                                                        <td>{{ $std->admission_no }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Registration No</td>
                                                        <td>{{ $std->reg_no }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Year of Admission</td>
                                                        <td>{{ $std->admission_year }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program Registered</td>
                                                        <td>{{ $std->program->program_name .'( '.$std->program->program_code.' )' }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Graduation Date</td>
                                                        <td>{{ $std->graduation_year }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Manner of Entry</td><td>{{$std->mannerOfEntry->manner_of_entry ?? ''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level of Study Registered</td><td>{!!  SRS::year_level($std->year_of_study) !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Campus</td><td>{{$std->campus->campus_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Intake Category</td><td>{{$std->intake_category->name}}</td>
                                                    </tr>

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

                                            <a class="m-1" href="#" data-url="{{route('admissions.modal.add.edu-history',SRS::encode($std->id))}}"
                                               id="resource-student-edu-history-edit-button"> <i class="fa fa-plus-square-o p-2"></i>Add</a>



                                        </div>
                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-responsive table-bordered">
                                                    <tbody>
                                                    @forelse($std->educationHistories as $edu)
                                                        <tr>

                                                            <td>{{ $edu->level}}</td>
                                                            <td>{{ $edu->index_no}}</td>
                                                            <td>{{ $edu->start_year}} - {{ $edu->end_year }}</td>
                                                            <td>{{ $edu->grade}}</td>
                                                            <td>{{ $edu->institution_name}}</td>
                                                        </tr>

                                                    @empty
                                                        <div class="alert alert-warning alert-dismissable">

                                                            <strong>Info!</strong> No Education History Found!
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

                                            <a class="m-1" href="#" data-url="{{route('admissions.modal.add.sponsor',SRS::encode($std->id))}}"
                                               id="resource-student-edu-history-edit-button"> <i class="fa fa-plus-square-o p-2"></i>Add</a>



                                        </div>
                                    </div>
                                    <div class="boxpane-content">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    @forelse($std->sponsors as $std_sponsor)
                                                    <tr>

                                                        <td>{{ $std_sponsor->sponsor->sponsor_name}}</td>
                                                        <td>{{ $std_sponsor->sponsor->address}}</td>
                                                    </tr>

                                                    @empty
                                                        <div class="alert alert-warning alert-dismissable">

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
                            <div class="col-12 m-3">
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
                            </div>
                            <div class="col-12 m-3">
                                <div class="boxpane">
                                    <div class="boxpane-header">
                                        <h2 class="blue"><i class="fa-fw fa fa-bank"></i>
                                            BANK INFORMATION
                                        </h2>

                                        <div class="boxpane-icon">

                                            <a class="m-1" href="#" data-url="{{route('admissions.modal.add.bank-info',SRS::encode($std->id))}}"
                                               id="resource-student-bank-info-edit-button"> <i class="fa fa-plus-square-o p-2"></i>Add</a>



                                        </div>
                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    @forelse($std->banks as $bank)
                                                        <tr>

                                                            <td>{{ $bank->bank_name}}</td>
                                                            <td>{{ $bank->account_number}}</td>
                                                            <td>{{ $bank->status}}</td>
                                                        </tr>

                                                    @empty
                                                        <div class="alert alert-warning alert-dismissable">

                                                            <strong>Info!</strong> No Bank Info. Found!
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

                                            <a class="m-1" href="#" data-url="{{route('admissions.modal.add.dependant',SRS::encode($std->id))}}"
                                               id="resource-student-dependant-edit-button"> <i class="fa fa-plus-square-o p-2"></i>Add</a>



                                        </div>
                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    @forelse($std->dependants as $dependant)
                                                        <tr>

                                                            <td>{{ $dependant->name}}</td>
                                                            <td>{{ $dependant->gender}}</td>
                                                            <td>{{ $dependant->relationship}}</td>
                                                            <td>{{ $dependant->phone1}}</td>
                                                            <td>{{ $dependant->address}}</td>
                                                            <td>{{ $dependant->job}}</td>
                                                            <td>{{ $dependant->email}}</td>
                                                        </tr>

                                                    @empty
                                                        <div class="alert alert-warning alert-dismissable">

                                                            <strong>Info!</strong> No Dependant Found!
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
                                            <a class="m-1" href="#" data-url="{{route('admissions.modal.add.next-of-kin',SRS::encode($std->id))}}"
                                               id="resource-student-next-of-kin-edit-button"> <i class="fa fa-plus-square-o p-2"></i>Add</a>



                                        </div>
                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    @forelse($std->nextOfKins as $kin)
                                                        <tr>

                                                            <td>{{ $kin->name}}</td>
                                                            <td>{{ $kin->gender}}</td>
                                                            <td>{{ $kin->relationship}}</td>
                                                            <td>{{ $kin->address}}</td>
                                                            <td>{{ $kin->phone1}}</td>
                                                            <td>{{ $kin->phone2}}</td>

                                                        </tr>

                                                    @empty
                                                        <div class="alert alert-warning alert-dismissable">

                                                            <strong>Info!</strong> No Next-Of-Kin Found!
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

@endsection
@section('modals')
    @include('dashboard.admissions.modals.general_modal')
{{--    @include('dashboard.admissions.modals.study-program-info.program_info_modal')--}}
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
