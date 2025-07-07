<?php
namespace App\Http\Composers;
/**
 * Created by PhpStorm.
 * User: DOTO OSEBAGA
 * Date: 11/01/2025
 * Time: 7:22 PM
 */
use App\Models\AcademicYear;
use Auth;
use Illuminate\View\View;

class GlobalComposer
{
public function compose(View $view){
   // dd($view->getName());

        if (auth()->user()->type == 1) {
           // $ac = AcademicYear::where('id', auth()->user()->staff->year_id)->first();
             $year = AcademicYear::where('status','1')->get();
            //  $year = AcademicYear::orderBy('year','asc')->get(); use this if status is 0

            $ac = $year->first()->year;
            //dd($ac);
        } else {

            //$ac = AcademicYear::where('id', auth()->user()->student->year_id)->first();
        }
        $year = AcademicYear::where('status','1')->get();
        // $year = AcademicYear::orderBy('year','asc')->get();

        $ac = $year->first()->year;
        $view->with('academic_year', $ac);

}
}
