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
                                <form id="admissions_candidate_transcriptTEST" method="POST" action="candidate-transcript"
                                    class="form-inline">
                                    @csrf
                                    {{-- <input type="hidden" name="mode" value="print_transcript_pdf"> --}}
                                    <div class="form-group">
                                        <label for="sel1">Choose report you want:</label>
                                        <select class="form-control" name="mode" required>
                                            <option value="">............</option>
                                            <option value="print_transcript_pdf">Candidate Transcript</option>
                                            <option value="print_candidate_pdf">Candidate Statement</option>
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="reg_no" class="mr-5">Registration Number</label>
                                        <input type="text" name="reg_no" class="form-control" id="reg_no"
                                            placeholder="MUM{{ date('Y') }}-01-00001" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2 candidate_btn">Check
                                        Candidate</button>
                                </form>
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

    <script type="text/javascript">
        var coursesTable = $('#coursesTable').DataTable({
            processing: true,
            serverSide: false,
            language: {
                sLoadingRecords: '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>'
            },

        });

        $("#admissions_candidate_transcript").ajaxForm({
            beforeSend: function() {
                $(".candidate_btn").html("<i>processing...<i>");
                $(".candidate_btn").attr("disabled", "");
            },
            success: function(response) {
                var err = response.errors;
                if (response.errors) {
                    $(".candidate_btn").html("Print PDF");
                    $(".candidate_btn").removeAttr("disabled");
                    swal.fire({
                        icon: 'error',
                        title: 'Message',
                        text: err,
                    });
                    // toastr.error(response.errors);
                }
                if (response.success) {
                    $(".candidate_btn").html("Print PDF");
                    $(".candidate_btn").removeAttr("disabled");
                    // toastr.success(data.success);
                    // location.reload();
                    var reg_no = response.reg_no;
                    var names = response.names;

                    swal.fire({
                        title: reg_no,
                        text: names + ' ?',
                        showCancelButton: true,
                        confirmButtonText: 'yes Print PDF',
                        showLoaderOnConfirm: true,
                        preConfirm: function(reg_no) {
                            return new Promise(function(resolve, reject) {
                                setTimeout(function(reg_no) {

                                    window.location.href =
                                        'candidate-transcript?mode=print_candidate_pdf&reg_no=' +
                                        reg_no;
                                    swal.fire('success',
                                        'Candidate report genarated successfully!',
                                        'success');
                                }, 2000)
                            })
                        },
                        allowOutsideClick: false
                    }).then(function(reg_no) {
                        swal.fire({
                            type: 'info',
                            title: 'Request canceled!',
                        })
                    })
                }
            }
        });
    </script>
@endsection
