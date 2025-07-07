<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                           
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('name','Dependant Name') !!}
                        <input type="text" name="name" class="form-control" value="{{ $std->first()->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('gender','Sex') !!}
                        <input type="text" name="gender" class="form-control" value="{{ $std->first()->gender }}">
                    </div>
                </div>
               
                
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('relationship','Relationship') !!}
                        <input type="text" name="relationship" class="form-control" value="{{ $std->first()->relationship }}">
                    </div>
                </div>

                
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('address','Address/Location') !!}
                        <input type="text" name="address" class="form-control" value="{{ $std->first()->address }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('phone1','Phone Number1') !!}
                        <input type="text" name="phone1" class="form-control" value="{{ $std->first()->phone1 }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('job','Job') !!}
                        <input type="text" name="job" class="form-control" value="{{ $std->first()->job }}">
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
