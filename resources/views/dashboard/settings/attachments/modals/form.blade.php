<div class="card-body bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('sponsor_name','Sponsor Name') !!}
                {!! Form::text('sponsor_name', old('sponsor_name'), ['placeholder' => 'Sponsor Name','class' => 'form-control','id'=>'sponsor_id']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('address','Address') !!}
                {!! Form::text('address', old('address'), ['placeholder' => 'Address','class' => 'form-control','id'=>'address']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('comment','Batch Name') !!}
                {!! Form::textarea('comment', old('comment'),  ['placeholder' => 'Comment.','class' => 'form-control','id'=>'comment'] ) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::button('Submit',['type'=>'submit','class'=>'btn btn-primary pull-right mt-4']) !!}
            </div>
        </div>
    </div>
</div>
