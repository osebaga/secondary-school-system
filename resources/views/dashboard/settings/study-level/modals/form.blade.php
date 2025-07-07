<div class="card-body bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('level_name','School Level Name') !!}
                {!! Form::text('level_name', old('level_name'), ['placeholder' => 'School Level Name','class' => 'form-control','id'=>'level_id']) !!}
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                {!! Form::button('Submit',['type'=>'submit','class'=>'btn btn-primary pull-right mt-4']) !!}
            </div>
        </div>
    </div>
</div>
