


<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::hidden('reg_no',$std->reg_no)}}

                        {!! Form::label('name','Sponsor Name') !!}
                        {!! Form::text('name', null,['placeholder' => 'Sponsor Name','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('address','Address') !!}
                        {!! Form::text('address', null,['placeholder' => 'Addrress','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('email','Email') !!}
                        <input type="email" name="email" class="form-control" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('phone','PhoneNumber') !!}
                        <input type="text" name="phone" class="form-control" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('occupation','Occupation') !!}
                        <input type="text" name="occupation" class="form-control" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('sponsor_id','Sponsor Type') !!}
                        <select name="sponsor_id" class="form-control" >
                            <option>--Select Sponsor type--<option>
                           @foreach($sponsor as $s)
                      <option value="{{ $s->id }}">{{ $s->sponsor_name }}</option>
                           @endforeach
                        </select>
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
