<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-md-12">
                 
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('name','Candidate Name') !!}
                            <select name="name" id="name" class="form-control">
                                <option>select Candidate</option>
                                @foreach($candidate as $y)
                        <option value="{{ $y->first_name }},{{ $y->middle_name }} {{ $y->last_name }}">{{ $y->first_name }} {{ $y->last_name }}</option>
                                @endforeach
                         
                            </select>
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
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('campus','Campus') !!}
                        <select name="campus" class="form-control">
                            <option>select Campus</option>
                            @foreach($campus as $y)
                    <option value="{{ $y->campus_name }}">{{ $y->campus_name }}</option>
                            @endforeach
                     
                        </select>
                     </div>
                </div>
                 
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('post','Post') !!}
                        <select name="post_id" class="form-control">
                            <option>select Post</option>
                            @foreach($post as $y)
                    <option value="{{ $y->id }}">{{ $y->post }}</option>
                            @endforeach
                     
                        </select>
                     </div>
                </div>


                
                  
                    <div class="form-group pull-right">
                        {!! Form::submit('Add-candidate', ['class' => 'btn btn-primary form-control pull-right']) !!}
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
