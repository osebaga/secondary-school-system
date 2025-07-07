@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} Block Register| Index</title>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    {{-- <div class="boxpane-icon">
                    <a href="{{route('create.room')}}" class="btn btn-sm btn-primary p-1 m-1">
                        <i class="fa fa-plus-circle"></i>
                        {{"Add Room"}}
                    </a>
                </div> --}}
                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">
                                The following is the list of Room Applications.
                            </p>
                            <div class="table-responsive">
                                <table id="applications" class="table table-bordered table-hover table-striped"
                                    style="width: 100%;">
                                    <thead>
                                        <tr class="">
                                            <th>SNo.</th>
                                            <th>Registration #</th>
                                            <th>Criteria</th>
                                            <th>Reason</th>
                                            <th>Year</th>
                                            <th>Action</th>

                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($applications as $application)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $application->reg_no }}</td>
                                                <td>{{ $application->criteria->short_name }}
                                                </td>
                                                <td>{{ $application->reason }}</td>
                                                <td>
                                                    {{ $application->academicYear->year }}
                                                </td>
                                                <td class="btn btn-dark btn-sm"><a style="color: white" href="{{ route('room-allocation-form', Crypt::encrypt($application->reg_no) ) }}">Assign Room</a></td>
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

@section('scripts')
    <script src="{{ asset('assets/dashboard/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#applications').DataTable({
                processing: true,
                serverSide: false,
            });




        });
    </script>
@endsection
