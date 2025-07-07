<?php

namespace App\Exports;
use App\Models\Student;
use App\Models\CourseStudent;
use App\Models\CourseResult;
use App\Models\CourseProgram;

use Maatwebsite\Excel\Sheet;

use Maatwebsite\Excel\Concerns\FromView;
 
 
Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
    $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
});
class SemesterResults implements FromView

{
    /**
    * @return \Illuminate\Support\Collection
    */
     
    public function view(): \Illuminate\Contracts\View\View
    {
        $campus = 1;
        $program = 1;
        $intake = 1;
        $semester = 1;
        $ayear = 1;
        $data['bc'] = array(['link' => route('students.index'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Semester Result']);

        $data['student'] = Student::join('users','users.username','=','students.reg_no')->where('students.program_id',$program)
        ->where('students.campus_id',$campus)->where('students.intake_category_id',$intake)->get();
        
          $data['semesterresult'] = CourseResult::join('semester_results','semester_results.reg_no',
          '=','course_results.reg_no')->where('course_results.semester_id',$semester)
              ->whereIn('course_results.reg_no',$data['student']->pluck('reg_no'))
                ->where('course_results.year_id',$ayear)->get();
                 $data['cozstudent'] = CourseStudent::whereIn('course_id',$data['semesterresult']->pluck('course_id'))->get();
                // return $grouped;
               $data['coz'] = CourseProgram::join('courses','courses.id','=','course_program.course_id')
                ->where('course_program.program_id',$program)
                  ->whereIn('courses.id',$data['semesterresult']->pluck('course_id'))->get();
                //dd($data['coz']);
       return view('dashboard.examination.examofficerexcelsemester',$data);
    
}
}
