{!! Form::model($building, ['method' => 'PATCH','route' => ['buildings.update', $srs->encode($building->id)]]) !!}
<div class="card-body bg-light">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('building_name','Building/Office name') !!}
                {!! Form::text('building_name', old('building_name'), $errors->has('building_name') ? ['placeholder' => 'Enter Building','class' => 'form-control is-invalid','id'=>'building_name'] : ['placeholder' => 'Enter Building','class' => 'form-control','id'=>'building_name']) !!}

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('location','Office Location') !!}
                {!! Form::text('location', old('location'), $errors->has('location') ? ['placeholder' => 'Enter Office/building Location','class' => 'form-control is-invalid','id'=>'location'] : ['placeholder' => 'Enter Office/building Location','class' => 'form-control','id'=>'location']) !!}

            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::button('Change Building',['type'=>'submit','class'=>'btn btn-warning pull-right mt-4']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}