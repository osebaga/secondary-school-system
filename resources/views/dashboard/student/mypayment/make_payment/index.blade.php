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
        .view_options:hover {
            background-color: white !important;
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
                                        <table class="table text-left table-striped myTable">

                                            <thead>
                                                <tr>
                                                    
                                                    <th>S/N</th>
                                                    <th>Reference Number</th>
                                                    <th>Fee</th>
                                                    <th>Amount</th>
                                                    <th>Requested At</th>
                                                    <th>
                                                        Payment Options
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($payments as $payment)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{ $payment->control_number }}</td>
                                                        <td>{{ $payment->type }}</td>
                                                        <td class="text-right">{{ number_format($payment->amount) }}</td>
                                                        <td>{{ $payment->created_at }}</td>
                                                        <td width="25x;">
                                                            <a href="{{ route('view_payment_options', $payment->control_number) }}" 
                                                                title="View Options"
                                                                class="p-2 view_options"
                                                                style="border: 0.5px solid rgb(224, 224, 224); border-radius: 5px; background-color:antiquewhite"
                                                                >
                                                                <i class="fa fa-expand"></i>
                                                            </a>
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
