@extends('layouts.dashboard')


@section('title')
    Transcript of Examination Results
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="boxpane">
                    <div class="boxpane-header">
                        <h2 class="blue">
                            Transcript of Examination Results
                        </h2>
                    </div>
                    <div class="boxpane-content">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-error">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ Session::get('error') }}</p>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <form id="admissions_candidate_transcript" method="POST"
                                            action="candidate-transcript">
                                            @csrf
                                            <div class="form-group" style="display: none">
                                                <label for="sel1">Choose report you want:</label>
                                                <select class="form-control" name="mode" required>
                                                    <option value="print_transcript_pdf" selected>Candidate Transcript</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="reg_no" class="mr-5">Registration Number</label>
                                                <input type="text" name="reg_no" class="form-control" id="reg_no"
                                                    placeholder="XXX XXX XX" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary w-100">Print PDF</button>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('modals')

@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/custombox.min.css') }}">

@endsection
@section('scripts')
    <script src="{{ asset('assets/dashboard/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/modal/custombox.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/modal/legacy.min.js') }}"></script>
@endsection
