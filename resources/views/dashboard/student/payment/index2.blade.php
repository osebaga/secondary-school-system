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
                    {{-- <a href="{{ route('payment.create') }}"
                        class="btn btn-sm btn-primary text-white float-right mx-3 my-1">Create New Payment</a> --}}

                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">

                            </p>
                            <div class="table table-responsive justify-content-center">
                                <div class="card">

                                    <div class="card-body">
                                        <table class="table text-center">

                                            <thead>
                                                <tr>

                                                    <th>S/N</th>
                                                    <th>Date Paid</th>
                                                    <th>Receipt Number</th>
                                                    <th>Reference Number</th>
                                                    <th>Currency</th>
                                                    <th>Paid Amount</th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                    $sn = 1;
                                                @endphp

                                                @foreach ($payments as $payment)
                                                    <td>{{ $sn++ }}</td>
                                                    <td>{{ $payment->transactionDate }}</td>
                                                    <td>{{ $payment->receipt }}</td>
                                                    <td>{{ $payment->paymentReference }}</td>
                                                    <td>{{ $payment->currency }}</td>
                                                    <td>{{ $payment->amount }}</td>
                                                    <td><a href="/receipt/{{$payment->transactionRef}}" class="btn btn-sm btn-info text-white">Dowload Receipt</a></td>
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
