@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | Payment</title>
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
    .shadow-md{
        box-shadow: 0 0.3rem 0.5rem rgba(0,0,0,.175)!important
    }
    </style>
    @if ($message = Session::get('status'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header d-flex justify-content-between">
                    <h2 class="blue"><i class="fa-fw fa fa-check"></i>
                        Create Payment Reference
                    </h2>

                    <button class="btn"><a href="{{ route('invoices') }}" title="Close"><i class="fa fa-close fa-2x "></i></a></button>

                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">

                            </p>
                            <div class="d-flex justify-content-start">
                                <div class="card shadow-md py-2 px-1" style="width: 50rem; border-radius: 10px;">
                                    <div class="card-header">Generate Payment Reference Number</div>
                                    <div class="card-body">

                                        <h3 class="text-center h">Bill Amount: <strong id="bill"></strong></h3>
                                        <form id="form">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="RegNo">Registration Number</label>
                                                <input name="regno" id="regno" placeholder="Enter Registration No." type="text"
                                                    class="form-control" required>
                                                <div class="invalid-feedback" role="alert"></div>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="name">First Name</label>
                                                <input name="first_name" id="first_name" readonly placeholder="Type Your First Name"
                                                    type="text" class="form-control" required>
                                                <div class="invalid-feedback" role="alert"></div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="name">Last Name</label>
                                                <input name="last_name" id="last_name" readonly placeholder="Type Your Last Name" type="text"
                                                    class="form-control" required>
                                                <div class="invalid-feedback" role="alert"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Select Fee: <span class="text-danger">*</span></label>
                                                <select class="form-control tag" name="fee_type" id="fee" required>
                                                    <option value="">Select Fee</option>
                                                    @foreach ($fees as $fee_type)
                                                        <option value="{{ $fee_type->id }}">{{ $fee_type->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('fee_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="">Fee Amount:<span class="text-danger">*</span></label>
                                                <input name="amount"  id="amount" placeholder="Enter Amount You Want To Pay"
                                                    type="number" class="form-control amt" required readonly>
                                                @error('amount')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email:<span class="text-danger">*</span></label>
                                                <input name="email" placeholder="Enter Your Email Address"
                                                    class="form-control" type="email" required>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="">Mobile:<span class="text-danger">*</span></label>
                                                <input name="mobile" placeholder="Eg. 07XXXXXXXX" type="tel"
                                                    class="form-control" required>
                                                @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="">Description:<span class="text-danger">*</span></label>
                                                <textarea placeholder="Enter The Description" name="description" class="form-control" name="" id=""  required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <button id="form-btn" class="btn btn-primary btn-block">Generate Reference Number</button>

                                            </div>
                                            <div class="loader"></div>
                                            <h3 id="ctl-number" class="font-bold text-lg"></h3>
                                            <button id="copy" class="btn">Copy</button>
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
        });
        $('.h').hide();

    </script>

    <script>
        $('#copy').hide();

        $('#copy').click((event) => {
            event.preventDefault();

            var content = $('#ctl-number').text();

            var tempInput = $('<input>');
            $('body').append(tempInput);
            tempInput.val(content).select();
            document.execCommand('copy');
            tempInput.remove();

            $('#copy').text('Copied!')

        });

        $(document).ready(function() {
            $('#form').submit(function(event) {
                event.preventDefault();

                $('.loader').show();
                $('#form-btn').hide();

                let formData = new FormData(this);
                
                $.ajax({
                    url: '/dashboard/billing/store/ctlno',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        let ref_number = response.reference_number;

                        setTimeout(function() {
                            $('.loader').hide();
                            $('#ctl-number').text('Payment Reference Number is: ' + ref_number);
                            // $('#copy').show();
                            window.location.href = "{{ route('invoices') }}"

                            document.getElementById('form').reset();

                        }, 2000);

                    },
                    error: function(error) {
                        setTimeout(function() {
                            $('.loader').hide();
                            $('#ctl-number').text(
                                'Something Went Wrong, Please Ensure Filling the form'
                                );
                        }, 2000);
                    }
                });
            });
        });

        $('#fee').on('change', function() {

            var selectedValue = $(this).val();

            $.ajax({
                url: '/get-bill/' + selectedValue,
                type: 'GET',
                processData: false,
                contentType: false,
                success: function(response) {

                    $('.h').show();

                    let amount = response.amount;

                    $('#bill').text(amount);
                    $('.amt').val(amount);

                },
                error: function(error) {

                    $('.h').hide();
                }
            });

        });

        $('#amount').on('blur', function() {

            var feeID = $('#fee').val();

            $.ajax({
                url: '/get-bill/' + feeID,
                type: 'GET',
                processData: false,
                contentType: false,
                success: function(response) {

                    feeAmount = response.amount;

                    $('#bill').text(parseFloat(feeAmount) - parseFloat($('#amount').val()));

                },
                error: function(error) {

                }
            });

        });

        $('#regno').mouseout(function() {

            var reg_no = $('#regno').val();

            if(reg_no != ''){
            $.ajax({
                url: '/get-std-name/' + reg_no,
                type: 'GET',
                processData: false,
                contentType: false,
                success: function(response) {

                    first_name = response.first_name;
                    last_name =  response.last_name;

                    $('#first_name').val(first_name);
                    $('#last_name').val(last_name.replace(',',''));

                },
                error: function(error) {
                    //alert("The provided registration number does not exist in SAMIS!!");

                }
            });
        }else{
            //alert("please provide registered registration number");

        }

        });
    </script>

@endsection
