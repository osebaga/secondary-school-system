{!! Form::model($gpa_classification, ['method' => 'PATCH','route' => ['gpa-classifications.update', SRS::encode($gpa_classification->id)]]) !!}

{!! Form::hidden('study_level_id',SRS::encode($gpa_classification->study_level_id)) !!}
<div class="card-body bg-light">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('class_award','Class Award') !!}
                {!! Form::text('class_award', old('class_award'), $errors->has('class_award') ? ['placeholder' => 'Enter Class Award','class' => 'form-control is-invalid','id'=>'gpa_lass'] : ['placeholder' => 'Enter Class Award','class' => 'form-control','id'=>'gpa_class']) !!}
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('low_gpa','Low value') !!}
                {!! Form::number('low_gpa', old('low_gpa'), $errors->has('low_gpa') ? ['placeholder' => 'Enter lowest Class Award value','class' => 'form-control is-invalid','id'=>'low_value','step'=>'any'] : ['placeholder' => 'Enter lowest Class Award value','class' => 'form-control','id'=>'low_value','step'=>'any']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('high_gpa','High value') !!}
                {!! Form::number('high_gpa', old('high_gpa'), $errors->has('high_gpa') ? ['placeholder' => 'Enter highest Class Award value','class' => 'form-control is-invalid','id'=>'high_value','step'=>'any'] : ['placeholder' => 'Enter highest Class Award value','class' => 'form-control','id'=>'high_value','step'=>'any']) !!}
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                {!! Form::button('Edit Class Award',['type'=>'submit','class'=>'btn btn-primary pull-right mt-4']) !!}

            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
