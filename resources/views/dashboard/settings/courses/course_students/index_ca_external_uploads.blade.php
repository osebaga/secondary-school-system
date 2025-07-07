@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | upload student's CA/UE</title>

@endsection


@section('content')
    <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="black"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Upload External CA [Course Work Assessment] -<b class="black">{{$course->course_code}}</b>


                </h2>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">

                        </p>
{{--                        {{ Form::open(['route' => 'courses.ca-upload-store','class'=>'ca-upload','method'=>'POST','role' => 'form', 'enctype' => 'multipart/form-data'])}}--}}
                        {{ Form::open(['route' => 'ca.external.import','class'=>'ca-upload','method'=>'POST','role' => 'form', 'enctype' => 'multipart/form-data'])}}
                        {{Form::hidden('course_id',$id)}}

                        <div class="form-group">
                            {{Form::file('ca-excel',['id'=>'ca-excel','class'=>'file'])}}

                        </div>
                        <div class="form-group pull-right">
                            {{Form::button('Upload',['type'=>'submit','class'=>'btn btn-warning'])}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $("#ca-excel").fileinput({
            showUpload: false,
            dropZoneEnabled: true,
            mainClass: "input-group-lg"
        });
    </script>
@endsection
