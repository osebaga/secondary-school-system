@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | Module</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">Assigned Modules</h2>
                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">
                                The following is the list of modules assigned for you in this academic year. Please pick the module name to upload marks.
                            </p>

                            <div class="table table-responsive">
                                @if($staff_courses->count() > 0)
                                    @php
                                        $semesters = [
                                            1 => 'Semester I',
                                            2 => 'Semester II'
                                        ];
                                    @endphp

                                    @foreach ($semesters as $semesterKey => $semesterName)
                                        <table class="tablex table-bordered table-hover table-responsive-sm" style="width: 100%;" id="tab_sem{{ $semesterKey }}">
                                            <thead>
                                                <tr class="page-title-box">
                                                    <th colspan="7" class="text-center"><b>{{ $semesterName }}</b></th>
                                                </tr>
                                                <tr class="page-title-box">
                                                    <th>S/No</th>
                                                    <th>Course</th>
                                                    <th>No. of Students With Results</th>
                                                    <th>Practical Status</th>
                                                    <th>Programme</th>
                                                    <th>Assigned By</th>
                                                    <th>Assigned Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0; ?>
                                                @php $semesterCourses = []; @endphp

                                                @foreach ($staff_courses as $course)
                                                    @if (SRS::check_course_semester($course->course_id) === $semesterKey)
                                                        @php $semesterCourses[] = $course->course_id; @endphp
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>
                                                                {{ link_to(route('courses.config.course-details', [SRS::encode($course->course_id), SRS::encode($course->department_id ?? '')]), '( ' . $course->course_code . ' ) ' . $course->course_name . ' [ ' . $course->scheme_name . ' ]') }}
                                                            </td>
                                                            <td>{{ SRS::getTotalStudentwithResult($course->course_id) }}</td>
                                                            <td>{{ SRS::getCoursePracticalStatus($course->course_id) }}</td>
                                                            <td class="text-center" width="20%">{{ SRS::getParticipantProgrammes($course->course_id) }}</td>
                                                            <td>{{ $course->assigner }}</td>
                                                            <td>{{ SRS::formatDate($course->created_at) }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach

                                                @if (count($semesterCourses) <= 0)
                                                    <tr>
                                                        <td colspan="7">
                                                            <div class="alert alert-warning alert-dismissable">
                                                                <strong>Info!</strong> No Module assigned to you
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <br>
                                    @endforeach
                                @else
                                    <div class="alert alert-warning alert-dismissable">
                                        <strong>Info!</strong> No Module assigned to you
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/dashboard/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tab_sem1').DataTable({});
            $('#tab_sem2').DataTable({});
        });
    </script>
@endsection