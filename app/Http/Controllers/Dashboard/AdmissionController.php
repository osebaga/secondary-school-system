<?php

namespace App\Http\Controllers\Dashboard;

use Intervention\Image\ImageManagerStatic as Image;

use App\Helpers\SRS;
use App\Http\Controllers\Controller;
use App\Imports\BlockedstudentImport;
use App\Models\AcademicYear;
use App\Models\Campus;
use App\Models\Center;
use App\Models\Comment;
use App\Models\CourseResult;
use App\Models\Dependant;
use App\Models\EducationHistory;
use App\Models\Institution;
use App\Models\IntakeCategory;
use App\Models\MannerOfEntry;
use App\Models\NextOfKin;
use App\Models\Program;
use App\Models\Semester;
use App\Models\Sponsor;
use App\Models\Student;
use App\Models\StudentBank;
use App\Models\StudentClass;
use App\Models\StudentContact;
use App\Models\StudentSponsor;
use App\Models\Transcript;
use App\Models\UnpaidStudent;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Yajra\DataTables\Facades\DataTables;

class AdmissionController extends Controller
{
    public function __construct()
    {
    }
    public function index($campus)
    {
        if (!Gate::allows('admissions-view')) {
            return abort(401);
        }
        try {
            $campus_id = SRS::decode($campus)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Enrollment']];

        $index_no = [
            '' => '',
            'form4_index_no' => 'Prem No.',
            // 'form6_index_no' => 'Form VI Index No.',
            'reg_no' => 'Registration No.',
        ];
        $data['student_status'] = [
            '' => '',
            'All' => 'All',
            '0' => 'No',
            '1' => 'Yes',
            '2' => 'Partial',
        ];
        $data['gender'] = [
            '' => '',
            'All' => 'All',
            'M' => 'Male',
            'F' => 'Female',
        ];
        $programs[''] = '';
        $programs['All'] = 'All Programs';
        $progs = Program::all();
        foreach ($progs as $prog) {
            $programs[$prog->id] = $prog->program_name;
        }

        $campuses[''] = '';
        $campuses['All'] = 'All Schools';
        $campus_all = Campus::all();
        foreach ($campus_all as $campus) {
            $campuses[$campus->id] = $campus->campus_name;
        }

        $campus = Campus::find($campus_id);

        $data['index_no'] = $index_no;
        $data['school'] = $campus_id;
        $data['programs'] = $programs;
        $data['campuses'] = $campuses;
        $data['campus'] = $campus;

        return view('dashboard.admissions.index', $data);
    }

    public function campus()
    {
        if (!Gate::allows('admissions-view')) {
            return abort(401);
        }
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Campuses']];
        $inst = Institution::with('campuses')->get();

        $data['institution'] = $inst;

        return view('dashboard.admissions.index_campus', $data);
    }
    public function uploadHistory()
    {
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Upload History']];
        return view('dashboard.admissions.index_upload_history', $data);
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

    public function candidate_transcript(Request $request)
    {
        $data['bc'] = $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Examination > Candidate Transcript']];
        $output = ['error' => 'Ooops! something went wrong !!'];
        if ($request->has('mode')) {
            $st = Student::where('reg_no', $request->reg_no)->first();
            if ($st->count() < 1 || $st->status != 'Graduate') {
                return back()->with('error', 'No such Graduate! Please Ensure Registration Number you submit belongs to a Graduate Student');
            }
            try {
                if ($request->mode == 'transcript') {
                    if ($request->reg_no != '') {
                        $candidate = Student::where('reg_no', $request->reg_no)->first() ?? '';
                        if ($candidate != '') {
                            $names = User::find($candidate->user_id)->first_name ?? ('' . '-' . User::find($candidate->user_id)->last_name ?? (User::find($candidate->user_id)->middle_name ?? ''));
                            $output = [
                                'success' => 'candidate available',
                                'reg_no' => $candidate->reg_no,
                                'names' => $names,
                            ];
                        } else {
                            // $output = ['error' => 'Sorry this ' . $request->reg_no . ' not found in the database !'];
                            $output = ['error' => 'Sorry ' . $request->reg_no . ' not found in Graduates records '];
                        }
                    }
                }
                if ($request->mode == 'print_candidate_pdf' || $request->mode == 'print_transcript_pdf') {
                    $academicYear = CourseResult::where('reg_no', $request->reg_no)
                        ->groupBy('year_id')
                        ->get();
                    // id 	reg_no 	year_id 	semester_id 	course_id 	credits 	ca_score 	se_score Ascending 1 	total_score 	grade 	points 	gpa 	remarks
                    // id 	student_id 	course_id 	reg_no 	year_study 	semester 	year_id 	carry_over 	display 	change_access 	cs_status
                    $results = [];
                    if (count($academicYear) > 0) {
                        $i = 1;
                        foreach ($academicYear as $year) {
                            $acYearSemesterOne = 'year' . $i . 'semester1';
                            $acYearSemesterTwo = 'year' . $i . 'semester2';
                            $acYearSemesterOne = CourseResult::where('reg_no', $request->reg_no)
                                ->where('year_id', $year->year_id)
                                ->where('semester_id', 1)
                                ->get();
                            $acYearSemesterTwo = CourseResult::where('reg_no', $request->reg_no)
                                ->where('year_id', $year->year_id)
                                ->where('semester_id', 2)
                                ->get();
                            array_push($results, [
                                'academicYear' => AcademicYear::find($year->year_id)->year ?? '0',
                                'year' . $i . 'semester1' => $acYearSemesterOne,
                                'year' . $i . 'semester2' => $acYearSemesterTwo,
                            ]);
                            $i++;
                        }
                    }

                    $student = Student::where('reg_no', $request->reg_no)->first();
                    $user = User::findOrFail($student->user_id);

                    $transcript = Transcript::where('reg_no', $request->reg_no)->first();

                    if ($request->mode == 'print_candidate_pdf') {
                        $blade = 'statement_pdf';
                        $name = ' Provisional Result';
                    }
                    if ($request->mode == 'print_transcript_pdf') {
                        $blade = 'transcript_pdf';
                        $name = ' Transcript';
                    }
                    //  return $results;
                    $pdf = PDF::loadView('dashboard.exports.' . $blade, [
                        'academicYear' => $academicYear->count(),
                        'results' => $results,
                        'reg_no' => $request->reg_no,
                        'student' => $student,
                        'user' => $user,
                        'admitted' => AcademicYear::find($student->year_id)->year ?? '',
                        'transcript' => $transcript,
                        'date' => date('Y-m-d', time()),
                    ]);

                    if (!$user->avatar && !$user->gender) {
                        return back()->with('error', 'Please, Ensure Student Has All The Information to print the Transcript');
                    }

                    $transcriptAttr = $transcript->getAttributes();
                    $userAttr = $user->getAttributes();

                    foreach ($transcriptAttr as $attribute => $value) {
                        if ($value === null) {
                            return back()->with('error', 'Student Submitted Misses some Information, Check His/Her Profile to See Missing Information');
                        }
                    }

                    foreach ($userAttr as $attribute => $value) {
                        if ($value === null) {
                            return back()->with('error', 'Student Submitted Misses some Information, Check His/Her Profile to See Missing Information');
                        }
                    }
                    // $pdf->image('assets/uploads/logo/logo.png', 10,20,200,200);
                    // $pdf->setWatermarkImage(public_path('assets/uploads/logo/logo.png'));
                    error_reporting(E_ALL ^ E_DEPRECATED); //Depreciating error display
                    return $pdf->download($request->reg_no . $name . '.pdf');
                    // return $pdf->stream();
                }
                return redirect()->back();
                // return response()->json($output);
                exit();
            } catch (Exception $err) {
                // return $err;
                return back()->with('error', 'Something Went Wrong');
            }
        }
        return view('dashboard.examofficer.candidatetranscript', $data);
    }

    public function candidate_statement(Request $request)
    {
        $data['bc'] = $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Examination > Candidate Statement']];
        $output = ['error' => 'Ooops! something went wrong !!'];
        if ($request->has('mode')) {
            $st = Student::where('reg_no', $request->reg_no)->get();
            if ($st->count() < 1) {
                return back()->withErrors('No such a student');
            }
            try {
                if ($request->mode == 'transcript') {
                    if ($request->reg_no != '') {
                        $candidate = Student::where('reg_no', $request->reg_no)->first() ?? '';
                        if ($candidate != '') {
                            $names = User::find($candidate->user_id)->first_name ?? ('' . '-' . User::find($candidate->user_id)->last_name ?? (User::find($candidate->user_id)->middle_name ?? ''));
                            $output = [
                                'success' => 'candidate available',
                                'reg_no' => $candidate->reg_no,
                                'names' => $names,
                            ];
                        } else {
                            $output = ['error' => 'Sorry this ' . $request->reg_no . ' not found in the database !'];
                        }
                    }
                }
                if ($request->mode == 'print_candidate_pdf' || $request->mode == 'print_transcript_pdf') {
                    $academicYear = CourseResult::where('reg_no', $request->reg_no)
                        ->groupBy('year_id')
                        ->get();
                    // id 	reg_no 	year_id 	semester_id 	course_id 	credits 	ca_score 	se_score Ascending 1 	total_score 	grade 	points 	gpa 	remarks
                    // id 	student_id 	course_id 	reg_no 	year_study 	semester 	year_id 	carry_over 	display 	change_access 	cs_status
                    $results = [];
                    if (count($academicYear) > 0) {
                        $i = 1;
                        foreach ($academicYear as $year) {
                            $acYearSemesterOne = 'year' . $i . 'semester1';
                            $acYearSemesterTwo = 'year' . $i . 'semester2';
                            $acYearSemesterOne = CourseResult::where('reg_no', $request->reg_no)
                                ->where('year_id', $year->year_id)
                                ->where('semester_id', 1)
                                ->get();
                            $acYearSemesterTwo = CourseResult::where('reg_no', $request->reg_no)
                                ->where('year_id', $year->year_id)
                                ->where('semester_id', 2)
                                ->get();
                            array_push($results, [
                                'academicYear' => AcademicYear::find($year->year_id)->year ?? '0',
                                'year' . $i . 'semester1' => $acYearSemesterOne,
                                'year' . $i . 'semester2' => $acYearSemesterTwo,
                            ]);
                            $i = +1;
                        }
                    }
                    $student = Student::where('reg_no', $request->reg_no)->first();
                    $user = User::findOrFail($student->user_id);
                    if ($request->mode == 'print_candidate_pdf') {
                        $blade = 'statement_pdf';
                        $name = 'Provisional Result for';
                    }
                    if ($request->mode == 'print_transcript_pdf') {
                        $blade = 'transcript_pdf';
                        $name = 'transcript';
                    }
                    // return $results;
                    $pdf = PDF::loadView('dashboard.exports.' . $blade, [
                        'academicYear' => $academicYear->count(),
                        'results' => $results,
                        'reg_no' => $request->reg_no,
                        'student' => $student,
                        'user' => $user,
                        'admitted' => AcademicYear::find($student->year_id)->year ?? '',
                        'transcript' => Transcript::where('reg_no', $request->reg_no)->first(),
                        'date' => date('Y-m-d', time()),
                    ]);
                    // $pdf->image('assets/uploads/logo/logo.png', 10,20,200,200);
                    // $pdf->setWatermarkImage(public_path('assets/uploads/logo/logo.png'));
                    error_reporting(E_ALL ^ E_DEPRECATED); //Depreciating error display
                    // return $pdf->download($name . $request->reg_no . '.pdf');
                    return $pdf->stream();
                }
                return redirect()->back();
                // return response()->json($output);
                exit();
            } catch (Exception $err) {
                return $err;
            }
        }
        return view('dashboard.examofficer.candidatestatement', $data);
    }

    public function studentAdmissionInfo($std_id, $school)
    {
        if (!Gate::allows('admissions-view')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($std_id)[0];
            $campus_id = SRS::decode($school)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $data['records'] = Student::academicYear()
            ->where('campus_id', '=', $campus_id)
            ->where('user_id', '=', $id)
            ->with(['user', 'program'])
            ->first();
        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard']];

        $data['school'] = $campus_id;

        return view('dashboard.admissions.student_admission_info', $data);
    }

    public function getJsonAdmittedStudents(Request $request, $campus)
    {
        if (!Gate::allows('admissions-view')) {
            return abort(401);
        }
        try {
            $campus_id = SRS::decode($campus)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $staffyear = Auth::user()->staff->year_id;
        //$students = $this->student_model->with(['user', 'program'])->get();
        // $students = Student::withoutTrashed()->academicYear()->with(['user', 'program' => function ($q) {
        //     $q->academicYear();
        // },
        //     'intake_category','campus'])->where('campus_id','=',$campus_id);

        $students = Student::withoutTrashed()
            ->with(['intake_category', 'campus'])
            ->where('campus_id', '=', $campus_id);

        return DataTables::of($students)
            ->addIndexColumn()

            ->filter(function ($student) use ($request) {
                if (!empty($request->surname)) {
                    $student->whereHas('user', function ($q) use ($request) {
                        $q->where('last_name', 'LIKE', '%' . $request->surname . '%');
                    });
                }

                if ($request->filled('program') && $request->program != 'All') {
                    //   $students->whereHas('user',function ($q) use($request) {
                    $student->where('program_id', '=', $request->program);
                    // });
                }
                if ($request->filled('gender') && $request->gender != 'All') {
                    $student->whereHas('user', function ($q) use ($request) {
                        $q->where('gender', '=', $request->gender);
                    });
                }

                if ($request->filled('index_type')) {
                    if ($request->index_type == 'form4_index_no') {
                        if ($request->filled('index_no')) {
                            $student->where('form4_index_no', 'LIKE', "%{$request->index_no}%");
                        }
                    }
                    if ($request->index_type == 'form6_index_no') {
                        if ($request->filled('index_no')) {
                            $student->where('form6_index_no', 'like', "%{$request->index_no}%");
                        }
                    }
                    if ($request->index_type == 'reg_no') {
                        if ($request->filled('index_no')) {
                            $student->where('reg_no', 'like', "%{$request->index_no}%");
                        }
                    }
                }
            })
            ->addColumn('full_name', function ($std) use ($campus_id) {
                return $std->user->last_name . ', ' . $std->user->first_name . ' ' . $std->user->middle_name;

                // return $std->user->last_name .' '.$std->user->first_name.' '.$std->user->middle_name;
            })
            ->editColumn('gender', function ($std) {
                return $std->user->gender;
            })
            ->editColumn('program_acronym', function ($std) {
                return $std->program->program_acronym;
            })
            ->editColumn('intake_name', function ($std) {
                return $std->intake_category->name;
            })
            ->addColumn('actions', function ($std) {
                $profile_link = link_to(route('admissions.delete', SRS::encode($std->id)), '<i class="fa fa-2x fa-trash " aria-hidden="true"></i>');

                return html_entity_decode($profile_link);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function importStudentFromOAS()
    {
        if (!Gate::allows('admissions-import_student')) {
            return abort(401);
        }

        $import = SRS::insertStudentDetails();
        //        $student_basic =ApplicantDetails::all();
        //        dd($student_basic);
        //          $student_basic =ApplicantDetails::where('operation','BASIC')->get();
        //          $student_next_of_kin =ApplicantDetails::where('operation','NEXTOFKIN')->get();
        //          $student_result =ApplicantDetails::where('operation','RESULTS')->get();
        //          $student_referee =ApplicantDetails::where('operation','REFEREE')->get();
        //          $student_referee =ApplicantDetails::where('operation','ATTACHMENT')->get();
        //
        //
        //        //  $student_basic =ApplicantDetails::where('operation','BASIC')->get();
        //
        //          $fields_array = [];
        //          $field_array = [];
        //          $record_array = [];
        //
        //          foreach ($student_basic as $std){
        //              ///dd($std->index_number);
        //
        //               $fields_array = explode(";",$std->request_data);
        //
        //              // $record_array =explode(":",$fields_array);
        //               foreach ($fields_array as $key=>$field){
        //                   $field_array =explode(":",$field);
        //                   //dump($field_array);
        //                   $record_array[$field_array[0]] =$field_array[1];
        //
        //
        //               }
        //
        //
        //          }
        //
        //       dump($record_array);

        //          foreach ($fields_array as $key=>$field){
        //           //   dd($field);
        //               $field_array[] = explode(":",$field);
        //               $record_array[$field_array[0]] = $field_array[1];
        //          }

        // dd($field_array, $record_array);
    }

    public function admitStudent()
    {
        if (!Gate::allows('admissions-import_student')) {
            return abort(401);
        }

        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Campuss&Schools']];
        $intakes = IntakeCategory::all();

        $data['intakes'] = $intakes;

        return view('dashboard.admissions.index_intake_category', $data);
    }

    public function blockedstudent()
    {
        // if (! Gate::allows('admissions-blocked-student')) {
        //     return abort(401);
        // }

        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard']];

        $data['intake'] = IntakeCategory::all();
        $data['semester'] = Semester::all();
        $year = AcademicYear::where('status', '1')->get();
        $data['blockedstudent'] = UnpaidStudent::where('year_id', $year->first()->id)->get();

        return view('dashboard.admissions.blocked_students', $data);
    }

    public function postblockedStudentImport(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'blockedstudentexcel' => 'required',
            'intake' => 'required',
            'semester' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }
        if ($request->hasFile('blockedstudentexcel')) {
            $file = $request->file('blockedstudentexcel');
            $path = $file->getRealPath();

            $filename = uniqid('upload_blockedstudent_' . md5(microtime())) . '-' . date('Y');
            $filename2 = $filename . 'xlsx';
            $intake_id = $input['intake'];
            $semester_id = $input['semester'];
            $ayear = AcademicYear::where('status', 1)->get();
            $year_id = $ayear->first()->id;
            //  dd($status);
            try {
                $import = new BlockedstudentImport($intake_id, $year_id, $semester_id);
                //dd($import);
                $import->import($path, null, \Maatwebsite\Excel\Excel::XLSX);

                return back()->with('message', 'Your Blockedstudent Uploaded Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function unblockedStudent(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }

        $reg_no = $request->id;

        foreach ($reg_no as $re) {
            $update = [
                'unblocked_by' => Auth::id(),
                'unblocked_date' => Carbon::now(),
                'status' => 1,
            ];

            UnpaidStudent::where('reg_no', $re)->update($update);
        }
        return back()->with('message', 'Your Student Unblocked Successfully');
    }

    public function unbSingleStudent($id)
    {
        $update = [
            'blocked_by' => Auth::id(),
            'blocked_date' => Carbon::now(),
            'unblocked_by' => '',
            'unblocked_date' => '',
            'status' => 0,
        ];

        UnpaidStudent::where('id', $id)->update($update);

        return back()->with('message', 'Your Student Unblocked Successfully');
    }

    public function enrollNewIntakeStudent($intake_id)
    {
        if (!Gate::allows('admissions-import_student')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($intake_id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong try again later');
        }
        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard']];
        $intake = IntakeCategory::find($id);

        $campuses[''] = '';
        $campus_all = Campus::all();
        foreach ($campus_all as $campus) {
            $campuses[$campus->id] = $campus->campus_name;
        }
        $data['intake_category_id'] = $intake_id;
        $data['intake'] = $intake;
        $data['campuses'] = $campuses;

        return view('dashboard.admissions.admit_new_student', $data);
    }

    public function getCentersByCampus($campus_id)
    {
        $centers = Center::where('campus_id', $campus_id)->pluck('center_name', 'id');
        return response()->json($centers);
    }

    public function updateStudentAdmissionInfo(Request $request, $user_id)
    {
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        $status = $input['status'];

        switch ($status) {
            case 'srs':
                $validator = Validator::make($input, [
                    'srs' => 'required',
                ]);

                if ($validator->fails()) {
                    return back()->with('errors', $validator->errors());
                }
                try {
                    $id = SRS::decode($user_id)[0];
                } catch (\Exception $e) {
                    abort(404);
                }
                // dd(Session::get('staff')->staff_id);
                $data['srs'] = $input['srs'];
                if ($request->filled('comment')) {
                    $comment = [
                        'staff_id' => Session::get('staff')->staff_id,
                        'reg_no' => $input['reg_no'],
                        'year_id' => Auth::user()->staff->year_id,
                        'comment' => $input['comment'],
                        'section' => 'SRS',
                    ];
                    Comment::create($comment);
                }
                try {
                    DB::beginTransaction();

                    Student::academicYear()
                        ->where('user_id', $id)
                        ->update($data);
                    DB::commit();
                    return back()->with('message', 'Updated Successfully');
                } catch (\Exception $e) {
                    DB::rollBack();
                    return back()->with('error', 'Failed! (code=' . $e->getCode() . ')');
                }
                break;
            case 'sps':
                $validator = Validator::make($input, [
                    'sps' => 'required',
                ]);

                if ($validator->fails()) {
                    return back()->with('errors', $validator->errors());
                }
                try {
                    $id = SRS::decode($user_id)[0];
                } catch (\Exception $e) {
                    abort(404);
                }
                // dd(Session::get('staff')->staff_id);
                $data['sps'] = $input['sps'];
                if ($request->filled('comment')) {
                    $comment = [
                        'staff_id' => Session::get('staff')->staff_id,
                        'reg_no' => $input['reg_no'],
                        'year_id' => Auth::user()->staff->year_id,
                        'comment' => $input['comment'],
                        'section' => 'SPS',
                    ];
                    Comment::create($comment);
                }
                try {
                    DB::beginTransaction();

                    Student::academicYear()
                        ->where('user_id', $id)
                        ->update($data);
                    DB::commit();
                    return back()->with('message', 'Updated Successfully');
                } catch (\Exception $e) {
                    DB::rollBack();
                    return back()->with('error', 'Failed! (code=' . $e->getCode() . ')');
                }
                break;
            case 'acs':
                $validator = Validator::make($input, [
                    'acs' => 'required',
                ]);

                if ($validator->fails()) {
                    return back()->with('errors', $validator->errors());
                }

                try {
                    $id = SRS::decode($user_id)[0];
                } catch (\Exception $e) {
                    abort(404);
                } // dd(Session::get('staff')->staff_id);
                $data['acs'] = $input['acs'];
                if ($request->filled('comment')) {
                    $comment = [
                        'staff_id' => Session::get('staff')->staff_id,
                        'reg_no' => $input['reg_no'],
                        'year_id' => Auth::user()->staff->year_id,
                        'comment' => $input['comment'],
                        'section' => 'ACS',
                    ];
                    Comment::create($comment);
                }
                try {
                    DB::beginTransaction();

                    Student::academicYear()
                        ->where('user_id', $id)
                        ->update($data);

                    DB::commit();
                    return back()->with('message', 'Updated Successfully');
                } catch (\Exception $e) {
                    DB::rollBack();
                    return back()->with('error', 'Failed! (code=' . $e->getCode() . ')');
                }
                break;
            case 'dvs':
                $validator = Validator::make($input, [
                    'dvs' => 'required',
                ]);

                if ($validator->fails()) {
                    return back()->with('errors', $validator->errors());
                }

                try {
                    $id = SRS::decode($user_id)[0];
                } catch (\Exception $e) {
                    abort(404);
                } // dd(Session::get('staff')->staff_id);
                $data['dvs'] = $input['dvs'];
                if ($request->filled('comment')) {
                    $comment = [
                        'staff_id' => Session::get('staff')->staff_id,
                        'reg_no' => $input['reg_no'],
                        'year_id' => Auth::user()->staff->year_id,
                        'comment' => $input['comment'],
                        'section' => 'DVS',
                    ];
                    Comment::create($comment);
                }
                try {
                    DB::beginTransaction();

                    Student::academicYear()
                        ->where('user_id', $id)
                        ->update($data);
                    DB::commit();
                    return back()->with('message', 'Updated Successfully');
                } catch (\Exception $e) {
                    DB::rollBack();
                    return back()->with('error', 'Failed! (code=' . $e->getCode() . ')');
                }
                break;
            case 'ras':
                $validator = Validator::make($input, [
                    'ras' => 'required',
                ]);

                if ($validator->fails()) {
                    return back()->with('errors', $validator->errors());
                }

                try {
                    $id = SRS::decode($user_id)[0];
                } catch (\Exception $e) {
                    abort(404);
                } // dd(Session::get('staff')->staff_id);
                $data['ras'] = $input['ras'];
                if ($request->filled('comment')) {
                    $comment = [
                        'staff_id' => Session::get('staff')->staff_id,
                        'reg_no' => $input['reg_no'],
                        'year_id' => Auth::user()->staff->year_id,
                        'comment' => $input['comment'],
                        'section' => 'RAS',
                    ];
                    Comment::create($comment);
                }
                try {
                    DB::beginTransaction();

                    Student::academicYear()
                        ->where('user_id', $id)
                        ->update($data);

                    DB::commit();
                    return back()->with('message', 'Updated Successfully');
                } catch (\Exception $e) {
                    DB::rollBack();
                    return back()->with('error', 'Failed! (code=' . $e->getCode() . ')');
                }
                break;
        }
    }

    public function editStudent($user_id)
    {
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Edit Student Admission']];
        try {
            $user_id = $this->hash->decode($user_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $counts = [
            'Afghanistan',
            'Albania',
            'Algeria',
            'American Samoa',
            'Andorra',
            'Angola',
            'Anguilla',
            'Antarctica',
            'Antigua and Barbuda',
            'Argentina',
            'Armenia',
            'Aruba',
            'Australia',
            'Austria',
            'Azerbaijan',
            'Bahamas',
            'Bahrain',
            'Bangladesh',
            'Barbados',
            'Belarus',
            'Belgium',
            'Belize',
            'Benin',
            'Bermuda',
            'Bhutan',
            'Bolivia',
            'Bosnia and Herzegowina',
            'Botswana',
            'Bouvet Island',
            'Brazil',
            'British Indian Ocean Territory',
            'Brunei Darussalam',
            'Bulgaria',
            'Burkina Faso',
            'Burundi',
            'Cambodia',
            'Cameroon',
            'Canada',
            'Cape Verde',
            'Cayman Islands',
            'Central African Republic',
            'Chad',
            'Chile',
            'China',
            'Christmas Island',
            'Cocos (Keeling) Islands',
            'Colombia',
            'Comoros',
            'Congo',
            'Congo, the Democratic Republic of the',
            'Cook Islands',
            'Costa Rica',
            "Cote d'Ivoire",
            'Croatia (Hrvatska)',
            'Cuba',
            'Cyprus',
            'Czech Republic',
            'Denmark',
            'Djibouti',
            'Dominica',
            'Dominican Republic',
            'East Timor',
            'Ecuador',
            'Egypt',
            'El Salvador',
            'Equatorial Guinea',
            'Eritrea',
            'Estonia',
            'Ethiopia',
            'Falkland Islands (Malvinas)',
            'Faroe Islands',
            'Fiji',
            'Finland',
            'France',
            'France Metropolitan',
            'French Guiana',
            'French Polynesia',
            'French Southern Territories',
            'Gabon',
            'Gambia',
            'Georgia',
            'Germany',
            'Ghana',
            'Gibraltar',
            'Greece',
            'Greenland',
            'Grenada',
            'Guadeloupe',
            'Guam',
            'Guatemala',
            'Guinea',
            'Guinea-Bissau',
            'Guyana',
            'Haiti',
            'Heard and Mc Donald Islands',
            'Holy See (Vatican City State)',
            'Honduras',
            'Hong Kong',
            'Hungary',
            'Iceland',
            'India',
            'Indonesia',
            'Iran (Islamic Republic of)',
            'Iraq',
            'Ireland',
            'Israel',
            'Italy',
            'Jamaica',
            'Japan',
            'Jordan',
            'Kazakhstan',
            'Kenya',
            'Kiribati',
            "Korea, Democratic People's Republic of",
            'Korea, Republic of',
            'Kuwait',
            'Kyrgyzstan',
            "Lao, People's Democratic Republic",
            'Latvia',
            'Lebanon',
            'Lesotho',
            'Liberia',
            'Libyan Arab Jamahiriya',
            'Liechtenstein',
            'Lithuania',
            'Luxembourg',
            'Macau',
            'Macedonia, The Former Yugoslav Republic of',
            'Madagascar',
            'Malawi',
            'Malaysia',
            'Maldives',
            'Mali',
            'Malta',
            'Marshall Islands',
            'Martinique',
            'Mauritania',
            'Mauritius',
            'Mayotte',
            'Mexico',
            'Micronesia, Federated States of',
            'Moldova, Republic of',
            'Monaco',
            'Mongolia',
            'Montserrat',
            'Morocco',
            'Mozambique',
            'Myanmar',
            'Namibia',
            'Nauru',
            'Nepal',
            'Netherlands',
            'Netherlands Antilles',
            'New Caledonia',
            'New Zealand',
            'Nicaragua',
            'Niger',
            'Nigeria',
            'Niue',
            'Norfolk Island',
            'Northern Mariana Islands',
            'Norway',
            'Oman',
            'Pakistan',
            'Palau',
            'Panama',
            'Papua New Guinea',
            'Paraguay',
            'Peru',
            'Philippines',
            'Pitcairn',
            'Poland',
            'Portugal',
            'Puerto Rico',
            'Qatar',
            'Reunion',
            'Romania',
            'Russian Federation',
            'Rwanda',
            'Saint Kitts and Nevis',
            'Saint Lucia',
            'Saint Vincent and the Grenadines',
            'Samoa',
            'San Marino',
            'Sao Tome and Principe',
            'Saudi Arabia',
            'Senegal',
            'Seychelles',
            'Sierra Leone',
            'Singapore',
            'Slovakia (Slovak Republic)',
            'Slovenia',
            'Solomon Islands',
            'Somalia',
            'South Africa',
            'South Georgia and the South Sandwich Islands',
            'Spain',
            'Sri Lanka',
            'St. Helena',
            'St. Pierre and Miquelon',
            'Sudan',
            'Suriname',
            'Svalbard and Jan Mayen Islands',
            'Swaziland',
            'Sweden',
            'Switzerland',
            'Syrian Arab Republic',
            'Taiwan, Province of China',
            'Tajikistan',
            'Tanzania',
            'Thailand',
            'Togo',
            'Tokelau',
            'Tonga',
            'Trinidad and Tobago',
            'Tunisia',
            'Turkey',
            'Turkmenistan',
            'Turks and Caicos Islands',
            'Tuvalu',
            'Uganda',
            'Ukraine',
            'United Arab Emirates',
            'United Kingdom',
            'United States',
            'United States Minor Outlying Islands',
            'Uruguay',
            'Uzbekistan',
            'Vanuatu',
            'Venezuela',
            'Vietnam',
            'Virgin Islands (British)',
            'Virgin Islands (U.S.)',
            'Wallis and Futuna Islands',
            'Western Sahara',
            'Yemen',
            'Yugoslavia',
            'Zambia',
            'Zimbabwe',
        ];
        $countries = [];
        foreach ($counts as $c) {
            $countries[$c] = $c;
        }
        $data['student'] = Student::academicYear()
            ->where('user_id', '=', $user_id)
            ->first();
        $data['countries'] = $countries;

        return view('dashboard.admissions.edit_student', $data);
    }

    public function updateStudent(Request $request, $user_id)
    {
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        try {
            $user_id = $this->hash->decode($user_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        // $request->except('_method');
        $input = $request->all();
        $validator = Validator::make($input, [
            // 'username' => 'required|unique:users,username,' . $id,
            'gender' => 'required',
            'form4_index_no' => 'required',
            //'form6_index_no' => 'required',
            'dob' => 'required',
            'dob_place' => 'required',
            'citizenship' => 'required',
        ]);
        if ($request->filled('email')) {
            $validator = Validator::make($input, [
                'email' => 'required|email|unique:users,email,' . $user_id,
            ]);
        }

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('errors', $validator->errors());
        }

        $user_data = [
            'gender' => $input['gender'],
        ];
        $student_data = [
            'form4_index_no' => $input['form4_index_no'],
            // 'form6_index_no' => $input['form6_index_no'],
            'dob' => $input['dob'],
            'dob_place' => $input['dob_place'],
            'mobile_no' => $input['mobile_no'],
            'next_of_kin_mobile' => $input['next_of_kin_mobile'],
            'mailing_address' => $input['mailing_address'],
            'email_address' => $input['email_address'],
            'citizenship' => $input['citizenship'],
            'sponsorship' => $input['sponsorship'],
            'account_no' => $input['account_no'],
            'bank_name' => $input['bank_name'],
            'is_disabled' => $input['is_disabled'],
            'entry_qualification' => $input['entry_qualification'],
        ];

        //dd($student_data,$user_data);
        DB::beginTransaction();
        try {
            User::find($user_id)->update($user_data);
            Student::where('user_id', $user_id)->update($student_data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Update Failed ' . $e->getMessage());
        }

        // Session::flash('message', '');
        return redirect()
            ->back()
            ->withInput()
            ->with('message', 'User updated successfully');
    }

    public function deleteStudent($user_id)
    {
        if (!Gate::allows('admissions-delete')) {
            return abort(401);
        }
        echo $user_id;
    }

    public function changeStudentAcademicProgramme($user_id)
    {
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Edit Student Admission']];
        try {
            $user_id = SRS::decode($user_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $data['student'] = Student::academicYear()
            ->where('user_id', '=', $user_id)
            ->first();
        $pgs = Program::academicYear()->get();
        $programs = [];
        foreach ($pgs as $program) {
            $programs[$program->id] = $program->program_name . '(' . $program->program_category . ')';
        }
        $data['programs'] = $programs;

        return view('dashboard.admissions.change_program', $data);
    }

    public function show($id)
    {
        if (!Gate::allows('students-view')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $std = Student::find($id);
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Profile ']];
        $data['std'] = $std;

        return view('dashboard.admissions.show', $data);
    }

    public function delete($id)
    {
        if (!Gate::allows('students-delete')) {
            return abort(401);
        }

        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }

        Student::find($id)->delete();

        $std_id = Student::withTrashed()
            ->where('id', $id)
            ->get();
        StudentClass::where('reg_no', $std_id->first()->reg_no)->delete();
        User::where('id', $std_id->first()->user_id)->delete();

        return redirect()
            ->back()
            ->with('message', 'Student deleted successfully');
    }

    public function studentlogs()
    {
        if (!Gate::allows('students-logs-manage')) {
            return abort(401);
        }
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Profile ']];

        $data['student'] = Student::onlyTrashed()->get();

        return view('dashboard.admissions.restorestudent', $data);
    }
    public function restorelogs($id)
    {
        if (!Gate::allows('students-logs-manage')) {
            return abort(401);
        }

        Student::withTrashed()
            ->where('id', $id)
            ->restore();
        $std_id = Student::withTrashed()
            ->where('id', $id)
            ->get();
        //dd($std_id);
        StudentClass::withTrashed()
            ->where('reg_no', $std_id->first()->reg_no)
            ->restore();
        User::withTrashed()
            ->where('id', $std_id->first()->user_id)
            ->restore();

        return redirect()
            ->back()
            ->with('message', 'Student Restore successfully');
    }

    public function restorecheck(Request $request)
    {
        // dd($request->id);
        foreach ($request->id as $id) {
            Student::withTrashed()
                ->where('id', $id)
                ->restore();
            $std_id = Student::withTrashed()
                ->where('id', $id)
                ->get();
            StudentClass::withTrashed()
                ->where('reg_no', $std_id->first()->reg_no)
                ->restore();
            User::withTrashed()
                ->where('id', $std_id->first()->user_id)
                ->restore();
        }

        return redirect()
            ->back()
            ->with('message', 'Student Restore successfully');
    }

    public function loadAvatarUpdateModal($id)
    {
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $user = User::find($id);
        $data['user'] = $user;

        return View::make('dashboard.admissions.modals.photo.modal_body_edit', $data)->render();
    }
    public function loadStudyProgramInfoModal($id)
    {
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $entries = [];
        $ac_years = [];
        $programs = [];
        $campus = [];
        $intake = [];

        $entry_all = MannerOfEntry::all();

        foreach ($entry_all as $e) {
            $entries[$e->id] = $e->manner_of_entry;
        }

        $ac_years_all = AcademicYear::all();
        foreach ($ac_years_all as $ac) {
            $ac_years[$ac->id] = $ac->year;
        }

        $programs_all = Program::all();
        foreach ($programs_all as $p) {
            $programs[$p->id] = '[' . $p->program_code . '] ' . $p->program_name;
        }
        $intake = IntakeCategory::all();
        foreach ($intake as $in) {
            $intake[$in->id] = $in->name;
        }
        $campus = Campus::all();

        $std = Student::find($id);
        $data['std'] = $std;
        $data['programs'] = $programs;
        $data['entries'] = $entries;
        $data['ac_years'] = $ac_years;
        $data['campus'] = $campus;
        $data['intake'] = $campus;

        return View::make('dashboard.admissions.modals.study-program-info.modal_body_edit', $data)->render();
    }

    public function loadEduHistoryModal($id)
    {
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $entries = MannerOfEntry::all();
        $ac_years = AcademicYear::all();
        $programs = Program::all();

        $std = Student::find($id);
        $data['std'] = $std;
        $data['programs'] = $programs;
        $data['entries'] = $entries;
        $data['ac_years'] = $ac_years;

        $data['edu_levels'] = [
            'Ordinary Level' => 'Ordinary Level',
            'Advanced Level' => 'Advanced Level',
        ];

        $data['grades'] = [
            'DIV. I' => 'DIV. I',
            'DIV. II' => 'DIV. II',
            'DIV. III' => 'DIV. III',
            'DIV. IV' => 'DIV. IV',
            'DIV. 0' => 'DIV. 0',
        ];

        return View::make('dashboard.admissions.modals.edu-history.modal_body_create', $data)->render();
    }

    public function UpdateEduHistory($id)
    {
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Edit Student Admission']];
        $id = SRS::decode($id)[0];
        $data['student'] = Student::find($id);

        return View::make('students.modals.edu-history.modal_body_edit', $data)->render();
    }

    public function UpdateSponsor($id)
    {
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Edit Student Admission']];
        $id = SRS::decode($id)[0];
        $data['std'] = StudentSponsor::where('sponsor_id', $id)->get();
        $data['sponsor'] = Sponsor::all();
        //dd($data['std']);
        return View::make('students.modals.sponsor.modal_body_edit', $data)->render();
    }

    public function UpdateSponsorInfo(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $validator = Validator::make($input, [
            'name' => 'required',
            'sponsor_id' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        try {
            StudentSponsor::where('reg_no', Auth::user()->username)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'sponsor_id' => $request->sponsor_id,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
        return back()->with('message', 'Updated successfully');
    }

    public function UpdateBankInfo($id)
    {
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Edit Student Admission']];
        $id = SRS::decode($id)[0];
        $data['sb'] = StudentBank::where('id', $id)->get();
        $data['studentbank'] = StudentBank::all();
        // dd($data['sb']);
        return View::make('students.modals.bank.modal_body_edit', $data)->render();
    }
    public function UpdateStudentBankInfo(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $validator = Validator::make($input, [
            'bank_name' => 'required',
            'account_number' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        try {
            StudentBank::where('reg_no', Auth::user()->username)->update([
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
                'status' => $request->status,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
        return back()->with('message', 'Updated successfully');
    }

    public function UpdateDependant($id)
    {
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Edit Student Admission']];
        $id = SRS::decode($id)[0];
        // $data['std'] = Student::where('reg_no',Auth::user()->username)->get();
        $data['std'] = Dependant::where('id', $id)->get();
        $data['dependant'] = Dependant::find($id);

        return View::make('students.modals.dependant.modal_body_edit', $data)->render();
    }
    public function UpdateDependantInfo(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $validator = Validator::make($input, [
            'name' => 'required',
            'gender' => 'required',
            'relationship' => 'required',
            'address' => 'required',
            'phone1' => 'required',
            'job' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        try {
            Dependant::where('reg_no', Auth::user()->username)->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'relationship' => $request->relationship,
                'address' => $request->address,
                'phone1' => $request->phone1,
                'job' => $request->job,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
        return back()->with('message', 'Updated successfully');
    }

    public function UpdateNextOfKin($id)
    {
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Edit Student Admission']];
        $id = SRS::decode($id)[0];
        $data['nextofkin'] = NextOfKin::find($id);
        // dd($date['nextofkin']);
        return View::make('students.modals.next-of-kin.modal_body_edit', $data)->render();
    }

    public function UpdateNextOfKinInfo(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'gender' => 'required',
            'relationship' => 'required',
            'address' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        try {
            NextOfKin::where('reg_no', Auth::user()->username)->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'relationship' => $request->relationship,
                'address' => $request->address,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
        return back()->with('message', 'Updated successfully');
    }

    public function loadBankInfoModal($id)
    {
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $entries = MannerOfEntry::all();
        $ac_years = AcademicYear::all();
        $programs = Program::all();

        $std = Student::find($id);
        $data['std'] = $std;
        $data['programs'] = $programs;
        $data['entries'] = $entries;
        $data['ac_years'] = $ac_years;

        return View::make('dashboard.admissions.modals.bank.modal_body_create', $data)->render();
    }
    public function loadDependantModal($id)
    {
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }

        $entries = MannerOfEntry::all();
        $ac_years = AcademicYear::all();
        $programs = Program::all();

        $std = Student::find($id);
        $data['gender'] = [
            'Male' => 'Male',
            'Female' => 'Female',
        ];
        $data['relationships'] = [
            'Father' => 'Father',
            'Mother' => 'Mother',
            'Husband' => 'Husband',
            'Wife' => 'Wife',
            'Son' => 'Son',
            'Daughter' => 'Daughter',
            'Uncle' => 'Uncle',
            'Ant' => 'Ant',
        ];
        $data['std'] = $std;
        $data['programs'] = $programs;
        $data['entries'] = $entries;
        $data['ac_years'] = $ac_years;

        return View::make('dashboard.admissions.modals.dependant.modal_body_create', $data)->render();
    }

    public function loadNextOfKinModal($id)
    {
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $entries = MannerOfEntry::all();
        $ac_years = AcademicYear::all();
        $programs = Program::all();

        $std = Student::find($id);
        $data['gender'] = [
            'Male' => 'Male',
            'Female' => 'Female',
        ];
        $data['relationships'] = [
            'Father' => 'Father',
            'Mother' => 'Mother',
            'Husband' => 'Husband',
            'Wife' => 'Wife',
            'Son' => 'Son',
            'Daughter' => 'Daughter',
            'Uncle' => 'Uncle',
            'Ant' => 'Ant',
        ];
        $data['std'] = $std;
        $data['programs'] = $programs;
        $data['entries'] = $entries;
        $data['ac_years'] = $ac_years;

        return View::make('dashboard.admissions.modals.next-of-kin.modal_body_create', $data)->render();
    }
    public function loadContactInfoModal($id)
    {
        /*
        if (! Gate::allows('students-edit')) {
            return abort(401);
        }
        */
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $entries = MannerOfEntry::all();
        $ac_years = AcademicYear::all();
        $programs = Program::all();

        $std = Student::find($id);
        $data['std'] = $std;
        $data['programs'] = $programs;
        $data['entries'] = $entries;
        $data['ac_years'] = $ac_years;

        return View::make('dashboard.admissions.modals.contact.modal_body_edit', $data)->render();
    }

    public function loadmodalstudentsponsor($id)
    {
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $entries = MannerOfEntry::all();
        $ac_years = AcademicYear::all();
        $programs = Program::all();
        $sponsor = Sponsor::all();

        $std = Student::find($id);
        $data['std'] = $std;
        $data['programs'] = $programs;
        $data['entries'] = $entries;
        $data['ac_years'] = $ac_years;
        $data['sponsor'] = $sponsor;

        return View::make('dashboard.admissions.modals.sponsor.modal_body_add', $data)->render();
    }
    public function upatestudentsponsor(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'sponsor_id' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        try {
            StudentSponsor::create($input);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong' . $e);
        }
        return back()->with('message', 'Created successfully');
    }
    public function updateAvatar(Request $request, $id)
    {
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!. Please try again.');
        }
        //   return  response()->json($request->all());
        $validator = Validator::make($request->all(), [
            'avatar' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        $user = User::find($id);
        //dd($user->avatar);
        $input = $request->all();
        //$input['avatar'] = $request->input('avatar');
        $avatar = $request->file('avatar');
        $current_avatar = $user->avatar;

        $avatar_name = time() . '_' . 'QK_' . $user->id . '.' . $avatar->getClientOriginalExtension();
        $input['avatar'] = asset('assets/uploads/avatars/' . $avatar_name);
        $destinationPath = public_path('assets/uploads/avatars');
        $img = Image::make($avatar->getRealPath());

        $img->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $avatar_name);
        $file = $current_avatar;
        //dd($file);

        if (file_exists($file)) {
            //dd($file);
            File::delete($file);
        }

        $user->update($input);

        return back()->with('message', 'Photo Updated Successfully');
    }

    public function updateStudyProgramme(Request $request, $id)
    {
        // dd($request->all(),$id);
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        try {
            $std_id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        // $input = $request->all();

        $admissionYear = AcademicYear::where('id', $request->admission_year)
            ->pluck('year')
            ->first();

        $newStudyProgrammeData = [
            'manner_of_entry_id' => $request->manner_of_entry_id,
            'admission_year' => $admissionYear,
            'campus_id' => $request->campus_id,
            'program_id' => $request->program_id,
            'intake_category_id' => $request->intake_category_id,
            'graduation_year' => $request->graduation_year,
        ];

        $input2 = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
        ];

        try {
            $std = Student::find($std_id);

            $std->update($newStudyProgrammeData);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong' . $e);
        }
        return back()->with('message', 'Updated successfully');
    }
    public function storeEduHistory(Request $request)
    {
        /*
        if (! Gate::allows('students-create')) {
            return abort(401);
        }
           */
        $input = $request->all();
        $validator = Validator::make($input, [
            'reg_no' => 'required',
            'level' => 'required',
            'institution_name' => 'required',
            'index_no' => 'required',
            'start_year' => 'required',
            'end_year' => 'required',
            'grade' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        try {
            EducationHistory::create($input);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong' . $e);
        }
        return back()->with('message', 'Created successfully');
    }
    public function storeBankInfo(Request $request)
    {
        /*
        if (! Gate::allows('students-create')) {
            return abort(401);
        }
        */
        $input = $request->all();

        $validator = Validator::make($input, [
            'bank_name' => 'required',
            'account_number' => 'required',
            'reg_no' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        try {
            StudentBank::create($input);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong' . $e);
        }
        return back()->with('message', 'Created successfully');
    }

    public function storeDependant(Request $request)
    {
        /*
        if (! Gate::allows('students-create')) {
            return abort(401);
        }
              */
        $input = $request->all();
        //dd($input);
        $validator = Validator::make($input, [
            'reg_no' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'relationship' => 'required',
            'phone1' => 'required',
            'email1' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        try {
            Dependant::create($input);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
        return back()->with('message', 'Updated successfully');
    }

    public function updateStudentProgramme(Request $request, $user_id)
    {
        /*
        if (! Gate::allows('admissions-edit')) {
            return abort(401);
        }
        */
    }
    public function storeNextOfKin(Request $request)
    {
        /*
        if (! Gate::allows('admissions-create')) {
            return abort(401);
        } */
        $input = $request->all();
        //   dd($input);
        $validator = Validator::make($input, [
            'reg_no' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'relationship' => 'required',
            'phone1' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        try {
            NextOfKin::create($input);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
        return back()->with('message', 'Updated successfully');
    }
    public function updateContact(Request $request, $id)
    {
        /*
        if (! Gate::allows('admissions-edit')) {
            return abort(401);
        }
        */
        try {
            $std_id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $input = $request->all();
        //dd($input);
        $validator = Validator::make($input, [
            'phone1' => 'required',
            'email1' => 'required',
            'region' => 'required',
            'district' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        try {
            $std = Student::find($std_id);
            StudentContact::updateOrCreate(['reg_no' => $std->reg_no], $input);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
        return back()->with('message', 'Updated successfully');
    }

    public function studentRegistrationSummaryHistory()
    {
    }

    public function loadmodalstudentinformation($id)
    {
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $entries = [];
        $ac_years = [];
        $programs = [];

        $entry_all = MannerOfEntry::all();

        foreach ($entry_all as $e) {
            $entries[$e->id] = $e->manner_of_entry;
        }

        $ac_years_all = AcademicYear::all();
        foreach ($ac_years_all as $ac) {
            $ac_years[$ac->id] = $ac->year;
        }

        $programs_all = Program::all();
        foreach ($programs_all as $p) {
            $programs[$p->id] = '[' . $p->program_code . '] ' . $p->program_name;
        }

        $std = Student::find($id);
        $data['std'] = $std;
        $data['programs'] = $programs;
        $data['entries'] = $entries;
        $data['ac_years'] = $ac_years;

        return View::make('dashboard.admissions.modals.student-info.modal_body_edit', $data)->render();
    }

    public function upatestudentinfo(Request $request, $id)
    {
        if (!Gate::allows('students-edit')) {
            return abort(401);
        }
        try {
            $std_id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $input = [
            'dob' => $request->dob,
        ];
        $input2 = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            // 'gender' => $request->gender,
        ];

        try {
            $std = Student::find($std_id);
            $user = User::where('id', $std->user_id)->update($input2);
            $std->update($input);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong' . $e);
        }
        return back()->with('message', 'Updated successfully');
    }

    //for trial only
    public function fortrial()
    {
        if (!Gate::allows('admissions-view')) {
            return abort(401);
        }
        $data['bc'] = [['link' => '#', 'page' => 'Dashboard']];
        return view('dashboard.fortrial', $data);
    }
}
