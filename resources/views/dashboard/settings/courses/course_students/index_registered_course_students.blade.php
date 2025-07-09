@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-primary btn-sm m-2"
                       href="{{ route('exam.category.download', [SRS::encode($course->id), 'se', SRS::encode($intake_id)]) }}">
                        <i class="fa fa-1x fa-file-excel-o p-2" data-placement="left"></i>Export Template
                    </a>
                </div>

                @if(!is_null($check_sem1_upload) || !is_null($check_sem2_upload))
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm m-2"
                           href="{{ route('exam.upload.form', [SRS::encode($course->id), SRS::encode($intake_id)]) }}">
                            <i class="fa fa-1x fa-file-excel-o p-2" data-placement="left"></i>Upload Marks
                        </a>
                    </div>
                @else
                    <div class="alert alert-warning">Upload Closed</div>
                @endif
            </div>
        </div>

        <div class="col-md-12">
            <div class="nav-tabs-customx">
                <ul class="nav nav-tabs tabs-bordered" id="tabMenu">
                    {{-- <li class="nav-item">
                        <a class="nav-link active" href="#coursework" data-toggle="tab" aria-expanded="false">
                            Course Assessment (CA)
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#courseresult" data-toggle="tab" aria-expanded="false">
                            Student List
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="coursework">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue">
                                    Subject Name: <b>{{ $course->course_name. '  ('.$course->course_code.') ' }}</b>
                                </h2>
                            </div>
                            <div class="boxpane-content">
                                <div class="table-responsive">
                                    <table id="caTable" class="table table-striped table-bordered table-hover text-justify" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>S/No</th>
                                                <th>Name</th>
                                                <th>Sex</th>
                                                <th>Reg Number</th>
                                                <th>ASSGM I</th>
                                                <th>ASSGM II</th>
                                                <th>WR I</th>
                                                <th>WR II</th>
                                                @if($course->course_status==1) <!-- Check if course has practicals -->
                                                    <th>OSPECA</th> <!-- OSPECA column -->
                                                @endif
                                                <th>AVCA(40%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Data will be populated by DataTables --}}
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="courseresult">
                        <div class="boxpane">
                            <div class="boxpane-header">
                                <h2 class="blue">
                                    Registered Student In <b>[{{ '('.$course->course_code.') '.$course->course_name }}]</b>
                                </h2>
                            </div>
                            <div class="boxpane-content">
                                <div class="table-responsive">
                                    <table id="seTable" class="table table-striped table-bordered table-hover text-justify"
                                           style="width: 100%; white-space: nowrap;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Sex</th>
                                                <th>Reg Number</th>
                                                <th>CA Score</th>
                                                <th>SE Score</th>
                                                <th>Total Score</th>
                                                <th>Grade</th>
                                                <th>Remark</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Data will be populated by DataTables --}}
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/custombox.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link href="{{ asset('assets/dashboard/fileInput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection

@section('scripts')
    <script src="{{ asset('assets/dashboard/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#exam_category_id').select2({
                minimumResultsForSearch: -1,
                placeholder: 'Select Exam Category',
            });

            let caTable = $('#caTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('courses.get-student-coursework', [SRS::encode($course_id), SRS::encode($intake_id)]) }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'full_name', name: 'full_name'},
                    {data: 'sex', name: 'sex'},
                    {data: 'reg_no', name: 'reg_no'},
                    {data: 'assignment_1', name: 'assignment_1'}, // ASSGM I
                    {data: 'assignment_2', name: 'assignment_2'}, // ASSGM II
                    {data: 'wr_1', name: 'wr_1'}, // WR I
                    {data: 'wr_2', name: 'wr_2'}, // WR II
                    @if($course->course_status==1)
                        {data: 'opseca', name: 'opseca'}, // OSPECA
                    @endif
                    {data: 'avgScore', name: 'avgScore'},
                ],
            });

            let seTable = $('#seTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('courses.get-student-course-results', [SRS::encode($course_id), SRS::encode($intake_id)]) }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'full_name', name: 'full_name'},
                    {data: 'sex', name: 'sex'},
                    {data: 'reg_no', name: 'reg_no'},
                    {data: 'ca_score', name: 'ca_score'},
                    {data: 'se_score', name: 'se_score'},
                    {data: 'total_score', name: 'total_score'},
                    {data: 'grade', name: 'grade'},
                    {data: 'remarks', name: 'remarks'},
                ],
            });
        });
    </script>
@endsection