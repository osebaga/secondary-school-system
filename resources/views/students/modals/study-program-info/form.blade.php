<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">

                <div class="col-sm-6">
                        <div class="form-group">

                            {!! Form::label('manner_of_entry_id','Select Manner Of Entry') !!}
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

                        {!! Form::label('program_id','Select Programme Registered') !!}
                        {!! Form::select('program_id', $programs,null, ['class' => 'form-control','id'=>'program_id']) !!}
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

    <script type="text/javascript">

        $("#avatar").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            mainClass: "input-group-lg"
        });
    </script>
@endsection
