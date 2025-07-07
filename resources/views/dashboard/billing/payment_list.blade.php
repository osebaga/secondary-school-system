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
    </style>
    @if ($message = Session::get('status'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue"><i class="fa-fw fa fa-check"></i>
                        Payments List
                    </h2>
                    {{--  <a href="{{ route('reference_number') }}"
                        class="btn btn-sm btn-primary text-white float-right mx-3 my-1">Create New Payment</a>  --}}

                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">

                            </p>
                            <div class="table table-responsive justify-content-center">
                                <div class="card">

                                    <div class="card-body">
                                        <table class="table text-left table-hover myTable">

                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Trans.Date</th>
                                                    <th>RegNo</th>
                                                    <th>Name</th>
                                                    <th>Mobile</th>
                                                    <th>ReferenceNo</th>
                                                    <th>Amount</th>
                                                    {{--  <th>Currency</th>  --}}
                                                    <th>ReceiptNo</th>
                                                    <th>Channel</th>
                                                    <th>FeeName</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $sn = 1;
                                                @endphp

                                                @foreach ($payments as $payment)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $payment->transactionDate }}</td>
                                                        <td>{{ $payment->payerID }}</td>
                                                        <td>{{ $payment->payerName }}</td>
                                                        <td>{{ $payment->payerMobile }}</td>
                                                        <td>{{ $payment->paymentReference }}</td>
                                                        <td>{{ $payment->amount }}</td>
                                                        {{--  <td>{{ $payment->currency }}</td>  --}}
                                                        <td>{{ $payment->receipt }}</td>
                                                        <td>{{ $payment->transactionChannel }}</td>
                                                        <td>{{ $payment->paymentDesc }}</td>
                                                        {{--  by receipt wise  --}}
                                                        {{--  <td><a href="{{ route('download_receipt', $payment->transactionRef) }}" target="_blank" title="Receipt by ReceiptNo"><i class="fa fa-download"></i></a></td>  --}}
                                                        {{--  by regno  --}}
                                                        {{--  <td><a href="{{ route('payment_receipt', $payment->payerID) }}" target="_blank" title="Receipt by Reg Number"><i class="fa fa-download"></i></a></td>   --}}
                                                        {{--  by ctl number  --}}

                                                        {{--  <td><a href="{{ route('receipt_by_ctlno', $payment->paymentReference) }}" target="_blank" title="Receipt by Reference Number"><i class="fa fa-download"></i></a></td>   --}}
                                                        <td>
                                                            <div class="dropdown show">
                                                                <a class="btn btn-secondary dropdown-toggle" href="#"
                                                                    role="button" id="dropdownMenuLink"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    Download By
                                                                </a>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuLink">
                                                                    <a href="{{ route('download_receipt', $payment->transactionRef) }}"
                                                                        target="_blank" class="dropdown-item"
                                                                        title="RCT Number">Receipt Number</a>
                                                                    {{-- <a href="{{ route('payment_receipt', $payment->payerID) }}"
                                                                        target="_blank" class="dropdown-item"
                                                                        title="Reg Number">Regist. Number</a>
                                                                    <a href="{{ route('receipt_by_ctlno', $payment->paymentReference) }}"
                                                                        target="_blank" class="dropdown-item"
                                                                        title="CTL Number">Control Number</a> --}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
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
