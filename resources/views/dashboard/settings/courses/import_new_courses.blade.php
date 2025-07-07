@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Import New Course</title>

@endsection


@section('content')
    <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="black"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Module Offering  - <b class="black">Department-[{{$dep->department_name}}]</b>
                </h2>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">
                            This section imports new module <button type="button" class="btn btn-outline-primary">{{link_to(asset('assets/uploads/formats/admission_format1.xlsx'),'Required Excel File Format')}}</button>
                            .Select the Excel file to import.
                        </p>
                        {!! Form::open(['route' => 'excels.import-course-stores','class'=>'create-course','method'=>'POST','role' => 'form', 'enctype' => 'multipart/form-data'])!!}
                        {{--                        {{ Form::open(['route' => 'excels.import-student-store','class'=>'create-product','method'=>'POST','role' => 'form', 'enctype' => 'multipart/form-data'])}}--}}
                        <div class="row">
                            <div class="col-sm-12">
                               
                                <div class="form-group">
                                    {!! Form::label('level_name','Select Study Level *',['class'=>'text-danger']) !!}
                                    {!! Form::select('level_name', $level->level_name,null, $errors->has('level_id') ? ['class' => 'form-control is-invalid','id'=>'level_id'] : ['class' => 'form-control','id'=>'level_id']) !!}
                                </div>
                                <div class="form-group">
                                    {{Form::hidden('department_id',$dep->id)}}
                                    {{Form::file('admission-file',['class'=>'file'])}}
                                </div>
                                <div class="form-group pull-right">
                                    {{Form::button('Upload',['type'=>'submit','class'=>'btn btn-primary'])}}
                                </div>
                            </div>
                        </div>
                        {!! Form::close()!!}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#level_id').select2({
                minimumResultsForSearch: -1,
                placeholder: 'Select Study Level',
            });
        });
        $("#admission-file").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            mainClass: "input-group-lg"
        });
    </script>
@endsection
