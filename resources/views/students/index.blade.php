@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">Home</h2>

                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="introtext">
                                You have successfully logged in to the
                                <b>{{ \App\Models\Institution::first()->institution_name }}</b> You currently have access to
                                the
                                following sections
                            </p>
                            <ul >
                                <li >Dashboard</li>
                                <li >My Profile</li>
                                <li>Academic Records</li>
                                <ul style="list-style: none">                                
                                    <li><i class="fa fa-angle-right"></i> Register Module</li>
                                    <li><i class="fa fa-angle-right"></i> Continuous Assessment</li>
                                    <li><i class="fa fa-angle-right"></i> Module Results</li>
                                    <li><i class="fa fa-angle-right"></i> Examination Docket</li>
                                </ul>
                                <li >E-Voting</li>
                                <li >Login History</li>
                            </ul>
                            {{-- <ul>
                                <li>Edit My Info</li>
                                <li>Course Registration</li>
                                <li>Staff Evaluations</li>
                                <li>Coursework(s)</li>
                                <li>Course results</li>
                                <li>Course Materials & Notes</li>
                                <li>Graduation Confirmation</li>
                                <li>Accommodation</li>
                            </ul> --}}
                        </div>
                        {{--                        <div class="col-12 m-2 introtext"> --}}
                        {{--                            <h2 class="text-danger"><sup>**</sup>ANNOUNCEMENT From DR-ARC !!<sup>**</sup></h2><hr> --}}
                        {{--                            <p><sup>*</sup>Update your Information especially <b>Gender</b> before <b --}}
                        {{--                                    class="badge badge-pill badge-warning"> 18-03-2025 04:00:00 PM</b></p><hr> --}}
                        {{--                            <h3><sup>*</sup>Steps to update your information :-</h3><hr> --}}
                        {{--                            <ul> --}}
                        {{--                                <li>Go to Student info on the left menu</li> --}}
                        {{--                                <li>Go to Edit Tab</li> --}}
                        {{--                                <li>Select Gender</li> --}}
                        {{--                                <li>Then press Update Button</li> --}}
                        {{--                            </ul> --}}
                        {{--                            <hr> --}}
                        {{--                        </div> --}}

                        {{-- <div class="col-sm-12">
                            <h2>PAYMENT INFORMATION OF THE TUITION FEES</h2>
                            <p>
                                You are required to pay tuition fees for the academic year {!! empty($academic_year) ? 'Undefined': $academic_year !!}. If you
                                fail to comply with this notice you will not be registered.
                            </p>
                            <p>
                                Your required to provide the following information to the bankers on making payments for
                                each type of payment as shown in the table below
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Payment Type</th>
                                        <th>Control Number</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (!is_null($bills))
                                        @if (property_exists($bills, 'description'))
                                            <tr>
                                                <td colspan="4" class="text-danger text-center font-bold">
                                                    <span>Your Control number not set yet!!</span>
                                                </td>
                                            </tr>
                                        @else
                                            {{--                                            @dd($bills)--
                                            @foreach ($bills->data as $k => $bill)
                                                <tr>
                                                    <td>{{$k+1}}</td>
                                                    <td>{{upper($bill->description)}}</td>
                                                    <td>{{$bill->control_number}}</td>
                                                    <td>{{$bill->bill_amount}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-danger text-center font-bold">
                                                <span>Your Control number not set yet!!</span>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>

                                </table>
                            </div>

                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
