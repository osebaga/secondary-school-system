@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Hostel > Create</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Register Block
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
                                    <a href="{{route('view.block')}}">
                                        <i class="mdi mdi-18px mdi-eye"></i>
                                        {{"View Block"}}
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
                        {!! Form::open(['route' => 'block.store','class'=>'block.store','method'=>'POST','role' => 'form']) !!}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Hostel Name:</label>
                                          <select class="form-control hostel" name="hostel_id" id="exampleFormControlSelect1">
                                            <option>--Select Hostel Name--</option>
                                            @foreach($hostel as $h)
                                            <option value="{{ $h->id }}">{{ $h->hostel_name }}</option>
                                            @endforeach
                                          </select>
                                         </div>
                                      </div>
                                  
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Block Name:</label>
                                            <input type="text" name="block_name" id="block_name" class="form-control" placeholder="block name">
                                         </div>
                                      </div>
                                      <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Capacity</label>
                                            <input type="number" name="block_capacity" id="block_capacity" class="form-control" placeholder="block capacity">
                                         </div>
                                      </div>

                                      <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Total Rooms:</label>
                                         <input type="number" class="form-control" name="number_of_room" id="number_of_room" placeholder="number of rooms">
                                         </div>
                                      </div>

                                      <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Total Floors:</label>
                                             <input type="number" class="form-control" name="number_of_floor" id="number_of_floor" placeholder="number of floors">
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
                        {{Form::close()}}
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