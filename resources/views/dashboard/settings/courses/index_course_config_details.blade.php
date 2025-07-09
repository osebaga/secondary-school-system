@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} Subject</title>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="boxpane">
                        <div class="boxpane-header">
                            <h2 class="blue">
                                Subject Details
                            </h2>

                            <div class="boxpane-icon">
                                <ul class="btn-tasks">

                                </ul>
                            </div>
                        </div>
                        <div class="boxpane-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="introtext"></p>
                                    <div class="table-responsive">
                                        <table id="cprTable" class="tablex table-bordered table-hover table-striped"
                                            style="width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <th>Subject Code:</th>
                                                    <td>{{ $course->course_code }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Subject Name:</th>
                                                    <td>{{ $course->course_name }}</td>
                                                </tr>

                                                {{-- <tr>
                                                    <th>Units/Credits:</th>
                                                    <td>{{ $course->unit . '' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Maximum CA Score:</th>
                                                    <td>{{ $course->cw }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Maximum SE Score:</th>
                                                    <td>{{ $course->final . '' }}</td>
                                                </tr> --}}

                                                <tr>
                                                    <th>Study Level:</th>
                                                    <td>{{ $course->study_level->level_name ?? '' }} </td>
                                                </tr>

                                                <tr>
                                                    <th>Teacher :</th>
                                                    <td class="p-2">
                                                        @if ($course_staffs->count() > 0)
                                                            @foreach ($course_staffs as $staff)
                                                                <span class="blue badge badge-inverse p-2 font-18 white">

                                                                    {{ ($staff->user->last_name ?? '') . ', ' . ($staff->user->first_name ?? '') . ' ' . ($staff->user->middle_name ?? '') }}
                                                                    @if ($course->programs->count() > 0)
                                                                        <ul>
                                                                            @foreach ($course->programs as $p)
                                                                                <li>{{ $p->program_code }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </span>
                                                            @endforeach
                                                        @else
                                                            <div class="alert alert-warning alert-dismissable">
                                                                <span class="font-italic">Currently No Teacher
                                                                    Assigned</span>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Participating Programs:</th>
                                                    <td>
                                                        @if ($course->programs->count() > 0)
                                                            <ul>
                                                                @foreach ($course->programs as $p)
                                                                    <li>{{ $p->program_name }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @can('courses-assign_to_instructor')
                                                    <tr>
                                                        <th>Action:</th>
                                                        <td class="p-2">
                                                            @if ($course_staffs->count() > 0)
                                                                {!! Form::open(['route' => 'courses.course-staff-delete', 'method' => 'DELETE']) !!}
                                                                {!! Form::hidden('course_id', $course->id) !!}
                                                                {!! Form::hidden('year_id', $course_staffs->first()->year_id) !!}

                                                                <div class="form-group p-2">
                                                                    {!! Form::button('[Remove Teacher]', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) !!}
                                                                </div>
                                                                {!! Form::close() !!}
                                                            @else
                                                                {{ 'No Teacher' }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endcan

                                            </tbody>
                                            <tfoot></tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @can('courses-assign_to_instructor')
                    <div class="col-md-12 mt-5">
                        {!! Form::open(['route' => 'courses.assign-course-staffs', 'method' => 'POST']) !!}
                        {!! Form::hidden('course_id', $course->id) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group required">
                                    {!! html_entity_decode(
                                        Form::label('staff_id', 'Assign Teacher for this Subject(<b class="blue">' . $course->course_name . '</b>)', [
                                            'class' => 'label-control',
                                        ]),
                                    ) !!}
                                    {!! Form::select('staff_id', $staffs, null, [
                                        'id' => 'staff_id',
                                        'placeholder' => 'Assign Teacher',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                            </div>
                            
                            <div class="col-md-12 mt-2">
                                {!! html_entity_decode(Form::label('program_id', 'Select Participating Program')) !!}
                                {!! Form::select('program_id[]', $programs, null, [
                                    'id' => 'program_id',
                                    'class' => 'form-control',
                                    'multiple' => 'multiple',
                                ]) !!}
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group pull-right">
                                    {!! Form::button('Assign Teacher', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                @endcan
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">More Details</div>
                <div class="card-body">
                    {{-- <ul class="list-group-flush"> --}}
                    {{--  <li class="list-group-item">{{link_to(route('courses.course-students',SRS::encode($course->id)),'Registered Students')}}</li> --}}

                    <li class="list-group-item">
                        {{ link_to(route('courses.get-by-intakes', SRS::encode($course->id)), 'Import Results') }}</li>

                        {{-- <li class="list-group-item">
                            {{ link_to(route('get.module.results.by.intakes', SRS::encode($course->id)), 'View CA and ESE Results') }}</li> --}}
    
                    {{--  <li class="list-group-item">{{link_to(route('course.supplementary-student',SRS::encode($course->id)),'Supplementary Students')}}</li> --}}
   
                    {{-- <li class="list-group-item">
                        {{ link_to(route('courses.course-program-participant', SRS::encode($course->id)), 'Related Programme') }}
                    </li> --}}
      

                    {{-- <li class="list-group-item">
                        {{ link_to(route('endsemestercourse-results', SRS::encode($course->id)), 'End of Semester report') }}
                    </li> --}}
                {{-- </ul> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/dashboard/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#staff_id').select2({
                placeholder: 'Select Instructor',
            });

            // $('#stream').select2({
            //     placeholder: 'Select Stream',
            // });
            $('#program_id').select2({
                placeholder: 'Select Programme',
            });
        })
    </script>
@endsection
