@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Application Form</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Application Form
                </h2>

                <div class="boxpane-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            {{-- <a data-toggle="dropdown" href="#">
                                <i class="icon fa fa-tasks3" data-placement="left" title="{{ 'Actions' }}"></i>
                            </a> --}}
                            {{-- <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu" aria-labelledby="dLabel"> --}}
                                {{-- <li>
                                    <h2>
                                    <a href="{{route('view.room')}}">
                                        <i class="mdi mdi-18px mdi-eye"></i>
                                        {{"View Room"}}
                                    </a></h2>
                                </li> --}}
                            {{-- </ul> --}}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">@lang('app.intro-text')</p>
                        {!! Form::open(['route' => 'store.application', 'class' => 'store.application', 'method' => 'POST', 'role' => 'form']) !!}
                        {{-- <form action="{{ route('store.application') }}" method="POST" role="form"> --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Application Year:</label>
                                            <select name="year_id" id="year_id" class="form-control hostel"
                                                aria-placeholder="application year">
                                                <option value="">--Select Year--</option>
                                                @foreach ($academics as $ac)
                                                    <option value="{{ $ac->id }}">{{ $ac->year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Registration Number:</label>
                                            <input type="text" name="reg_no" id="reg_no" class="form-control"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Application Category:
                                            </label>
                                            <select type="text" name="criteria_id" id="criteria_id" class="form-control hostel"
                                                placeholder="application criteria">
                                                <option value="">--Select Category--</option>
                                                @foreach ($criteria as $cr )
                                                    <option value="{{ $cr->id }}">{{ $cr->short_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                  

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-6 col-form-label">Any Detail:</label>
                                            <textarea type="text" class="form-control" name="reason" id="reason"
                                                placeholder="Reason to apply......"></textarea>
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
                        {{-- </form> --}}
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
