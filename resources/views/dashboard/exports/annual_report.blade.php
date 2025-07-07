<html>
    
    <table style="white-space:nowrap;border: 1px solid black;">
        <thead>
            <tr style="border: 1px solid black;">
                <td style="text-align: center;border: 1px solid black;" height="80" colspan="{{8+$courses->count()}}">
                    <h1>{{ \App\Models\Institution::first()->institution_name ?? "" }}</h1>
                    <h2>{{ \App\Models\Program::where('id',$program)->first()->program_name ?? "" }}</h2>
                    <h3>ANNUAL EXAMINATIONS RESULTS - {{ $academic_year }}</h3>
                    <h6>YEAR OF STUDY: {{ $studyyear }} </h6>
                </td>
            </tr>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black;" rowspan="3">S/N</th>
                <th style="border: 1px solid black;" rowspan="3">Name</th>
                <th style="border: 1px solid black;" rowspan="3">Reg No</th>
                <th style="border: 1px solid black;text-align: center;" rowspan="3">Sex</th>
                @foreach($courses as $course)
                 <th style="text-align: center;border: 1px solid black;">{{$course->course_code ?? ''}}</th>
                @endforeach
                <th style="border: 1px solid black;text-align: center;" rowspan="3">Total Units</th>
                <th style="border: 1px solid black;text-align: center;" rowspan="3">Points</th>
                <th style="border: 1px solid black;text-align: center;" rowspan="3">GPA</th>
                <th style="border: 1px solid black;text-align: center;" rowspan="3">Remark</th>
            </tr>
            <tr>
               @foreach($courses as $course)
                <th style="text-align: center;border: 1px solid black;">{{$course->unit ?? ''}}</th>
               @endforeach
            </tr>
            <tr> 
              @foreach($courses as $course)
                <th style="text-align: center;border: 1px solid black;">{{\App\Models\CourseProgram::where('course_id',$course->id)->where('program_id',$program)->where('year_id',$year_id)->where('year',$year)->first()->semester ?? ''}}</th>
              @endforeach
            </tr> 
        </thead>

        <tbody>
            @foreach($students as $student)
             <tr style="border: 1px solid black;">
                 <td style="border: 1px solid black;">{{$loop->index + 1}}</td>
                 <td style="border: 1px solid black;">{{$student->full_name}}</td>
                 <td style="border: 1px solid black;">{{$student->reg_no}}</td>
                 <td style="border: 1px solid black;text-align: center;">{{\App\Models\User::find($student->user_id)->gender}}</td>
                @foreach($courses as $course)
                 <td style="border: 1px solid black;text-align: center;">
                    {{ 
                        \App\Models\CourseResult::where('reg_no', $student->reg_no)
                         ->where('course_id',$course->id)
                         ->first()->grade ?? '' 
                     }}
                 </td>
                @endforeach
                <td style="border: 1px solid black;text-align: center;">
                    {{
                        \App\Models\AnnualResult::where('reg_no',$student->reg_no)
                         ->where('year_id',$year_id)
                         ->first()->total_credits ?? ''
                    }}
                </td>
                <td style="border: 1px solid black;text-align: center;">
                    {{
                        \App\Models\AnnualResult::where('reg_no',$student->reg_no)
                         ->where('year_id',$year_id)
                         ->first()->total_points ?? ''
                    }}
                </td>
                <td style="border: 1px solid black;text-align: center;">
                    {{
                        \App\Models\AnnualResult::where('reg_no',$student->reg_no)
                         ->where('year_id',$year_id)
                         ->first()->gpa ?? ''
                    }}
                </td>
               <td style="border: 1px solid black;text-align: center;">
                    {{
                        \App\Models\AnnualResult::where('reg_no',$student->reg_no)
                         ->where('year_id',$year_id)
                         ->first()->remarks ?? ''
                    }}
                </td>

             </tr>
            @endforeach

        </tbody>
    </table>

    <table>
            <tr>
                @for($i=0;$i<(8+$courses->count());$i++)
                   <td></td>
                @endfor
            </tr>

            <tr>
                @for($i=0;$i<(8+$courses->count());$i++)
                   <td></td>
                @endfor
            </tr>
    </table>


    <table style="white-space:nowrap;border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <th></th>
            <th></th>
            <th colspan="6" style="text-align:center;border: 1px solid black;">SUMMARY OF PERFORMANCE STATISTICS</th>
        </tr>
        <tr style="border: 1px solid black;">
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">REMARK</td>
            <td style="border: 1px solid black;">FAIL</td>
            <td style="border: 1px solid black;">FIRST CLASS</td>
            <td style="border: 1px solid black;">UPPER SECOND</td>
            <td style="border: 1px solid black;">LOWER SECOND</td>
            <td style="border: 1px solid black;">PASS CLASS</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">FEMALE</td>
            <td style="border: 1px solid black;">{{$fail_summaries->total_female_fail ?? ''}}</td>
            <td style="border: 1px solid black;">{{$first_class_female ?? ''}}</td>
            <td style="border: 1px solid black;">{{$upper_second_female ?? ''}}</td>
            <td style="border: 1px solid black;">{{$lower_second_female ?? ''}}</td>
            <td style="border: 1px solid black;">{{$pass_class_female ?? ''}}</td>
        </tr>
        <tr style="border: 1px solid black;">
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">MALE</td>
            <td style="border: 1px solid black;">{{$fail_summaries->total_male_fail ?? ''}}</td>
            <td style="border: 1px solid black;">{{$first_class_male ?? ''}}</td>
            <td style="border: 1px solid black;">{{$upper_second_male ?? ''}}</td>
            <td style="border: 1px solid black;">{{$lower_second_male ?? ''}}</td>
            <td style="border: 1px solid black;">{{$pass_class_male ?? ''}}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td style="border: 1px solid black;">SUBTOTAL</td>
            <td style="border: 1px solid black;">{{$fail_summaries->total_fail ?? ''}}</td>
            <td style="border: 1px solid black;">{{$first_class_total ?? ''}}</td>
            <td style="border: 1px solid black;">{{$upper_second_total ?? ''}}</td>
            <td style="border: 1px solid black;">{{$lower_second_total ?? ''}}</td>
            <td style="border: 1px solid black;">{{$pass_class_total ?? ''}}</td>
        </tr>
    </table>

      <table>
            <tr>
                @for($i=0;$i<(8+$courses->count());$i++)
                   <td></td>
                @endfor
            </tr>

            <tr>
                @for($i=0;$i<(8+$courses->count());$i++)
                   <td></td>
                @endfor
            </tr>

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
            @foreach($courses as $course)
            <tr style="border-collapse: collapse;border: 1px solid black;">
                <td style="border-collapse: collapse;border: 1px solid black;">{{$loop->index + 1}}</td>
                <td style="border-collapse: collapse;border: 1px solid black;">{{$course->course_code}}</td>
                <td style="border-collapse: collapse;border: 1px solid black;">{{$course->course_name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

     <table>
         <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;background-color: cyan;">DEC SUMMARY</td>
             @foreach($courses as $course)
               <td style="border: 1px solid black;">{{$course->course_code}}</td>
             @endforeach
         </tr>
         <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;">A</td>
             @foreach($courses as $course)
               <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$year_id)->total_A ?? '-'}}</td>
             @endforeach
         </tr>
          <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;">B+</td>
             @foreach($courses as $course)
               <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$year_id)->total_B_plus ?? '-'}}</td>
             @endforeach
         </tr>
          <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;">B</td>
             @foreach($courses as $course)
               <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$year_id)->total_B ?? '-'}}</td>
             @endforeach
         </tr>
          <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;">C</td>
             @foreach($courses as $course)
               <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$year_id)->total_C ?? '-'}}</td>
             @endforeach
         </tr>
          <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;">D</td>
             @foreach($courses as $course)
               <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$year_id)->total_D ?? '-'}}</td>
             @endforeach
         </tr>
          <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;">F</td>
             @foreach($courses as $course)
               <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$year_id)->total_F ?? '-'}}</td>
             @endforeach
         </tr>
          <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;">I</td>
             @foreach($courses as $course)
               <td style="border: 1px solid black;"></td>
             @endforeach
         </tr>
         <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;">PASS</td>
              @foreach($courses as $course)
               <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$year_id)->total_pass ?? '-'}}</td>
             @endforeach
         </tr>
         <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;">SUPPLIMENTARY</td>
              @foreach($courses as $course)
               <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$year_id)->total_fail ?? '-'}}</td>
             @endforeach
         </tr>
         <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;">INCOMPLETE</td>
              @foreach($courses as $course)
               <td style="border: 1px solid black;"></td>
             @endforeach
         </tr>
         <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;">ABSCENT</td>
              @foreach($courses as $course)
               <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$year_id)->total_ABSC ?? '-'}}</td>
             @endforeach
         </tr>
         <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;">Total Candidates</td>
              @foreach($courses as $course)
               <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$year_id)->totalstudentcourse ?? '-'}}</td>
             @endforeach
         </tr>
         <tr>
             <td></td>
             <td></td>
             <td style="border: 1px solid black;">Total Students</td>
              @foreach($courses as $course)
               <td style="border: 1px solid black;">{{\App\Helpers\SRS::getNumberOfStudentsObtainGivenGradeForGivenCourse($course->id,$year_id)->totalstudentcourse ?? '-'}}</td>
             @endforeach
         </tr>
        
     </table>

  

</html>
