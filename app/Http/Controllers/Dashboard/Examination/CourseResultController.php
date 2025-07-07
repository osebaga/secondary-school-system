<?php

namespace App\Http\Controllers\Dashboard\Examination;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\ExamCategory;
use App\Models\Semester;
use App\Models\CourseResult;
class CourseResultController extends Controller
{
    //

    public function getCourseResult()
    {

        $courseresults = CourseResult::all();

        return view('dashboard.examination.courseresult',compact($courseresults));
    }
}
