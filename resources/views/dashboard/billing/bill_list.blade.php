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
                    <a href="{{ route('reference_number') }}"
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
                                                    <th>RegNo</th>
                                                    <th>Name</th>
                                                    <th>Reference Number</th>
                                                    <th>Fee</th>
                                                    <th>Billed Amount</th>
                                                    <th>Paid Amount</th>
                                                    <th>Balance</th>
                                                    {{--  <th>Requested At</th>  --}}
                                                    <th>Transaction Date</th>
                                                    <th>
                                                        Status
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($invoices as $inv)
                                                @php $balance = $inv->amount - $inv->paid_amount @endphp
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $inv->reg_no }}</td>
                                                        <td>{{ $name = SRS::student_name($inv->reg_no) }}</td>
                                                        <td>{{ $inv->control_number }}</td>
                                                        <td>{{ $inv->type }}</td>
                                                        <td class="text-right">{{ number_format($inv->amount) }}</td>
                                                        <td class="text-right">{{ number_format($inv->paid_amount) }}</td>
                                                        <td class="text-right">{{ number_format($balance) }}</td>
                                                        {{--  <td>{{ $inv->created_at }}</td>  --}}
                                                        <td>{{ $inv->transaction->transactionDate ?? '' }}</td>
                                                        <td>
                                                            @if ($inv->status == 0)
                                                                <span class="badge badge-danger">Unpaid</span>
                                                            @elseif ($inv->status == 2)
                                                                <span class="badge badge-warning">Partially Paid</span>
                                                            @elseif($inv->status == 3)
                                                                <span class="badge badge-success">Over Paid</span>
                                                            @elseif($inv->status == 1)
                                                            <span class="badge badge-success">Paid</span>
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
