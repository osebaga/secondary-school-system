@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Programme Participant</title>

@endsection


@section('content')
    <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="black"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Participant Programmes on the course : -<b class="black">{{$course->course_code}}</b>


                </h2>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">

                            The following is the list of the all programmes participating in this course for thi academic year
                        </p>

                        <div class="table-responsive">
                            <table id="prtTable" class="tablex table-striped table-bordered table-hover text-justify" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Program Name</th>
                                    <th>Code</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            let prtTable= $('#prtTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('courses.get-course-program-participant',$id)}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'program_name', name: 'program_name'},
                    {data: 'program_code', name: 'program_code'},
                    {data: 'program_duration', name: 'program_duration'},
                    {data: 'core', name: 'core'},
               ]
            });
        })
    </script>


@endsection