<div class="card-body bg-light">
    <div class="row">
        <div class="col-sm-12">

            <div class="row">

                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('institution_id','Select Institution') !!}
                                {!! Form::select('institution_id', $institutions, 1, $errors->has('institution_id') ? ['class' =>
                                'form-control is-invalid institution','id'=>'institution_id'] : ['class' =>
                                'form-control institution','id'=>'institution_id','required']) !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('campus_id','Select School') !!}
                                {!! Form::select('campus_id', $campuses, 1, $errors->has('campus_id') ? ['class' =>
                                'form-control is-invalid campus','id'=>'campus_id'] : ['class' => 'form-control
                                campus','required']) !!}
                            </div>
                        </div>

                        {{-- <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('faculty_id','Select Faculty') !!}
                                {!! Form::select('faculty_id', $faculties,null, $errors->has('faculty_id') ?
                                ['class' => 'form-control is-invalid faculty', 'id'=>'faculty_id'] : ['class' =>
                                'form-control faculty','required']) !!}
                                @if($errors->has('faculty_id'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('faculty_id')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="col-sm-12">
                            <div class="form-group">
                                {!! Form::label('department_name','Department Name*') !!}
                                {!! Form::text('department_name', old('department_name'),
                                $errors->has('department_name') ? ['placeholder' => 'Department Name','class' =>
                                'form-control is-invalid'] : ['placeholder' => 'Department Name','class' =>
                                'form-control']) !!}
                                @if($errors->has('department_name'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('department_name')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::button('Submit',['type'=>'submit','class'=>'btn btn-lg btn-primary  pull-right'])}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('change', '.institution', function() {
    $('#campus_id').empty();
    $('#faculty_id').empty();
    var institution_id = this.value;
    // console.log(institution_id);
    options="";
    if (institution_id > 0) {
        $.ajax({
            'url': '/get-campuses/' + institution_id,
            success: function(data) {
                // console.log(data);
                options = '<option></option>';
                data.forEach(function(item) {
                    options += '<option value="' + item.id + '">' + item.campus_name +
                        '</option>'
                });
                console.log(options);
                $('#campus_id').append(options);
                options="";
            }
        });
    }
    });
    $(document).on('change', '.campus', function() {
    $('#faculty_id').empty();
    var campus_id = this.value;
    if (campus_id > 0) {
        $.ajax({
            'url': '/get-faculties/' + campus_id,
            success: function(data) {
                options = '<option></option>';
                data.forEach(function(item) {
                    options += '<option value="' + item.id + '">' + item.faculty_name +
                        '</option>';
                });
                $('#faculty_id').append(options);
                options="";
            }
        });
    }
    });
</script>