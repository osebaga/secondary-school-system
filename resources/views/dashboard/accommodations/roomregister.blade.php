@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Room > Create</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Register Room
                </h2>

                <div class="boxpane-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            {{-- <a data-toggle="dropdown" href="#">
                                <i class="icon fa fa-tasks3" data-placement="left" title="{{ 'Actions' }}"></i>
                            </a> --}}
                            {{-- <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu" aria-labelledby="dLabel"> --}}
                                <li>
                                    <h2>
                                    <a href="{{route('view.room')}}">
                                        <i class="mdi mdi-18px mdi-eye"></i>
                                        {{"View Room"}}
                                    </a></h2>
                                </li>
                            {{-- </ul> --}}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">@lang('app.intro-text')</p>
                        {!! Form::open(['route' => 'store.room', 'class' => 'store.room', 'method' => 'POST', 'role' => 'form']) !!}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Hostel Name:</label>
                                            <select name="hostel_id" id="hostel_id" class="form-control hostel"
                                                aria-placeholder="hostel name">
                                                <option value="">--Select Hostel--</option>
                                                @foreach ($hostels as $ro)
                                                    <option value="{{ $ro->id }}">{{ $ro->hostel_name }}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Room Number:</label>
                                            <input type="number" name="room_number" id="room_number" class="form-control"
                                                placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Capacity</label>
                                            <input type="number" name="capacity" id="capacity" class="form-control"
                                                placeholder="room capacity">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Block:</label>
                                            <select class="form-control hostel" name="block_id"
                                                id="exampleFormControlSelect1">
                                                <option>--Select Block--</option>
                                                @foreach ($blocks as $bl)
                                                    <option value="{{ $bl->id }}">{{ $bl->block_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Floor:</label>
                                            <input type="text" class="form-control" name="floor_name" id="floor_name"
                                                placeholder="number of floors">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::submit('Submit', ['type' => 'button', 'class' => 'btn btn-md btn-success pull-right']) !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')

    <script>
        $(document).ready(function() {
            $('.hostel').select2();
        });

    </script>
@endsection
