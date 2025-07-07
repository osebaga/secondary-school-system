<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">

                <div class="col-sm-6">
                        <div class="form-group">

                            {!! Form::label('manner_of_entry_id',' Select Manner of Entry') !!}
                            {!! Form::select('manner_of_entry_id', $entries,null, ['class' => 'form-control','id'=>'manner_of_entry_id']) !!}
                        </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">

                        {!! Form::label('admission_year','Select Admission Year') !!}
                        {!! Form::select('admission_year', $ac_years,null, ['class' => 'form-control','id'=>'academic_year_id']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                       <label>Select Campus</label>
                       <select class="form-control" name="campus_id">
                       @foreach($campus as $c)
                      <option value="{{ $c->id }}"{{ $c->id == $std->campus_id  ? 'selected' : '' }}>{{ $std->campus->campus_name }}</option>
                       @endforeach
                       </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">

                        {!! Form::label('program_id','Select Programme Registered') !!}
                        {!! Form::select('program_id', $programs,null, ['class' => 'form-control','id'=>'program_id']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                       <label>Select Intake Registered</label>
                       <select class="form-control" name="intake_category_id">
                       @foreach($intake as $c)
                      <option value="{{ $c->id }}"{{ $c->id == $std->intake_category_id  ? 'selected' : '' }}>{{ $std->intake_category->name }}</option>
                       @endforeach
                       </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                       <label>Graduation Date</label>
                       <input type="date" name="graduation_year" id="datepicker"   class="form-control" value="{{$std->graduation_year}}" >
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group pull-right">
                        {!! Form::submit('Update', ['class' => 'btn btn-primary form-control pull-right']) !!}
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"></script>
    <script type="text/javascript">

        $("#avatar").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            mainClass: "input-group-lg"
        });
        $(document).ready($(function(){
        $("#datepicker").datepicker();
      });
    });
    </script>
@endsection
