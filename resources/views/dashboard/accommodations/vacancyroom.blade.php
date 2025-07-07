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
                                            <th>S/N</th>
                                            <th>Hostel</th>
                                            <th>Room Number</th>
                                            <th>Capacity</th>
                                            <th>Vacants</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($rooms as $room)
                                            @if ($room->capacity - $room->allocations > 0)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $room->hostel_name }}</td>
                                                    <td>{{ $room->block_name }}-{{ $room->room_number }}
                                                    </td>
                                                    <td>{{ $room->capacity }}</td>
                                                    <td>{{ $room->capacity - $room->allocations }}</td>
                                                    {{-- <td class="btn btn-dark btn-sm">Assign Student</td> --}}
                                                </tr>
                                            @endif
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
