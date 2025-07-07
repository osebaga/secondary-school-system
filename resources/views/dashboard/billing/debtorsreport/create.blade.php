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
    @if (Session::has('debt_message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning:</strong> {{ Session::get('debt_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue"><i class="fa-fw fa fa-check"></i>
                        Debtor Report
                    </h2>
                    {{--  <a href="{{ route('debtor_report') }}"
                        class="btn btn-sm btn-primary text-white float-right mx-3 my-1">Generate Debtors Report</a>  --}}
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
                                                    <th>RegNo</th>
                                                    <th>Name</th>
                                                    {{--  <th>Open Balance</th>  --}}
                                                    {{--  <th>Annual Fee</th>  --}}
                                                    <th>Debt Amount</th>
                                                    <th>Paid Amount</th>
                                                    <th>Outstanding Balance</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $sn = 1; @endphp

                                                @foreach ($debtors as $debt)
                                                    @php $debit_credit_array=explode("_",SRS::GetStudentAccoountBalance($debt->reg_no)) @endphp

                                                    <tr>
                                                        <td>{{ $sn++ }}</td>
                                                        <td>{{ $debt->reg_no }}</td>
                                                        <td>{{ $debt->std_name }}</td>
                                                        <td>{{ $debit_credit_array[0] }}</td>
                                                        <td>{{ $debit_credit_array[1] }}</td>
                                                        <td>{{ $debit_credit_array[2] }}</td>
                                                        <td style="text-align: center; width: 10px"><a
                                                                href="{{ route('statement_report', $debt->reg_no) }}"
                                                                target="_blank" title="Print Statement"><i
                                                                    class="fa fa-download"></i></a></td>

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
