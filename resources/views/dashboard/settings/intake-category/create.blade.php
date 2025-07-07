{!! Form::open(['route' => 'intake-categories.store','class'=>'create-intake','method'=>'POST','role' => 'form']) !!}
<div class="card-body bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('name','Intake Category') !!}
                {!! Form::text('name', old('name'), $errors->has('name') ? ['placeholder' => 'Intake Category','class' => 'form-control is-invalid','id'=>'intake_id'] : ['placeholder' => 'Intake Category Name','class' => 'form-control','id'=>'intake_id']) !!}
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
                {!! Form::button('Create Intake Category',['type'=>'submit','class'=>'btn btn-warning pull-right mt-4']) !!}
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
