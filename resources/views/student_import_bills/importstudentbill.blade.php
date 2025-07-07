@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | Student Bills</title>
@endsection

@section('content')
    <div class="row">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Import Student Bills
                    </h2>
                    <div class="form-group pull-right">
                        <a href="{{ route('export-student-bill-template') }}" class="btn btn-success">
                            <i class="fa fa-download"></i> Download Import Template
                        </a>
                    </div>

                </div>

                <div class="boxpane-content">
                    <div class="card bg-light p-4 mb-4 shadow-sm">
                        <form action="{{ route('student-bills.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="account_year">Account Year:</label>
                                    <select name="account_year" id="account_year" class="form-control" required>
                                        <option value="">-- Select Account Year --</option>
                                        @foreach ($account_years as $year)
                                            <option value="{{ $year->id }}">{{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="programme_id">Programme:</label>
                                    <select name="programme_id" id="programme_id" class="form-control" required>
                                        <option value="">-- Select Programme --</option>
                                        @foreach ($programmes as $programme)
                                            <option value="{{ $programme->program_code }}">
                                                {{ $programme->program_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="nta_level_id">NTA Level:</label>
                                    <select name="nta_level_id" id="nta_level_id" class="form-control" required>
                                        <option value="">-- Select NTA Level --</option>
                                        @foreach ($nta_levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="bill_date">Bill Date:</label>
                                    <input type="date" name="bill_date" id="dateRange" max="{{ date('Y-m-d') }}"
                                        class="form-control" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="file">Upload Excel File:</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                                <div class="form-group col-md-1 text-center pull-right mt-auto">
                                    <button type="submit" class="btn btn-primary">Import Bill</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row" style="margin-top: 5%">
                        <div class="col-lg-12">
                            <div class="table table-responsive justify-content-center">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table text-left table-hover myTable">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>RegNo</th>
                                                    <th>Name</th>
                                                    <th>Fee Name</th>
                                                    <th>Programe</th>
                                                    <th>Bill Amount</th>
                                                    <th>Account Year</th>
                                                    <th>Bill Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($student_montly_payments as $inv)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $inv->reg_no }}</td>
                                                        <td>{{ $inv->full_name }}</td>
                                                        <td>{{ $inv->fee_name }}</td>
                                                        <td>{{ $inv->prog_code }}</td>
                                                        <td class="text-right">{{ number_format($inv->amount) }}</td>
                                                        <td>{{ $inv->account_year }}</td>
                                                        <td>{{ $inv->bill_date }}</td>
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
    <script>
        // Set the max attribute dynamically to today's date
        document.getElementById('dateRange').setAttribute('max', new Date().toISOString().split("T")[0]);
    </script>
@endsection
