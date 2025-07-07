@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Subject</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Subjects
                    {{-- -<b class="black">{{$department->department_name}}</b> --}}
                </h2>

                <div class="boxpane-icon">

                                    <a href="{{route('courses.create')}}" class="btn btn-sm btn-primary p-1 m-1">
                                        <i class="fa fa-plus-circle"></i>
                                        {{"Add Course"}}
                                    </a>
                                {{-- </li> --}}


                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">Please pick the Subject below to assign it to a Teacher.
                        </p>
                    <div class="table-responsive">
                        <table id="courseTable" class="table table-striped table-bordered table-hover" style="width: 100%;">
                           <thead>
                           <tr>
                               <th>S/No</th>
                               <th>Code</th> 
                               <th>Name</th>
                               {{-- <th>CA(%)</th>
                               <th>SE(%)</th>
                               <th>Min. CA(%)</th>
                               <th>Min. SE(%)</th> --}}
                               <th>Pass Grade</th>
                               {{-- <th>Credit</th> --}}
                               {{-- <th>Status</th> --}}
                               <th>Actions</th>
                           </tr>
                           </thead>
                            <tbody></tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

@section('scripts')
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
           let courseTable= $('#courseTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('assignment.courses-list')}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'course_code', name: 'course_code'},
                    {data: 'course_name', name: 'course_name'},
                    // {data: 'cw', name: 'cw'},
                    // {data: 'final', name: 'final'},
                    // {data: 'min_cw', name: 'min_cw'},
                    // {data: 'min_ue', name: 'min_ue'},
                    {data: 'pass_grade', name: 'pass_grade'},
                    // {data: 'unit', name: 'unit'},               
                   // {data: 'course_status', name: 'course_status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>
@endsection
