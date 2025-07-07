@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | Examination Results</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-customx">
                <ul class="nav nav-tabs tabs-bordered" id="tabMenu">
                    @if (!empty($student))
                        @for ($y = 1; $y <= $student_classes->first()->year_of_study; $y++)
                            <li class="nav-item">
                                <a class="nav-link {{ $y == 1 ? 'active' : '' }}" href="#year-{{ $y }}"
                                    data-toggle="tab">
                                    {!! SRS::year_level($y) !!}
                                </a>
                            </li>
                        @endfor
                    @endif
                </ul>

                <div class="tab-content">
                    @forelse($student->student_class as $y => $std)
                        @php $yos = SRS::yearofstudy($std->reg_no); @endphp

                        @foreach ($yos as $val)
                            <div class="tab-pane {{ $val->year_of_study == 1 ? 'active' : '' }}"
                                id="year-{{ $val->year_of_study }}">
                                <div class="boxpane">
                                    <div class="boxpane-header">
                                        <h2 class="blue">
                                            <i class="fa-fw fa fa-book nb"></i> Course Result for
                                            <b class="black">[{{ $std->reg_no }}]</b>
                                        </h2>
                                    </div>

                                    @php
                                        $semesters = [1 => 'Semester I', 2 => 'Semester II'];
                                    @endphp

                                    @foreach ($semesters as $semester => $title)
                                        @php
                                            $results = SRS::courseResult(
                                                $val->year_id,
                                                $val->year_of_study,
                                                $semester,
                                                $std->reg_no,
                                            );
                                            $publishStatus =
                                                $results->count() > 0
                                                    ? SRS::checkPublish(
                                                        $class->intake_category_id,
                                                        $class->program_id,
                                                        $class->campus_id,
                                                        $semester,
                                                        $results->first()->year_id,
                                                    )
                                                    : null;
                                        @endphp

                                        <div class="boxpane-content">
                                            <div class="table-responsive">
                                                <table class="table mt-1 table-hover table-bordered table-striped">
                                                    <thead class="bg-light black">
                                                        <tr>
                                                            <th class="text-center" colspan="9">{{ $title }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Code</th>
                                                            <th>Course Name</th>
                                                            <th>CA</th>
                                                            <th>ESE</th>
                                                            <th>Total Score</th>
                                                            <th>Credits</th>
                                                            <th>Grade</th>
                                                            <th>Points</th>
                                                            <th>Remark</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($results->count() > 0 && $publishStatus && $publishStatus->status == 1)
                                                            @php
                                                                $totalCredits = 0;
                                                                $totalPoints = 0;
                                                                $gpa = 0;
                                                            @endphp

                                                            @foreach ($results as $r)
                                                                <tr>
                                                                    <td>{{ $r->course->course_code }}</td>
                                                                    <td>{{ $r->course->course_name }}</td>
                                                                    <td>{{ $r->ca_score }}</td>
                                                                    <td>{{ $r->se_score }}</td>
                                                                    <td>{{ $r->total_score }}</td>
                                                                    <td>{{ $r->credits }}</td>
                                                                    <td>{{ $r->grade }}</td>
                                                                    <td>{{ $r->points }}</td>
                                                                    <td>{{ $r->remarks }}</td>
                                                                </tr>
                                                                @php
                                                                    $totalCredits += $r->credits;
                                                                    $totalPoints += $r->points;
                                                                    $gpa = $r->gpa;
                                                                @endphp
                                                            @endforeach

                                                            <tr>
                                                                <td colspan="2"><b>Total</b></td>
                                                                <td colspan="3"></td>
                                                                <td>{{ $totalCredits }}</td>
                                                                <td colspan="1"></td>
                                                                <td>{{ $totalPoints }}</td>
                                                                <td><b>GPA:</b> {{ $gpa }}</td>
                                                            </tr>
                                                        @elseif($results->count() > 0 && (!$publishStatus || $publishStatus->status != 1))
                                                            <tr>
                                                                <td colspan="9" class="alert alert-danger text-center">
                                                                    Info! Course results not published
                                                                </td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td colspan="9" class="alert alert-warning text-center">
                                                                    Info! No course results yet for {{ $title }}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </tbody>

                                                    @if (
                                                        $loop->last && $semester == 2 &&
                                                            isset($annual_results) &&
                                                            $annual_results->count() > 0 &&
                                                            $publishStatus &&
                                                            $publishStatus->status == 1)
                                                        <tfoot class="text-left">
                                                            <tr>
                                                                <th colspan="9" class="text-center">
                                                                    Overall GPA: {{ $annual_results->first()->gpa }}
                                                                </th>
                                                            </tr>
                                                        </tfoot>
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @empty
                        <div class="alert alert-warning">No course data found for student.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#gender, #entry_qualification, #is_disabled, #sponsorship').select2({
            minimumResultsForSearch: -1
        });
        $('#citizenship').select2();

        $(document).on('ready', function() {
            $("#avatar").fileinput({
                showUpload: false,
                dropZoneEnabled: false,
                mainClass: "input-group-lg"
            });
        });

        $(document).ready(function() {
            var oldTab = '{{ old('tab') }}';
            if (oldTab) {
                $('#tabMenu a[href="#' + oldTab + '"]').tab('show');
            }
        });
    </script>
@endsection
