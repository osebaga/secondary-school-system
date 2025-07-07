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
                        Bills List
                    </h2>

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
                                                    <th>Date Paid</th>
                                                    <th>Receipt No.</th>
                                                    <th>Reference Number</th>
                                                    <th>Paid Amount</th>
                                                    <th>
                                                        
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($payments as $payment)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{ $payment->transactionDate }}</td>
                                                        <td>{{ $payment->receipt }}</td>
                                                        <td>{{ $payment->paymentReference }}</td>
                                                        <td class="text-right">{{ number_format($payment->amount) }}</td>
                                                        <td>
                                                            <a href="{{ route('generate_receipt', $payment->transactionRef) }}" target="_blank" title="Download Receipt"><i class="fa fa-download"></i></a>
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
