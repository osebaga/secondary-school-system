@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Course Shift| Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Course Shift </h2>

                <div class="boxpane-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            <a data-toggle="dropdown" href="#">
                                <i class="icon fa fa-tasks3" data-placement="left"
                                   title="{{"Actions"}}"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu"
                                aria-labelledby="dLabel">
                                <li>
                                    <a href="{{route('colleges.create')}}">
                                        <i class="fa fa-plus-circle"></i>
                                        {{"Add College"}}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">
                            The following is the list of college(s) and schools available click department name to continue
                        </p>
                        <div class="table-responsive">
                            <table id="collegeTable" class="table table-bordered table-hover" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>College Name</th> <th>Schools Name</th><th>Departments</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                @foreach($colleges as $college)
                                <tr>
                                     @if(count($college->faculties)>0)
                                        <th rowspan="{{count($college->faculties)+1}}">
                                           {{$college->college_name}}
                                        </th>
                                         @else
                                         <th rowspan="2">{{$college->college_name}}</th>
                                    @endif

                                </tr>
                                <?php $x = ''; ?>
                                <?php $f = ''; ?>
                                @forelse($college->faculties as $faculty)
                                    <tr>
                                        <td >

                                            {{$faculty->faculty_name}}

                                        </td>
                                            <td>
                                                <ul class="list-group list-group-flush">
                                                @forelse($faculty->departments as $dep)

                                                        <li class="list-group-item"> {{link_to(route('courses.shift.department-courses',SRS::encode($dep->id)),$dep->department_name)}}</li>
                                                @empty
                                                    {{"No Departments"}}
                                                @endforelse
                                                </ul>
                                            </td>

                                    </tr>
                                  @empty
                                    <tr>
                                        <td colspan="2" class="bg-inverse white">{{"No Schools"}}</td>
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
