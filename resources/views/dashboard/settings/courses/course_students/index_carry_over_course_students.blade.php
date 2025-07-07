@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Course Details | Carry Over</title>

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Registered Student(s) on the course-<b class="black">{{$course->course_code}}</b>
                    </h2>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-md-12">
                        <p class="introtext">
                            Here is the list of all students registered to this course who have <b>Carry over</b> and
                            their academic results,you can use
                            the form below
                            to filter student(s).Click the following link to get an excel file with registered students
                        </p>
                        <div class="table-responsive">
                            <table id="carryTable" class="table table-striped table-bordered table-hover text-justify"
                                   style="width: 100%;">
                                <thead>
                                <tr>
                                    <th rowspan="2">#</th>
                                    <th rowspan="2">Student Name</th>
                                    <th rowspan="2">Sex</th>
                                    <th rowspan="2">Registration No.</th>
                                    <th rowspan="2">Grade</th>
                                        <th rowspan="2">Status</th>

                                </tr>

                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


