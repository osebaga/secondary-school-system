<div class="card-body bg-light">
    <div class="row">
        <div class="col-sm-12">

            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">

                        {!! Form::label('institution_id','Select Institution') !!}
                        {!! Form::select('institution_id', $institutions,null, $errors->has('institution_id') ? ['class' => 'form-control is-invalid','id'=>'institution_id'] : ['class' => 'form-control','id'=>'institution_id']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('campus_name','School Name*') !!}
                        {!! Form::text('campus_name', old('campus_name'), $errors->has('campus_name') ? ['placeholder' => 'School Name','class' => 'form-control is-invalid'] : ['placeholder' => 'School Name','class' => 'form-control']) !!}
                        @if($errors->has('campus_name'))
                            <span class="invalid-feedback">
                                            <strong>{{$errors->first('campus_name')}}</strong>
                                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('campus_acronym','School Acronym*') !!}
                        {!! Form::text('campus_acronym', old('campus_acronym'), $errors->has('campus_acronym') ? ['placeholder' => 'School Acronym','class' => 'form-control is-invalid'] : ['placeholder' => 'School Acronym','class' => 'form-control']) !!}
                        @if($errors->has('campus_acronym'))
                            <span class="invalid-feedback">
                                            <strong>{{$errors->first('campus_acronym')}}</strong>
                                        </span>
                        @endif
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
</div>
