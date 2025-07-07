<html>
    @php
    $courseIDs = [];
    $a = 1;
    @endphp
    
    <table>
        <tbody>
            <tr>
                <td style="text-align: center;" width="100" height="80">
                    <h1>{{ \App\Models\Institution::first()->institution_name ?? "" }}</h1>
                    <h2>{{ \App\Models\Department::first()->department_name ?? "" }}</h2>
                    <h3>OVERALL SUMMARY OF EXAMINATIONS RESULTSHGHFJH - {{ $academic_year }}</h3>
                    <h4> FIELD OF STUDY: {{ $program }}</h4>
                    <h6>YEAR OF STUDY: {{ $studyyear }} SEMISTER: {{ $semister }} DATE ............................................................. WEIGHT: CA 40%, WEIGHT: SE 60%</h6>
                </td>
            </tr>
        </tbody>
    </table>
  
    <table>

        <thead style="height: 200px">
            <tr style="height: 200px">
                <th style="width: 10%"><b>S/N</b></th>
                <th style="width: 30%"><b>Name</b></th>
                <th style="width: 20%"><b>RegNo</b></th>
                <th style="height: 40%;"><b>Sex</b></th>
                <th style="height: 40%;"><b>DOB</b></th>
                <th style="height: 40%;"><b>Entry Year</b></th>
                <th style="height: 40%;"><b>Nationality</b></th>
                <th style="height: 40%;"><b>F4 INDEX</b></th>
                <th style="height: 40%;"><b>F4 YEAR</b></th>
                @foreach ($courses as $item)
                    @php
                        array_push($courseIDs, [
                            'course' . $a => $item->course_id,
                            'program' . $a => $item->program_id,
                        ]);
                    @endphp
                    <th style="width: 40%">
                        <b>{{ \App\Models\Course::find($item->course_id)->course_code }} ( {{ \App\Models\Course::find($item->course_id)->unit }} )</b>
                    </th>
                    @php
                        $a += 1;
                    @endphp
                @endforeach
                <th><b>Points</b></th>
                <th><b>GPA</b></th>
                <th><b>Remarks</b></th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $student)
                <tr>
                    <td>{{ $i }}</td>
                    <td>
                        {{ \App\Models\User::find($student->user_id)->first_name }}
                        {{ \App\Models\User::find($student->user_id)->middle_name }}
                        {{ \App\Models\User::find($student->user_id)->last_name }}
                    </td>
                    <td>{{ $student->reg_no }}</td>
                    <td>{{ \App\Models\User::find($student->user_id)->gender }}</td>
                    <td>{{ date('Y-m-d',time()) }}</td>
                    <td>{{ 2025 }}</td>
                    <td>Tanzania</td>
                    <td>S7887/00887</td>
                    <td>2015</td>
                    @foreach ($courses as $value)
                        <td>
                            {{ \App\Models\CourseResult::where('reg_no', $student->reg_no)->where('course_id', $value->course_id)->first()->grade ?? '' }}
                        </td>
                    @endforeach
                    @foreach ($semesteresult as $result)
                        @if ($student->reg_no == $result->reg_no)
                            <td>{{ $result->total_points }}</td>
                            <td>{{ $result->gpa }}</td>
                            <td>{{ $result->remarks }}</td>
                        @endif
                    @endforeach
                </tr>
                @php
                    $i += 1;
                @endphp
            @endforeach
        </tbody>
    </table>

    {{-- Added DEC Summary --}}
    <table>
        <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;background-color: cyan;">DEC SUMMARY</td>
            @foreach($program_courses as $course)
              <td style="border: 1px solid black;">{{$course->course_code}}</td>
            @endforeach
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">A</td>
            @foreach($program_courses as $course)
              <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$ayear)->total_A ?? '-'}}</td>
            @endforeach
        </tr>
         <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">B+</td>
            @foreach($program_courses as $course)
              <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$ayear)->total_B_plus ?? '-'}}</td>
            @endforeach
        </tr>
         <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">B</td>
            @foreach($program_courses as $course)
              <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$ayear)->total_B ?? '-'}}</td>
            @endforeach
        </tr>
         <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">C</td>
            @foreach($program_courses as $course)
              <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$ayear)->total_C ?? '-'}}</td>
            @endforeach
        </tr>
         <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">D</td>
            @foreach($program_courses as $course)
              <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$ayear)->total_D ?? '-'}}</td>
            @endforeach
        </tr>
         <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">F</td>
            @foreach($program_courses as $course)
              <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$ayear)->total_F ?? '-'}}</td>
            @endforeach
        </tr>
         <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">I</td>
            @foreach($program_courses as $course)
              <td style="border: 1px solid black;"></td>
            @endforeach
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">PASS</td>
             @foreach($program_courses as $course)
              <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$ayear)->total_pass ?? '-'}}</td>
            @endforeach
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">SUPPLIMENTARY</td>
             @foreach($program_courses as $course)
              <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$ayear)->total_fail ?? '-'}}</td>
            @endforeach
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">INCOMPLETE</td>
             @foreach($program_courses as $course)
              <td style="border: 1px solid black;"></td>
            @endforeach
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">ABSCENT</td>
             @foreach($program_courses as $course)
              <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$ayear)->total_ABSC ?? '-'}}</td>
            @endforeach
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">Total Candidates</td>
             @foreach($program_courses as $course)
              <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$ayear)->totalstudentcourse ?? '-'}}</td>
            @endforeach
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">Total Students</td>
             @foreach($program_courses as $course)
              <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$ayear)->totalstudentcourse ?? '-'}}</td>
            @endforeach
        </tr>
       
    </table>

</html>
