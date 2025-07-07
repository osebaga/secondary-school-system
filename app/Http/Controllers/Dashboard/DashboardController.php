<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use Illuminate\Http\Request;
use SRS;
use DB;
use Auth;
use Illuminate\Support\Collection;

use App\Models\User;
use App\Models\Staff;
use App\Models\Student;
use App\Models\CourseProgram;
use App\Models\AcademicYear;
use App\Models\Course;
use App\Models\CourseResultSummary;
use App\Models\Program;
use App\Models\Role;
use App\Models\SemesterResultSummary;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $agent = $request->header('User-Agent');
        //  $ip = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
        $ip = \Request::getClientIp(true);

        LoginHistory::UpdateOrCreate([
            'device' => $agent,
            'ipaddress' => $ip,
            'user_id' => Auth::id(),
            'username' => Auth::user()->username,
            'last_login' => Carbon::now(),
        ]);

        if (
            Auth::user()
                ->roles()
                ->first()->name == 'Student'
        ) {
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
            LoginHistory::UpdateOrCreate(['device' => $agent, 'ipaddress' => $ip, 'user_id' => Auth::id(), 'username' => Auth::user()->username, 'last_login' => Carbon::now()]);

            return view('students.index', $data);
        } else {
            $year = AcademicYear::where('status', '=', '1')->get();
            $staffyear = Staff::where('user_id', Auth::user()->id)->get();
            $ayear = $year->first()->id;
            $data['program'] = Student::select('program_id', DB::raw('count(program_id) as total'))
                ->where('year_id', $ayear)
                ->groupBy('program_id')
                ->get();
            $data['academicYear'] = $year->first()->year;

            $data['programcourse'] = CourseProgram::select('program_id', DB::raw('count(program_id) as totalcourse'))
                ->groupBy('program_id')
                ->get();
            $data['roles'] = Role::all();


             // Prepare your data
        $bc = [['link' => '#', 'page' => 'Dashboard']];
        $totalUsers = User::count();
        $totalStudents = Student::count();
        $totalStaff = Staff::count();
        $totalPrograms = Program::count();
        $totalCourses = Course::count();

        $courseResults = CourseResultSummary::all();
        $total_A_male = [];
        $total_A_female = [];
        $total_B_male = [];
        $total_B_female = [];
        $total_C_male = [];
        $total_C_female = [];
        $total_D_male = [];
        $total_D_female = [];
        $total_F_male = [];
        $total_F_female = [];

        foreach ($courseResults as $result) {
            $total_A_male[] = $result->total_A_male;
            $total_A_female[] = $result->total_A_female;
            $total_B_male[] = $result->total_B_male;
            $total_B_female[] = $result->total_B_female;
            $total_C_male[] = $result->total_C_male;
            $total_C_female[] = $result->total_C_female;
            $total_D_male[] = $result->total_D_male;
            $total_D_female[] = $result->total_D_female;
            $total_F_male[] = $result->total_F_male;
            $total_F_female[] = $result->total_F_female;
        }

        $semesterResults = SemesterResultSummary::all();
        $totalMalePass = $semesterResults->sum('total_male_pass');
        $totalMaleFail = $semesterResults->sum('total_male_fail');
        $totalFemalePass = $semesterResults->sum('total_female_pass');
        $totalFemaleFail = $semesterResults->sum('total_female_fail');

        // Return the view with all variables
        return view('dashboard.index', compact(
            'bc', 
            'totalUsers', 
            'totalStudents', 
            'totalStaff', 
            'totalPrograms', 
            'totalCourses', 
            'total_A_male', 
            'total_A_female', 
            'total_B_male', 
            'total_B_female', 
            'total_C_male', 
            'total_C_female', 
            'total_D_male', 
            'total_D_female', 
            'total_F_male', 
            'total_F_female', 
            'totalMalePass', 
            'totalMaleFail', 
            'totalFemalePass', 
            'totalFemaleFail',
            'semesterResults'
        ));
    
        }
    }
}
