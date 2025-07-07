<?php

namespace App\Http\Controllers\Dashboard\Examination;

use App\Helpers\SRS as HelpersSRS;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Imports\ExamCategoryImport;

use App\Imports\StudentImport;
use App\Models\Batch;
use App\Models\Course;
use App\Models\AcademicYear;
use App\Models\CourseStaff;
use App\Models\Program;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use SRS;

class ExcelController extends Controller
{
    public function __construct() {}

    public function import_student_store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'campus_id' => 'required',
            'intake_category_id' => 'required',

        ]);

        if ($validator->fails()) {
            // return back()->withInput()->with('error', $validator->errors());
            return back()
                ->withInput()
                ->with('error', 'Please Fill All Required Fields');
        }

        $ayear_id = AcademicYear::where('status', '=', '1')->first()->id ?? -1;

        if ($request->hasFile('enrollment-file')) {
            $file = $request->file('enrollment-file');
            $path = $file->getRealPath();
            $filename = uniqid(Carbon::now()->format('Y-m-d') . 'cid_' . $input['campus_id'] . '_enrollment_' . md5(microtime()));
            $filename2 = $filename . 'xlsx';
            $campus_id = $request->input('campus_id');
            $collection = Excel::toCollection(new StudentImport($request), $path, null, \Maatwebsite\Excel\Excel::XLSX);
            $import = new StudentImport($request);

            $import->import($path, null, \Maatwebsite\Excel\Excel::XLSX);
            if ($collection->count() > 0) {
                DB::beginTransaction();
                try {
                    foreach ($collection->toArray() as $key => $value) {
                        foreach ($value as $row) {

                            $regno = $row['registrationnumber'];

                            if (!empty($regno)) {
                                $sex = $row['sex'];
                                $firstname = $row['firstname'];
                                $middlename = $row['middlename'];
                                $surname = $row['lastname'];
                                $program = $row['programmecode'];
                                $intake = $input['intake_category_id'];
                                $form4indexno = $row['form4indexnumber'];

                                if (empty($regno)) {
                                    return back()->with('error', 'Registration required');
                                }

                                if (empty($firstname)) {
                                    return back()->with('error', 'First Name required');
                                }
                                if (empty($surname)) {
                                    return back()->with('error', 'Surname/Last required');
                                }

                                if (empty($sex)) {
                                    return back()->with('error', 'Gender/Sex required');
                                }

                                if (empty($program)) {
                                    return back()->with('error', 'Selected Programme required');
                                }
                                if (empty($form4indexno)) {
                                    return back()->with('error', 'Form 4 Index Number required');
                                }

                                if (empty($regno)) {
                                    return back()->with('error', 'Reg No required');
                                }
                                if (empty($intake)) {
                                    return back()->with('error', 'Intake Category Required');
                                }

                                $check_regno = Student::where('reg_no', $regno)->first();
                                if (!is_null($check_regno)) {
                                    return back()->with('error', 'Registration Number ' . $regno . ' Exists !!');
                                }

                                $check_form4 = Student::where('form4_index_no', $form4indexno)->first();
                                if (!is_null($check_form4)) {
                                    return back()->with('error', 'Form Four Index Number ' . $form4indexno . ' for ' . $regno . ' Exists !!');
                                }

                                // $check_mobileno = Student::where('mobile_no', $row['mobile_no'])->first();
                                // if(!is_null($check_mobileno)){
                                //     return back()->with('error', 'Mobile Number '.$row['mobile_no'].' for '.$regno.' Exists !!');   
                                // }

                                $program = Program::where('program_code', $program)->first();

                                $student = Student::academicYear()->where('reg_no', $regno)->first();

                                if (!is_null($program)) {

                                    $program_id = $program->id;
                                    $program_code = $program->program_code;
                                } else {
                                    return back()->with('error', 'Opps!! Program Code(' . $program . ') for Student(' . $row['firstname'] . ' ' . $row['lastname'] . ' (' . $regno . ')) is not Available');
                                }


                                if (is_null($student)) {

                                    $user_data = [
                                        'first_name' => $firstname,
                                        'middle_name' => $middlename,
                                        'last_name' => $surname,
                                        'gender' => $row['sex'],
                                        'username' => $regno,
                                        'password' => bcrypt('12345678'),
                                        'type' => '0',
                                    ];
                                    $user = new User($user_data);
                                    $user->save();

                                    $user_id = $user->id;
                                    // Log::info($user);

                                    $data = User::find($user_id)->assign('Student');
                                    // $spg_data = [
                                    //     "firstName" => $data->first_name,
                                    //     "lastName" => $data->last_name,
                                    //     "amount"=> 10000,
                                    //     "amountType"=> "FLEXIBLE",
                                    //     "currency" => "TZS",
                                    //     "paymentType"=> "90",
                                    //     "payerMobile"=> "0787000000",
                                    //     "paymentDesc"=> "Tuition Fee",
                                    //     "payerID"=> $data->username,
                                    //     "email" => "dosebaga@gmail.com",
                                    //     "institutionID"=> 8008
                                    // ];

                                    // $response = Http::post('http://127.0.0.1:8000/index.php/api/v1/generatectlno',$spg_data);

                                    // // dd($response->object());
                                    // $std_data = [
                                    //             "std_reg_number" => $response->object()->std_reg_number,
                                    //             "reference_number" => $response->object()->reference_number,
                                    //             "payer_email" => $response->object()->payer_email,
                                    //             "payer_mobile" => $response->object()->payer_mobile,
                                    //             "status" => $response->object()->status

                                    // ];

                                    // MailController::sendcontrolno($std_data);

                                    $student_data = [
                                        'reg_no' => $regno,
                                        'user_id' => $user_id,
                                        'year_id' => Auth::user()->staff->year_id,
                                        'form4_index_no' => $form4indexno,
                                        'program_id' => $program_id,
                                        'program_code' => $program_code,
                                        'admission_year' => date('Y'),
                                        'year_of_study' => 1,
                                        'status' => 'Admitted',
                                        'reg_status' => 1,
                                        'citizenship' => $row['nationality'],
                                        'admitted_by' => Auth::id(),
                                        'intake_category_id' => $request->input('intake_category_id'),
                                        'campus_id' => $request->campus_id,
                                        'admission_date' => date('d-m-Y'),

                                    ];

                                    $student_class_data = [
                                        'reg_no' => $regno,
                                        'user_id' => $user_id,
                                        'program_id' => $program_id,
                                        'program_code' => $program_code,
                                        'year_id' => Auth::user()->staff->year_id,
                                        'intake_category_id' => $request->input('intake_category_id'),
                                        'session' => 1,
                                        'year_of_study' => 1,
                                    ];

                                    $getstudent = Student::where('reg_no', $regno)
                                        ->where('year_id', Auth::user()->staff->year_id)
                                        ->get();
                                    $getstudent_class = StudentClass::where('reg_no', $regno)
                                        ->where('year_id', Auth::user()->staff->year_id)
                                        ->get();

                                    if (count($getstudent) > 0) {
                                        Student::where('reg_no', $regno)
                                            ->where('year_id', Auth::user()->staff->year_id)
                                            ->update($student_data);
                                    } else {
                                        Student::create($student_data);
                                    }
                                    if (count($getstudent_class) > 0) {
                                        StudentClass::where('reg_no', $regno)
                                            ->where('year_id', Auth::user()->staff->year_id)
                                            ->update($student_class_data);
                                    } else {
                                        StudentClass::create($student_class_data);
                                    }
                                } else {
                                    return back()
                                        ->withInput()
                                        ->with('error', 'Registration Number "' . $regno . '" Exists !!');
                                }
                            }
                        } //end if value
                    }
                    DB::commit();
                    return back()->with('message', 'Data Uploaded Successfully !!');
                } catch (\Exception $e) {
                    DB::rollBack();
                    return back()
                        ->withInput()
                        ->with('error', 'Something Went Wrong1(' . $e->getMessage() . ')');
                }
            }
        }
    }



    public function import_se(Request $request)
    {
        $input = $request->all();
        try {
            $input['course_id'] = HelpersSRS::decode($input['course_id'])[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $validator = Validator::make($input, [
            'se-excel' => 'required',
            'course_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }
        if ($request->hasFile('se-excel')) {
            $file = $request->file('se-excel');
            $path = $file->getRealPath();

            $filename = uniqid('upload_ue_' . md5(microtime()));
            $filename2 = $filename . 'xls';
            $course_id = $input['course_id'];
            try {
                $import = new ExamCategoryImport($course_id);
                $import->import($file, storage_path($filename2), \Maatwebsite\Excel\Excel::XLSX);
                return back()->with('message', 'Successfully Inserted');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
            // return back()->with('message',$import);
        }
    }

    public function import_ca(Request $request)
    {
        $input = $request->all();
        try {
            $input['course_id'] = SRS::decode($input['course_id'])[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $validator = Validator::make($input, [
            'ca-excel' => 'required',
            'course_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }
        if ($request->hasFile('ca-excel')) {
            $file = $request->file('ca-excel');
            $path = $file->getRealPath();
            $filename = uniqid('upload_ca_' . md5(microtime()));
            $filename2 = $filename . 'xls';
            $course_id = $input['course_id'];
            try {
                $course = Course::academicYear()->find($course_id);
                $collection = Excel::toCollection(new CourseWorkImport($course_id, $course), $path, null, \Maatwebsite\Excel\Excel::XLSX);
                $import = new CourseWorkImport($course_id, $course);
                $import->import($path, null, \Maatwebsite\Excel\Excel::XLSX);
                return back()->with('message', 'Successfully Inserted');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function export_ca($course_id, $batch_id)
    {
        try {
            $course_id = SRS::decode($course_id)[0];
            $batch_id = SRS::decode($batch_id);
        } catch (\Exception $e) {
            abort(404);
        }
        $staff_id = Auth::user()->staff->id;
        $year_id = Auth::user()->staff->year_id;
        $course = Course::academicYear()->find($course_id);
        return Excel::download(new CourseWorkExport($course, $staff_id, $course_id, $year_id, $batch_id), 'COURSE_WORK_' . str_replace('/', '', $course->course_name) . '(' . $course->course_code . ').xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function export_se($course_id, $batch_id)
    {
        try {
            $course_id = SRS::decode($course_id)[0];
            $batch_id = SRS::decode($batch_id);
        } catch (\Exception $e) {
            abort(404);
        }
        $staff_id = '';

        if (Auth::user()->roles->first()->name == 'DAEO' || Auth::user()->roles->first()->name == 'HOD' || Auth::user()->roles->first()->name == 'SuperAdmin') {
            $staff_id = $this->getCourseInstructor($course_id);
        } else {
            $staff_id = Auth::user()->staff->id;
        }
        $year_id = Auth::user()->staff->year_id;
        $course = Course::academicYear()->find($course_id);
        return Excel::download(new SemesterExamExport($course, $staff_id, $course_id, $year_id, $batch_id), 'SEMESTER_EXAM_' . str_replace('/', '-', $course->course_name) . '(' . $course->course_code . ').xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
}
