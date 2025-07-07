<table>
    <thead>
    <tr>
        <th>S/no</th>
        <th>Student Reg No</th>
        <th>Total Score</th>
        <th>Grade</th>
        <th>GPA</th>
        <th>Remarks</th>
    </tr>
    </thead>
    <tbody>
        @php $no=1; @endphp
    @foreach($results as $result)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $result->regno }}</td>
            <td>{{ $result->totalscore}}</td>
            <td>{{ $result->grade}}</td>
            <td>{{ $result->gpa}}</td>
             <td>{{ $result->remarks}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
