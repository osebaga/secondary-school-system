@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Department Modules | Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Modules offering-<b class="black">{{$department->department_name}}</b>
                </h2>

                <div class="boxpane-icon">

                                    <a href="{{route('courses.create',$id)}}" class="btn btn-sm btn-primary p-1 m-1">
                                        <i class="fa fa-plus-circle"></i>
                                        {{"Add Module"}}
                                    </a>

                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">
                            The following is the list of the all module offered by this department.Please select click the Module name to see the information regarding that Module.
                        </p>
                           <div class="table-responsive">
{{--                               @dd($courses)--}}
                            @if(!empty($courses))
                                <table  id="sem1Table" class="table table-bordered table-hover table-striped" style="width: 100%;">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>Code</th>
                                        <th>Module Name</th>
                                        <th>Facilitor</th>
                                        <th>Status</th>
                                    </tr>
                                    <tr ><th colspan="8" class="text-center bgrey"><strong><i>Module List</i></strong></th></tr>

                                    </thead>
                                    <tbody>

                                    @foreach($courses as $course)
                                        <tr>
                                            <td>{{$course->course_code}}</td>
                                            {{-- <td>{{link_to(route('courses.config.course-details',[SRS::encode($course->id),SRS::encode($course->department_id)]),$course->course_name)}}</td> --}}
                                             <td>{{$course->course_name}}</td>
                                            <td>
                      {{ $course->staffs->first()->user->first_name ?? 'NO' }}  {{ $course->staffs->first()->user->last_name ?? '' }}
                                                {{-- @if($course->staffs >0)
                                                    {{'Yes'}}
                                                @else
                                                    {{'No'}}
                                                @endif --}}
                                            </td>
                                            <td>In Progress</td>
                                        </tr>

                                    @endforeach



                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            @else
                                <div class="alert alert-warning alert-dismissable">
                                    Info! No Modules available for Semester One
                                </div>


                            @endif


                        </div>
                           <div class="table-responsive mt-5">
                            @if(!empty($courses_sem2))
                                <table  id="sem2Table" class="table table-bordered table-hover table-striped" style="width: 100%;">
                                    <thead>
                                    <tr class="bg-warning">
                                        <th>Code</th><th>Module Name</th><th>Facilitor</th><th>Status</th>
                                    </tr>
                                    <tr ><th colspan="8" class="text-center bgrey"><strong><i>Semester/Trimester/Module 2</i></strong></th></tr>

                                    </thead>
                                    <tbody>

                                    @foreach($courses_sem2 as $course)
                                        <tr>
                                            <td>{{$course->course_code}}</td>
                                            {{-- <td>{{link_to(route('courses.config.course-details',[SRS::encode($course->course_id),SRS::encode($course->department_id)]),$course->course_name)}}</td> --}}
                                            <td>{{$course->course_name}}</td>
                                            <td>
                                                @if($course->staff_count >0)
                                                    {{'Yes'}}
                                                  @else
                                                    {{'No'}}
                                                @endif
                                            </td>
                                            <td>In Progress</td>
                                        </tr>

                                    @endforeach



                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            @else
                                {{-- <div class="alert alert-warning alert-dismissable">
                                    Info! No modules available for Semester Two
                                </div> --}}


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
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#sem1Table').DataTable({
                processing: true,
                serverSide: false,
            });

            $('#sem2Table').DataTable({
                processing: true,
                serverSide: false,
            });


        });
    </script>


@endsection
