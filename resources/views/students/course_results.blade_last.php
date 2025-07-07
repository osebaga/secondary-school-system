@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | Course Result</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-customx">
                <ul class="nav nav-tabs tabs-bordered" id="tabMenu">
                    @if (!empty($student))

                        @for ($y = 1; $y <= $student_classes->first()->year_of_study; $y++)
                            <li class=" nav-item">
                                <a class="nav-link {{ $y == 1 ? 'active' : '' }}" href="#year-{{ $y }}"
                                    data-toggle="tab" aria-expanded="false">
                                    {!! SRS::year_level($y) !!}
                                </a>
                            </li>
                        @endfor
                </ul>
                <div class="tab-content">
                    @forelse($student->student_class as $y=>$std)
                        <?php 
                        $yos = SRS::yearofstudy($std->reg_no);
                        foreach ($yos as $val){
                           
                     ?>
                        <div class="tab-pane {{ $val->year_of_study == 1 ? 'active' : '' }}"
                            id="year-{{ $val->year_of_study }}">
                            <div class="boxpane">
                                <div class="boxpane-header">
                                    <h2 class="blue"><i class="fa-fw fa fa-book nb"></i>
                                        Course Result for <b class="black">[{{ $std->reg_no }}]</b>

                                    </h2>
                                </div>
                                <div class="boxpane-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            
                                            $cr = SRS::courseResult($val->year_id, $val->year_of_study, 1, $std->reg_no);
                                            if (count($cr) > 0) {
                                                $publish = SRS::checkPublish($class->intake_category_id, $class->program_id, $class->campus_id, 1, $cr->first()->year_id);
                                            }
                                            ?>
                                            <div class="table-responsive">
                                                <table class="table mt-1 table-hover table-bordered table-striped"
                                                    width="100%">
                                                    <thead class="bg-light black">
                                                        <tr>
                                                            <th class="text-center" colspan="14">Semester I</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Code</th>
                                                            <th>Course Name</th>
                                                            <th>Credits</th>
                                                            <th>Grade</th>
                                                            <th>Points</th>
                                                            <th>Remark</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>

                                                        @if (count($cr) > 0)
                                                            @if (!is_null($publish))
                                                                @if ($publish->status == 1)
                                                                    @foreach ($cr as $r)
                                                                        <tr>
                                                                            <td>{{ $r->course->course_code }}</td>
                                                                            <td>{{ $r->course->course_name }}</td>
                                                                            <td>{{ $r->credits }}</td>
                                                                            <td>{{ $r->grade }}</td>
                                                                            <td>{{ $r->points }}</td>
                                                                            <td>{{ $r->remarks }} </td>
                                                                        </tr>
                                                                    @endforeach

                                                                    <tr>
                                                                        @if ($r->semester_id == 1)
                                                                            <td colspan="2"><b>TOTAL</b></td>
                                                                            <td>{{ $r->total_credits }}</td>
                                                                            <td></td>
                                                                            <td>{{ $r->total_points }}</td>
                                                                            <td><b>GPA </b>{{ $r->gpa }}</td>
                                                                        @endif
                                                                    </tr>
                                                                @elseif($publish->status == 0)
                                                                    <tr>
                                                                        <td colspan="6"
                                                                            class="alert alert-danger text-center">
                                                                            Info! course results not Published
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @elseif(count($cr) > 0 && is_null($publish))
                                                                <tr>
                                                                    <td colspan="6"
                                                                        class="alert alert-danger text-center">
                                                                        Info! course results not Published
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                </tr>

                                                            @endif
                                                    </tbody>
                                                    {{-- <tfoot class="text-left">
                                                    </tfoot> --}}
                                                </table>
                                            @else
                                                <div class="alert alert-warning alert-dismissable">
                                                    Info! No course results yet for Semester One
                                                </div>

                    @endif


                </div>
            </div>
        </div>
        <!---seme 2 -->
        <div class="boxpane-content">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    
                    $cr = SRS::courseResult($val->year_id, $val->year_of_study, 2, $std->reg_no);
                    // dd($cr);
                    if (count($cr) > 0) {
                        $publish = SRS::checkPublish($class->intake_category_id, $class->program_id, $class->campus_id, 2, $cr->first()->year_id);
                    }
                    ?>

                    <div class="table-responsive">
                        <table class="table mt-1 table-hover table-bordered table-striped" width="100%">
                            <thead class="bg-light black">
                                <tr>
                                    <th class="text-center" colspan="14">Semester II</th>
                                </tr>
                                <tr>
                                    <th>Code</th>
                                    <th>Course Name</th>
                                    <th>Credits</th>
                                    <th>Grade</th>
                                    <th>Points</th>
                                    <th>Remark</th>
                                </tr>

                            </thead>
                            <tbody>
                                @if (count($cr) > 0)
                                    @if (!is_null($publish))

                                        @if ($publish->status == 1)
                                            @foreach ($cr as $r)
                                                <tr>

                                                    <td>{{ $r->course->course_code }}</td>
                                                    <td>{{ $r->course->course_name }}</td>

                                                    <td>{{ $r->credits }}</td>
                                                    <td>{{ $r->grade }}</td>
                                                    <td>{{ $r->points }}</td>
                                                    <td>{{ $r->remarks }}</td>

                                                </tr>
                                            @endforeach

                                            <tr>
                                                @if ($r->semester_id == 2)
                                                    <td colspan="2"><b>TOTAL</b></td>
                                                    <td>{{ $r->total_credits }}</td>
                                                    <td></td>
                                                    <td>{{ $r->total_points }}</td>
                                                    <td><b>GPA </b>{{ $r->gpa }}</td>
                                                @endif
                                            </tr>
                                        @elseif($publish->status == 0)
                                            <tr>
                                                <td colspan="6" class="alert alert-danger text-center">
                                                    Info! course results not Published
                                                </td>
                                            </tr>
                                        @endif
                                    @elseif(count($cr) > 0 && is_null($publish))
                                        <tr>
                                            <td colspan="6" class="alert alert-danger text-center">
                                                Info! course results not Published
                                            </td>
                                        </tr>
                                    @endif
                            </tbody>
                            <tfoot class="text-left">
                                @if ($annual_results->count() > 0)
                                    <th colspan="6" class="text-center">
                                        Overall GPA {{ $annual_results->first()->gpa }}
                                    </th>
                                @endif
                            </tfoot>
                        @else
                            <div class="alert alert-warning alert-dismissable">
                                Info! No course results yet for Semester Two
                            </div>
                            @endif
                            <tfoot class="text-left">
                            </tfoot>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>


    <?php } ?>

@empty


    @endif
    @endforelse



@endsection

@section('scripts')
    <script>
        $('#gender').select2({
            minimumResultsForSearch: -1,
        })
        $('#entry_qualification').select2({
            minimumResultsForSearch: -1,
        })
        $('#is_disabled').select2({
            minimumResultsForSearch: -1,
        })
        $('#sponsorship').select2({
            minimumResultsForSearch: -1,
        })
        $('#citizenship').select2({})
        $(document).on('ready', function() {
            $("#avatar").fileinput({
                showUpload: false,
                dropZoneEnabled: false,
                mainClass: "input-group-lg"
            });
        });

        $(document).ready(function() {
            $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
        });
    </script>
@endsection
