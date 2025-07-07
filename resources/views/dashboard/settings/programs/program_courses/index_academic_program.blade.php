@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Academic Program | Index</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue"><i class="fa-fw fa fa-dashboard"></i>
                    Academic Programmes-<b class="black">{{$faculty->faculty_name}}</b>
                </h2>

                <div class="boxpane-icon">


                                    <a href="{{route('programs.create',$id)}}" class="btn btn-sm btn-primary p-1 m-1">
                                        <i class="fa fa-plus-circle"></i>
                                        {{"Add Programme"}}
                                    </a>


                    </ul>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">
                            The following is the list of programme(s) available in this school/faculty to add new programme <b>click  menu above <i class="fa fa-hand-o-right" aria-hidden="true"></i></b>
                        </p>
                        <div class="table-responsive">
                            <table id="programTable" class="table table-striped table-bordered table-hover" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th><th>Program Name</th> <th>Code</th> <th>Weight</th><th>Duration</th><th>Actions</th>
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
            let courseTable= $('#programTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('program-courses.get-academic-programs',$id)}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'program_name', name: 'program_name'},
                    {data: 'program_code', name: 'program_code'},
                    {data: 'program_weight', name: 'program_weight'},
                    {data: 'program_duration', name: 'program_duration'},



                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection
