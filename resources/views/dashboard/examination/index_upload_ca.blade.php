@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | Upload Student's CA</title>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="black">
                    Upload Student's [CA/SE] for - <b class="black">{{ $course->course_code }}</b>
                </h2>
            </div>
            @if (is_null($check_sem1_upload) && is_null($check_sem2_upload))
                <div class="alert alert-warning alert-dismissable" role="alert">Upload is closed !!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </div>
            @endif
            <div class="boxpane-content">
                <form action="{{ route('exam.upload', SRS::encode($course->id)) }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- Add CSRF token for security -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="exam_category_id" id="exam_category_id" class="form-control @error('exam_category_id') is-invalid @enderror">
                                    <option value="">Select Exam Category</option>
                                    @foreach ($exam_categories as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('exam_category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="semester_id" id="semester_id" class="form-control @error('semester_id') is-invalid @enderror">
                                    <option value="">Select Semester</option>
                                    @foreach ($semesters as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('semester_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <input type="file" class="form-control" name="exam-excel" id="exam-excel">
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
<link href="{{ asset('assets/plugins/kartik-v-bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('assets/plugins/kartik-v-bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/kartik-v-bootstrap-fileinput/js/plugins/piexif.js') }}"></script>
<script src="{{ asset('assets/plugins/kartik-v-bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/kartik-v-bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/kartik-v-bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/kartik-v-bootstrap-fileinput/js/locales/es.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/kartik-v-bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/kartik-v-bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#exam_category_id').select2({
            minimumResultsForSearch: -1,
            placeholder: 'Select Exam Category',
            allowClear: true
        });
        $('#semester_id').select2({
            minimumResultsForSearch: -1,
            placeholder: 'Select Semester',
            allowClear: true
        });
    });
</script>
@endsection