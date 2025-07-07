{!! Form::model($grade, ['method' => 'PATCH','route' => ['grades.update', SRS::encode($grade->id)]]) !!}

{!! Form::hidden('study_level_id',SRS::encode($grade->study_level_id)) !!}
<div class="card-body bg-light">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('grade','Grade') !!}
                {!! Form::text('grade', old('grade'), $errors->has('grade') ? ['placeholder' => 'Enter Grade','class' => 'form-control is-invalid','id'=>'grade'] : ['placeholder' => 'Enter Grade','class' => 'form-control','id'=>'grade']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('high_value','High value') !!}
                {!! Form::number('high_value', old('high_value'), $errors->has('high_value') ? ['placeholder' => 'Enter highest grade value','class' => 'form-control is-invalid','id'=>'high_value'] : ['placeholder' => 'Enter highest grade value','class' => 'form-control','id'=>'high_value']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('low_value','Low value') !!}
                {!! Form::number('low_value', old('low_value'), $errors->has('low_value') ? ['placeholder' => 'Enter lowest grade value','class' => 'form-control is-invalid','id'=>'low_value'] : ['placeholder' => 'Enter lowest grade value','class' => 'form-control','id'=>'low_value']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('grade_point','Grade Point') !!}
                {!! Form::number('grade_point', old('grade_point'), $errors->has('grade_point') ? ['placeholder' => 'Enter grade point','class' => 'form-control is-invalid','id'=>'grade_point'] : ['placeholder' => 'Enter grade point','class' => 'form-control','id'=>'grade_point']) !!}
            </div>
        </div>
        {{-- <div class="col-md-12">
            <fieldset class="customLegend row">
                <legend>
                    <h2 class="blue pb-0 mb-0">Grade Equation</h2>
                </legend>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('left_value','Left Value') !!}
                            {!! Form::text('left_value', old('left_value'), $errors->has('left_value') ? ['placeholder' => 'Enter Left value of RM','class' => 'form-control is-invalid','id'=>'grade'] : ['placeholder' => 'Enter Left Value of RM','class' => 'form-control','id'=>'left_value']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('operator','Operator') !!}
                            {!! Form::text('operator', old('operator'), $errors->has('operator') ? ['placeholder' => 'Enter Operator("eg. + or -")','class' => 'form-control is-invalid','id'=>'high_value'] : ['placeholder' => 'Enter Operator("eg. + or -")','class' => 'form-control','id'=>'operator']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('right_value','Right Value') !!}
                            {!! Form::text('right_value', old('right_value'), $errors->has('left_value') ? ['placeholder' => 'Enter Right value of RM','class' => 'form-control is-invalid','id'=>'grade'] : ['placeholder' => 'Enter Right Value of RM','class' => 'form-control','id'=>'right_value']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('point_decimal_place','Grade Point Decimal Places') !!}
                            {!! Form::number('point_decimal_place', old('point_decimal_place'), $errors->has('grade_point') ? ['placeholder' => 'Enter grade point decimal places','class' => 'form-control is-invalid','id'=>'grade_point'] : ['placeholder' => 'Enter grade point decimal places','class' => 'form-control','id'=>'point_decimal_place']) !!}
                        </div>
                    </div>
                </div>
            </fieldset>
        </div> --}}

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::button('Change Grade',['type'=>'submit','class'=>'btn btn-primary pull-right mt-4']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
