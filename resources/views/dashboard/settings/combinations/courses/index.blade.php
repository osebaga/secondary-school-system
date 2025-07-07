@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | Index</title>
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue"> ( {{ $combination->combination_code }} - {{ $combination->description }} ) Combination  </h2>
                @can('institutions-create')
                <div class="boxpane-icon">
                    <a href="#" class="btn btn-sm btn-primary p-1 m-1"
                       id="resource-combinationCourse-add-button"> <i class="fa fa-pencil"></i>Add Course</a>
                </div>
                @endcan
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">@lang('app.intro-text')</p>
                    <div class="table-responsive">
                        <table id="combTable" class="table table-bordered table-hover" style="width: 100%;">
                           <thead>
                           <tr>
                            {{ $k = 1}}
                                <th>S/No.</th>
                                <th>Course Code</th> 
                                <th>Course Name</th> 
                                <th>Academic Year</th>
                               <th>Year of Study</th> 
                               <th>Semester</th>
                           </tr>
                           </thead>
                            <tbody>
                                @foreach ($combination_courses as $combination_course)
                                
                                <tr>
                                    <td>{{$k++}}</td>
                                    <td>{{ $combination_course->course->course_code }}</td>
                                    <td>{{ $combination_course->course->course_name }}</td>
                                    <td>{{ $combination_course->academicYears->year }}</td>
                                    
                                        @if ($combination_course->year_of_study == 1)
                                            <td>First Year</td>
                                            @elseif ($combination_course->year_of_study == 2)
                                            <td>Second Year</td>
                                            @else
                                            <td>Third Year</td>
                                        @endif
                                        @if ($combination_course->semester == 1)
                                            <td>Semester I</td>
                                            @else
                                            <td> Semester II</td>
                                        @endif

                                    
                                </tr>
                                    
                                @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection

@section('modals')
    @include('dashboard.settings.combinations.courses.modal_add_course')
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/custombox.min.css')}}">

@endsection
@section('scripts')

    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>


    <script type="text/javascript">

        $(document).ready(function () {
            $('#combTable').DataTable({
                processing: true,
                // serverSide: true,
                // ajax: '{{route('combinations.get-combinations')}}',
                // columns: [
                //     {data: 'id', name: 'id'},
                //     {data: 'institution_name', name: 'institution_name'},
                //     {data: 'institution_acronym', name: 'institution_acronym'},
                //     {data: 'action', name: 'action', orderable: false, searchable: false}
                // ]
            });
        })
    </script>


@endsection
