<div class="card-body bg-light">
    <div class="row">
        <div class="col-sm-12">

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('institution_name','Institution Name*') !!}
                        {!! Form::text('institution_name', old('institution_name'), $errors->has('institution_name') ? ['placeholder' => 'Institution Name','class' => 'form-control is-invalid'] : ['placeholder' => 'Institution Name','class' => 'form-control']) !!}
                        @if($errors->has('institution_name'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('institution_name')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('institution_acronym','Institution Acronym*') !!}
                        {!! Form::text('institution_acronym', old('institution_acronym'), $errors->has('institution_acronym') ? ['placeholder' => 'Institution Acronym','class' => 'form-control is-invalid'] : ['placeholder' => 'Institution Acronym','class' => 'form-control']) !!}
                        @if($errors->has('institution_acronym'))
                            <span class="invalid-feedback">
                               <strong>{{$errors->first('institution_acronym')}}</strong>
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
