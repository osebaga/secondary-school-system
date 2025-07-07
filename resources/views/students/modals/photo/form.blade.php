<div class="card-body bg-light">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-sm-5">
                    <div style="position: relative;">

                        <img alt="" src="{{$user->present()->avatar}}"
                             class="profile-image img-thumbnail">
                       <br>
                        <br>

                    </div>
                </div>
                <div class="col-sm-6 offset-1">
                    <div class="form-group">
                        {!! Form::label('avatar', trans('auth.avatar')) !!}
                        {!! Form::file('avatar', array('id'=>'avatar','class' => 'form-control file','data-show-upload'=>"false", 'data-show-preview'=>"true", 'accept'=>"image/*")) !!}
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
