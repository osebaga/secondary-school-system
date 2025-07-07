@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | Payment</title>
@endsection

@section('content')


@if ($message = Session::get('status'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="full-page">
    <div class="card">
        <div class="card-header">
            <h2 class="blue"><i class="fa-fw fa fa-check"></i> Create Invoice</h2>
        </div>
        <div class="card-body">
          
            <form id="payment-form">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fee">Select Fee: <span class="text-danger">*</span></label>
                        <select class="form-control" name="fee_type" id="fee" required>
                            <option value="">Select Fee</option>
                            @foreach ($fee_types as $fee_type)
                                <option value="{{ $fee_type->id }}">{{ $fee_type->name }}</option>
                            @endforeach
                        </select>
                        @error('fee_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fee_amount">Fee Amount:</label>
                        <input name="amount" id="fee_amount" type="text" class="form-control" required readonly>
                        @error('amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="email">Email:<span class="text-danger">*</span></label>
                        <input name="email" placeholder="Enter Your Email Address" class="form-control" type="email" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="mobile">Mobile:<span class="text-danger">*</span></label>
                        <input name="mobile" placeholder="Eg. 07XXXXXXXX" type="tel" class="form-control" required>
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div class="form-group col-md-4">
                        <label for="description">Description:<span class="text-danger">*</span></label>
                        <textarea placeholder="Enter The Description" name="description" class="form-control"required></textarea>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button id="form-btn" class="btn btn-primary">Get Control Number</button>
                </div>

               
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.tag').select2();

        $('#fee').on('change', function() {
            var selectedValue = $(this).val();
            $.ajax({
                url: '/get-bill/' + selectedValue,
                type: 'GET',
                success: function(response) {
                    let amount = response.amount;
                    $('#bill').text(amount);
                    $('#fee_amount').val(amount);
                },
                error: function(error) {
                    $('#bill').text('Error fetching amount');
                }
            });
        });

        $('#payment-form').submit(function(event) {
            event.preventDefault();
            $('.loader').show();
            $('#form-btn').hide();

            let formData = new FormData(this);
            $.ajax({
                url: '/dashboard/payment/ctlnumber2',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    let ref_number = response.reference_number;
                    setTimeout(function() {
                        $('.loader').hide();
                        $('#ctl-number').text('Your Payment Reference Number is: ' + ref_number).show();
                        $('#copy').show();
                        document.getElementById('payment-form').reset();
                    }, 2000);
                },
                error: function(error) {
                    setTimeout(function() {
                        $('.loader').hide();
                        $('#ctl-number').text('Something Went Wrong, Please Ensure Filling the form').show();
                    }, 2000);
                }
            });
        });
    });
</script>
@endsection