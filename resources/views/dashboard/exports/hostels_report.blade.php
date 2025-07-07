<html>

<table style="widtht: 100% border-collapse:collapse;border: 1px solid black;">
    <thead>
        <tr style="border: 1px solid black;">
            <th style="text-align:center;border: 1px solid black;" colspan="10" height="50">
                <strong>{{ \App\Models\Institution::first()->institution_name ?? '' }}</strong><br>
                {{-- <strong>{{strtoupper($studyyear_title)}} {{$semester_title}} EXAMINATION FINAL RESULTS - ({{\App\Models\AcademicYear::find($ayear)->year}})</strong><br> --}}
                <strong>REGISTERED HOSTELS</strong><br>
            </th>
        </tr>
        <tr style="border: 1px solid black;">
            <th style="text-align:center;border: 1px solid black;" rowspan="2">S/N</th>
            <th style="text-align:center;border: 1px solid black;" rowspan="2">Hostel Name</th>
            <th style="text-align:center;border: 1px solid black;" rowspan="2">Hostel Code</th>
            <th style="text-align:center;border: 1px solid black;" rowspan="2">Location</th>
            <th style="text-align:center;border: 1px solid black;" rowspan="2">Address</th>
            <th style="text-align:center;border: 1px solid black;" rowspan="2">Capacity</th>
            <th style="text-align:center;border: 1px solid black;" rowspan="2">Blocks</th>
            <th style="text-align:center;border: 1px solid black;" rowspan="2">Rooms</th>
            <th style="text-align:center;border: 1px solid black;" rowspan="2">Allocated Students</th>
            <th style="text-align:center;border: 1px solid black;" rowspan="2">Vacants Rooms</th>
        <tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($hostels as $hostel)
                <td style="text-align:center;border: 1px solid black;">{{ $index++ }}</td>
                <td style="text-align:center;border: 1px solid black;">{{ $hostel->hostel_name }}</td>
                <td style="text-align:center;border: 1px solid black;">{{ $hostel->code }}</td>
                <td style="text-align:center;border: 1px solid black;">{{ $hostel->location }}</td>
                <td style="text-align:center;border: 1px solid black;">{{ $hostel->address }}</td>
                <td style="text-align:center;border: 1px solid black;">{{ $hostel->hostel_capacity }}</td>
                <td style="text-align:center;border: 1px solid black;">{{ count($hostel->blocks) }}</td>
                <td style="text-align:center;border: 1px solid black;">{{ count($hostel->rooms) }}</td>
                <td style="text-align:center;border: 1px solid black;">{{ count($hostel->allocations) }}</td>
                <td style="text-align:center;border: 1px solid black;">{{ $hostel->hostel_capacity - count($hostel->allocations)}}</td>
            @endforeach

        </tr>

    </tbody>
</table>

</html>
