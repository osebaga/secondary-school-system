@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   

<div class="box" style="padding:20px" >
<div class="row justify-content-center">
            <form action="{{route('upload picture')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <input type="file" class="form-control" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                    <input type="hidden" name="regno" value="{{$regno}}"></input>
                    <small id="fileHelp" class="form-text text-muted"> Please upload a valid image file. Size of image should not be more than 2MB.</small>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
</div>
</div>
@endsection