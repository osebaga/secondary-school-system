@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | Aging Report</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Aging Report
                    </h2>
                </div>
                <div class="boxpane-content">
                    @if($message)
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                @endif
                    <div class="card bg-light p-4 mb-4 shadow-sm">
                        <div class="card-header">
                        <marquee> <h4 style="color: red;">
                            Please use the filters below to generate a specific report (e.g., by program, quarter, etc.). If no filters are selected, an overall report will be generated and available for download.
                        </h4></marquee>  </div>
                        <form action="{{ route('report.aging') }}" method="get" class="row g-3">
                            <div class="col-md-2">
                                <label for="academic_year" class="form-label">Account Year</label>
                                <select name="academic_year" class="form-control" required>
                                    <option value="">Select Year</option>
                                    @foreach ($academicYears as $year)
                                        <option value="{{ $year->year }}"
                                            {{ $request->academic_year == $year->year ? 'selected' : '' }}>
                                            {{ $year->year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="program_code" class="form-label">Programme</label>
                                <select name="program_code" class="form-control" required>
                                    <option value="">Select Programme</option>
                                    @foreach ($programmes as $program)
                                        <option value="{{ $program->program_code }}"
                                            {{ $request->program_code == $program->program_code ? 'selected' : '' }}>
                                            {{ $program->program_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="ageing_type" class="form-label">Ageing Type</label>
                                <select name="ageing_type" id="ageing_type" class="form-control" required
                                    onchange="toggleDateInputs()">
                                    <option value="">Select Type</option>
                                    <option value="month" {{ $request->ageing_type == 'month' ? 'selected' : '' }}>
                                        Month-wise</option>
                                    <option value="quarter" {{ $request->ageing_type == 'quarter' ? 'selected' : '' }}>
                                        Quarter-wise</option>
                                </select>
                            </div>

                            <div class="col-md-2" id="month_input" style="display: none;">
                                <label for="month_date" class="form-label">Month End Date</label>
                                <input type="date" name="month_date" id="dateRange" max="{{ date('Y-m-d') }}"
                                    class="form-control"
                                    value="{{ $request->month_date }}" {{$request->month_date == $request->month_date ? 'selected' : '' }}>
                                    
                            </div>

                            <div class="col-md-2" id="quarter_date" style="display: none;">
                                <label for="quarter_date" class="form-label">Quarter</label>
                                <select name="quarter_date" class="form-control">
                                    <option value="">Select Quarter</option>
                                    <option value="Q1 {{ date('Y') - 1 }}"
                                        {{ explode(' ', $request->quarter_date)[0] == 'Q1' ? 'selected' : '' }}>Quarter 1
                                        (July {{ date('Y') - 1 }} - September {{ date('Y') - 1 }})</option>
                                    <option value="Q2 {{ date('Y') - 1 }}"
                                        {{ explode(' ', $request->quarter_date)[0] == 'Q2' ? 'selected' : '' }}>Quarter 2
                                        (October {{ date('Y') - 1 }} - December {{ date('Y') - 1 }})</option>
                                    <option value="Q3 {{ date('Y') }}"
                                        {{ explode(' ', $request->quarter_date)[0] == 'Q3' ? 'selected' : '' }}>Quarter 3
                                        (January {{ date('Y') }} - March {{ date('Y') }})</option>
                                    <option value="Q4 {{ date('Y') }}"
                                        {{ explode(' ', $request->quarter_date)[0] == 'Q4' ? 'selected' : '' }}>Quarter 4
                                        (April {{ date('Y') }} - June {{ date('Y') }})</option>
                                </select>
                            </div>

                            <div class="d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Generate Report</button>
                            </div>
                        </form>
                    </div>


                    <div class="d-flex align-items-end ms-2 pull-right">
                        @if(count($bills) > 0)
                            <a href="{{ route('report.aging.export', request()->query()) }}" class="btn btn-success">
                                Download ECL
                            </a>
                        @endif
                    </div>
                    <div class="row" style="margin-top: 5%">
                        {{-- @if ($bills->isNotEmpty()) --}}
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table class="table table-bordered table-sm w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th>SN</th>
                                        <th>Reg No</th>
                                        <th>Name</th>
                                        <th>Balance</th>
                                        <th>0-90 Days</th>
                                        <th>91-180 Days</th>
                                        <th>181-270 Days</th>
                                        <th>271-365 Days</th>
                                        <th>365-450 Days</th>
                                        <th>451-540 Days</th>
                                        <th>541-630 Days</th>
                                        <th>631-720 Days</th>
                                        <th>721-810 Days</th>
                                        <th>811-900 Days</th>
                                        <th>901-990 Days</th>
                                        <th>991-1080 Days</th>
                                        <th>Above 1080 Days</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bills as $index => $bill)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $bill->reg_no }}</td>
                                            <td>{{ $bill->full_name }}</td>
                                            <td>{{ number_format($bill->total_balance, 2) }}</td>
                                            <td>{{ number_format($bill->range_0_90, 2) }}</td>
                                            <td>{{ number_format($bill->range_91_180, 2) }}</td>
                                            <td>{{ number_format($bill->range_181_270, 2) }}</td>
                                            <td>{{ number_format($bill->range_271_365, 2) }}</td>
                                            <td>{{ number_format($bill->range_365_450, 2) }}</td>
                                            <td>{{ number_format($bill->range_451_540, 2) }}</td>
                                            <td>{{ number_format($bill->range_541_630, 2) }}</td>
                                            <td>{{ number_format($bill->range_631_720, 2) }}</td>
                                            <td>{{ number_format($bill->range_721_810, 2) }}</td>
                                            <td>{{ number_format($bill->range_811_900, 2) }}</td>
                                            <td>{{ number_format($bill->range_901_990, 2) }}</td>
                                            <td>{{ number_format($bill->range_991_1080, 2) }}</td>
                                            <td>{{ number_format($bill->range_above_1080, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- @endif --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDateInputs() {
            const type = document.getElementById('ageing_type').value;
    
            const monthInputDiv = document.getElementById('month_input');
            const quarterInputDiv = document.getElementById('quarter_date');
    
            
            const monthInput = document.getElementById('dateRange');
            const quarterSelect = quarterInputDiv.querySelector('select');
    
            // Show/hide relevant fields
            monthInputDiv.style.display = type === 'month' ? 'block' : 'none';
            quarterInputDiv.style.display = type === 'quarter' ? 'block' : 'none';
    
            // Add/remove required attributes
            if (type === 'month') {
                monthInput.required = true;
                quarterSelect.required = false;
            } else if (type === 'quarter') {
                quarterSelect.required = true;
                monthInput.required = false;
            } else {
                monthInput.required = false;
                quarterSelect.required = false;
            }
        }
    
        // Ensure max date is set and toggle inputs on load
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('dateRange').setAttribute('max', new Date().toISOString().split("T")[0]);
            toggleDateInputs();
        });
    </script>
    
@endsection
