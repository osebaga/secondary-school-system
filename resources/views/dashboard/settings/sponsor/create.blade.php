{!! Form::open(['route' => 'batches.store','class'=>'create-batches','method'=>'POST','role' => 'form']) !!}
<div class="card-body bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('batch_name','Intake Category') !!}
                {!! Form::text('batch_name', old('batch_name'), $errors->has('batch_name') ? ['placeholder' => 'Intake Category','class' => 'form-control is-invalid','id'=>'batch_id'] : ['placeholder' => 'Intake Category Name','class' => 'form-control','id'=>'batch_id']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('description','Batch Name') !!}
                {!! Form::text('description', old('description'), $errors->has('description') ? ['placeholder' => 'Description.','class' => 'form-control is-invalid','id'=>'description'] : ['placeholder' => 'Description','class' => 'form-control','id'=>'batch_id']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::button('Create Batch',['type'=>'submit','class'=>'btn btn-warning pull-right mt-4']) !!}
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
