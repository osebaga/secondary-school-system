@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Class Group</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Class Group Types
                    </h2>

                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">
                                The following is the list of Class Group, click Class Group name to get list of students Results
                            </p>
                            <div class="table-responsive">
                                <table id="batchTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>S/No</th>
                                        <th>Class Group</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;?>
                                    @forelse($intakes as $intake)

                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td >

                                                    {{link_to(route('courses.course-students',[SRS::encode($course_id),SRS::encode($intake->id)]),$intake->name)}}

                                                </td>



                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="bg-inverse white">{{"No Class Group"}}</td>
                                            </tr>
                                        @endforelse
                                        <?php $i++?>
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
