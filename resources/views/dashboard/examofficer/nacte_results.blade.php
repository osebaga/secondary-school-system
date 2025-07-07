@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |My courses</title>

@endsection


@section('content')
    <style>
        .card {
            margin: 0 auto;
            /* Added */
            float: none;
            /* Added */
            margin-bottom: 10px;
            /* Added */
        }

    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Nacte Report
                    </h2>


                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">

                            </p>
                            <div class="table table-responsive justify-content-center">
                                <div class="card" style="width: 50rem;">
                                    <div class="card-header">If you want to filter the results by criteria, select the
                                        corresponding select option (from dropdown selection ) </div>
                                    <div class="card-body">

                                        <form class="" action="{{ route('report.nacte_test_result') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="nacte_test_result" value="nacte_test_result">
                                            <input type="hidden" name="sub" value="3">
                                          
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Campus:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="campus_id"
                                                        id="exampleFormControlSelect1" required>
                                                        <option value="">--Select Campus--</option>
                                                        @foreach ($campus as $y)
                                                            <option value="{{ $y->id }}" >
                                                                {{ $y->campus_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                              <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">
                                                    Programme:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control tag" name="program" id="program" 
                                                        id="exampleFormControlSelect1" required>
                                                        <option value="">--Select Programme--</option>
                                                        @foreach ($program as $y)
                                                            <option value="{{ $y->id }}">
                                                                {{ $y->program_acronym }}-{{ $y->program_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- Combination --}}
                                            <div class="form-group row" id="comb" style="display:none">
                                                <label for="combination" class="col-sm-2 col-form-label">
                                                    Combination:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control tag" name="combination" id="combination">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Academic
                                                    Year:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="ayear"
                                                        id="exampleFormControlSelect1" required="">
                                                        <option value="">--Select Year --</option>
                                                        @foreach ($Ayear as $y)
                                                            <option value="{{ $y->id }}">{{ $y->year }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Year of
                                                    Study:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="studyyear"
                                                        id="exampleFormControlSelect1" required="">
                                                        <option value="">--Select Year of Study--</option>
                                                        <option value="1">First Year</option>
                                                        <option value="2">Second Year</option>
                                                        <option value="3">Third Year</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Semester</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control tag" name="semester"
                                                        id="exampleFormControlSelect1" required>
                                                        <option value="">--Select semester--</option>
                                                        @foreach ($semester as $y)
                                                            <option value="{{ $y->id }}">{{ $y->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Intake:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control tag" name="intake"
                                                        id="exampleFormControlSelect1" required="">
                                                        <option value="">--Select Intake --</option>
                                                        @foreach ($intake as $y)
                                                            <option value="{{ $y->id }}">{{ $y->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="col-sm-12 ">
                                                    <button type="submit" name="sub" value="1"
                                                        class="btn btn-primary pull-left">Preview</button>
                                                    <span class="center" style="padding-left:50%;">
                                                        <button type="submit" name="sub" value="3" class="btn btn-primary pull-right">
                                                        Print Excel
                                                       </button>
                                                    </span>
                                                    {{-- <button type="submit" name="sub" value="2"
                                                        class="btn btn-primary pull-right">Print Pdf</button> --}}
                                                </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.tag').select2();

            $('#program').change(function() {
                var program = $(this).val();
                if (program) {
                    $.ajax({
                        url: '/combinations/' + program,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data == 1) {
                                $('#comb').css('display', 'none');
                            } else {
                                $('#comb').css('display', '');
                                $('#combination').empty().append(
                                    '<option value="all">WITH NO COMBINATION</option>');
                                $.each(data, function(index, combination) {
                                    $('#combination').append('<option value="' +
                                        combination.id + '">' + combination
                                        .combination_code + '</option>');
                                });
                            }
                        }   
                    });
                } else {
                    return;
                }
            });
        });
    </script>
@endsection
