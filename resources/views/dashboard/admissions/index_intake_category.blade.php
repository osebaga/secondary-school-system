@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Class Groups| Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Class Groups
                    </h2>

                    <div class="boxpane-icon">
                        <ul class="btn-tasks">
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="#">
                                    <i class="icon fa fa-tasks3" data-placement="left"
                                       title="{{"Actions"}}"></i>
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">
                                The following is the list of Class Groups available click Groups to continue
                            </p>
                            <div class="table-responsive">
                                <table id="batchTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th> S/N</th>
                                        <th>Class Group</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;?>
                                    @forelse($intakes as $intake)

                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td >

                                                    {{link_to(route('enroll.new.student',SRS::encode($intake->id)),$intake->name)}}

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
