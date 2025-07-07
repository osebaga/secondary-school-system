<div class="card-body bg-light">
    <div class="row">
        <div class="col-sm-12">

            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        {!! Form::label('campus_id','Select Campus') !!}
                        {!! Form::select('campus_id', $campuses,null, $errors->has('campus_id') ? ['class' => 'form-control is-invalid','id'=>'campus_id'] : ['class' => 'form-control','id'=>'campus_id']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('center_name','Center Name*') !!}
                        {!! Form::text('center_name', old('center_name'), $errors->has('center_name') ? ['placeholder' => 'center Name','class' => 'form-control is-invalid'] : ['placeholder' => 'center Name','class' => 'form-control']) !!}
                        @if($errors->has('center_name'))
                            <span class="invalid-feedback">
                            <strong>{{$errors->first('center_name')}}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('address','Address') !!}
                        {!! Form::text('address', old('address'), $errors->has('address') ? ['placeholder' => 'Center Address','class' => 'form-control is-invalid'] : ['placeholder' => 'Center Address','class' => 'form-control']) !!}
                        @if($errors->has('address'))
                            <span class="invalid-feedback"><strong>{{$errors->first('address')}}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('telephone','Telephone') !!}
                        {!! Form::text('telephone', old('telephone'), $errors->has('telephone') ? ['placeholder' => 'Center Telephone','class' => 'form-control is-invalid'] : ['placeholder' => 'Center Telephone','class' => 'form-control']) !!}
                        @if($errors->has('telephone'))
                            <span class="invalid-feedback"><strong>{{$errors->first('telephone')}}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('email','Center Email') !!}
                        {!! Form::text('email', old('email'), $errors->has('email') ? ['placeholder' => 'Center Email','class' => 'form-control is-invalid'] : ['placeholder' => 'Center Email','class' => 'form-control']) !!}
                        @if($errors->has('email'))
                            <span class="invalid-feedback"><strong>{{$errors->first('email')}}</strong></span>
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
