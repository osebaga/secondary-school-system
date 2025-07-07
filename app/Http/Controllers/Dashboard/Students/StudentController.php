<?php

namespace App\Http\Controllers\Dashboard\Students;

use App\Exports\SemesterResults;
use App\Exports\AnnualReport;
use Intervention\Image\ImageManagerStatic as Image;
use App\Helpers\SRS;
use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Campus;
use App\Models\Course;
use App\Models\CourseProgram;
use App\Models\CourseResult;
use App\Models\CourseResultSummary;
use App\Models\CourseStaff;
use App\Models\CourseStudent;
use App\Models\Combination;
use App\Models\Dependant;
use App\Models\StudentClass;
use App\Models\EducationHistory;
use App\Models\ExamCategoryResult;
use App\Models\Institution;
use App\Models\IntakeCategory;
use App\Models\LoginHistory;
use App\Models\MannerOfEntry;
use App\Models\NextOfKin;
use App\Models\Program;
use App\Models\PublishExam;
use App\Models\Semester;
use App\Models\SemesterResult;
use App\Models\Staff;
use App\Models\Student;
use App\Models\StudentBank;
use App\Models\StudentContact;
use App\Models\UnpaidStudent;
use App\Models\ExamRemark;
use App\Models\StudentRemark;
use App\Models\AnnualResult;
use App\Models\User;
use App\Repositories\Common\Repository;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Combinations;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class StudentController extends Controller
{
    protected $user_model, $student_model, $student_class_model;

    function __construct()
    {
        $this->user_model = new Repository(new User());
        $this->student_model = new Repository(new Student());
        $this->student_class_model = new Repository(new StudentClass());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //        if (! Gate::allows('students-view')) {
        //            return abort(401);
        //        }
        $data['bc'] = [['link' => route('students.index'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Department Courses']];
        //$payment=SRS::studentPaymentOutstanding()
        // dd(Auth::user()->student->reg_no);
        // $payments=SRS::studentPaymentOutstanding(Auth::user()->student->reg_no);
        $bill_data = SRS::studentControlNumber(Auth::user()->reg_no);
        //        dd($bill_data);
        if ($bill_data) {
            $data['bills'] = json_decode(json_encode($bill_data));
        } else {
            $data['bills'] = null;
        }

        //   dd($bill->data);
        //dd($bill['data']);
        //           foreach ($bill->data as $b){
        //               dump($b->payer_name);
        //           }
        //           dd('v');
        $agent = $request->header('User-Agent');
        $ip = $request->getClientIp(true);
        // dd($dt);
        LoginHistory::UpdateOrCreate([
            'device' => $agent,
            'ipaddress' => $ip,
            'user_id' => Auth::id(),
            'username' => Auth::user()->username,
            'last_login' => Carbon::now(),
        ]);

        return view('students.index', $data);
    }

    public function profile()
    {
        if (!Gate::allows('students-profile_manage')) {
            return abort(401);
        }
        $data['bc'] = [['link' => route('students.index'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Profile']];
        $id = Auth::id();
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
        //  dd($countries);
        $user = User::find($id)
            ->whereHas('student', function ($q) {
                $q->academicYear();
            })
            ->with([
                'student' => function ($q) {
                    $q->academicYear();
                },
            ])
            ->first();

        $user = Student::where('user_id', '=', $id)
            ->academicYear()
            ->with('user')
            ->with('program.faculty')
            ->with('campus.institution')
            ->first();
        //dd($user);
        $data['student'] = $user;

        $data['countries'] = $countries;

        return view('students.profile', $data);
    }
    public function studentProfile()
    {
        //        if (! Gate::allows('students-profile_manage')) {
        //            return abort(401);
        //        }
        $data['bc'] = [['link' => route('students.index'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Profile']];
        $id = Auth::id();
        $user = Student::where('user_id', '=', $id)
            ->academicYear()
            ->with('user')
            ->with('program')

            ->with('campus.institution')
            ->first();
        // dd($user);
        // $data['countries'] = $countries;

        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Profile']];
        $data['std'] = $user;

        return view('students.student_profile', $data);
    }
    public function updateProfile(Request $request, $id)
    {
        //        if (! Gate::allows('students-profile_manage')) {
        //            return abort(401);
        //        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!. Please try again.');
        }
        //dd($request->all(),$id);
        // $request->except('_method');
        $input = $request->all();
        $validator = Validator::make($input, [
            // 'username' => 'required|unique:users,username,' . $id,
            'gender' => 'required',
            //'form4_index_no' => 'required',
            //'form6_index_no' => 'required',
            'dob' => 'required',
            'dob_place' => 'required',
            'citizenship' => 'required',
        ]);
        if ($request->filled('email')) {
            $validator = Validator::make($input, [
                'email' => 'required|email|unique:users,email,' . $id,
            ]);
        }

        if ($validator->fails()) {
            return back()
                ->withInput(['tab' => 'edit'])
                ->with('errors', $validator->errors());
        }

        if ($validator->fails()) {
            return back()
                ->withInput(['tab' => 'edit'])
                ->with('errors', $validator->errors());
        }
        $user_data = [
            'gender' => $input['gender'],
            // 'first_name' => $input['first_name'],
            // 'last_name' => $input['last_name'],
            //'middle_name' => $input['middle_name'],
            'email' => $input['email_address'],
        ];
        $student_data = [
            //'form4_index_no' => $input['form4_index_no'],
            // 'form6_index_no' => $input['form6_index_no'],
            'dob' => $input['dob'],
            'dob_place' => $input['dob_place'],
            'mobile_no' => $input['mobile_no'],

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
            $this->user_model->update($user_data, $id);
            $this->student_model
                ->getModel()
                ->where('user_id', '=', $id)
                ->update($student_data);
            //$user=$this->user_model->with('student')->find($id);

            //$user->fill($user_data)->student->fill($student_data)->push();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput(['tab' => 'edit'])
                ->with('error', 'Update Failed ' . $e->getMessage());
        }

        // Session::flash('message', '');
        return redirect()
            ->back()
            ->withInput(['tab' => 'edit'])
            ->with('message', 'User updated successfully');
    }

    public function studentChangePassword()
    {
        return View::make('students.modals.change-password.modal_body_change_password')->render();
    }

    public function studentNewPassword(Request $request)
    {
        try {
            $id = Auth::id();
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!. Please try again.');
        }
        $input = $request->all();
        $user = $this->user_model->find($id);

        $validator = Validator::make($input, [
            'new-password' => 'required',
            'current-password' => 'required',
            'confirm-password' => 'required|string|min:6|same:new-password',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with('errors', $validator->errors());
        }

        if (Hash::check($request->get('current-password'), $user->password)) {
            # Change Password
            $user->password = Hash::make($request->get('new-password'));
            $user->save();
            return redirect()
                ->back()
                ->with('message', 'Password changed Successfully!!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Incorrect current password');
        }
    }

    // public function contactInfo()
    // {
    //     $id = Auth::id();
    //     $std=Student::find($id);
    //     $data['std']=$std;
    //     return view::make('students.modals.contact.modal_body_edit',$data)->render();
    // }

    // public function updateContactInfo()
    // {

    // }

    public function changePassword(Request $request, $id)
    {
        //        if (! Gate::allows('students-password-manage')) {
        //            return abort(401);
        //        }
        try {
            $id = SRS::decode($id)[0];
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!. Please try again.');
        }
        $input = $request->all();
        $user = $this->user_model->find($id);

        if (!Hash::check($request->get('current-password'), $user->password)) {
            //Session::flash('error', '.');
            // The passwords matches
            return redirect()
                ->back()
                ->withInput(['tab' => 'cpassword'])
                ->with('error', 'Your current password does not matches with the password you provided. Please try again');
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Session::flash('error', '.');
            //Current password and new password are same
            return redirect()
                ->back()
                ->withInput(['tab' => 'cpassword'])
                ->with('error', 'New Password cannot be same as your current password. Please choose a different password');
        }

        $validator = Validator::make($input, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|same:new-password-confirm',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput(['tab' => 'cpassword'])
                ->with('errors', $validator->errors());
        }

        //Change Password

        $user->password = Hash::make($request->get('new-password'));
        $user->save();
        //Session::flash('message', '');
        return redirect()
            ->back()
            ->withInput(['tab' => 'cpassword'])
            ->with('message', 'Successfully updated');
    }

    public function updateAvatar(Request $request, $id = null)
    {
        //        if (! Gate::allows('students-manage')) {
        //            return abort(401);
        //        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!. Please try again.');
        }
        $validator = Validator::make($request->all(), [
            'avatar' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('error', 'The Avatar Field Required');
            return back()->withInput(['tab' => 'avatar']);
        }
        if ($id == null) {
            $id = Auth::user()->id;
        }

        $input = $request->all();
        //$input['avatar'] = $request->input('avatar');
        $avatar = $request->file('avatar');

        $image = $this->user_model
            ->findWhere('id', $id)
            ->pluck('avatar')
            ->first();

        $current_avatar = $image;
        //dd($current_avatar);
        $input['avatar'] = time() . '_' . 'srs.' . $avatar->getClientOriginalExtension();

        $destinationPath = public_path('/assets/uploads/avatars');
        $img = Image::make($avatar->getRealPath());

        $img->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['avatar']);
        $file = public_path('assets/uploads/avatars') . '/' . $current_avatar;

        if (file_exists($file)) {
            File::delete($file);
        }

        $this->user_model->update($input, $id);
        Session::flash('message', 'Succesifuly updated');
        return back()->withInput(['tab' => 'avatar']);
    }

    public function registeredCourses($semester, $program_id, $user_id, $reg_no, $year_of_study)
    {
        // if (! Gate::allows('students-view')) {
        //     return abort(401);
        // }

        $registered_courses = CourseStudent::join('course_program', 'course_program.course_id', '=', 'course_student.course_id')
            ->where('course_student.semester', $semester)
            ->where('course_student.reg_no', $reg_no)
            //->where('course_student.year_id',\App\Models\AcademicYear::where('status','1')->first()->id ?? -1)
            ->where('course_program.program_id', $program_id)
            ->where('course_program.year', $year_of_study)
            ->get();
        return $registered_courses;
    }

    public function academicYearCourses($semester, $program_id, $user_id, $year_of_study, $class_year)
    {
        //        if (! Gate::allows('students-view')) {
        //            return abort(401);
        //        }

        $semester_courses = $this->student_model
            ->findWhere('students.user_id', $user_id)
            ->join('student_classes', 'students.reg_no', '=', 'student_classes.reg_no')
            ->where('student_classes.class_year', '=', $class_year)
            ->whereHas('program', function ($q) {
                // $q->where('year_id', '=', Auth::user()->student->year_id);
            })
            ->with([
                'program' => function ($q) use ($program_id, $semester, $year_of_study) {
                    // $q->where('year_id', '=', Auth::user()->student->year_id);
                    $q->whereHas('courses', function ($q) {
                        // $q->where('courses.year_id', '=', Auth::user()->student->year_id);
                    })->with([
                        'courses' => function ($q) use ($program_id, $semester, $year_of_study) {
                            // $q->where('courses.year_id', '=', Auth::user()->student->year_id);
                            $q->wherePivot('program_id', '=', $program_id);
                            $q->wherePivot('semester', '=', $semester);
                            // $q->wherePivot('year_id', '=', Auth::user()->student->year_id);
                            $q->wherePivot('year', '=', $year_of_study);
                        },
                    ]);
                },
            ])
            ->first();
        //dd($semester_courses);
        return $semester_courses;
    }

    public function studentCoursesRegistration()
    {
        //        if (! Gate::allows('students-create')) {
        //            return abort(401);
        //        }
        $data['bc'] = [['link' => route('students.index'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Course Enrollment']];

        // $student = Student::academicYear()->where('user_id', '=', Auth::id())->with(['program' => function ($q) {
        //     $q->academicYear();

        //$q->wherePivot('year','=',Auth::user()->student->year);
        $years = AcademicYear::where('status', '1')->first();

        $student = Student::where('user_id', '=', Auth::id())
            // ->with('program')
            ->first();
        // dd(Auth::id());

        $ay = AcademicYear::where('status', '1')->first()?->id ?? -1;

        $getyos = StudentClass::where('reg_no', Auth::user()->username)
            ->where('year_id', $ay)
            ->first();
        if (is_null($getyos)) {
            return back()->with('error', 'Something went wrong!. No class records found for academic year.  ' . $years->year . ' please contact with examination officer');
        }
        $year_of_study = $getyos->year_of_study;
        $class_year = $getyos->class_year;
        //dd(Auth::id());
        // dd($student);

        $reg_no = $student->reg_no;
        $user_id = $student->user_id;
        $program_id = $student->program_id;

        $year_id = $student->year_id;
        $campus_id = $student->campus_id;
        $intake_id = $student->intake_category_id;
        //as you shift or update class make sure you update program_id,year_id in student table
        // dd($year_id,$campus_id,$intake_id,$program_id);

        $sem1_course_reg = SRS::checkCourseRegistrationStatus($campus_id, $intake_id, 1, 1);
        $sem2_course_reg = SRS::checkCourseRegistrationStatus($campus_id, $intake_id, 2, 1);

        //dd($sem1_course_reg,$sem2_course_reg);

        $program_weight = $student->program->program_weight;
        // dd($program_weight);

        $data['program_weight'] = $program_weight;
        $data['registered_courses_sem_one'] = $this->registeredCourses(1, $program_id, $user_id, $reg_no, $year_of_study); //$this->student_model->findWhere('user_id',$user_id)->with(['courses'])->get();
        $data['academic_courses_sem_one'] = $this->academicYearCourses(1, $program_id, $user_id, $year_of_study, $class_year);
        //dd($program_id,$user_id,$reg_no,$data['academic_courses_sem_one'],$data['registered_courses_sem_one']);
        $data['registered_courses_sem_two'] = $this->registeredCourses(2, $program_id, $user_id, $reg_no, $year_of_study); //$this->student_model->findWhere('user_id',$user_id)->with(['courses'])->get();
        $data['academic_courses_sem_two'] = $this->academicYearCourses(2, $program_id, $user_id, $year_of_study, $class_year);

        $data['sem1_course_reg'] = $sem1_course_reg;
        $data['sem2_course_reg'] = $sem2_course_reg;

        //dd($data['registered_courses_sem_one']);

        return view('students.index_course_registrations', $data);
    }
    public function studentMyCourse()
    {
        $data['bc'] = [['link' => route('students.index'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'My Course']];
        $id = Auth::user()->username;
        return $id;
    }
  
    public function courseResults($course_id)
    {
        //        if (! Gate::allows('students-view')) {
        //            return abort(401);
        //        }

        $courseId = SRS::decode($course_id)[0];
        $data['bc'] = [['link' => route('students.index'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student CourseWorks']];
        $id = Auth::id();
        $student_campus = $this->student_model->findWhere('user_id', $id)->get();
        $student = $this->student_model->findWhere('user_id', $id)->first();
        $data['student'] = $student;
        $data['student_campus'] = $student_campus;
        //      $data['check_status'] = $check_status;
        $data['courseresults'] = CourseResult::join('users', 'users.username', '=', 'course_results.reg_no')
            ->where('course_id', $courseId)
            ->get();
        $data['studentwithcourse'] = CourseStudent::join('users', 'users.username', '=', 'course_student.reg_no')
            ->where('course_student.course_id', $courseId)
            ->get();
        $data['studentwherenotoncourseresult'] = collect($data['studentwithcourse']->pluck('reg_no'));
        $data['abscstudent'] = $data['studentwherenotoncourseresult']->diff($data['courseresults']->pluck('reg_no'));
        $data['abscstudentcourse'] = User::whereIn('username', $data['abscstudent'])->get();
        $getstaff = Staff::where('user_id', $id)->get();
        $staffcourse = CourseStaff::where('staff_id', $getstaff->first()->id)->get();
        $getprogramid = DB::table('course_program')
            ->whereIn('course_id', $staffcourse->pluck('course_id'))
            ->get();
        $data['getprogram'] = DB::table('programs')
            ->whereIn('id', $getprogramid->pluck('program_id'))
            ->get();

        // dd($courseId);
        return view('dashboard.examination.courseresult', $data);

    }

    public function couresresultexamofficer(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'course' => 'required',
            'program' => 'required',
            'ayear' => 'required',
        ]);
        //dd($validator);
        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        $data['bc'] = [['link' => route('students.index'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student CourseWorks']];

        $course = $request->course;
        $program = $request->program;
        $ayear = $request->ayear;
        $data['ayear'] = AcademicYear::find($ayear)->year ?? '';
        if ($request->sub == 1) {
            $data['program'] = Program::all();
            $data['courseresults'] = CourseResult::join('users', 'users.username', '=', 'course_results.reg_no')
                ->where('course_results.course_id', $course)
                ->where('course_results.year_id', $ayear)
                ->get();
            $data['studentwithcourse'] = CourseStudent::join('users', 'users.username', '=', 'course_student.reg_no')
                ->where('course_id', $course)
                ->get();
            $data['studentwherenotoncourseresult'] = collect($data['studentwithcourse']->pluck('reg_no'));
            $data['abscstudent'] = $data['studentwherenotoncourseresult']->diff($data['courseresults']->pluck('reg_no'));
            $data['abscstudentcourse'] = User::whereIn('username', $data['abscstudent'])->get();
            // dd($data['abscstudentcourse']);
            return view('dashboard.examination.examofficercourseresult', $data);
        }
        if ($request->sub == 2) {
            $data['courses'] = DB::table('courses')
                ->where('id', $course)
                ->get();
            $data['programname'] = DB::table('programs')
                ->where('id', $program)
                ->get();
            $data['institute'] = DB::table('institutions')->get();
            $departmentid = DB::table('courses')
                ->where('id', $course)
                ->get();
            $data['department'] = DB::table('departments')
                ->where('id', $departmentid->first()->department_id)
                ->get();
            $students = DB::table('students')
                ->where('program_id', $program)
                ->get();
            $data['courseresultsummary'] = CourseResultSummary::where('course_id', $course)
                ->where('year_id', $ayear)
                ->get();
            $data['studentwithcourse'] = CourseStudent::join('users', 'users.username', '=', 'course_student.reg_no')
                ->where('course_id', $course)
                ->get();
            $data['courseresults'] = CourseResult::join('users', 'users.username', '=', 'course_results.reg_no')
                ->where('course_results.course_id', $course)
                ->where('course_results.year_id', $ayear)
                ->whereIn('course_results.reg_no', $data['studentwithcourse']->pluck('reg_no'))
                ->get();
            $data['studentwherenotoncourseresult'] = collect($data['studentwithcourse']->pluck('reg_no'));
            $data['abscstudent'] = $data['studentwherenotoncourseresult']->diff($data['courseresults']->pluck('reg_no'));
            $data['abscstudentcourse'] = User::whereIn('username', $data['abscstudent'])->get();
            $data['institute'] = DB::table('institutions')->get();
            if ($data['courseresults']->isEmpty()) {
                return back()->with('message', 'There is no results for this Programe');
            } else {
                //share view
                view()->share($data);
                $pdf = PDF::loadView('dashboard.report.courseresultpdf', $data)->setPaper('a3');

                return $pdf->download('courseresultpdf.pdf');
            }
        }
    }

    public function getexamofficersemesterresult()
    {
        if (!Gate::allows('courses-view')) {
            return abort(401);
        }
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'My Courses']];

        $data['Ayear'] = AcademicYear::all();
        $data['module'] = Course::all();
        $data['program'] = Program::all();
        $data['campus'] = Campus::all();
        $data['intake'] = IntakeCategory::all();
        $data['semester'] = Semester::all();
        $data['combination'] = Combination::all();
        return view('dashboard.examofficer.semester_results', $data);
    }

    public function getexamofficerNacterresult()
    {
        if (!Gate::allows('courses-view')) {
            return abort(401);
        }
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'My Courses']];

        $data['Ayear'] = AcademicYear::all();
        $data['module'] = Course::all();
        $data['program'] = Program::all();
        $data['campus'] = Campus::all();
        $data['intake'] = IntakeCategory::all();
        $data['semester'] = Semester::all();
        return view('dashboard.examofficer.nacte_results', $data);
    }

    public function getexamofficerAnnualresult()
    {
        // if (!Gate::allows('view-annual-result')) {
        //     return abort(401);
        // }
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'My Courses']];

        $data['Ayear'] = AcademicYear::all();
        $data['module'] = Course::all();
        $data['program'] = Program::all();
        $data['campus'] = Campus::all();
        $data['intake'] = IntakeCategory::all();
        // $data['semester'] = Semester::all();
        //dd($data['Ayear']);
        return view('dashboard.examofficer.annual_results', $data);
    }

    public function examofficersemesterresult(Request $request)
    {
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'results']];

        $input = $request->all();
        $validator = Validator::make($input, [
            'intake' => 'required',
            'program' => 'required',
            'semester' => 'required',
            'studyyear' => 'required',
            'campus_id' => 'required',
            'ayear' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        $semester = $request->semester;
        $campus = $request->campus_id;
        $academicyear = $request->ayear;
        $program = $request->program;
        $intake = $request->intake;
        $studyyear = $request->studyyear;
        //  dd($academicyear );
        if ($request->sub == 1) {
            $num = 10;
            $data['student'] = Student::join('users', 'users.username', '=', 'students.reg_no')
                ->where('students.program_id', $program)
                ->where('students.campus_id', $campus)
                ->where('students.intake_category_id', $intake)
                ->get();

            $data['semesterresult'] = CourseResult::join('semester_results', 'semester_results.reg_no', '=', 'course_results.reg_no')
                ->where('course_results.semester_id', $semester)
                ->whereIn('course_results.reg_no', $data['student']->pluck('reg_no'))
                ->where('course_results.year_id', $academicyear)
                ->get();

            $grouped = $data['semesterresult']->groupBy('course_id');
     
            $data['cozstudent'] = CourseStudent::whereIn('course_id', $data['semesterresult']->pluck('course_id'))->get();
            // return $grouped;
            $data['coz'] = CourseProgram::join('courses', 'courses.id', '=', 'course_program.course_id')
                ->where('course_program.program_id', $program)
                ->whereIn('courses.id', $data['semesterresult']->pluck('course_id'))
                ->get();
            // return $data['coz'];

            return view('dashboard.examination.examofficersemeserresult', $data);
        }
        if ($request->sub == 2) {
            echo 'two';
        }

        if ($request->sub == 3) {
            $studentdata = Student::where('program_id', $program)
                ->where('class_year', $academicyear)
                ->get();
            // dd($academicyear);

            if (count($studentdata) <= 0) {
                return back()->with('error', 'No Student Records found');
            }

            $fileName = 'SAMIS_Exam_Nacte_Results.xlsx';
            $papersize = '\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4';
            $fontstyle = 'Arial';
            $font = 10.5;

            $prog = Program::where('id', $program)->get();

            // hold statistical data
            $get_statistical_data = []; // hold general
            $config_data = []; // hold coursecode and its cell coordinate in worksheet one
            $get_statistical_data_gender = []; // hold statistical data by gender
            // Create new PHPExcel object
            $objPHPExcel = new Spreadsheet();
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $objPHPExcel->setActiveSheetIndex(0);
            // Rename sheet
            //$objPHPExcel->getActiveSheet()->setTitle('Semester I');
            $objPHPExcel->getActiveSheet()->setTitle('End of Year Results');
            // Set properties
            $objPHPExcel
                ->getProperties()
                ->setCreator('jodam')
                ->setLastModifiedBy('Juma Lungo')
                ->setTitle($prog->first()->program_name)
                ->setSubject('Semester Exam Results')
                ->setDescription('Semester Exam Results.')
                ->setKeywords('jodam SAMIS software')
                ->setCategory('Exam result file');
            $objPHPExcel
                ->getActiveSheet()
                ->getDefaultRowDimension()
                ->setRowHeight(15);
            # Set protected sheets to 'true' kama hutaki waandike waziedit sheets zako. Kama unataka wazi-edit weka 'false'
            $objPHPExcel
                ->getActiveSheet()
                ->getProtection()
                ->setSheet(false);
            #set worksheet orientation and size
            $objPHPExcel
                ->getActiveSheet()
                ->getPageSetup()
                ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            $objPHPExcel
                ->getActiveSheet()
                ->getPageSetup()
                ->setPaperSize($papersize);
            #Set page fit width to true
            $objPHPExcel
                ->getActiveSheet()
                ->getPageSetup()
                ->setFitToWidth(1);
            $objPHPExcel
                ->getActiveSheet()
                ->getPageSetup()
                ->setFitToHeight(0);
            #Set footer page numbers
            $objPHPExcel
                ->getActiveSheet()
                ->getHeaderFooter()
                ->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
            #Show or hide grid lines
            $objPHPExcel->getActiveSheet()->setShowGridlines(false);
            #Set sheet style (fonts and font size)
            $objPHPExcel
                ->getDefaultStyle()
                ->getFont()
                ->setName($fontstyle);
            $objPHPExcel
                ->getDefaultStyle()
                ->getFont()
                ->setSize($font);
            #Set page margins
            $objPHPExcel
                ->getActiveSheet()
                ->getPageMargins()
                ->setTop(1);
            $objPHPExcel
                ->getActiveSheet()
                ->getPageMargins()
                ->setRight(0.75);
            $objPHPExcel
                ->getActiveSheet()
                ->getPageMargins()
                ->setLeft(0.75);
            $objPHPExcel
                ->getActiveSheet()
                ->getPageMargins()
                ->setBottom(1);
            # Set Rows to repeate in each page
            $objPHPExcel
                ->getActiveSheet()
                ->getPageSetup()
                ->setRowsToRepeatAtTopByStartAndEnd(1, 5);
            # Set Report Logo
            $styleArray = [
                'font' => [
                    'bold' => false,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                    'rotation' => 90,
                    // 'startColor' => [
                    //     'argb' => 'FFA0A0A0',
                    // ],
                    'endColor' => [
                        'argb' => 'FFFFFFFF',
                    ],
                ],
            ];
            $totalcolms = 0;
            for ($col = 'A'; $col < 'ZZ'; $col++) {
                $objPHPExcel
                    ->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }
            #Get Organisation Name
            $qorg = Institution::all();
            $ayear = AcademicYear::where('id', $academicyear)->get();
            $curyear = AcademicYear::where('status', '1')->get();
            // $nameofcurrentyear = $curyear->first()->year;
            $nameofcurrentyear = $ayear->first()->year;
            $prog = Program::where('id', $program)->get();
            $semest = Semester::where('id', $semester)->get();
            $campus = Campus::where('id', $campus)->get();
          
            $class = '';
            if ($studyyear == 1) {
                $class = 'FIRST YEAR';
            } elseif ($studyyear == 2) {
                $class = 'SECOND YEAR';
            } elseif ($studyyear == 2) {
                $class = 'THIRD YEAR';
            } elseif ($studyyear == 4) {
                $class = 'FOURTH YEAR';
            } elseif ($studyyear == 5) {
                $class = 'FIFTH YEAR';
            } elseif ($studyyear == 6) {
                $class = 'SIXTH YEAR';
            } elseif ($studyyear == 7) {
                $class = 'SEVENTH YEAR';
            } else {
                $class = '';
            }
            # Print Report header
            $rpttitle = 'OVERALL SUMMARY OF EXAMINATIONS RESULTS -' . $nameofcurrentyear;
            $objPHPExcel->getActiveSheet()->mergeCells('A1:Z1');
            $objPHPExcel->getActiveSheet()->mergeCells('A2:Z2');
            $objPHPExcel->getActiveSheet()->mergeCells('A3:Z3');
            $objPHPExcel->getActiveSheet()->mergeCells('A5:Z5');
            $objPHPExcel->getActiveSheet()->mergeCells('A4:Z4');
            $objPHPExcel
                ->setActiveSheetIndex(0)
                ->setCellValue('A1', strtoupper($qorg->first()->institution_name))
                ->setCellValue('A2', 'CAMPUS : ' . strtoupper($campus->first()->campus_name))
                ->setCellValue('A3', strtoupper($rpttitle))
                // ->setCellValue('A4', "NTA LEVEL :  " . strtoupper(substr($prog->first()->program_code, -1)) . "                                          FIELD OF STUDY  :  " . strtoupper($prog->first()->program_name))
                ->setCellValue('A5', 'YEAR OF STUDY :  ' . $class . '         SEMESTER : ' . strtoupper($semest->first()->title) . '           DATE :.......................');
            $objPHPExcel
                ->getActiveSheet()
                ->getStyle('A1')
                ->getFont()
                ->setSize(20);
            $objPHPExcel
                ->getActiveSheet()
                ->getStyle('A2:A3')
                ->getFont()
                ->setSize(16);
            $objPHPExcel
                ->getActiveSheet()
                ->getStyle('A2:A3')
                ->getFont()
                ->setSize(13);
            $objPHPExcel
                ->getActiveSheet()
                ->getRowDimension('1')
                ->setRowHeight(26);
            $objPHPExcel
                ->getActiveSheet()
                ->getRowDimension('2')
                ->setRowHeight(26);
            $objPHPExcel
                ->getActiveSheet()
                ->getRowDimension('3')
                ->setRowHeight(26);
            $objPHPExcel
                ->getActiveSheet()
                ->getRowDimension('4')
                ->setRowHeight(26);
            $objPHPExcel
                ->getActiveSheet()
                ->getRowDimension('5')
                ->setRowHeight(26);
            $objPHPExcel
                ->getActiveSheet()
                ->getStyle('A1:A5')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $colm = 'A';
            $rows = 6;
            $rows1 = $rows + 1;
            $objPHPExcel
                ->getActiveSheet()
                ->getStyle('A6:BE6')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            #Print Serial Number
            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1)
                ->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, '#');
            $colm++;
            #Print Sex
            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1)
                ->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, 'Name');
            $colm++;
            #Print RegNo
            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1)
                ->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, 'RegNo');
            $colm++;
            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1)
                ->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, 'Sex');
            $colm++;
            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1)
                ->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, 'DOB');
            $colm++;

            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1)
                ->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, 'Entry Year');
            $colm++;

            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1)
                ->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, 'Nationality');
            $colm++;

            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1)
                ->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, 'F4 INDEX');
            $colm++;

            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1)
                ->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, 'F4 YEAR');
            $colm++;

            $progcredits = 0;
            $rows = 6;
            $coursecode = DB::table('course_program')
                ->where('semester', $semester)
                ->where('year_id', $academicyear)
                ->where('program_id', $program)
                ->where('year', $studyyear)
                ->select('course_id')
                ->distinct()
                ->get();
            #Print Course Headers
            foreach ($coursecode as $coz) {
                #get course units
                $course = $coz->course_id;
                #get semester
                $qsem = DB::table('course_results')
                    ->where('course_id', $course)
                    ->select('semester_id')
                    ->distinct()
                    ->get();
                //	echo ($coz->course_id);
                $getcourse = Course::where('id', $coz->course_id)->get();
                $sem = '';
                foreach ($qsem as $qm) {
                    $sem = $qm->semester_id;
                }

                if ($sem == 1) {
                    $semval = 1;
                } elseif ($sem == 2) {
                    $semval = 2;
                }
                #get course unit

                $unit = $getcourse->first()->unit;
                $progcredits = $progcredits + $unit;

                $colmc = $colm;

                $colmc++;
                $colmc++;
                $colmc++;
                $objPHPExcel
                    ->getActiveSheet()
                    ->mergeCells($colm . $rows . ':' . $colmc . $rows)
                    ->getStyle($colm . $rows . ':' . $colmc . $rows)
                    ->applyFromArray($styleArray);
                #write down the course code.
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, $getcourse->first()->course_code . ' (' . $getcourse->first()->unit . ')');
                #rotate text to 90 degree
                $config_data[$course] = $colm . '-' . $rows;
                //$objPHPExcel->getActiveSheet()->mergeCells($colm.$rows.':'.$colmc.$rows)
                //		      ->getStyle($colm.$rows.':'.$colmc.$rows)->getAlignment()->setTextRotation(90);
                #set row height to 74 points
                //$objPHPExcel->getActiveSheet()->getRowDimension('4')->setRowHeight(74);
                ///	$totalunits = $totalunits + $unit;
                $rows++;
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colm . $rows)
                    ->applyFromArray($styleArray);

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm++ . $rows, ' CA ');

                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colm . $rows)
                    ->applyFromArray($styleArray);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm++ . $rows, ' FE ');

                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colm . $rows)
                    ->applyFromArray($styleArray);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm++ . $rows, 'Total');

                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colm . $rows)
                    ->applyFromArray($styleArray);

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm++ . $rows, ' GD ');
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colm . $rows)
                    ->applyFromArray($styleArray);

                $rows = $rows - 1;
                //$sem='';
            }

            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1)
                ->applyFromArray($styleArray);
            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, '#Courses');
            $colm++;

            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1)
                ->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, 'POINTS');
            $ptscell = $colm . $rows . ':' . $colm . $rows1;
            $colm++;

            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1)
                ->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, 'GPA');
            $ptscell = $colm . $rows . ':' . $colm . $rows1;
            $colm++;

            $objPHPExcel
                ->getActiveSheet()
                ->mergeCells($colm . $rows . ':' . $colm . $rows1)
                ->getStyle($colm . $rows . ':' . $colm . $rows1)
                ->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colm . $rows, 'REMARK');
            $colm++;

            // # print candidate results
            $qstudent = Student::where('program_id', $program)
                ->where('class_year', $academicyear)
                ->get();

            if (empty($qstudent)) {
                return back()->with('error', 'No Student Records found');
            }

            $totalstudent = count($qstudent);
            $totalcourse = count($coursecode);
            $z = 1;
            $rows = 8;

            // 	#freez
            $objPHPExcel->getActiveSheet()->freezePane($colm . $rows);

            foreach ($qstudent as $rowstudent) {
                $colms = 'A';
                $regno = $rowstudent->reg_no;
                // $ently_year = $rowstudent->created_at->format('Y');
                $ently_year = $rowstudent->admission_year;
                $name = stripslashes($rowstudent->user->first_name . '  ' . $rowstudent->user->middle_name . ' ' . $rowstudent->user->last_name);
                $sex = $rowstudent->user->gender;
                $bdate = $rowstudent->dob;
                $form4_index_no = $rowstudent->form4_index_no;
                $form4_index_year = substr($rowstudent->form4_index_no, -4);
                $ststatus = stripslashes($rowstudent->status);
                // dd($ently_year);
                #initialise

                $inco_count = 0;
                $supp_count = 0;
                $optcredits = 0;
                $extracreditstaken = 0;
                # new values
                $totalfailed = 0;
                $totalinccount = 0;
                $halfsubjects = 0;
                $ovremark = '';
                $gmarks = 0;
                $avg = 0;
                $failed = 0;
                $gmarks = 0;
                $decrement = 0;
                $key = $regno;
                # Print results

                #Print Serial Number
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $rows, $z);
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $rows)
                    ->applyFromArray($styleArray);
                $colms++;

                #Print Serial Number
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $rows, $name);
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $rows)
                    ->applyFromArray($styleArray);
                $colms++;

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $rows, $regno);
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $rows)
                    ->applyFromArray($styleArray);
                $colms++;

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $rows, $sex);
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $rows)
                    ->applyFromArray($styleArray);
                $colms++;

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $rows, $bdate);
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $rows)
                    ->applyFromArray($styleArray);
                $colms++;

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $rows, $ently_year);
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $rows)
                    ->applyFromArray($styleArray);
                $colms++;

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $rows, 'Tanzanian');
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $rows)
                    ->applyFromArray($styleArray);
                $colms++;

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $rows, $form4_index_no);
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $rows)
                    ->applyFromArray($styleArray);
                $colms++;

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $rows, $form4_index_year);
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $rows)
                    ->applyFromArray($styleArray);
                $colms++;

                # search for course results and prints

                #get all courses
                $qcourselist = CourseProgram::select('course_id')
                    ->distinct()
                    ->where('program_id', $program)
                    ->where('semester', $semester)
                    ->where('year', $studyyear)
                    ->get();

                $niku1 = 0;
                foreach ($coursecode as $row_courselist) {
                    $stdcourse = $row_courselist->course_id;
                    $remarks = 'remarks';
                    $RegNo = $key;
                    $currentyear = $curyear;

                    //get results
                    $re = CourseResult::where('course_results.year_id', $academicyear)
                        ->where('course_results.reg_no', $regno)
                        ->where('course_results.course_id', $stdcourse)
                        ->get();

                    $objPHPExcel
                        ->getActiveSheet()
                        ->getStyle($colms . $rows)
                        ->applyFromArray($styleArray);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms++ . $rows, $re->first()->ca_score ?? '');
                    $objPHPExcel
                        ->getActiveSheet()
                        ->getStyle($colms . $rows)
                        ->applyFromArray($styleArray);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms++ . $rows, $re->first()->se_score ?? '');
                    $objPHPExcel
                        ->getActiveSheet()
                        ->getStyle($colms . $rows)
                        ->applyFromArray($styleArray);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms++ . $rows, $re->first()->total_score ?? '');
                    $objPHPExcel
                        ->getActiveSheet()
                        ->getStyle($colms . $rows)
                        ->applyFromArray($styleArray);

                    if ($re->first()->remarks ?? '' != 'Pass') {
                        //$colms++;// $colms++; $colms++;

                        $objPHPExcel
                            ->getActiveSheet()
                            ->getStyle($colms-- . $rows)
                            ->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                        //$objPHPExcel->getActiveSheet()->getStyle($colms--.$rows)->getFill()->getStartColor()->setARGB('FFFF0000');
                        $objPHPExcel
                            ->getActiveSheet()
                            ->getStyle($colms-- . $rows)
                            ->getFill()
                            ->getStartColor()
                            ->setARGB('CCCCCC');
                        $objPHPExcel
                            ->getActiveSheet()
                            ->getStyle($colms-- . $rows)
                            ->applyFromArray($styleArray);

                        $decrement = $decrement + $unit;

                        if ($unit > 0) {
                            $failed = $failed + 1;
                        }
                        // $colms--;
                    } else {
                        $objPHPExcel
                            ->getActiveSheet()
                            ->getStyle($colms-- . $rows)
                            ->applyFromArray($styleArray);
                    }
                    if ($re->first()->grade ?? '' > 'C') {
                        $supp_count++;
                    }

                    if ($re->first()->grade ?? '' == 'I') {
                        $inco_count++;
                    }

                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms++ . $rows, $re->first()->grade ?? '');
                }
                //capture from semester
                $semesterresult = SemesterResult::where('year_id', $academicyear)
                    ->where('semester_id', $semester)
                    ->where('reg_no', $regno)
                    ->get();

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $rows, ' ' . ' ' . ' ' . $totalcourse . ' ' . ' ' . ' ');
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $rows)
                    ->applyFromArray($styleArray);
                $colms++;
                # Assign total credits
                $requiredcredits = $progcredits - $optcredits - $extracreditstaken;

                // $curr_semester = $semval;

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $rows, $semesterresult->first()->total_points ?? '');
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $rows)
                    ->applyFromArray($styleArray);
                $colms++;

                $objPHPExcel
                    ->getActiveSheet()
                    ->getCell($colms . $rows)
                    ->setValueExplicit($semesterresult->first()->gpa ?? '', \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $rows)
                    ->applyFromArray($styleArray);
                $colms++;

                if ($semesterresult->first()->remarks ?? '' == 'DISCO') {
                    $objPHPExcel
                        ->getActiveSheet()
                        ->getStyle($colms-- . $rows)
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                    $objPHPExcel
                        ->getActiveSheet()
                        ->getStyle($colms-- . $rows)
                        ->getFill()
                        ->getStartColor()
                        ->setARGB('FFFF0000');
                    $objPHPExcel
                        ->getActiveSheet()
                        ->getStyle($colms-- . $rows)
                        ->applyFromArray($styleArray);
                } elseif ($semesterresult->first()->remarks ?? '' == 'PASS') {
                    #if pass then clean sheet
                } elseif ($semesterresult->first()->remarks ?? '' == 'ABSC') {
                    $objPHPExcel
                        ->getActiveSheet()
                        ->getStyle($colms-- . $rows)
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                    $objPHPExcel
                        ->getActiveSheet()
                        ->getStyle($colms-- . $rows)
                        ->getFill()
                        ->getStartColor()
                        ->setARGB('CCCCCC');
                    $objPHPExcel
                        ->getActiveSheet()
                        ->getStyle($colms-- . $rows)
                        ->applyFromArray($styleArray);
                }

                //$objPHPExcel->setActiveSheetIndex(1)->setCellValue($colms.$rows, $gpa);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $rows, $semesterresult->first()->remarks ?? '');
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $rows)
                    ->applyFromArray($styleArray);
                # prints overall remarks
                $colms++;
                // get end of the course column
                $end_subject = 'E';
                for ($x = 0; $x < $totalcolms; $x++) {
                    $end_subject++;
                }

                $rows++;
                $z = $z + 1;
                $counter = $rows;
                $supp = '';
                $fsup = '';
            }

            $colms = 'C';
            $counter = $counter + 2;
            $objPHPExcel
                ->getActiveSheet()
                ->getStyle($colms . $counter)
                ->applyFromArray($styleArray);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $counter, ' KEY FOR THE COURSE CODES  ');
            //$colms++;

            #get the course details

            $y = $colms;
            for ($x = 1; $x <= 15; $x++) {
                $y++;
                $colms2 = $y;
            }
            $colms1 = $colms;
            $colms1++;

            foreach ($qcourselist as $course) {
                $data = Course::where('id', $course->course_id)->get();
                //  dd($course);
                #print coursecode
                $counter += 1;
                $objPHPExcel
                    ->getActiveSheet()
                    ->getStyle($colms . $counter)
                    ->applyFromArray($styleArray);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms . $counter, ' ' . $data->first()->course_code ?? '');
                //$counter2 = $counter + 1;
                #print course title
                $objPHPExcel
                    ->getActiveSheet()
                    ->mergeCells($colms1 . $counter . ':' . $colms2 . $counter)
                    ->getStyle($colms1 . $counter . ':' . $colms2 . $counter)
                    ->applyFromArray($styleArray);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colms1 . $counter, ' ' . $data->first()->course_name ?? '');
                //$colms++;
            }

            //added DEC SUMMARY

            //}
            // Rename sheet

            $filepath = $fileName;

            $writer = new Xlsx($objPHPExcel);
            $writer->save($filepath);

            $objPHPExcel->getActiveSheet()->setTitle('Semester Report');
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $objPHPExcel->setActiveSheetIndex(0);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);

            // Redirect output to a client’s web browser (Excel5)
            // header('Content-Type: application/vnd.ms-excel');
            // header('Content-Disposition: attachment;filename="SAMIS_Exam_Results.xls"');
            // header('Cache-Control: max-age=0');
            #make pdf
            /*
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment;filename="SAMIS_Exam_Results.pdf"');
            header('Cache-Control: max-age=0');
            */
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            #make pdf
            // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
            $objWriter->save('php://output');
            exit();
        }
    }

    public function examofficerAnnualResult(Request $request)
    {
        return $request->all();
        return Excel::download(new AnnualReport(), 'annual_result.xlsx');
    }

    public function exportsemeserresult()
    {
        return Excel::download(new SemesterResults(), 'semesterresult.xlsx');
    }

    public function exportAnnualResult()
    {
        return Excel::download(new AnnualResults(), 'annual_result.xlsx');
    }


    public function StudentCourseResult()
{
    $user = Auth::user();
    $id = $user->id;
    $reg_no = $user->username;

    // Get student object once
    $student = Student::where('reg_no', $reg_no)->firstOrFail();
    $year = AcademicYear::where('status', '1')->firstOrFail();
    $student_classes = $user->student->student_class;

    // Check if course is registered
    $courseRegistrations = CourseStudent::where('reg_no', $reg_no)->get();
    if ($courseRegistrations->isEmpty()) {
        return back()->with('error', 'No Module Registered');
    }

    $firstCourse = $courseRegistrations->first();

    $publishCriteria = [
        'program_id' => $student->program_id,
        'year_id' => $firstCourse->year_id,
        'campus_id' => $student->campus_id,
        'intake_category_id' => $student->intake_category_id,
    ];

    $data = [
        'class' => $student,
        'student' => $user->student,
        'student_classes' => $student_classes,
        'blocked' => UnpaidStudent::where('reg_no', $reg_no)
                        ->where('year_id', $year->id)
                        ->get(),
        'result' => CourseResult::where('reg_no', $reg_no)
                        ->where('year_id', $year->id)
                        ->get(),
        'semester_results_1' => SemesterResult::where('reg_no', $reg_no)
                        ->where('year_id', $year->id)
                        ->where('semester_id', 1)
                        ->get(),
        'semester_results_2' => SemesterResult::where('reg_no', $reg_no)
                        ->where('year_id', $year->id)
                        ->where('semester_id', 2)
                        ->get(),
        'annual_results' => AnnualResult::where('reg_no', $reg_no)
                        ->where('year_id', $year->id)
                        ->get(),
        'bc' => [
            ['link' => route('students.index'), 'page' => 'Dashboard'],
            ['link' => '#', 'page' => 'Student CourseWorks'],
        ],
    ];

    return view('students.course_results', $data);
}

    public function courseWorks()
    {
        //        if (! Gate::allows('students-view')) {
        //            return abort(401);
        //        }
        $data['bc'] = [['link' => route('students.index'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Continuous Assessment']];
        $id = Auth::id();
        $student_campus = $this->student_model->findWhere('user_id', $id)->get();
        $student_classes = Auth::user()->student->student_class;

        $data['student'] = Auth::user()->student;
        $data['student_classes'] = $student_classes;
        $year = AcademicYear::where('status', '1')->get();
        $data['blocked'] = UnpaidStudent::where('reg_no', Auth::user()->username)
            ->where('year_id', $year->first()->id)
            ->get();
        // dd($student_classes);
        return view('students.course_works', $data);
    }

    public function storeCourses(Request $request)
    {
        //        if (!Gate::allows('students-create')) {
        //            return abort(401);
        //        }
        $input = $request->all();
        $total_unit = 0;
        foreach ($input['course_id'] as $course_id) {
            $course = Course::find($course_id);

            $total_unit += $course->unit;
        }
        $program_weight = $input['program_weight'];
        if ($total_unit < $program_weight || $total_unit > $program_weight) {
            // return back()->with('error','The selected course must have a weight equal to '.$program_weight.' You Selected=('.$total_unit.')');
        }
        $ayr = AcademicYear::where('status', '1')->get();
        $std_class = StudentClass::where('reg_no', Auth::user()->username)->get();
        //course reg according to admission
        //dd($std_class);
        // exit;
        $student = Auth::user()->student()->first();
        $std_id = $student->id;
        $reg_no = $student->reg_no;
        $year_id = $std_class->first()->class_year;
        $semester = $input['semester'];

        $courseStudentIds = [];
        DB::beginTransaction();
        try {
            foreach ($input['course_id'] as $course_id) {
                $where = [
                    'student_id' => $std_id,
                    'reg_no' => $reg_no,
                    'year_id' => $year_id,
                    'semester' => $semester,
                    'course_id' => $course_id,
                ];

                $course = CourseStudent::updateOrCreate($where, ['course_id' => $course_id]);

                $courseStudentIds[] = $course->course_id;
            }
            $where = [
                'reg_no' => $reg_no,
                'year_id' => $year_id,
                'semester' => $semester,
            ];
            CourseStudent::where($where)
                ->whereNotIn('course_id', $courseStudentIds)
                ->delete();
            DB::Commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error=' . $e->getMessage());
        }

        return back()->with('message', "You've Successfully Updated Modules");
    }

    public function pushstudentcourse()
    {
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Module Registration']];
        $program = Program::all();
        $data['programs'] = $program;
        return view('dashboard.settings.courses.pushcourse', $data);
    }

    public function pushcourses($program_id)
    {
        $data = CourseProgram::join('courses', 'courses.id', '=', 'course_program.course_id')
            ->where('course_program.program_id', $program_id)->get();
            $ayr = AcademicYear::where('status', '1')->first();

        if ($data->isEmpty()) {
            return back()->with('error', 'No Module configured in '.$ayr->year.' for '.Program::where('id', $program_id)->first()->program_code.' Program');
        }


        foreach ($data as $asigncourse) {
            $std = Student::where('program_id', $program_id)->where('year_id', $ayr->id)->get();
            foreach ($std as $s) {
                CourseStudent::updateOrcreate([
                    'student_id' => $s->id,
                    'course_id' => $asigncourse->course_id,
                    'reg_no' => $s->reg_no,
                    'semester' => $asigncourse->semester,
                    'year_id' => $ayr->id
                ]);
            }
        }

        return back()->with('message', 'Module for All Students have been Pushed Successfully');
    }

    public function loadAvatarUpdateModal()
    {
        //        if (! Gate::allows('students-view')) {
        //            return abort(401);
        //        }
        $id = Auth::id();
        $user = User::find($id);
        $data['user'] = $user;
        $data['srs'] = $this->srs;
        return View::make('dashboard.admissions.modals.photo.modal_body_edit', $data)->render();
    }
    public function loadStudyProgramInfoModal($id)
    {
        //        if (! Gate::allows('students-view')) {
        //            return abort(401);
        //        }
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

        $data['srs'] = $this->srs;
        return View::make('students.modals.study-program-info.modal_body_edit', $data)->render();
    }
    public function loadEduHistoryModal($id)
    {
        //        if (! Gate::allows('students-view')) {
        //            return abort(401);
        //        }
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

        $data['srs'] = $this->srs;
        return View::make('students.modals.edu-history.modal_body_create', $data)->render();
    }
    public function loadBankInfoModal($id)
    {
        //        if (! Gate::allows('students-view')) {
        //            return abort(401);
        //        }
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

        $data['srs'] = $this->srs;
        return View::make('students.modals.bank.modal_body_create', $data)->render();
    }
    public function loadDependantModal($id)
    {
        //        if (! Gate::allows('students-view')) {
        //            return abort(401);
        //        }
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

        $data['srs'] = $this->srs;
        return View::make('students.modals.dependant.modal_body_create', $data)->render();
    }
    public function loadNextOfKinModal($id)
    {
        //        if (! Gate::allows('students-view')) {
        //            return abort(401);
        //        }
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

        $data['srs'] = $this->srs;
        return View::make('students.modals.next-of-kin.modal_body_create', $data)->render();
    }
    public function loadContactInfoModal($id)
    {
        //        if (! Gate::allows('students-view')) {
        //            return abort(401);
        //        }
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

        $data['srs'] = $this->srs;
        return View::make('students.modals.contact.modal_body_edit', $data)->render();
    }

    public function storeEduHistory(Request $request)
    {
        //    if (! Gate::allows('students-create')) {
        //        return abort(401);
        //    }

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
        //        if (! Gate::allows('students-create')) {
        //            return abort(401);
        //        }
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
        //        if (! Gate::allows('students-create')) {
        //            return abort(401);
        //        }

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
        //        if (! Gate::allows('students-edit')) {
        //            return abort(401);
        //        }
    }
    public function storeNextOfKin(Request $request)
    {
        //        if (! Gate::allows('students-create')) {
        //            return abort(401);
        //        }
        $input = $request->all();
        //dd($input);
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
        //        if (! Gate::allows('students-edit')) {
        //            return abort(401);
        //        }
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

    public function examofficercourseworkresult()
    {
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'results']];

        // $data['results'] = ExamCategoryResult::join('users','users.username','=','exam_category_results.reg_no')
        //                     ->join('students','students.reg_no','=','exam_category_results.reg_no')
        //                    ->where('exam_category_results.exam_category_id',1)->get();

        $data['program'] = Program::all();
        $data['course'] = Course::all();

        //dd($data['results']);
        return view('dashboard.examination.courseworkresult', $data);
    }

    public function getcabyprogram(Request $request)
    {
        $course_id = $request->course_id;
        $program = $request->program;

        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'results']];

        // $data['results'] = ExamCategoryResult::join('users', 'users.username', '=', 'exam_category_results.reg_no')
        //     ->join('students', 'students.reg_no', '=', 'exam_category_results.reg_no')
        //     ->where('exam_category_results.exam_category_id', 1)
        //     ->where('exam_category_results.course_id', $course_id)
        //     ->where('students.program_id', $program)
        //     ->get();

            //doto approach for AVCA
            $data['results'] = CourseResult::join('users', 'users.username', '=', 'course_results.reg_no')
            ->join('students', 'students.reg_no', '=', 'course_results.reg_no')
            ->where('course_results.ca_score', '>', 0)
            ->where('course_results.course_id', $course_id)
            ->where('students.program_id', $program)
            ->get();

        $data['program'] = Program::all();
        $data['course'] = Course::all();

        //    dd($data['results']);
        return back()->with('results', $data['results']);
    }

    public function student_remark()
    {
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'student remark']];

        $data['semester'] = Semester::all();
        $data['years'] = AcademicYear::all();
        $data['remark'] = ExamRemark::all();

        return view('dashboard.examofficer.student_remark', $data);
    }

    public function autocomplete(Request $request)
    {
        $q = $request->get('query');
        $data = Student::join('users', 'students.reg_no', '=', 'users.username')
            ->where('students.reg_no', 'LIKE', "%$q%")

            ->get();
        $dt = [];
        foreach ($data as $d) {
            $dt[] = $d->reg_no;
        }
        //echo json_encode($dt);

        return response()->json($dt);
    }

    public function update_student_remark(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $validator = Validator::make($input, [
            'reg_no' => 'required',
            'Semester' => 'required',
            'AYear' => 'required',
            'Remark' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        try {
            $std = Student::where('reg_no', $request->reg_no)->first();
            //dd($std->reg_no);
            StudentRemark::updateOrCreate(['reg_no' => $std->reg_no], $input);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
            //dd($e);
        }
        return back()->with('message', 'Updated successfully');
    }
}
