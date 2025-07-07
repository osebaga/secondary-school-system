<div class="card-body bg-light">
    <div class="row">
        <div class="col-sm-12">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('semester','Term Number*') !!}
                        {!! Form::number('semester', old('semester'), $errors->has('semester') ? ['placeholder' => 'Eg. 1,2 etc.','class' => 'form-control is-invalid'] : ['placeholder' => 'Eg, 1, 2, 3','class' => 'form-control']) !!}
                       @if($errors->has('semester'))
                            <span class="invalid-feedback">
                                            <strong>{{$errors->first('semester')}}</strong>
                                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('title','Term Title*') !!}
                        {!! Form::text('title', old('title'), $errors->has('title') ? ['placeholder' => 'Title','class' => 'form-control is-invalid'] : ['placeholder' => 'Title Eg. First Term','class' => 'form-control']) !!}
                        @if($errors->has('title'))
                            <span class="invalid-feedback">
                                            <strong>{{$errors->first('title')}}</strong>
                                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('status','Select Status') !!}
                        {!! Form::select('status', [0,1],null, $errors->has('status') ? ['class' => 'form-control is-invalid','id'=>'status'] : ['class' => 'form-control','required']) !!}
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
