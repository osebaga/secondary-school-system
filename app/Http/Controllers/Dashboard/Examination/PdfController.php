<?php

namespace App\Http\Controllers\Dashboard\Examination;

use App\Helpers\SRS;
use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\CourseResult;
use App\Models\CourseResultSummary;
use App\Models\CourseStudent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;


class PdfController extends Controller
{
    //


    public function courseresultPdf(Request $request)
    {
        $courseId = SRS::decode($request->course_id)[0];
        $departmentid = DB::table('courses')->where('id',$courseId)->get();
        $data['courses'] = DB::table('courses')->where('id',$courseId)->get();
        $data['department'] = DB::table('departments')->where('id',$departmentid->first()->department_id)->get();
        $data['programname'] = DB::table('programs')->where('id',$request->program)->get();
        $data['studentwithcourse'] = CourseStudent::join('users','users.username','=','course_student.reg_no')
        ->where('course_id',$courseId)->get();
        if(($request->program==0)){
        $data['courseresults'] = CourseResult::join('users','users.username','=','course_results.reg_no')->                     
           where('course_id',$courseId)
                 ->get();
        $data['courseresultsummary'] = CourseResultSummary::where('course_id',$courseId)
        ->get();  
        $data['studentwherenotoncourseresult']  = collect($data['studentwithcourse']->pluck('reg_no'));                 
        $data['abscstudent'] = $data['studentwherenotoncourseresult']->diff($data['courseresults']->pluck('reg_no'));
        $data['abscstudentcourse'] = User::whereIn('username',$data['abscstudent'])->get(); 
                   
          $data['institute'] = DB::table('institutions')->get();       
                 //share view
                 
            view()->share($data);
            $pdf = PDF::loadView('dashboard.report.courseresultpdf',$data)->setPaper('a3');     
           
                return $pdf->download('courseresultpdf.pdf');
                 
                }else{
                    $students = DB::table('students')->where('program_id',$request->program)->get();
                 $data['courseresultsummary'] = CourseResultSummary::where('course_id',$courseId)->get(); 
                                      
          $data['courseresults']=  CourseResult::join('users','users.username','=','course_results.reg_no')->
         where('course_results.course_id',$courseId)
        ->whereIn('course_results.reg_no',$data['studentwithcourse']->pluck('reg_no'))
        ->get(); 
        $data['studentwherenotoncourseresult']  = collect($data['studentwithcourse']->pluck('reg_no'));                 
        $data['abscstudent'] = $data['studentwherenotoncourseresult']->diff($data['courseresults']->pluck('reg_no'));
        $data['abscstudentcourse'] = User::whereIn('username',$data['abscstudent'])->get(); 
           // dd($data['abscstudentcourse']) ;             
                    $data['institute'] = DB::table('institutions')->get(); 
                          //dd($data['courseresults']);
                          if(($data['courseresults'])->isEmpty())
                          {
                             return back()->with('message','There is no results for this Programe');

                          }else{
                          //share view
                    view()->share($data);
                     $pdf = PDF::loadView('dashboard.report.courseresultpdf',$data)->setPaper('a3'); 

                     return $pdf->download('courseresultpdf.pdf');
                    }
                }
               
                 
        /*
                return Excel::create('courseresult', function($excel) use ($data) {
         
                 $excel->sheet('mySheet', function($sheet) use ($data)
         
                 {
         
                     $sheet->fromArray($data);
         
                 });
         
                })->download("pdf");
                */
    }

    public function courseresultsPdf(Request $request)
    {

         $program = $request->program;
         $courseId = $request->course;
         $data['ayear'] = AcademicYear::find($request->ayear)->year ?? "";
        $students = DB::table('students')->where('program_id',$program)->get();
        $data['courseresultsummary'] = CourseResultSummary::where('course_id',$courseId)->get(); 
                             
        $data['courseresults']=  CourseResult::join('users','users.username','=','course_results.reg_no')->
        where('course_results.course_id',$courseId)
        ->whereIn('course_results.reg_no',$data['studentwithcourse']->pluck('reg_no'))
        ->get(); 
        $data['studentwherenotoncourseresult']  = collect($data['studentwithcourse']->pluck('reg_no'));                 
        $data['abscstudent'] = $data['studentwherenotoncourseresult']->diff($data['courseresults']->pluck('reg_no'));
        $data['abscstudentcourse'] = User::whereIn('username', $data['abscstudent'])->get(); 
        // dd($data['abscstudentcourse']) ;             
           $data['institute'] = DB::table('institutions')->get(); 
                 //dd($data['courseresults']);
                 if(($data['courseresults'])->isEmpty())
                 {
                    return back()->with('message','There is no results for this Programe');

                 }else{
                 //share view
           view()->share($data);
            $pdf = PDF::loadView('dashboard.report.courseresultpdf',$data)->setPaper('a3'); 
            // return dd($data);
            return $pdf->download('courseresultpdf.pdf');
           }

    }

    public function printCandidate($request){
        
    }
}
