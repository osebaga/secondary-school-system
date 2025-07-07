<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
             
             
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('nextofkin','Name') !!}
                        {{-- {!! Form::text('address', null,['placeholder' => 'Address/Location','class' => 'form-control']) !!} --}}
                   <input type="text" name="name" class="form-control" value="{{ $nextofkin->name }}">
                    </div>
                </div>
              
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('gender','Sex') !!}
                        <input class="form-control" type="text" name="gender" value="{{ $nextofkin->gender }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('relationship','Relationship') !!}
                        <input type="text" name="relationship" class="form-control" value="{{ $nextofkin->relationship }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('address','Address') !!}
                        <input type="text" name="address" class="form-control" value="{{ $nextofkin->address }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('phone1','Phone Number1') !!}
                        <input type="text" name="phone1" class="form-control" value="{{ $nextofkin->phone1}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('phone2','Phone Number2') !!}
                        <input type="text" name="phone2" class="form-control" value="{{ $nextofkin->phone2 }}">
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
