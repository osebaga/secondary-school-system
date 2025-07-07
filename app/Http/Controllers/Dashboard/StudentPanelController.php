<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\SRS as HelpersSRS;
use App\Models\Campus;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Institution;
use App\Models\IntakeCategory;
use App\Models\Program;
use App\Models\Staff;
use App\Models\Student;
use App\Models\User;
use App\Models\PublishExam;
use App\Models\CourseResult;
use App\Models\StudentClass;
use App\Traits\CheckCampusTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\UnpaidStudent;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Hashids\Hashids;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\Link;
use Validator;
use File;
use Image;
use SRS;

class StudentPanelController extends Controller
{
use CheckCampusTrait;
    protected $grade_scheme_model, $course_model, $college_model, $department_modal, $course_work_model;

    protected $srs, $program_model, $user_model, $staff_model, $student_model, $file_history_model;
    private $course_student_model;

    public function __construct()
    {


    }

    public function campus()
    {

        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Panel']);

        $inst =Institution::with('campuses')->get();

        $data['institution'] = $inst;

        return view('dashboard.student_panel.campus', $data);

    }

    public function college_schools_transcript()
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Colleges&Schools']);
        $colleges = $this->college_model->with(['faculties.departments.courses' => function ($q) {
            $q->where('year_id', '=', Auth::user()->staff->year_id);
        }])->get();
        //dd($colleges);
        $data['colleges'] = $colleges;
        $data['srs'] = $this->srs;
        return view('dashboard.academics.schools', $data);
    }


    public function index($campus_id)
    {
        try {
            $campus_id = SRS::decode($campus_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => url()->previous(), 'page' => 'Student Panel'],['link' => '#', 'page' => 'Students']);

        $index_no = [
            '' => '',
            'form4_index_no' => 'Prems No.',
            // 'form6_index_no' => 'Form VI Index No.',
            'reg_no' => 'Registration No.'
        ];
        $data['student_status'] = [
            '' => '',
            'All' => 'All',
            '0' => 'No',
            '1' => 'Yes',
            '2' => 'Partial'
        ];
        $data['gender'] = [
            '' => '',
            'All' => 'All',
            'M' => 'Male',
            'F' => 'Female',
        ];
        $programs[''] = '';
        $programs['All'] = 'All Program';
        $progs = Program::all();
        foreach ($progs as $prog) {
            $programs[$prog->id] = $prog->program_name;
        }
        $campus=Campus::find($campus_id);
        $data['index_no'] = $index_no;
        $data['programs'] = $programs;
        $data['campus'] = $campus;
        return view('dashboard.student_panel.index', $data);
    }

    public function indexTranscript($dept_id)
    {
        try {
            $dept_id = SRS::decode($dept_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Students']);

        $index_no = [
            '' => '',
            'form4_index_no' => 'Form IV Index No.',
            'form6_index_no' => 'Form VI Index No.'
        ];
        $data['student_status'] = [
            '' => '',
            'All' => 'All',
            '0' => 'No',
            '1' => 'Yes',
            '2' => 'Partial'
        ];
        $data['gender'] = [
            '' => '',
            'All' => 'All',
            'M' => 'Male',
            'F' => 'Female',
        ];
        $programs[''] = '';
        $programs['All'] = 'All Degrees';
        $progs = $this->program_model->all();
        foreach ($progs as $prog) {
            $programs[$prog->id] = $prog->program_name;
        }
        $department = Department::find($dept_id);
        $data['index_no'] = $index_no;
        $data['dept_id'] = $dept_id;
        $data['department'] = $department;
        $data['programs'] = $programs;
        $data['srs'] = $this->srs;
        return view('dashboard.academics.index_transcript', $data);
    }


    public function getJsonStudentByCampus(Request $request, $campus_id)
    {
        try{
            $campus_id=SRS::decode($campus_id)[0];
        }catch (\Exception $e){
            abort(404);
        }
        $students = Student::with(['user', 'program' => function ($q) {
            // $q->academicYear();
        },
            'intake_category','campus'])->where('campus_id','=',$campus_id);


        return DataTables::of($students)
            ->addIndexColumn()

            ->filter(function ($student) use ($request) {
                if (!empty($request->get('surname'))) {

                    $student->whereHas('user',function ($q) use($request){
                        $q->where('last_name','LIKE','%'.$request->get('surname').'%');
                    });
                }

                if ($request->filled('program') && $request->get('program') != 'All') {
                    //   $students->whereHas('user',function ($q) use($request) {
                    $student->where('program_id', '=', $request->get('program'));
                    // });
                }
                if ($request->filled('gender') && $request->get('gender') != 'All') {
                    $student->whereHas('user',function ($q) use($request) {
                        $q->where('gender', '=', $request->get('gender'));
                    });
                }

                if ($request->filled('index_type')) {

                    if ($request->get('index_type') == 'form4_index_no') {
                        if ($request->filled('index_no')) {

                            $student->where('form4_index_no', 'LIKE', "%{$request->get('index_no')}%");
                        }
                    }
                    if ($request->get('index_type') == 'form6_index_no') {
                        if ($request->filled('index_no')) {

                            $student->where('form6_index_no', 'like', "%{$request->get('index_no')}%");
                        }
                    }
                    if ($request->get('index_type') == 'reg_no') {
                        if ($request->filled('index_no')) {

                            $student->where('reg_no', 'like', "%{$request->get('index_no')}%");
                        }
                    }

                }
            })
            ->addColumn('full_name',function ($std) use ($campus_id) {
               return  $std->user->last_name . ', ' . $std->user->first_name . ' ' . $std->user->middle_name;
                
                // return $std->user->last_name .' '.$std->user->first_name.' '.$std->user->middle_name;
            })
            ->editColumn('gender',function ($std){
                return $std->user->gender;
            })
            ->editColumn('program_acronym',function ($std){
                return $std->program->program_acronym ?? '';
            })
            ->editColumn('intake_name',function ($std){
                return $std->intake_category->name;
            })
            ->addColumn('std_status', function ($std) {

                return $std->status;
            })
            ->addColumn('actions',function ($std){
                if(Auth::user()->roles()->first()->name == 'AdmissionOfficer'){
                    $profile_link = link_to(route('student-panel.students.profile',['user_id'=>SRS::encode($std->user_id),'id'=>SRS::encode($std->id)] ), 
                    '<i class="mdi  mdi-face-profile p-2"  data-toggle="tooltip" data-placement="top" title="" data-original-title="View Student Profile"></i>',
                     'id="resource-result-view-button"');
    
                    return html_entity_decode($profile_link);  
                }else{
            $view_status_link = link_to(route('student-panel.get-student-status', SRS::encode($std->user_id)), '<i class="fa  fa-eye p-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Student Status"></i>', 'id="resource-status-view-button"');
            // $view_course_work_link = link_to(route('student-panel.course-works', SRS::encode($std->user_id)), '<i class="fa-fw fa fa-book p-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Coursework"></i>', 'id="resource-result-view-button"');
            $view_course_result_link = link_to(route('student-panel.course-results', SRS::encode($std->user_id)), '<i class="fa-fw fa fa-graduation-cap p-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Exam Results"></i>', 'id="resource-result-view-button"');
                    
            return html_entity_decode($view_status_link).
            // html_entity_decode($view_course_work_link).
            html_entity_decode($view_course_result_link);
                }
           

            })->rawColumns(['actions'])
            ->make(true);

            


    }
    public function courseWorks($user_id)
    {
        
        try {
            $id = HelpersSRS::decode($user_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $data['bc'] = [
              ['link' => route('dashboard'), 'page' => 'Dashboard'], 
              ['link' => url('student_panel.index'), 'page' => 'Student Panel'],
              ['link' => url()->previous(), 'page' => 'Students'],
              ['link' => '#', 'page' => 'Course Works']
          ];

        $student = Student::with('program')->where('user_id', $id)->first();
        // dd($student);
        $yr = AcademicYear::where('status','1')->first();
        $student_classes = StudentClass::where('reg_no',$student->reg_no)->where('year_id',$yr->id)->get();
          
        //   dd($student_classes);
        $data['student_classes'] = $student_classes;
        $year = AcademicYear::where('status', '1')->get();
        $data['blocked'] = UnpaidStudent::where('reg_no', Auth::user()->username)
            ->where('year_id', $year->first()->id)
            ->get();
        // dd($student_classes);
        return view('dashboard.student_panel.course_works', $data);
    }
    public function courseResults($user_id)
    {

        try {
            $id = SRS::decode($user_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        
        

        $student_campus = Student::where('user_id', $id)->get();
        //$student_classes = Auth::user()->student->student_class;
       $getcourse = CourseStudent::where('reg_no',$student_campus->first()->reg_no)->get();
       $student1 = Student::where('reg_no',$student_campus->first()->reg_no)->get();
       $yr = AcademicYear::where('status','1')->first();
       $data = [
        "program_id"=>$student1->first()->program_id,
         "year_id" => $getcourse->first()->year_id,
         "campus_id" => $student1->first()->campus_id,
         "intake_category_id" => $student1->first()->intake_category_id
];
        $getpublishstatus = PublishExam::where($data)->get();
        $data['result'] = CourseResult::join('semester_results','semester_results.reg_no','=','course_results.reg_no')
            ->where('course_results.reg_no',$student_campus->first()->reg_no)->get();

            $data['bc'] = [
              ['link' => route('dashboard'), 'page' => 'Dashboard'], 
              ['link' => url('student_panel.index'), 'page' => 'Student Panel'],
              ['link' => url()->previous(), 'page' => 'Students'],
              ['link' => '#', 'page' => 'Course Results']
          ];
        $student = Student::with('program')->where('user_id', $id)->first();
        $class = StudentClass::where('reg_no',$student->reg_no)->where('year_id',$yr->id)->first();
        // if(is_null($class))
        // {
        // return back()->with('error', 'Something went wrong. Please No records for Academic year '.$yr->year);
        // }
        $data['student'] = $student;
        $data['student_classes'] = $student;
        $data['yr'] = $yr;
        $data['year_of_study'] = $class;
        $data['check_status'] = [];
        $data['user_id'] = $id;
        return view('dashboard.student_panel.course_result', $data);
    }

    public function get_json_department_students_transcript(Request $request, $dept_id)
    {
        try {
            $dept_id = SRS::decode($dept_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        //$students = $this->student_model->with(['user', 'program'])->get();
        //department->program-students
        $students = DB::table('departments as d')
            ->join('programs as p', 'd.id', '=', 'p.department_id')
            ->where('p.year_id', '=', Auth::user()->staff->year_id)
            ->where('d.id', '=', $dept_id)
            ->join('students as std', 'std.program_id', '=', 'p.id')
            ->where('std.year_id', '=', Auth::user()->staff->year_id)
            ->join('users as u', 'u.id', '=', 'std.user_id')
            ->join('batches as b', 'b.id', '=', 'std.batch_id')
            ->select(['std.*', 'std.year_id AS std_year_id', 'd.*', 'p.*', 'u.*', 'b.*', 'std.status as std_status', 'std.id as std_id'])
            ->get();

        if ($request->filled('surname')) {
            $students = $students->where('user.last_name', 'LIKE %?%', $request->get('surname'));
        }

        if ($request->filled('program') && $request->get('program') != 'All') {
            $students = $students->where('program_id', '=', $request->get('program'));
        }
        if ($request->filled('gender') && $request->get('gender') != 'All') {

            $students = $students->where('user.gender', '=', $request->get('gender'));
        }


        return DataTables::of($students)
            ->addIndexColumn()
            ->editColumn('full_name', function ($std) use ($dept_id) {
                $link = link_to(route('student-panel.get-student-info', [SRS::encode($std->user_id)]), $std->last_name . ', ' . $std->first_name . ' ' . $std->middle_name);
                return $link;
            })
            ->addColumn('std_status', function ($std) use ($dept_id) {
                //  $link = link_to(route('student-panel.get-student-info', [SRS::encode($std->user_id)]), $std->last_name . ', ' . $std->first_name . ' ' . $std->middle_name);
//                <a href="#" class="student_status" id="inline-sex{{$k}}" data-type="select" data-name="cs_status" data-pk="{{$course->cs_id}}" data-value="{{$course->cs_status}}" data-url="{{route('student-panel.update-student-status')}}" data-title="Select Status"></a>
                // $link_disco=link_to('#','',['class'=>"student_disco_status", 'id'=>"inline-status.$std->id", 'data-type'=>"select", 'data-name'=>"cs_status", 'data-pk'=>$std->reg_no ,'data-value'=>$std->status ,'data-url'=>route('student-panel.update-student-status') ,'data-title'=>"Select Status"]);

                return $std->std_status;
            })
            ->addColumn('actions', function ($std) {
                $partial_link = "";
                $transcript_link = "";
                if ($std->program_type === 'Bachelor') {
                    $partial_link = link_to(route('academics.bachelor-transcript', [SRS::encode($std->std_id), SRS::encode($std->program_id), SRS::encode($std->department_id), SRS::encode($std->faculty_id), SRS::encode($std->year_of_study), SRS::encode($std->std_year_id)]), '<i class="fa  fa-download p-2"></i> Partial', 'id="resource-result-view-button"');
                    $transcript_link = link_to(route('academics.bachelor-transcript', [SRS::encode($std->std_id), SRS::encode($std->program_id), SRS::encode($std->department_id), SRS::encode($std->faculty_id), SRS::encode($std->year_of_study), SRS::encode($std->std_year_id)]), '<i class="fa fa-download p-2"></i> Transcript', 'id="resource-result-view-button"');
                } elseif ($std->program_type === 'Certificate') {
                    $partial_link = link_to(route('academics.certificate-transcript', [SRS::encode($std->std_id), SRS::encode($std->program_id), SRS::encode($std->department_id), SRS::encode($std->faculty_id), SRS::encode($std->year_of_study), SRS::encode($std->std_year_id)]), '<i class="fa  fa-download p-2"></i> Partial', 'id="resource-result-view-button"');
                    $transcript_link = link_to(route('academics.certificate-transcript', [SRS::encode($std->std_id), SRS::encode($std->program_id), SRS::encode($std->department_id), SRS::encode($std->faculty_id), SRS::encode($std->year_of_study), SRS::encode($std->std_year_id)]), '<i class="fa fa-download p-2"></i> Transcript', 'id="resource-result-view-button"');
                } elseif ($std->program_type === 'Diploma') {
                    $partial_link = link_to(route('academics.diploma-transcript', [SRS::encode($std->std_id), SRS::encode($std->program_id), SRS::encode($std->department_id), SRS::encode($std->faculty_id), SRS::encode($std->year_of_study), SRS::encode($std->std_year_id)]), '<i class="fa  fa-download p-2"></i> Partial', 'id="resource-result-view-button"');
                    $transcript_link = link_to(route('academics.diploma-transcript', [SRS::encode($std->std_id), SRS::encode($std->program_id), SRS::encode($std->department_id), SRS::encode($std->faculty_id), SRS::encode($std->year_of_study), SRS::encode($std->std_year_id)]), '<i class="fa fa-download p-2"></i> Transcript', 'id="resource-result-view-button"');
                } elseif ($std->program_type == 'Masters') {
                    $partial_link = link_to(route('academics.masters-transcript', [SRS::encode($std->std_id), SRS::encode($std->program_id), SRS::encode($std->department_id), SRS::encode($std->faculty_id), SRS::encode($std->year_of_study), SRS::encode($std->std_year_id)]), '<i class="fa  fa-download p-2"></i> Partial', 'id="resource-result-view-button"');
                    $transcript_link = link_to(route('academics.masters-transcript', [SRS::encode($std->std_id), SRS::encode($std->program_id), SRS::encode($std->department_id), SRS::encode($std->faculty_id), SRS::encode($std->year_of_study), SRS::encode($std->std_year_id)]), '<i class="fa fa-download p-2"></i> Transcript', 'id="resource-result-view-button"');
                } elseif ($std->program_type == 'Postgraduate Diploma') {
                    $partial_link = link_to(route('academics.postgraduate-transcript', [SRS::encode($std->std_id), SRS::encode($std->program_id), SRS::encode($std->department_id), SRS::encode($std->faculty_id), SRS::encode($std->year_of_study), SRS::encode($std->std_year_id)]), '<i class="fa  fa-download p-2"></i> Partial', 'id="resource-result-view-button"');
                    $transcript_link = link_to(route('academics.postgraduate-transcript', [SRS::encode($std->std_id), SRS::encode($std->program_id), SRS::encode($std->department_id), SRS::encode($std->faculty_id), SRS::encode($std->year_of_study), SRS::encode($std->std_year_id)]), '<i class="fa fa-download p-2"></i> Transcript', 'id="resource-result-view-button"');
                }
                return html_entity_decode($partial_link) . html_entity_decode($transcript_link);
            })->rawColumns(['actions'])
            ->make(true);

    }

    public function get_student_info($user_id)
    {
        try {
            $id = SRS::decode($user_id)[0];
            // $faculty_id = $this->hash->decode($school)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        // $data['records'] = $this->student_model->findWhere('user_id', $id)->with(['user', 'program'])->first();
        $data['records'] = Student::academicYear()->where('user_id', '=', $id)->with(['user', 'program'])->first();
        $data['bc'] = $data['bc'] = array(['link' => '#', 'page' => 'Dashboard'],);
        $data['srs'] = $this->srs;
        //$data['school'] = $faculty_id;

        return view('dashboard.student_panel.student_info', $data);
    }

    public function get_student_status($user_id)
    {

        try {
            $user_id = SRS::decode($user_id)[0];
        } catch (\Exception $e) {
            // abort(404);
        }
        // dd($user_id);
        $data['bc'] = [
              ['link' => route('dashboard'), 'page' => 'Dashboard'], 
              ['link' => url('student_panel.index'), 'page' => 'Student Panel'],
              ['link' => url()->previous(), 'page' => 'Students'],
              ['link' => '#', 'page' => 'Student Status']
          ];

        $student = Student::where('user_id', '=', $user_id)->with(['program' => function ($q) {
            // $q->academicYear();
            //$q->wherePivot('year','=',Auth::user()->studentYear->year);
        }])->first();
        //dd($student);
        // if (!is_null($student))
        $ayear = AcademicYear::where('status','1')->first();
        $reg_no = $student->reg_no;
        $user_id = $student->user_id;
        $program_id = $student->program_id;
        $year_id = $ayear->id;

        $program_weight = $student->program->program_weight ?? '';
        $data['program_weight'] = $program_weight;
        $data['registered_courses_sem_one'] = SRS::registeredCourses(1, $program_id, $user_id, $reg_no, $year_id);//$this->student_model->findWhere('user_id',$user_id)->with(['courses'])->get();
        //  $data['academic_courses_sem_one'] = SRS::academicYearCourses(1, $program_id, $user_id);
        //dd($program_id,$user_id,$reg_no,$data['academic_courses_sem_one'],$data['registered_courses_sem_one']);
        $data['registered_courses_sem_two'] = SRS::registeredCourses(2, $program_id, $user_id, $reg_no, $year_id);//$this->student_model->findWhere('user_id',$user_id)->with(['courses'])->get();
        //  $data['academic_courses_sem_two'] =   SRS::academicYearCourses(2, $program_id, $user_id);
      
        //dd($data['registered_courses_sem_one']); 

        $data['student'] = $student;
        $data['srs'] = $this->srs;

        return view('dashboard.student_panel.student_status', $data);
    }

    public function update_student_disco_status(Request $request)
    {
        if ($request->ajax()) {
            Student::find($request->get('pk'))->update([$request->get('name') => $request->get('value')]);
            return response()->json(['success' => 'OK']);
        }
    }

    public function update_student_status(Request $request)
    {
        if ($request->ajax()) {
            CourseStudent::find($request->get('pk'))->update([$request->get('name') => $request->get('value')]);
            return response()->json(['success' => 'OK']);
        }
    }




    public function profile($user_id,$id)
    {
        try {
            $user_id = SRS::decode($user_id)[0];
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try Again');
        }
        $data['bc'] = [
              ['link' => route('dashboard'), 'page' => 'Dashboard'], 
              ['link' => url('student_panel.index'), 'page' => 'Student Panel'],
              ['link' => url()->previous(), 'page' => 'Students'],
              ['link' => '#', 'page' => 'Student Profile']
          ];

        $counts = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"];
        $countries = array();
        foreach ($counts as $c) {
            $countries[$c] = $c;
        }

        try {

            $user = Student::where('user_id', '=', $user_id)
            // ->academicYear()
            ->with('user')
            ->with('intake_category')
            ->with('program.faculty.institution')->first();
            //dd($user);
            $std= Student::find($id);
            $data['std']=$std;
          
            $intakes = IntakeCategory::pluck('name', 'id');

            $data['student'] = $user;
            $data['srs'] = $this->srs;
            $data['countries'] = $countries;
            $data['intakes'] = $intakes;

            return view('dashboard.student_panel.profile', $data);

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!. please try again '.$e);

        }
    }

    public function updateProfile(Request $request, $user_id)
    {
        try {
            $id = SRS::decode($user_id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try Again');
        }
        // $request->except('_method');
        $input = $request->all();
//        dd($input);
        $validator = Validator::make($input, [
            // 'username' => 'required|unique:users,username,' . $id,
            'gender' => 'required',
            //'form4_index_no' => 'required',
            //'form6_index_no' => 'required',
            //'dob' => 'required',
            //'dob_place' => 'required',
            'citizenship' => 'required',

        ]);
        if ($request->filled('email')) {
            $validator = Validator::make($input, [
                'email' => 'required|email|unique:users,email,' . $id,

            ]);
        }

        if ($validator->fails()) {
            return back()->withInput(['tab' => 'edit'])->with('errors', $validator->errors());

        }

        if ($validator->fails()) {
            return back()->withInput(['tab' => 'edit'])->with('errors', $validator->errors());

        }
        $user_data = [
            'gender' => $input['gender'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'middle_name' => $input['middle_name'],
            'email' => $input['email_address'],
        ];
        $student_data = [
            'form4_index_no' => $input['form4_index_no'],
            'form6_index_no' => $input['form6_index_no'],
            'dob' => $input['dob'],
            'dob_place' => $input['dob_place'],
            'mobile_no' => $input['mobile_no'],
            'email_address' => $input['email_address'],
            'citizenship' => $input['citizenship'],
            'is_disabled' => $input['is_disabled'],
            'intake_category_id' => $input['intake_category_id'],

        ];

        //dd($student_data,$user_data);
        DB::beginTransaction();
        try {
                User::find($id)->update($user_data);
            Student::where('user_id', '=', $id)->update($student_data);
             DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput(['tab' => 'edit'])->with('error', 'Update Failed ' . $e->getMessage());

        }

        // Session::flash('message', '');
        return redirect()->back()->withInput(['tab' => 'edit'])->with('message', 'User updated successfully');

    }

    public function changePassword(Request $request, $user_id)
    {
        try {
            $id = SRS::decode($user_id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try Again');
        }
        $input = $request->all();
        $user = User::find($id);


        $validator = Validator::make($input, [
            'new-password' => 'required|string|min:6|same:new-password-confirm',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput(['tab' => 'cpassword'])->with('errors', $validator->errors());

        }

        //Change Password

        $user->password = Hash::make($request->get('new-password'));
        $user->save();
        //Session::flash('message', '');
        return redirect()->back()->withInput(['tab' => 'cpassword'])->with('message', 'Successfully updated');
    }

    public function updateAvatar(Request $request, $user_id)
    {
        try {
            $id = SRS::decode($user_id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try Again');
        }
        $validator = Validator::make($request->all(), [
            'avatar' => 'required'
        ]);
        if ($validator->fails()) {
            Session::flash('error', 'The Avatar Field Required');
            return back()->withInput(['tab' => 'avatar']);
        }

        $input = $request->all();
        //$input['avatar'] = $request->input('avatar');
        $avatar = $request->file('avatar');

        $image =User::where('id',$user_id)->pluck('avatar')->first();

        $current_avatar = $image;

        $inputs['avatar'] = time() . '_' . 'QK.' . $avatar->getClientOriginalExtension();

        $destinationPath = public_path('/assets/uploads/avatars');

        $img = Image::make($avatar->getRealPath());

        $img->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . $input['avatar']);
        $file = public_path('assets/uploads/avatars') . $current_avatar;

        if (file_exists($file)) {
            File::delete($file);
        }


        User::where('id',$id)->update($inputs);
        Session::flash('message', 'Successfully updated');
        return back()->withInput(['tab' => 'avatar']);
    }

    public function issuesIndex()
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Issues']);
        $data['srs'] = $this->srs;
        $students = DB::table('departments as d')
            ->join('programs as p', 'd.id', '=', 'p.department_id')
            ->where('p.year_id', '=', Auth::user()->staff->year_id)
//            ->where('d.id', '=', $dept_id)
            ->join('students as std', 'std.program_id', '=', 'p.id')
            ->where('std.year_id', '=', Auth::user()->staff->year_id)
            ->join('users as u', 'u.id', '=', 'std.user_id')
            ->join('batches as b', 'b.id', '=', 'std.batch_id')
            ->select(['std.*', 'd.*', 'p.*', 'u.*', 'b.*', 'std.status as std_status', 'std.id as std_id'])
            ->get();
        $student[''] = '';
        foreach ($students as $item) {
            $student[$item->reg_no] = $item->reg_no . ' - ( ' . $item->first_name . ' ' . $item->middle_name . ' ' . $item->last_name . ' ) - ( ' . $item->batch_name . ' )';
        }
        $data['student'] = $student;
        return view('dashboard.settings.issues.index', $data);
    }

    public function issuesUpdateIndex()
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Issues']);
        $data['srs'] = $this->srs;
        $students = DB::table('departments as d')
            ->join('programs as p', 'd.id', '=', 'p.department_id')
            ->where('p.year_id', '=', Auth::user()->staff->year_id)
//            ->where('d.id', '=', $dept_id)
            ->join('students as std', 'std.program_id', '=', 'p.id')
            ->where('std.year_id', '=', Auth::user()->staff->year_id)
            ->join('users as u', 'u.id', '=', 'std.user_id')
            ->join('batches as b', 'b.id', '=', 'std.batch_id')
            ->select(['std.*', 'd.*', 'p.*', 'u.*', 'b.*', 'std.status as std_status', 'std.id as std_id'])
            ->get();
        $student[''] = '';
        foreach ($students as $item) {
            $student[$item->reg_no] = $item->reg_no . ' - ( ' . $item->first_name . ' ' . $item->middle_name . ' ' . $item->last_name . ' ) - ( ' . $item->batch_name . ' )';
        }
        $data['student'] = $student;
        return view('dashboard.settings.issues.index_update', $data);
    }

    public function deleteStudent(Request $request)
    {
        $input = $request->all();
//        dd($input);
        $validator = Validator::make($request->all(), [
            'student' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
 try {
            DB::table('student_years')->where('student_years.reg_no', '=', $input['student'])->delete();
            DB::table('students')->where('students.reg_no', '=', $input['student'])->delete();
            DB::table('users')->where('users.username', '=', $input['student'])->delete();
            DB::table('course_works')->where('course_works.reg_no', '=', $input['student'])->delete();
            DB::table('results')->where('results.reg_no', '=', $input['student'])->delete();
            DB::table('course_student')->where('course_student.reg_no', '=', $input['student'])->delete();

        } catch (\Exception $exception) {
            return back()->withInput()->with('error', 'Something Went Wrong! code(' . $exception->getMessage() . ')');
        }
        return redirect()->back()->with('message', 'Student Deleted Successfully !');
    }

    public function updateStudent(Request $request)
    {
        $input = $request->all();
//        dd($input);
        $validator = Validator::make($request->all(), [
            'student' => 'required',
            'student_reg' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
     try {
            $data = [
                'reg_no' => $input['student_reg']
            ];
            $data_user = [
                'username' => $input['student_reg']
            ];
            DB::beginTransaction();
            DB::table('users')->where('users.username', '=', $input['student'])->update($data_user);
            DB::table('students')->where('students.reg_no', '=', $input['student'])->update($data);
            DB::table('student_classes')->where('student_classes.reg_no', '=', $input['student'])->update($data);
            DB::table('results')->where('results.reg_no', '=', $input['student'])->update($data);
            DB::table('course_works')->where('course_works.reg_no', '=', $input['student'])->update($data);
            DB::table('course_student')->where('course_student.reg_no', '=', $input['student'])->update($data);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Something Went Wrong! code(' . $exception->getMessage() . ')');
        }
        return redirect()->back()->with('message', 'Student Updated Successfully !');
    }

    public function updateGenderIndex()
    {
        $data['bc'] = $data['bc'] = array(['link' => '#', 'page' => 'Dashboard'],);
        $data['srs'] = $this->srs;
        return view('dashboard.settings.issues.index_update_gender_student', $data);
    }



}
