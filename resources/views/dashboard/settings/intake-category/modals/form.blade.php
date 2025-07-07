<div class="card-body bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('name','Class Group') !!}
                {!! Form::text('name', old('name'), ['placeholder' => 'Class Group Name','class' => 'form-control','id'=>'intake_id']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('descriptions','Clas Description') !!}
                {!! Form::textarea('descriptions', old('descriptions'),  ['placeholder' => 'Descriptions','class' => 'form-control','id'=>'descriptions']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::button('Submit',['type'=>'submit','class'=>'btn btn-primary pull-right mt-4']) !!}
            </div>
        </div>
    </div>
</div>
