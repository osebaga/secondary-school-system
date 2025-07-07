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
        .view_options {
            border: 0px solid rgb(224, 224, 224); 
            border-radius: 5px; 
            background-color:antiquewhite;
        }
        .view_options:hover {
            border: 1px solid rgb(248, 248, 248); 
            background-color:white;
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
                    <a href="{{ route('payment.create') }}"
                        class="btn btn-sm btn-primary text-white float-right mx-3 my-1">Create New Payment</a>

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
                                                    <th>Reference Number</th>
                                                    <th>Fee</th>
                                                    <th>Amount</th>
                                                    <th>Paid Amount</th>
                                                    <th>Balance</th>
                                                    <th>Requested At</th>
                                                    <th>
                                                        Status
                                                    </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($payments as $payment)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $payment->control_number }}</td>
                                                        <td>{{ $payment->type }}</td>
                                                        <td class="text-right">{{ number_format($payment->amount) }}</td>
                                                        <td class="text-right">{{ number_format($payment->paid_amount) }}
                                                        </td>
                                                        <td class="text-right">{{ number_format($payment->balance) }}</td>
                                                        <td>{{ $payment->created_at }}</td>
                                                        <td>
                                                            @if ($payment->payment_status == 'unpaid')
                                                                <span class="badge badge-danger">Unpaid</span>
                                                            @elseif ($payment->payment_status == 'partially paid')
                                                                <span class="badge badge-warning">Partially Paid</span>
                                                            @elseif ($payment->payment_status == 'paid')
                                                                <span class="badge badge-success">Paid</span>
                                                            @else
                                                                <span class="badge badge-primary">Over Paid</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (in_array($payment->payment_status, ['paid', 'overpaid']))
                                                                <a
                                                                    title="View Payment Options" class="p-2 view_options not-allowed"
                                                                    >
                                                                    <i class="fa fa-expand"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('view_payment_options', $payment->control_number) }}"
                                                                    title="View Payment Options" class="p-2 view_options"
                                                                    >
                                                                    <i class="fa fa-expand"></i>
                                                                </a>
                                                            @endif
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
