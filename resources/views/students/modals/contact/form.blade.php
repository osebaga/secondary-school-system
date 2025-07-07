<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('address','Address') !!}
                        {!! Form::text('address', null,['placeholder' => 'Address','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('region','Region') !!}
                        {!! Form::text('region', null,['placeholder' => 'Region','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('district','District') !!}
                        {!! Form::text('district', null,['placeholder' => 'District','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('phone1','Phone Number*') !!}
                        {!! Form::text('phone1', null,['placeholder' => 'Phone Number','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('phone2','Phone Number 2') !!}
                        {!! Form::text('phone2', null,['placeholder' => 'Phone Number 2','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('email1','Email*') !!}
                        {!! Form::text('email1', null,['placeholder' => 'Email','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('email2','Email 2') !!}
                        {!! Form::text('email2', null,['placeholder' => 'Email 2','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-12">
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
