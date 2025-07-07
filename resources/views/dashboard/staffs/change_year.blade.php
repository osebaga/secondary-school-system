@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Change Academic Year</title>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Academic Year  
                    {{-- {{$academic_year}} --}}
                </h2>

                <div class="boxpane-icon">
                    <ul class="btn-tasks">

                    </ul>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">

                       </p>
                        {!! Form::model($acyear, ['method' => 'PATCH','route' => ['staffs.update-year',  SRS::encode(auth()->id())]]) !!}

                        <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">

                                  {!! Form::label('year_id','Select Academic Year') !!}
                                  {!! Form::select('year_id', $academic_years,auth()->user()->staff->year_id , $errors->has('year_id') ? ['class' => 'form-control is-invalid','id'=>'year_id'] : ['class' => 'form-control','id'=>'year_id']) !!}
                              </div>
                          </div>
                            <div class="col-md-2 pt-4">
                                <div class="form-group">
                                    {{Form::button('Change Year',['type'=>'submit','class'=>'btn btn-lg btn-primary  pull-right'])}}
                                </div>
                            </div>
                      </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
 <script type="text/javascript">
        $(document).ready(function () {
            $('#year_id').select2({
                //minimumResultsForSearch: -1,
                placeholder:  'Select Academic Year',
            });

        });
    </script>
@endsection
