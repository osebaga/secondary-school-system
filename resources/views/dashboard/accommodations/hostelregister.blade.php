@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Hostel > Create</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Register Hostel
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
                                    <a href="{{route('view.hostel')}}">
                                        <i class="mdi mdi-18px mdi-eye"></i>
                                        {{"View Hostel"}}
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
                        {!! Form::open(['route' => 'store.hostel','class'=>'register.hostel','method'=>'POST','role' => 'form']) !!}

                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            {!! Form::label('Hostel Code', 'Hostel Code') !!}
                                            {!! Form::text('code', old('code'), $errors->has('code') ? ['placeholder' => 'hostel code', 'class' => 'form-control is-invalid'] : ['placeholder' => 'hostel code', 'class' => 'form-control']) !!}
                                        @if ($errors->has('code'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('capacity') }}</strong></span>
                                            
                                        @endif
                                        </div>
                                    </div>
                                  

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            {!! Form::label('Hostel Name', 'Hostel Name', ['placeholder' => 'hostel name']) !!}
                                            {!! Form::text('hostel_name', old('hostel_name'), $errors->has('hostel_name') ? ['placeholder' => 'hostel name' , 'class' => 'form-control is-invalid'] : ['placeholder' => 'hostel name' , 'class' => 'form-control']) !!}
                                            @if ($errors->has('hostel_name'))
                                            <span class="invalid-feedback"><strong>{{ $errors->first('hostel_name') }}</strong></span>
                                                
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            {!! Form::label('Capacity', 'Capacity', ['placeholder' => 'capacity']) !!}
                                             {!! Form::number('hostel_capacity', old('hostel_capacity'), $errors->has('hostel_capacity') ? ['placeholder' => 'capacity', 'class' =>  'form-control is-invalid'] : ['placeholder' => 'capacity' ,'class' => 'form-control']) !!}
                                            @if ($errors->has('hostel_capacity'))
                                            <span class="invalid-feedback"> <strong>{{ $errors->first('capacity') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('Location','Location') !!}
                                            {!! Form::text('location', old('location'), $errors->has('location') ? ['placeholder' => 'location','class' => 'form-control is-invalid'] : ['placeholder' => 'location','class' => 'form-control']) !!}
                                            @if($errors->has('location'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('location')}}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('Address','Address') !!}
                                            {!! Form::text('address', old('address'), $errors->has('address') ? ['placeholder' => 'Box 9321 Dar es Salaam','class' => 'form-control is-invalid'] : ['placeholder' => 'Box 9321 Dar es Salaam','class' => 'form-control']) !!}
                                            @if($errors->has('address'))
                                                <span class="invalid-feedback">
                                            <strong>{{$errors->first('address')}}</strong>
                                        </span>
                                            @endif
                                           
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#faculty_id').select2({
                //minimumResultsForSearch: -1,
                placeholder:  'Select Department',
            });
        });
        $('#year_id').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Academic Year',
        });
        $('#is_approved').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Approval',
        });
        $('#program_type').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Program Type',
        });
        $('#program_category').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Program Type',
        });
        $('#program_duration').select2({
            minimumResultsForSearch: -1,
            placeholder:  'Select Program Duration',
        });
    </script>
@endsection