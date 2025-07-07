<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::hidden('reg_no',$std->reg_no)}}

                        {!! Form::label('bank_name','Bank Name') !!}
                        {!! Form::text('bank_name', null,['placeholder' => 'Bank Name','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('account_no','Account No') !!}
                        {!! Form::text('account_number', null,['placeholder' => 'Account No','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-12">
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
