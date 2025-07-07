<?php

namespace App\Http\Controllers\Dashboard\Examination;

use App\Exports\CourseWorkExamCategoryExport;
use App\Exports\ExamCategoryExport;
use App\Exports\SemisterExamCategoryExport;
use App\Exports\SemesterExamWithPracticalExport;
use App\Exports\CourseWorkExamWithPracticalExport;
use App\Exports\StudentCourseExport;
use App\Helpers\SRS as HelpersSRS;
use App\Http\Controllers\Controller;
use App\Imports\ExamCategoryImport;
use App\Imports\ExamCategoryImport2;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\CourseProgram;
use App\Models\ExamCategory;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use SRS;
class ExaminationController extends Controller
{

    public function uploadCourseAssessmentForm($course_id, $intake_id)
    {
        // dd($intake_id,$course_id);
        try {
            $id = HelpersSRS::decode($course_id)[0];
            $intake_id = HelpersSRS::decode($intake_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Upload Marks']];
        $exam_categories = ExamCategory::pluck('name', 'id');

        $year_id = Auth::user()->staff->year_id;
        $campus_id = Auth::user()->staff->campus_id;
        $check_sem1_upload = HelpersSRS::checkUploadStatus($campus_id, $intake_id, 1, 1, $year_id);
        $check_sem2_upload = HelpersSRS::checkUploadStatus($campus_id, $intake_id, 2, 1, $year_id);

        // dd($semesters);
        $semesters = new Collection();
        if (!is_null($check_sem1_upload) && !is_null($check_sem2_upload)) {
            $semesters = Semester::pluck('title', 'id');
        } elseif (!is_null($check_sem1_upload)) {
            $semesters = Semester::where('id', 1)->pluck('title', 'id');
        } elseif (!is_null($check_sem2_upload)) {
            $semesters = Semester::where('id', 2)->pluck('title', 'id');
        }

        $course = Course::find($id);

        $data['exam_categories'] = $exam_categories;
        $data['semesters'] = $semesters;
        $data['course'] = $course;
        $data['check_sem1_upload'] = $check_sem1_upload;
        $data['check_sem2_upload'] = $check_sem2_upload;
        return view('dashboard.examination.index_upload_ca', $data);
    }
    public function uploadSemesterExamForm($course_id)
    {
    }

    public function downloadExamCategoryExcelFormat($course_id, $type, $intake)
    {
        try {
            $course_id = HelpersSRS::decode($course_id)[0];
            $intake_id = HelpersSRS::decode($intake)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $course = Course::find($course_id);
        // dd($type);
        if ($type == 'se') {
            return Excel::download(new SemisterExamCategoryExport($course, $intake_id), 'Exam_Score_Template_' . str_replace('/', '-', $course->course_name) . '(' . $course->course_code . ').xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }
        if ($type == 'ca') {
            return Excel::download(new CourseWorkExamCategoryExport($course, $intake_id), 'Exam_Score_Template_' . str_replace('/', '-', $course->course_name) . '(' . $course->course_code . ').xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }
        return null;
    }

    public function downloadExamPracCategoryExcelFormat($course_id, $type, $intake)
    {
        try {
            $course_id = HelpersSRS::decode($course_id)[0];
            $intake_id = HelpersSRS::decode($intake)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        //$course = Course::academicYear()->find($course_id);
        $course = Course::find($course_id);
        //dd($course);
        if ($type == 'se') {
            return Excel::download(new SemesterExamWithPracticalExport($course, $intake_id), 'SE_EXAM' . str_replace('/', '-', $course->course_name) . '(' . $course->course_code . ').xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }
        if ($type == 'ca') {
            return Excel::download(new CourseWorkExamWithPracticalExport($course, $intake_id), 'CA_EXAM' . str_replace('/', '-', $course->course_name) . '(' . $course->course_code . ').xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }
        return null;
    }
    public function storeExamCategory(Request $request, $course_id)
    {
        $input = $request->all();
        try {
            $input['course_id'] = HelpersSRS::decode($course_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $validator = Validator::make($input, [
            'exam-excel' => 'required',
            'course_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }
        if ($request->hasFile('exam-excel')) {
            $file = $request->file('exam-excel');
            $path = $file->getRealPath();

            $filename = uniqid('upload_exam_' . md5(microtime()));
            $filename2 = $filename . 'xls';
            $course_id = $input['course_id'];
            try {
                $import = new ExamCategoryImport($course_id);
                $import->import($file, storage_path($filename2), \Maatwebsite\Excel\Excel::XLSX);
                return back()->with('message', 'Successfully Inserted');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());

                // dd($e->getMessage());
            }
            // return back()->with('message',$import);
            //
        }
    }

    public function uploadCourseAssessments(Request $request, $course_id)
    {
        return $input = $request->all();
        try {
            $input['course_id'] = HelpersSRS::decode($course_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $validator = Validator::make($input, [
            'exam-excel' => 'required',
            'exam_category_id' => 'required',
            'course_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }

        // $activeSemester = Semester::where('status',1)->get();
        // if($activeSemester->count() < 1){
        //   return back()->with('error', 'Result Upload is not yet activated');
        // }
        //  $semesterId = Semester::where('status',1)->first()->id;
        //  if(CourseProgram::where('course_id',$course_id)->where('semester',$semesterId)->count() < 1){
        //     return back()->with('error', 'This course does not belong to this Semester');
        //  }

        if ($request->hasFile('exam-excel')) {
            $file = $request->file('exam-excel');
            $path = $file->getRealPath();

            $filename = uniqid('upload_exam_' . md5(microtime())) . '-' . date('Y');
            $filename2 = $filename . 'xlsx';
            $course_id = $input['course_id'];
            $semester_id = $input['semester_id'];
            $exam_category_id = $input['exam_category_id'];
            $course = Course::academicYear()->find($course_id);
            $examCategory = ExamCategory::find($exam_category_id);
            $semester = Semester::find($semester_id);
            $status = $course->course_status;
            // dd($status);

            //check if course is registered for a specific semester

            $year_id = Auth::user()->staff->year_id;
            try {
                $import = new ExamCategoryImport($course, $examCategory, $year_id, $semester, $status);
                $import->import($path, null, \Maatwebsite\Excel\Excel::XLSX);
                // dd($import);
                return back()->with('message', 'Marks uploaded Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function uploadCourseAssessments2(Request $request, $course_id)
    {
        $input = $request->all();
        try {
            $input['course_id'] = HelpersSRS::decode($course_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $validator = Validator::make($input, [
            'exam-excel' => 'required',
            'exam_category_id' => 'required',
            'course_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }

        // $checksemester = CourseStudent::where('course_id',$input['course_id'])->get();
        $check_semester = CourseStudent::where('course_id', $input['course_id'])->first();
        if ($input['semester_id'] != $check_semester->semester) {
            return back()->with('error', 'This course does not belong to this Semester');
        }

        if ($request->hasFile('exam-excel')) {
            $file = $request->file('exam-excel');
            $path = $file->getRealPath();

            $filename = uniqid('upload_exam_' . md5(microtime())) . '-' . date('Y');
            $filename2 = $filename . 'xlsx';
            $course_id = $input['course_id'];
            $semester_id = $input['semester_id'];
            $exam_category_id = $input['exam_category_id'];
            // $course=Course::academicYear()->find($course_id);
            $course = Course::find($course_id);
            $examCategory = ExamCategory::find($exam_category_id);
            $semester = Semester::find($semester_id);
            $status = $course->course_status;
           
            $year_id = Auth::user()->staff->year_id;
            try {
                $import = new ExamCategoryImport2($course, $examCategory, $year_id, $semester, $status);
                $import->import($path, null, \Maatwebsite\Excel\Excel::XLSX);

                return back()->with('message', 'Marks Uploaded Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function uploadSemesterExam(Request $request, $course_id)
    {
    }

    public function downloadParticipatingStudents($course_id)
    {
        try {
            $course_id = HelpersSRS::decode($course_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $course = Course::academicYear()->find($course_id);

        return Excel::download(new StudentCourseExport($course), 'Students Registered in' . str_replace('/', '-', $course->course_name) . '(' . $course->course_code . ').xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }


    public function searchStudent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sql' => 'required',
        ]);
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Search Student']];
        $result = null;
        $isSearch = false;

        if ($request->input('search')) {
            $search = $request->search;
            $isSearch = true;
            $query = Student::whereHas(
                'user',
                $filter = function ($q) use ($search) {
                    $q->where('first_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('middle_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('username', 'LIKE', '%' . $search . '%');
                },
            )
                ->with(['user' => $filter])
                ->get();
            foreach ($query as $k => $r) {
                //  dd($r);
                $result[$k] = [
                    'id' => $r->id,
                    'user_id' => $r->user_id,
                    'name' => $r->user->last_name . ', ' . $r->user->first_name . ' ' . $r->user->middle_name,
                    'sex' => $r->user->gender,
                    'program' => $r->program->program_name,
                    'entryYear' => $r->admission_year,
                    'photo' => $r->user->present()->avatar,
                ];
            }
        }
        $data['result'] = $result;
        $data['isSearchRequested'] = $isSearch;
        return view('dashboard.admissions.search.search', $data);
    }
}
