{!! Form::model($position, ['method' => 'PATCH','route' => ['positions.update', SRS::encode($position->id)]]) !!}
<div class="card-body bg-light">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                {!! Form::label('position_name','Position name') !!}
                {!! Form::text('position_name', old('position_name'), $errors->has('position_name') ? 
                ['placeholder' => 'Enter position name','class' => 'form-control is-invalid','id'=>'position_name'] : ['placeholder' => 'Enter Position name','class' => 'form-control','id'=>'position_name']) !!}

            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::button('Change Position',['type'=>'submit','class'=>'btn btn-primary pull-right mt-4']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}