@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} Allocation | Room</title>
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
                                Room Allocation
                            </p>
                            <form action="{{ route('store-allocation') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Hostel:</label>
                                            <select name="hostel_id" id="hostel" class="form-control" required>
                                                <option value="">--Select Hostel--</option>
                                                @foreach ($hostels as $hostel)
                                                    <option value="{{ $hostel->id }}">{{ $hostel->hostel_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="room" class="col-sm-6 col-form-label">Room:</label>
                                            <select name="room_id" id="room" class="form-control" required>
                                                <option value="">--Select Room--</option>
                                                @foreach ($rooms as $room)
                                                    @if ($room->capacity - $room->allocations > 0)
                                                        <option value="{{ $room->id }}">
                                                            {{ $room->block_name }}-{{ $room->room_number }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="regno" class="col-sm-6 col-form-label">Registration
                                                Number:</label>
                                            <select name="reg_no" id="reg_no" class="form-control" required>
                                                <option value="{{ $reg_no }}">{{ $reg_no }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="year" class="col-sm-6 col-form-label">Application Year:</label>
                                            <select name="year_id" id="year" class="form-control" required>
                                                <option value="{{ $application_year->id }}">{{ $application_year->year }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="regno" class="col-sm-6 col-form-label">Check In:</label>
                                            <input type="date" class="form-control" name="check_in" id="checkin"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="regno" class="col-sm-6 col-form-label">Check Out:</label>
                                            <input type="date" class="form-control" name="check_out" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for=""></label>
                                        <div class="form-group mt-3">
                                            <input type="submit" class="btn btn-primary" value="Allocate">
                                        </div>
                                    </div>
                                </div>
                            </form>
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
            $('#hostel').select2();
            $('#room').select2();
            $('#year').select2();
            $('#reg_no').select2();

        });
    </script>
@endsection
