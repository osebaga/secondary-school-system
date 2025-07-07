@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} |My Profile</title>
@endsection


@section('content')
    <div class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    STUDENT PROFILE
                </h2>

                <div class="boxpane-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">


                        </li>
                    </ul>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">

                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="text-center">
                                        <img src="{{ $std->user->present()->avatar ?? '' }}" alt="logo"
                                            class="thumb-lgx rounded-circle mb-3">
                                        <p class="text-muted  font-14">
                                            <a href="#"
                                                data-url="{{ route('admissions.modal.update.avatar', SRS::encode($std->user->id)) }}"
                                                class="btn btn-sm btn-outline-success p-1 m-1"
                                                id="resource-student-photo-edit-button"> <i class="fa fa-pencil"></i>
                                                Change</a>
                                        </p>
                                    </div>


                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td><strong>{{ $std->user->last_name . ', ' . $std->user->first_name . ' ' . $std->user->middle_name }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Form Four Index No:</td>
                                                <td><strong>{{ $std->form4_index_no }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Form Six Index No:</td>
                                                <td><strong>{{ $std->form6_index_no }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Gender:</td>
                                                <td><strong>{{ $std->user->gender }}</strong></td>
                                            </tr>
                                            <tr>
                                                {{--                                <td>Birth Date:</td><td>{{SRS::formatDob($std->dob)}}</td> --}}
                                                <td>Birth Date:</td>
                                                <td><strong>{{ $std->dob }}</strong></td>
                                            </tr>
                                            <tr>
                                                {{--                                <td>Birth Date:</td><td>{{SRS::formatDob($std->dob)}}</td> --}}
                                                <td>Nationality:</td>
                                                <td><strong>{{ $std->citizenship ?? 'Tanzanian' }}</strong></td>
                                            </tr>

                                            <tr>
                                                <td>Admission Date:</td>
                                                <td><strong>{{ $std->admission_date ?? '' }}</strong></td>
                                            </tr>
                                            {{-- <tr>
                                            <td>Academic Program:</td>
                                            <td>{{$std->program->program_name.'('.$std->program_acronym.')'}}</td>
                                        </tr> --}}
                                            <tr>
                                                <td>Registration number:</td>
                                                <td><strong>{{ $std->reg_no }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Room Allocation:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Registration Status:</td>
                                                <td>
                                                    @if ($std->dvs == 1 || $std->dvs == 2)
                                                        <strong>Registered</strong>
                                                    @else
                                                        <strong>Registered</strong>
                                                        {{-- {{$std->status}} --}}
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
                                        <h2 class="blue"><i class="fa-fw fa fa-phone-square"></i>
                                            CONTACT INFORMATION
                                        </h2>
                                        <div class="boxpane-icon">

                                        </div>
                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <tbody>
                                                        @if (!is_null($std->contact))
                                                            <tr>

                                                                <td>{{ $std->contact->address }}</td>
                                                                <td>{{ $std->contact->phone1 }}</td>
                                                                <td>{{ $std->contact->email1 }}
                                                                <td>{{ $std->contact->region }}</td>
                                                                <td>{{ $std->contact->district }}</td>
                                                                <td> <a class="m-1 btn btn-primary btn-sm" href="#"
                                                                        data-url="{{ route('admissions.modal.update.contact-info', SRS::encode($std->id)) }}"
                                                                        id="resource-student-contact-info-edit-button"> <i
                                                                            class="fa  fa-edit p-2" data-toggle="tooltip"
                                                                            data-placement="top" title=""
                                                                            data-original-title="Edit"></i></a></a></td>
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
                            <div class="col-12 m-1">
                                <div class="boxpane">
                                    <div class="boxpane-header">
                                        <h2 class="blue"><i class="fa-fw fa fa-lock"></i>
                                            CHANGE PASSWORD
                                        </h2>
                                        <div class="boxpane-icon">
                                            <a class="m-0 btn btn-primary btn-sm" href="#"
                                                data-url="{{ route('students.changepassword') }}"
                                                id="resource-student-change-password-update-button"> <i
                                                    class="fa  fa-edit p-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Update"></i></a></a>
                                        </div>
                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <tbody>
                                                        @if (!is_null($std->contact))
                                                        @else
                                                            <div class="alert alert-warning alert-dismissable">

                                                                {{-- <strong>Info!</strong> No Contact Found! --}}
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

                    <div class="col-6 ">
                        <div class="row">
                            <div class="col-12 m-1">
                                <div class="boxpane">
                                    <div class="boxpane-header">
                                        <h2 class="blue"><i class="fa-fw fa fa-tasks"></i>
                                            STUDY PROGRAMME INFORMATION
                                        </h2>
                                        <div class="boxpane-icon">
                                        </div>
                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Admission No:</td>
                                                            <td><strong>{{ $std->admission_no }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Registration No:</td>
                                                            <td><strong>{{ $std->reg_no }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Year of Admission:</td>
                                                            <td><strong>{{ $std->admission_year }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Program Registered:</td>
                                                            <td><strong>{{ $std->program->program_name }}</strong></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Graduation Date:</td>
                                                            <td><strong>{{ $std->graduation_year }}</strong></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Manner of Entry:</td>
                                                            <td><strong>{{ $std->mannerOfEntry->manner_of_entry ?? '' }}</strong>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Year of Study:</td>
                                                            <td><strong>{!! SRS::year_level($std->year_of_study) !!}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Campus:</td>
                                                            <td><strong>{{ $std->campus->campus_name }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Intake Category:</td>
                                                            <td><strong>{{ $std->intake_category->name }}</strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-12 m-1">
                                <div class="boxpane">
                                    <div class="boxpane-header">
                                        <h2 class="blue"><i class="fa-fw fa fa-graduation-cap"></i>
                                            EDUCATION HISTORY
                                        </h2>


                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-sm-10 m-2">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Level</th>
                                                            <th>IndexNo</th>
                                                            <th>StartYear</th>
                                                            <th>EndYear</th>
                                                            <th>Division</th>
                                                            <th>Name</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        @forelse($std->educationHistories as $edu)
                                                            <tr>

                                                                <td>{{ $edu->level }}</td>
                                                                <td>{{ $edu->index_no }}</td>
                                                                <td>{{ $edu->start_year }} </td>
                                                                <td>{{ $edu->end_year }}</td>
                                                                <td>{{ $edu->grade }}</td>
                                                                <td>{{ $edu->institution_name }}</td>
                                                                {{-- <td> <a class="m-1" href="#" data-url="{{route('students.modal.edit.eduHistory',SRS::encode($std->id))}}"
                                                                id="resource-studenteditedu-history-button"> <i class="fa fa-plus-square-o p-2"></i>Edit</a>
                 
                                                            </td> --}}
                                                            </tr>

                                                        @empty
                                                            {{-- <div class="alert alert-warning alert-dismissable">

                                                            <strong>Info!</strong> No Education History Found!
                                                        </div> --}}
                                                        @endforelse

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 m-1">
                                <div class="boxpane">
                                    <div class="boxpane-header">
                                        <h2 class="blue"><i class="fa-fw fa fa-git-square"></i>
                                            SPONSOR INFORMATION
                                        </h2>


                                    </div>
                                    <div class="boxpane-content">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table">
                                                    <thead>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        {{-- <th>Occupation</th> --}}
                                                        <th>Email</th>

                                                    </thead>
                                                    <tbody>

                                                        @forelse($std->sponsors as $std_sponsor)
                                                            <tr>

                                                                <td>{{ $std_sponsor->name }}</td>
                                                                <td>{{ $std_sponsor->phone }}</td>
                                                                <td>{{ $std_sponsor->address }}</td>
                                                                {{-- <td>{{ $std_sponsor->occupation }}</td> --}}
                                                                <td>{{ $std_sponsor->email }}</td>

                                                                <td> <a class="m-1 btn btn-primary btn-sm" href="#"
                                                                        data-url="{{ route('students.modal.edit.sponsor', SRS::encode($std_sponsor->sponsor_id)) }}"
                                                                        id="resource-studenteditsponsor-button"><i
                                                                            class="fa  fa-edit p-2" data-toggle="tooltip"
                                                                            data-placement="top" title=""
                                                                            data-original-title="Edit"></i></a> </a>
                                                                </td>
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

                            {{-- <div class="col-12 m-1">
                                <div class="boxpane">
                                    <div class="boxpane-header">
                                        <h2 class="blue"><i class="fa-fw fa fa-bank"></i>
                                            BANK INFORMATION
                                        </h2>
                                        <div class="boxpane-icon">
                                       
                                        </div>
                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <tbody>
                                                    @forelse($std->banks as $bank)
                                                        <tr>

                                                            <td >{{ $bank->bank_name}}</td>
                                                            <td>{{ $bank->account_number}}</td>
                                                            <td>{{ $bank->status}}</td>
                                                           <td></td> <td></td> <td></td><td></td> <td></td> <td></td><td></td> <td></td> <td></td>
                                                          <td></td><td></td> <td></td> <td></td><td></td>
                                                          
                                                          
                                                        
                                                            </td>
                                                            <td>  <a class="m-1 btn btn-primary btn-sm"  href="#" data-url="{{route('students.modal.edit.bankinfo',SRS::encode($bank->id))}}"
                                                                id="resource-studenteditbank-button"> <i class="fa  fa-edit p-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a></a>
                 
                                                            </td>
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
                            </div> --}}
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
                                                <table class="table">
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
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>

                                                                <td> <a class="m-1 btn btn-primary btn-sm" href="#"
                                                                        data-url="{{ route('students.modal.edit.dependant', SRS::encode($dependant->id)) }}"
                                                                        id="resource-studenteditdependant-button"><i
                                                                            class="fa  fa-edit p-2" data-toggle="tooltip"
                                                                            data-placement="top" title=""
                                                                            data-original-title="Edit"></i></a> </td>
                                                            </tr>

                                                        @empty
                                                            <div class="alert alert-warning alert-dismissable">

                                                                <strong>Info!</strong> No Dependent Found!
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
                                                <table class="table">
                                                    <tbody>
                                                        @forelse($std->nextOfKins as $kin)
                                                            <tr>

                                                                <td>{{ $kin->name }}</td>
                                                                <td>{{ $kin->gender }}</td>
                                                                <td>{{ $kin->relationship }}</td>
                                                                <td>{{ $kin->address }}</td>
                                                                <td>{{ $kin->phone1 }}</td>
                                                                <td>{{ $kin->phone2 }}</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>

                                                                <td><a class="m-1 btn btn-primary btn-sm" href="#"
                                                                        data-url="{{ route('students.modal.edit.nextOfKin', SRS::encode($kin->id)) }}"
                                                                        id="resource-studenteditnext-of-kin-button"><i
                                                                            class="fa  fa-edit p-2" data-toggle="tooltip"
                                                                            data-placement="top" title=""
                                                                            data-original-title="Edit"></i></a></a>
                                                                </td>

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
    {{--    @include('dashboard.admissions.modals.study-program-info.program_info_modal') --}}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/custombox.min.css') }}">
@endsection
@section('scripts')
    <script src="{{ asset('assets/dashboard/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/modal/custombox.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/modal/legacy.min.js') }}"></script>

    <script type="text/javascript">
        $("#avatar").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            mainClass: "input-group-lg"
        });
    </script>
@endsection
