
<html>

    <table style="border-collapse:collapse;border: 1px solid black;">
        <thead>
             <tr style="border: 1px solid black;">
                <th style="text-align:center;border: 1px solid black;" colspan="{{8+4*$program_courses->count()}}" height="60">
                    <strong>{{ \App\Models\Institution::first()->institution_name ?? "" }}</strong><br>
                    <strong>{{strtoupper($studyyear_title)}} {{$semester_title}} EXAMINATION FINAL RESULTS - ({{\App\Models\AcademicYear::find($ayear)->year}})</strong><br>
                    <strong>({{$program_code}}) - {{$program_name}}</strong>
                </th>
            </tr>
            <tr style="border: 1px solid black;">
                <th style="text-align:center;border: 1px solid black;" rowspan="2">S/N</th>
                <th style="text-align:center;border: 1px solid black;" rowspan="2">Name</th>
                <th style="text-align:center;border: 1px solid black;" rowspan="2">RegNo</th>
                <th style="text-align:center;border: 1px solid black;" rowspan="2">Sex</th>
                @foreach ($program_courses as $course)
                  <th style="text-align:center;border: 1px solid black;" rowspan="1" colspan="4">{{ \App\Models\Course::find($course->id)->course_code }}</th>
                @endforeach

                <th style="text-align:center;border: 1px solid black;" rowspan="2">Points</th>
                <th style="text-align:center;border: 1px solid black;" rowspan="2">Credits</th>
                <th style="text-align:center;border: 1px solid black;" rowspan="2">GPA</th>
                <th style="text-align:center;border: 1px solid black;" rowspan="2">Remarks</th>
            </tr>
            <tr style="border: 1px solid black;">
                @foreach($program_courses as $course)
                    <th style="text-align:center;border: 1px solid black;" rowspan="1">CA</th>
                    <th style="text-align:center;border: 1px solid black;" rowspan="1">SE</th>
                    <th style="text-align:center;border: 1px solid black;" rowspan="1">Total</th>
                    <th style="text-align:center;border: 1px solid black;" rowspan="1">GD</th>
                 @endforeach
            </tr>
           
               
        </thead>
        <tbody>
            
            @foreach ($students as $student)
            
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;border: 1px solid black;">{{$loop->index + 1}}</td>
                    <td style="border: 1px solid black;border: 1px solid black;">{{ \App\Models\User::find($student->user_id)->first_name }} {{ \App\Models\User::find($student->user_id)->middle_name }} {{ \App\Models\User::find($student->user_id)->last_name }}
                    </td>
                    <td style="border: 1px solid black;border: 1px solid black;">{{ $student->reg_no }}</td>
                    <td style="border: 1px solid black;border: 1px solid black;">{{ \App\Models\User::find($student->user_id)->gender }}</td>
                    @foreach ($program_courses as $course)
                        <td style="text-align:center;border: 1px solid black;">
                            {{ 
                              \App\Models\CourseResult::where('reg_no', $student->reg_no)
                              ->where('course_id', $course->id)
                              ->where('year_of_study', $yearofstudy)
                              ->first()->ca_score ?? '' 
                            }}
                        </td>
                        <td style="text-align:center;border: 1px solid black;">
                            {{ 
                                \App\Models\CourseResult::where('reg_no', $student->reg_no)
                                ->where('course_id', $course->id)
                                ->where('year_of_study', $yearofstudy)
                                ->first()->se_score ?? '' 
                            }}
                        </td>
                        <td style="text-align:center;border: 1px solid black;">{{ 
                              \App\Models\CourseResult::where('reg_no', $student->reg_no)
                              ->where('course_id', $course->id)
                              ->where('year_of_study', $yearofstudy)
                              ->first()->total_score ?? '' 
                            }}
                        </td>
                        <td style="text-align:center;border: 1px solid black;">
                            {{ 
                                \App\Models\CourseResult::where('reg_no', $student->reg_no)
                                ->where('course_id', $course->id)
                                ->where('year_of_study', $yearofstudy)
                                ->first()->grade ?? '' 
                            }}
                        </td>
                     @endforeach

                    <td style="text-align:center;border: 1px solid black;">{{ 
                        \App\Models\SemesterResult::where('reg_no', $student->reg_no)
                           ->where('semester_id',$semester_id)
                           ->where('year_id', $ayear)
                           ->where('year_of_study', $yearofstudy)
                           ->first()->total_points ?? '' 
                       }}
                    </td>
                    <td style="text-align:center;border: 1px solid black;">{{ 
                        \App\Models\SemesterResult::where('reg_no', $student->reg_no)
                           ->where('semester_id',$semester_id)
                           ->where('year_id', $ayear)
                           ->where('year_of_study', $yearofstudy)
                           ->first()->total_credits ?? '' 
                       }}
                    </td>
                    <td style="text-align:center;border: 1px solid black;">{{
                         \App\Models\SemesterResult::where('reg_no', $student->reg_no)
                           ->where('semester_id',$semester_id)
                           ->where('year_id', $ayear)
                           ->where('year_of_study', $yearofstudy)
                           ->first()->gpa ?? '' 
                       }}
                    </td>
                    <td style="text-align:center;border: 1px solid black;">{{ 
                        \App\Models\SemesterResult::where('reg_no', $student->reg_no)
                           ->where('semester_id',$semester_id)
                           ->where('year_id', $ayear)
                           ->where('year_of_study', $yearofstudy)
                           ->first()->remarks ?? '' 
                       }}
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

    <table style="border-collapse: collapse;border: 1px solid black;" top="5">
        <thead>
            <tr style="border-collapse: collapse;border: 1px solid black;">
                <th style="border-collapse: collapse;border: 1px solid black; text-align:center" colspan="3"><strong>Keys For Course Codes</strong></th>
            </tr>
            <tr>
                <th style="border-collapse: collapse;border: 1px solid black;">S/N</th>
                <th style="border-collapse: collapse;border: 1px solid black;">Course Code</th>
                <th style="border-collapse: collapse;border: 1px solid black;">Meaning</th>
            </tr>
        </thead>
        <tbody>
            @foreach($program_courses as $course)
            <tr style="border-collapse: collapse;border: 1px solid black;">
                <td style="border-collapse: collapse;border: 1px solid black;">{{$loop->index + 1}}</td>
                <td style="border-collapse: collapse;border: 1px solid black;">{{$course->course_code}}</td>
                <td style="border-collapse: collapse;border: 1px solid black;">{{$course->course_name}}</td>
            </tr>
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
