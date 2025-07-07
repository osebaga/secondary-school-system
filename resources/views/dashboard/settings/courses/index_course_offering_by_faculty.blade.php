@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Module Offering| Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Department List</h2>

                <div class="boxpane-icon">

                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">
                            The following is the list of departments available, click department name to View Module/Course List
                        </p>
                        <div class="table-responsive">
                            <table id="campuseTable" class="table table-bordered table-hover" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Departments</th>
                                    <th></th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                @foreach($faculties as $f)
                                {{-- <tr>
                                     @if(count($f->departments)>0)
                                        <th rowspan="{{count($f->departments)+1}}">
                                           {{$f->faculty_name}}
                                        </th>
                                         @else
                                         <th rowspan="2">{{$f->faculty_name}}</th>
                                    @endif

                                </tr> --}}

                                @forelse($f->departments as $dep)
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td >

                                            {{link_to(route('courses.department-courses',SRS::encode($dep->id)),$dep->department_name)}}

                                        </td>
                                        
                                        <td >
                                            {{link_to(route('courses.config.department-courses',[SRS::encode($dep->id),SRS::encode($dep->faculty_id)]),'Modules By Semester')}}
                                        </td>



                                    </tr>
                                  @empty
                                    <tr>
                                        <td colspan="2" class="bg-inverse white">{{"No Campuses"}}</td>
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
