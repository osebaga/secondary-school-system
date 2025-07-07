@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Module Offering| Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">Module Configuration </h2>

                    <div class="boxpane-icon">

                    </div>
                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">
                                The following is the list of campuses and departments available click department name to continue
                            </p>
                            <div class="table-responsive">
                                <table id="campusTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Faculty Name</th><th>Department Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;?>
                                    @foreach($faculties as $faculty)
                                        <tr>
                                            @if(count($faculty->departments)>0)
                                                <th rowspan="{{count($faculty->departments)+1}}">
                                                    {{$faculty->faculty_name}}
                                                </th>
                                            @else
                                                <th rowspan="2">{{$faculty->faculty_name}}</th>
                                            @endif
                                            

                                        </tr>
                                        <?php $x = ''; ?>
                                        <?php $f = ''; ?>
                                        @forelse($faculty->departments as $dep)
                                            <tr>
                                                <td >

                                                    {{link_to(route('courses.config.department-courses',[SRS::encode($dep->id),SRS::encode($dep->faculty_id)]),$dep->department_name)}}

                                                </td>



{{--                                                <td>--}}
{{--                                                    <ul class="list-group list-group-flush">--}}
{{--                                                        @forelse($faculty->departments as $dep)--}}
{{--                                                            <li class="list-group-item"> {{link_to(route('courses.config.department-courses',[SRS::encode($dep->id),SRS::encode($dep->faculty_id)]),$dep->department_name)}}</li>--}}
{{--                                                        @empty--}}
{{--                                                            {{"No Departments"}}--}}
{{--                                                        @endforelse--}}
{{--                                                    </ul>--}}
{{--                                                </td>--}}

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="bg-inverse white">{{"No Faculties"}}</td>
                                            </tr>
                                        @endforelse
                                        <?php $i++?>
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

@section('scripts')
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

        })
    </script>


@endsection
