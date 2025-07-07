<div class="card-body bg-light">
    <div class="row">
        <div class="col-sm-12">

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('institution_id','Select Institution') !!}
                        {!! Form::select('institution_id', $institutions,isset($faculty->campus)  ? $faculty->campus->institution->id:null, $errors->has('institution_id') ? ['class' => 'form-control is-invalid institution','id'=>'institution_id'] : ['class' => 'form-control institution','id'=>'institution_id','required']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('campus_id','Select Campus') !!}
                        {!! Form::select('campus_id', $campuses,null, $errors->has('campus_id') ? ['class' => 'form-control is-invalid campus','id'=>'campus_id'] : ['class' => 'form-control campus','required']) !!}
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('faculty_name','Faculty Name*') !!}
                        {!! Form::text('faculty_name', old('faculty_name'), $errors->has('faculty_name') ? ['placeholder' => 'Faculty Name','class' => 'form-control is-invalid'] : ['placeholder' => 'Faculty Name','class' => 'form-control','required']) !!}
                        @if($errors->has('faculty_name'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('faculty_name')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('faculty_acronym','Faculty Acronym*') !!}
                        {!! Form::text('faculty_acronym', old('faculty_acronym'), $errors->has('faculty_acronym') ? ['placeholder' => 'Faculty Acronym','class' => 'form-control is-invalid'] : ['placeholder' => 'Faculty Acronym','class' => 'form-control','required']) !!}
                        @if($errors->has('faculty_acronym'))
                            <span class="invalid-feedback">
                                            <strong>{{$errors->first('faculty_acronym')}}</strong>
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
