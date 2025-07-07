{!! Form::model($grade_scheme, ['method' => 'PATCH','route' => ['grade-schemes.update', $srs->encode($grade_scheme->id)]]) !!}

<div class="card-body bg-light">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('name','Grade Scheme Name') !!}
                {!! Form::text('name', old('name'), $errors->has('name') ? ['placeholder' => 'Grade Scheme Name.','class' => 'form-control is-invalid','id'=>'name'] : ['placeholder' => 'Grade Scheme Name','class' => 'form-control','id'=>'name']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::button('Change Grade Scheme',['type'=>'submit','class'=>'btn btn-warning pull-right mt-4']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
