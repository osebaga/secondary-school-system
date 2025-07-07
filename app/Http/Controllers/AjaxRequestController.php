<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institution;
use App\Models\Campus;
use App\Models\ExamCategoryResult;
use App\Models\Program;
use App\Models\Course;
use Barryvdh\DomPDF\Facade as PDF;

class AjaxRequestController extends Controller
{
    public function getInstitutionCampuses($institutionId){
        return institution::find($institutionId)->campuses;
    }
    public function getCampusFaculties($campusId){
        return campus::find($campusId)->faculties;
    }
    public function getFacultyProgramTypes($faculty_id){
        return Program::where('faculty_id',$faculty_id)->select('program_type')->distinct()->get();
    }

    public function getProgramOfGivenType($type){
        return Program::where('program_type',$type)->get();
    }
}




////djsamfnsdabfsdhbfdsfjkds