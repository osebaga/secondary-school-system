<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('Current Password','Current Password') !!}
                        <input type="password" name="current-password" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
              
                
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('New Password','New Password') !!}
                        <input type="password" name="new-password" class="form-control">
                    </div>
                </div>
              
                
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('Confirm New Password','Confirm New Password') !!}
                        <input type="password" name="confirm-password" class="form-control">
                    </div>
                </div>
              
               
                <div class="col-md-12">
                    <div class="form-group pull-right">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control pull-right']) !!}
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
