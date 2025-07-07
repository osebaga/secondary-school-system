@extends('layouts.dashboard')


@section('title')
    Course Registrations  Limit
@endsection

@section('content')
    <div class="content">

        <div class="row">
            <div class="col-12">
                <div class="boxpane">
                    <div class="boxpane-header">
                        <h2 class="blue">
                            Course Registration  Limit-[{{$campus->campus_name}}]-Intake of [{{$intake->name}}]
                        </h2>

                        <div class="boxpane-icon">
                            <a class="btn btn-sm btn-primary p-1 m-1" href="{{ url()->previous() }}"><i
                                        class="fa fa-arrow-circle-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="boxpane-content">
                        <div class="row">
                            <div class="col-md-6 p-3">
                                <fieldset class="customLegend row">
                                    <legend>
                                        <h2 class="blue pb-0 mb-0">
                                            Semester (I) Course Registration </h2>
                                    </legend>
                                    <table class="table table-bordered table-striped" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Course Registration  Status :</th>

                                            <th>
                                                @if(is_null($sem1_course_reg))

                                                    Course Registration is currently closed
                                                @else
                                                    Course Registration  is currently opened

                                                @endif

                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <td></td>
                                        <td>
                                            <ul class="list-group">
                                                <li class="list-unstyled">
                                        <span class="pull-left p-2">
                                            @if(is_null($sem1_course_reg))
                                                {!! Form::open(['route' => ['administrations.openCourseRegistration',1],'method'=>'POST','role' => 'form']) !!}
                                                {!! Form::hidden('campus_id',SRS::encode($campus_id)) !!}
                                                {!! Form::hidden('intake_category_id',SRS::encode($intake_id)) !!}
                                                {!! Form::button('[Open Online Course Registration]',['type'=>'submit','class'=>'btn btn-sm btn-primary p-2']) !!}
                                                {!! Form::close() !!}
                                            @else
                                                {!! Form::open(['route' => ['administrations.closeCourseRegistration',1],'method'=>'POST','role' => 'form']) !!}
                                                {!! Form::hidden('campus_id',SRS::encode($campus_id)) !!}
                                                {!! Form::hidden('intake_category_id',SRS::encode($intake_id)) !!}
                                                {!! Form::button('[Close online Course Registration]',['type'=>'submit','class'=>'btn btn-sm btn-danger p-2']) !!}
                                                {!! Form::close() !!}
                                            @endif

                                                                </span>
                                                </li>

                                            </ul>
                                        </td>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </div>
                            <div class="col-md-6 p-3">
                                <fieldset class="customLegend row">
                                    <legend>
                                        <h2 class="blue pb-0 mb-0">
                                            Semester (II) Course Registration</h2>
                                    </legend>
                                    <table class="table table-bordered table-striped" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Course Registration Status :</th>

                                            <th>
                                                @if(is_null($sem2_course_reg))

                                                    Course Registration is currently closed
                                                @else
                                                    Course Registration is currently opened
                                                @endif

                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <td></td>
                                        <td>
                                            <ul class="list-group">
                                                <li class="list-unstyled">
                                        <span class="pull-left p-2">
                                            @if(is_null($sem2_course_reg))
                                                {!! Form::open(['route' => ['administrations.openCourseRegistration',2],'method'=>'POST','role' => 'form']) !!}
                                                {!! Form::hidden('campus_id',SRS::encode($campus_id)) !!}
                                                {!! Form::hidden('intake_category_id',SRS::encode($intake_id)) !!}
                                                {!! Form::button('[Open Online Course Registration]',['type'=>'submit','class'=>'btn btn-sm btn-primary p-2']) !!}
                                                {!! Form::close() !!}
                                            @else
                                                {!! Form::open(['route' => ['administrations.closeCourseRegistration',2],'method'=>'POST','role' => 'form']) !!}
                                                {!! Form::hidden('campus_id',SRS::encode($campus_id)) !!}
                                                {!! Form::hidden('intake_category_id',SRS::encode($intake_id)) !!}
                                                {!! Form::button('[Close Online Course Registration]',['type'=>'submit','class'=>'btn btn-sm btn-danger p-2']) !!}
                                                {!! Form::close() !!}
                                            @endif

                                                                </span>
                                                </li>

                                            </ul>
                                        </td>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection


