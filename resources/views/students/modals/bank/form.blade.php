<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
               
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('bank_name','Bank Name') !!}
                        <input type="text" name="bank_name" class="form-control" value="{{ $sb->first()->bank_name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('account_no','Account Number') !!}
                        <input type="number" name="account_number" class="form-control" value="{{ $sb->first()->account_number }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('status','Account Status') !!}
                        <input type="text" name="status" class="form-control" value="{{ $sb->first()->status }}">
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
