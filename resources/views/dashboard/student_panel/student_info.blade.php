@extends('layouts.dashboard')
@section('content')
    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Admission Process - Student's Registration Process
                </h2>

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
{{--                                    <a href="{{route('admissions.index',[$srs->encode($school)])}}">--}}
{{--                                        <i class="fa fa-plus-circle"></i>--}}
{{--                                        {{"View Registered Students"}}--}}
{{--                                    </a>--}}
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">
                            Here below is the list of information of the student to be registered ,please update the status by opting the correct status for the particular student then click the button update
                        </p>
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="card">
                                    <div class="card-header text-center">
                                        Student's Informations
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td>Name:</td><td>{{$records->user->last_name.', '.$records->user->first_name.' '.$records->user->middle_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Form Four Index No:</td><td>{{$records->form4_index_no}}</td>
                                            </tr>
                                            <tr>
                                                <td>Form Six Index No</td><td>{{$records->form6_index_no}}</td>
                                            </tr>
                                            <tr>
                                                <td>Gender:</td><td>{{$records->user->gender}}</td>
                                            </tr>
                                            <tr>
                                                <td>Birth Date:</td><td>{{$srs->formatDob($records->dob)}}</td>
                                            </tr>
                                            <tr>
                                                <td>Place of Birth:</td><td>{{$records->dob_place}}</td>
                                            </tr>
                                            <tr>
                                                <td>Mailing Address:</td><td>{{$records->mailing_address}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td><td>{{$records->email_address}}</td>
                                            </tr>
                                            <tr>
                                                <td>Admission Date:</td><td>{{$records->admission_date}}</td>
                                            </tr>
                                            <tr>
                                                <td>Academic Program:</td><td>{{$records->program->program_name.'('.$records->program_acronym.')'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Registration number:</td><td>{{$records->reg_no}}</td>
                                            </tr>
                                            <tr>
                                                <td>Room Allocation:</td><td></td>
                                            </tr>
                                            <tr>
                                                <td>Registration Status:</td>
                                                <td>
                                                    @if($records->dvs==1||$records->dvs==2)
                                                        <strong>Registered</strong>
                                                    @else
                                                        {{$records->status}}
                                                    @endif
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <ul class="list-group list-group-flush">
                                            <?php
                                            $edit_link = link_to(route('admissions.student-edit', $srs->encode($records->user_id)), '<i class="fa fa-edit p-2" aria-hidden="true"></i>Edit Student');
                                            $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Student") . "</b>' data-content=\"<p>"
                                                . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('admissions-student.destroy', $srs->encode($records->user_id)) . "'>"
                                                . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o p-2 red\"></i>"
                                                . trans('Delete Student') . "</a>";

                                            $change_academic_program_link = link_to(route('admissions.student-change-programme',$srs->encode($records->user_id)), '<i class="fa fa-edit p-2" aria-hidden="true"></i>Change academic Programme');
                                            $reg_summary_history_link = link_to(route('courses.edit', [$srs->encode(199999), $srs->encode(188888)]), '<i class="fa fa-history p-2" aria-hidden="true"></i>Registration summary history');

                                            ?>

                                            <li class="list-group-item">


                                                {!!  html_entity_decode($edit_link) !!}

                                            </li>
                                            <li class="list-group-item">
                                                {!!  html_entity_decode($delete_link) !!}

                                            </li>
                                            <li class="list-group-item">
                                                {!! html_entity_decode($change_academic_program_link)!!}

                                            </li>
                                            <li class="list-group-item">
                                                {!!  html_entity_decode($reg_summary_history_link)!!}

                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>


                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        Student Registration
                                    </div>
                                    <div class="card-body">

                                    </div>
                                    <div class="card-footer">
                                        <h2 class="blue">NOTE</h2>
                                        <ul class="list-unstyled">
                                            <li>
                                                N/No: means the status is not yet cleared by the student.

                                            </li>
                                            <li>
                                                Y/Yes: means the status is cleared by the student.

                                            </li>
                                            <li>
                                                P/Partial: means the status is partially cleared by the student.

                                            </li>
                                            <li>
                                                Comment: means fill anything on student if needed.

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>
    </div>

@endsection
