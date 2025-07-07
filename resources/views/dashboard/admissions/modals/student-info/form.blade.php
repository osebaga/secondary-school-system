<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">

                       <label>First Name</label>
                       <input type="text" class="form-control" name="first_name" value="{{ $std->user->first_name ?? '' }}">
                    </div>
            </div>
             
            <div class="col-sm-6">
                <div class="form-group">

                   <label>Middle Name</label>
                   <input type="text" class="form-control" name="middle_name" value="{{ $std->user->middle_name ?? ''  }}">
                </div>
        </div>
         
        <div class="col-sm-6">
            <div class="form-group">

               <label>Last Name</label>
               <input type="text" class="form-control" name="last_name" value="{{ $std->user->last_name ?? '' }}">
            </div>
    </div>
     
                <div class="col-sm-6">
                        <div class="form-group">

                           <label>Date Of Birth</label>
                           <input type="date" class="form-control" name="dob" value="{{ $std->dob }}">
                        </div>
                </div>
                 
               
                <div class="col-12">
                    <div class="form-group pull-right">
                        {!! Form::submit('Update', ['class' => 'btn btn-primary form-control pull-right']) !!}
                    </div>
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
