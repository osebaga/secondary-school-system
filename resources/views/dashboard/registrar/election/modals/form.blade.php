<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-md-12">
                 
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('PostName','PostName') !!}
                        <input type="text" name="post" class="form-control">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">

                        {!! Form::label('Electio Startdate','Election Start Date') !!}
                        <input type="date" name="startdate" class="form-control">
                                        </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('phone1','Election End Date') !!}
                        <input type="date" name="enddate" class="form-control">
                                        </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('period','Period') !!}
                        <select name="period" class="form-control">
                            <option>select Period</option>
                            @foreach($ayear as $y)
                    <option value="{{ $y->year }}">{{ $y->year }}</option>
                            @endforeach
                     
                        </select>
                     </div>
                </div>


                
                  
                    <div class="form-group pull-right">
                        {!! Form::submit('Add-post', ['class' => 'btn btn-primary form-control pull-right']) !!}
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
