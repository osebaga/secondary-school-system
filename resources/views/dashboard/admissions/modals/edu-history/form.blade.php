<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">

                <div class="col-sm-12">
                        <div class="form-group">
                            {{Form::hidden('reg_no',$std->reg_no)}}
                            {!! Form::label('level','Education Level') !!}
                            {!! Form::select('level', $edu_levels,null, ['class' => 'form-control','id'=>'level']) !!}
                        </div>
                </div> 
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('institution_name','Institution/College/School Name') !!}
                        {!! Form::text('institution_name', null,['placeholder' => 'Institution/College/School Name','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('index_no','Index/Certificate Number') !!}
                        {!! Form::text('index_no', null,['placeholder' => 'Index/Certificate Number','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">

                        {!! Form::label('grade','Grade') !!}
                        {!! Form::select('grade', $grades,null, ['class' => 'form-control','id'=>'grade']) !!}
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('start_year','Start Year') !!}
                        {!! Form::text('start_year', null,['placeholder' => 'Start Year','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('end_year','End Year') !!}
                        {!! Form::text('end_year', null,['placeholder' => 'End Year','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group pull-right">
                        {!! Form::submit('Add', ['class' => 'btn btn-primary form-control pull-right']) !!}
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
