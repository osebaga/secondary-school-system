@extends('layouts.dashboard')


@section('title-content')
    <title>{{ config('app.name') }} | Enroll new student</title>
    <style>
        .btn {
            color: yellow
        }
    </style>
@endsection


@section('content')
    <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="black"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Enrollment Process<b class="black"> ==> {{ $intake->name }}</b>
                </h2>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">
                            <button type="button"
                                class="btn btn-outline-primary btn-sm">{{ link_to(asset('assets/uploads/formats/enrollment_template_format.xlsx'), 'Required Excel File Format') }}</button>
                            .Select the Excel file to import.
                        </p>
                        {!! Form::open([
                            'route' => 'excels.import-student-stores',
                            'class' => 'create-student',
                            'method' => 'POST',
                            'role' => 'form',
                            'enctype' => 'multipart/form-data',
                        ]) !!}
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {!! Form::select(
                                        'campus_id',
                                        $campuses,
                                        null,
                                        $errors->has('campus_id')
                                            ? ['class' => 'form-control is-invalid', 'id' => 'campus_id']
                                            : ['class' => 'form-control', 'id' => 'campus_id'],
                                    ) !!}
                                </div>
                            </div>
                           
                            <div class="col-sm-2">
                                <div class="form-group">
                                    {{ Form::hidden('intake_category_id', $intake->id,['class' => 'form-control']) }}

                                    {{ Form::file('enrollment-file', ['class' => 'form-control'],) }}
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#campus_id').select2({
                minimumResultsForSearch: -1,
                placeholder: 'Select School',
            });

            
        });
        $("#enrollment-file").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            mainClass: "input-group-lg"
        });
    </script>

  
@endsection
