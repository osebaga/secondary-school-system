<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Number</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <style>
        .loader {
            display: none;
            border: 4px solid #f3f3f3;
            border-top: 4px solid rgb(16, 159, 16);
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 2s linear infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        body,
        label,
        input,
        select,
        textarea,
        button {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #e6e6e6;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center" style="margin-top: 10%">
                <a href="" class="logo-lg"><img src="{{ asset('assets/uploads/logo/logo.png') }}" width="140"
                        class="rounded mx-auto d-block"> </a>
                <h2 style="margin-top: 5%">SAMIS - Payment Reference Generation</h2>
                <h6>Fill the Form To Generate Reference Number for the Payment</h6>
            </div>
            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-body">
                        <h3 class="text-center h">Bill Amount: <strong id="bill"></strong></h3>
                        <form id="form">
                            @csrf
                            <div class="form-group mb-3">
                                {{-- <label for="RegNo">ID</label> --}}
                                <input name="regno" id="regno" placeholder="Enter Registration No." type="text"
                                    class="form-control" required>
                                <div class="invalid-feedback" role="alert"></div>
                            </div>
                            <div class="form-group mb-3">
                                {{-- <label for="name">First Name</label> --}}
                                <input name="first_name" id="first_name" placeholder="Type Your First Name"
                                    type="text" class="form-control" required>
                                <div class="invalid-feedback" role="alert"></div>
                            </div>
                            <div class="form-group mb-3">
                                {{-- <label for="name">Last Name</label> --}}
                                <input name="last_name" id="last_name" placeholder="Type Your Last Name" type="text"
                                    class="form-control" required>
                                <div class="invalid-feedback" role="alert"></div>
                            </div>
                            <div class="form-group mb-3">
                                {{-- <label for="fee_type">Select Fee:</label> --}}
                                <select id="fee" class="form-control" name="fee_id" id="fee_type" required>
                                    <option value="">Select Fee</option>
                                    @foreach ($fees as $fee)
                                        <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" role="alert"></div>
                            </div>
                            <div class="form-group mb-3">
                                {{-- <label for="amount">Fee Amount:</label> --}}
                                <input name="amount" id="amount" placeholder="Enter Amount To Pay" type="number"
                                    class="form-control" required>
                                <div class="feedback text-danger my-1" role="alert"></div>
                            </div>
                            <div class="form-group mb-3">
                                {{-- <label for="email">Email:</label> --}}
                                <input name="email" id="email" placeholder="Type Your Email" class="form-control"
                                    type="email" required>
                                <div class="invalid-feedback" role="alert"></div>
                            </div>
                            <div class="form-group mb-3">
                                {{-- <label for="mobile">Mobile:</label> --}}
                                <input name="mobile" id="mobile" placeholder="Type Your Phone No" type="tel"
                                    class="form-control" required>
                                <div class="invalid-feedback" role="alert"></div>
                            </div>
                            <div class="form-group mb-3">
                                {{-- <label for="description">Description:</label> --}}
                                <textarea placeholder="Type Description...." name="description" id="description" class="form-control" rows="5"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <button id="form-btn" style="background-color: rgb(16, 159, 16)"
                                    class="btn btn-block text-white">Get Control Number</button>
                            </div>
                            <div class="loader"></div>
                            <h3 id="ctl-number" class="font-bold text-lg"></h3>
                            {{-- <button id="copy" class="btn">Copy</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('.h').hide();

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

                var submittedAmount = $('#amount').val();

                if (submittedAmount <= 0) {

                    $('.loader').hide();

                    $('.h').hide();

                    $('#form-btn').show();

                    $('.feedback').text('Please, enter valid amount');

                    setTimeout(function() {

                        location.reload();

                    }, 9000);

                } else {

                    $.ajax({
                        url: '/dashboard/payment/ctlnumber',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {

                            let ref_number = response.reference_number;

                            setTimeout(function() {
                                $('.loader').hide();
                                $('#ctl-number').text(ref_number);
                                // $('#copy').show();

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

                }


            });
        });
    </script>
</body>

</html>
