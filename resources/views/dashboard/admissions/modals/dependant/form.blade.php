<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::hidden('reg_no',$std->reg_no)}}
                        {!! Form::label('name','Full Name') !!}
                        {!! Form::text('name', null,['placeholder' => 'Full Name','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                        <div class="form-group">

                            {!! Form::label('gender','Select Gender') !!}
                            {!! Form::select('gender', $gender,null, ['class' => 'form-control','id'=>'gender']) !!}
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('address','Address/Location') !!}
                        {!! Form::text('address', null,['placeholder' => 'Address/Location','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">

                        {!! Form::label('relationship','Select relationships') !!}
                        {!! Form::select('relationship', $relationships,null, ['class' => 'form-control','id'=>'relationship']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('phone1','Phone Number (1)') !!}
                        {!! Form::text('phone1', null,['placeholder' => 'Phone Number 1','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('phone2','Phone Number (2)') !!}
                        {!! Form::text('phone2', null,['placeholder' => 'Phone Number 2','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('email1','Email*') !!}
                        {!! Form::text('email1', null,['placeholder' => 'Email','class' => 'form-control']) !!}
                    </div>
                </div>

                </div>
                    <div class="form-group pull-right">
                        {!! Form::submit('Update', ['class' => 'btn btn-primary form-control pull-right']) !!}
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
