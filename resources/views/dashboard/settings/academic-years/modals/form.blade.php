<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">
            <p class="introtext">@lang('app.intro-text')</p>
            {!! Form::open(['route' => 'academic-years.store','class'=>'create-academic-years','method'=>'POST','role' => 'form']) !!}
            <div class="row">
                <div class="col-sm-12">

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('year','Academic NaYearme*') !!}
                                {!! Form::text('year', old('year'), $errors->has('year') ? ['placeholder' => 'Academic Year','class' => 'form-control is-invalid'] : ['placeholder' => 'Academic Year','class' => 'form-control']) !!}
                                @if($errors->has('year'))
                                    <span class="invalid-feedback">
                                            <strong>{{$errors->first('year')}}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">

                                {!! Form::label('status','Select Status') !!}
                                {!! Form::select('status', $status,null, $errors->has('status') ? ['class' => 'form-control is-invalid','id'=>'status'] : ['class' => 'form-control','id'=>'status']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::button('Submit',['type'=>'submit','class'=>'btn btn-lg btn-primary  pull-right'])}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
