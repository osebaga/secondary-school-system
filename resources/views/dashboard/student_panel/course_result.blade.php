@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | Student Exam Overview</title>
@endsection

@section('content')
    <div class="row mt-3"> <!-- Added margin-top for spacing -->
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-customx">
                <ul class="nav nav-tabs tabs-bordered" id="tabMenu">
                    @if (!empty($student))
                        @for ($y = 1; $y <= $student_classes->first()->year_of_study; $y++)
                            <li class="nav-item">
                                <a class="nav-link {{ $y == 1 ? 'active' : '' }}" href="#year-{{ $y }}"
                                    data-toggle="tab" aria-expanded="false">
                                    {!! SRS::year_level($y) !!}
                                </a>
                            </li>
                        @endfor
                </ul>
                @endif
                <div class="tab-content">
                    @forelse($student->student_class as $std)
                        <?php $yos = SRS::yearofstudy($std->reg_no); ?>
                        @foreach ($yos as $val)
                            <div class="tab-pane {{ $val->year_of_study == 1 ? 'active' : '' }}" id="year-{{ $val->year_of_study }}">
                                <div class="boxpane">
                                    <div class="boxpane-header">
                                        <h2 class="blue">
                                            <i class="fa-fw fa fa-book nb"></i>
                                            Student Exam Overview for <b class="black">[{{ $std->reg_no }}]</b>
                                        </h2>
                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @for ($semester = 1; $semester <= 4; $semester++)
                                                    <?php
                                                    $cr = SRS::courseResult($val->year_id, $val->year_of_study, $semester, $std->reg_no);
                                                    ?>
                                                    <div class="table-responsive mt-1">
                                                        <table class="table table-hover table-bordered table-striped" width="100%">
                                                            <thead class="bg-light black">
                                                                <tr>
                                                                    <th class="text-center" colspan="14">
                                                                        @if($semester==1)
                                                           @php 
                                                                echo 'MARCH MIDTERM EXAMINATION RESULTS';
                                                            @endphp 
                                                        @elseif($semester==2)
                                                           @php 
                                                                echo 'TERMINAL EXAMINATION RESULTS';
                                                            @endphp 
                                                            
                                                        @elseif($semester==3)
                                                           @php 
                                                                echo 'SEPTEMBER MIDTERM EXAMINATION RESULTS';
                                                            @endphp
                                                        @elseif($semester==4)
                                                           @php 
                                                                echo 'ANNUAL EXAMINATION RESULTS';
                                                            @endphp 
                                                            
                                                        @endif
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Code</th>
                                                                    <th>Subject Name</th>
                                                                    {{-- <th>CA</th> --}}
                                                                    {{-- <th>ESE</th> --}}
                                                                    <th>Score</th>
                                                                    {{-- <th>Credits</th> --}}
                                                                    <th>Grade</th>
                                                                    {{-- <th>Points</th> --}}
                                                                    <th>Remark</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (count($cr) > 0)
                                                                    @foreach ($cr as $r)
                                                                        <tr>
                                                                            <td>{{ $r->course->course_code }}</td>
                                                                            <td>{{ $r->course->course_name }}</td>
                                                                            {{-- <td>{{ $r->ca_score }}</td> --}}
                                                                            {{-- <td>{{ $r->se_score }}</td> --}}
                                                                            <td>{{ $r->total_score }}</td>
                                                                            {{-- <td>{{ $r->credits }}</td> --}}
                                                                            <td>{{ $r->grade }}</td>
                                                                            {{-- <td>{{ $r->points }}</td> --}}
                                                                            <td>{{ $r->remarks }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    {{-- <tr>
                                                                        <td colspan="2"><b>TOTAL</b></td>
                                                                        <td colspan="3"></td>
                                                                        <td>{{ $r->total_credits }}</td>
                                                                        <td></td>
                                                                        <td>{{ $r->total_points }}</td>
                                                                        <td><b>GPA </b>{{ $r->gpa }}</td>
                                                                    </tr> --}}
                                                                @else
                                                                    <tr>
                                                                        <td colspan="9" class="text-center">
                                                                            <div class="alert alert-warning">No course results yet for Semester {{ $semester }}</div>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @empty
                        <div class="alert alert-warning">No student classes found.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection