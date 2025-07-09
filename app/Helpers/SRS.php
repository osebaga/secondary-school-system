<?php

namespace App\Helpers;

use App\Models\AnnualResult;
use App\Models\ApplicantDetails;
use App\Models\CourseResult;
use App\Models\CourseResultSummary;
use App\Models\CourseStudent;
use App\Models\CourseProgram;
use App\Models\ExamCategoryResult;
use App\Models\ExamScore;
use App\Models\ExamLookup;
use App\Models\LimitCourseRegistration;
use App\Models\PublishExam;
use App\Models\SemesterResult;
use App\Models\SemesterResultSummary;
use App\Models\AnnualResultSummary;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\User;
use App\Models\AcademicYear;
use App\Models\Campus;
use App\Models\Course;
use App\Models\Debtor;
use App\Models\ExamCategory;
use App\Models\Grade;
use App\Models\IntakeCategory;
use App\Models\Invoice;
use App\Models\Transcript;
use App\Models\UploadLimit;
use Carbon\Carbon;
use Hashids\Hashids;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
//use Illuminate\Support\Facademicacades\Auth;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class SRS
{
    public static function encode($id, $length = 10)
    {
        $hash = new Hashids(env('HASH_SALT'), $length);
        return $hash->encode($id);
    }

    public static function decode($id, $length = 10)
    {
        $hash = new Hashids(env('HASH_SALT'), $length);
        return $hash->decode($id);
    }

    public static function formatDob($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public static function formatDate($date, $format = 'd/m/Y')
    {
        return Carbon::parse($date)->format($format);
    }

    public static function addOne($reg, $v)
    {
        if ($v == trim('student_exists')) {
            //            $this->remark = "Student is already exists enrolled to a programme";
            //            return $this->remark;
        }
    }

    public static function getStudentStatus($s)
    {
        if ($s == 0) {
            return 'No';
        } elseif ($s == 1) {
            return 'Yes';
        } else {
            return 'Partial';
        }
    }

    public static function formatMoney($number, $currency = '')
    {
        $decimals = '2';
        $ts = ',';
        $ds = '.';
        return $currency . number_format($number, $decimals, $ds, $ts);
    }

    public static function formatNumber($number, $decimals = null)
    {
        if (!$decimals) {
            $decimals = 2;
        }
        $ts = ',';
        $ds = '.';
        return number_format($number, $decimals, $ds, $ts);
    }

    public static function fld($l_date)
    {
        if ($l_date) {
            return Carbon::parse($l_date)->format('Y-m-d H:i:s');
        } else {
            return Carbon::now()->toDateTimeString();
        }
    }

    public static function year_level($year,$study_level)
    {
        
        if ($year == 1 && $study_level == 2) {
            return 'Form ' . ' V';
        } elseif ($year == 2 && $study_level == 2) {
            return 'Form' . ' VI';
        } elseif ($year == 1 ) {
            return 'Form ' . ' I';
        } elseif ($year == 2) {
            return 'Form ' . ' II';
        } elseif ($year == 3) {
            return 'Form ' . ' III';
        }elseif ($year == 4) {
            return 'Form ' . ' IV';
        }
    }

    public static function school_name($school)
    {
        $school = Campus::where('id',$school)->first()->campus_name;

        return $school;
    }

    public static function year($year_id)
    {
        $year = AcademicYear::where('id',$year_id)->first()->year;

        return $year;
    }


    public static function program_type($type)
    {
        switch ($type) {
            case '1':
                return 'ORDINARY LEVEL';
                break;
            case '2':
                return 'ADVANCED LEVEL';
                break;
            default:
                return 'LEVEL';
        }
    }

    public static function course_option($option)
    {
        switch ($option) {
            case 1:
                return 'Core';
                break;
            case 0:
                return 'Elective';
                break;
            default:
                return 'Undefined';
        }
    }

    public static function registration_status($reg_status)
    {
        switch ($reg_status) {
            case 1:
                return 'Registered';
                break;

            case 0:
                return 'Un-Registered';
                break;
            default:
                return 'Undefined';
        }
    }

    public static function gradeArrayValue()
    {
        $array = [
            'A' => 1,
            'B+' => 2,
            'B' => 3,
            'C' => 4,
            'D' => 5,
            'E' => 6,
            'F' => 8,
        ];
        return $array;
    }

    public static function registeredCourses($semester, $program_id, $user_id, $reg_no, $year_id)
    {
        $registered_courses = DB::table('students AS std')
            //->academicYear()
            ->where('user_id', '=', $user_id)
            // ->where('std.year_id', '=', $year_id)
            ->join('programs AS p', function ($join) use ($program_id, $year_id) {
                $join->on('std.program_id', '=', 'p.id');
                $join->where('p.id', '=', $program_id);
                //$join->where('p.year_id', '=', $year_id);
            })
            ->join('course_program AS cp', function ($join) use ($program_id, $semester, $year_id) {
                $join->on('cp.program_id', '=', 'std.program_id');
                $join->on('cp.program_id', '=', 'p.id');
                $join->where('cp.program_id', '=', $program_id);
                $join->where('cp.semester', '=', $semester);
                //  $join->where('cp.year_id', '=', $year_id);
            })
            ->join('courses AS c', function ($join) use ($year_id) {
                $join->on('cp.course_id', '=', 'c.id');
                //$join->on('std.year_id', '=', 'c.year_id');
                //$join->where('c.year_id', '=', $year_id);
            })
            ->join('course_student AS cs', function ($join) use ($reg_no, $year_id) {
                $join->on('cs.course_id', '=', 'cp.course_id');
                $join->where('cs.year_id', '=', $year_id);

                $join->where('cs.reg_no', '=', $reg_no);
            })
            ->select('*', 'cs.id as cs_id')
            ->get();
        //dd($registered_courses);
        return $registered_courses;
    }

    public static function checkIFStudentRegisteredForTheCourse($reg_no, $course)
    {
        //($reg_no, $course, $year_id)
        // return CourseStudent::where(['reg_no' => $reg_no, 'course_id' => $course->id, 'year_id' => $year_id])->first();
        return CourseStudent::where(['reg_no' => $reg_no, 'course_id' => $course->id])->first();
    }

    public static function ExamLookUpTableUpdate($reg_no, $year_of_study, $course, $year_id, $sit, $total_score, $remark)
    {
        $where = [
            'reg_no' => $reg_no,
            'year_id' => $year_id,
            'course_id' => $course->id,
            'sit' => $sit,
        ];
        $data = [
            'course_code' => $course->course_code,
            'year_of_study' => $year_of_study,
            'score' => $total_score,
            'remark' => $remark,
        ];
        ExamLookup::updareOrCreate($where, $data);
    }

    public static function blockedstudents() {}


    public static function updateCourseResults($reg_no, $avgScore, $course_status, $examCategory, $course, $semester, $year_id, $year_of_study)
    {

        $points = 0;
        $examCategory = ExamCategory::where(['id' => $examCategory])->first();

        $total = SRS::examCategoryResultTotalScore($reg_no, $avgScore, $course_status, $examCategory->code, $course, $year_id, $semester);
        // $grade = SRS::checkGrade($course,$total);
        $grade = SRS::findGrade($course, $total['total']);
        //dd($grade);
        //  if ($grade->point_decimal_place==1) {
        //     $points = SRS::calculateRawMarksPoint($grade->left_value,$grade->operator,$grade->right_value,$grade->point_decimal_place);
        // }else{
        //     $points = $grade->grade_point;

        //  }

        $points = $grade->grade_point;

        //             $array = [
        //                 'A'=>1,
        //                 'B+'=>2,
        //                 'B'=>3,
        //                 'C'=>4,
        //                 'D'=>5,
        //                 'E'=>6,
        //                 'F'=>8,
        //               ];
        $array = SRS::gradeArrayValue();

        //dd($array[$grade->grade],$array[$course->pass_grade]);
        if ($array[$grade->grade] > $array[$course->pass_grade]) {
            $remark = 'SUPP';
        } else {
            $remark = 'PASS';
        }

        $where = [
            'reg_no' => $reg_no,
            'year_id' => $year_id,
            'semester_id' => $semester->id,
            'course_id' => $course->id,
        ];

        $result = [
            'credits' => (float) $course->unit,
            'ca_score' => $total['total_ca'],
            'se_score' => $total['total_se'],
            'total_score' => $total['total'],
            'grade' => $grade->grade,
            'points' => $points * (float) $course->unit,
            'gpa' => ($points * (float) $course->unit) / (($course->unit ?: 1)),
            'remarks' => $remark,
            'uploadedby' => FacadesAuth::user()->username,
            'year_of_study' => $year_of_study,
        ];

        // dd($result);
        // exit;

        $course = CourseResult::updateOrCreate($where, $result);

        return $course;
    }

    public static function updateSemesterResultsTable($reg_no, $semester, $year_id, $course, $year_of_study)
    {
        $total_credits = 0;
        $total_points = 0;
        $total_grade_points = 0;
        $gpa = 0;
        $remark = '';

        $where = [
            'reg_no' => $reg_no,
            'year_id' => $year_id,
            'semester_id' => $semester,
        ];

        $results = CourseResult::where($where)->get();
        //dd($results);
        foreach ($results as $result) {
            $total_credits += $result->credits;
            $total_points += $result->points;
            $total_grade_points += $result->points;
        }

        $gpa = SRS::findGPA($total_grade_points, $total_credits);
        $class = SRS::findGPAClass($course, $gpa);
        //  dump($gpa,$class);
        if ($gpa >= 2.0) {
            $remark = 'Pass';
        } else {
            $remark = 'Failure';
        }

        ///chek gpa for pass and classification according to settings
        /// /// chek for carry and supplementary to update lookup exams

        $data = [
            'total_credits' => $total_credits,
            'total_points' => $total_grade_points,
            'gpa' => $gpa,
            'remarks' => $remark,
            'classification' => $class->class_award,
            'uploadedby' => FacadesAuth::user()->username,
            'year_of_study' => $year_of_study,
        ];

        $semester_results = SemesterResult::updateOrCreate($where, $data);

        return $semester_results;
    }

    public static function updateAnnualResultsTable($reg_no, $year_id, $course, $year_of_study)
    {
        $total_credits = 0;
        $total_grade_points = 0;
        $gpa = 0;
        $total_gpa = 0;
        $where = [
            'reg_no' => $reg_no,
            'year_id' => $year_id,
        ];

        $results = SemesterResult::where($where)->get();
        //dd($results);
        foreach ($results as $result) {
            $total_credits += $result->total_credits;
            $total_grade_points += $result->total_points;
        }
        $gpa = $total_grade_points / $total_credits;

        $class = SRS::findGPAClass($course, $gpa);
        //  dump($gpa,$class);
        if ($gpa >= 2.0) {
            //check frm gpa setting for minimum gpa pass
            $remark = 'Pass';
        } else {
            $remark = 'Failure';
        }

        $data = [
            'total_credits' => $total_credits,
            'total_points' => $total_grade_points,
            'gpa' => $gpa,
            'remarks' => $remark,
            'classification' => $class->class_award,
            'uploadedby' => FacadesAuth::user()->username,
            'year_of_study' => $year_of_study,
        ];

        //dd($data);
        $annual_results = AnnualResult::updateOrCreate($where, $data);

        return $annual_results;
    }
    public static function updateAnnualResultsSummary($course_id, $semester, $year_id, $pass_grade, $year_of_study)
    {
        $passCollection = new Collection();
        $failCollection = new Collection();
        $getcourse = CourseProgram::where('course_id', $course_id)->get();
        $results = SemesterResultSummary::where('program_id', $getcourse->first()->program_id)
            ->where('year_id', $getcourse->first()->year_id)
            ->select(
                DB::raw('SUM(total_male_pass) as totalmale_pass,SUM(total_male_fail) as totalmale_fail,
               SUM(total_female_pass) as totalfemale_pass,SUM(total_female_fail) as totalfemale_fail,
                 SUM(total_pass) as total_pass,SUM(total_fail) as total_fail,SUM(grand_total) as grand_total'),
            )
            ->groupBy('year_id')
            ->get();

        if ($results->first()) {
            $wheredata = [
                'program_id' => $getcourse->first()->program_id,
                'year_id' => $getcourse->first()->year_id,
            ];

            $data = ['total_male_pass' => $results->first()->totalmale_pass, 'total_male_fail' => $results->first()->totalmale_fail, 'total_female_pass' => $results->first()->totalfemale_pass, 'total_female_fail' => $results->first()->totalfemale_fail, 'total_pass' => $results->first()->total_pass, 'grand_total' => $results->first()->grand_total, 'total_fail' => $results->first()->total_fail, 'year_of_study' => $year_of_study];

            return AnnualResultSummary::updateOrCreate($wheredata, $data);
        } else {
            return back()->with("message", "Academic year doesn't correspond to any Of the Annual semester Result");
        }
    }

    public static function updateTranscriptsTable($reg_no, $year_id, $course, $year_of_study)
    {
        $total_credits = 0;
        $total_grade_points = 0;
        $gpa = 0;
        $total_gpa = 0;
        $where = [
            'reg_no' => $reg_no,
            //  'year_id' => $year_id,
        ];

        //   $results = SemesterResult::where($where)->get();
        $results = AnnualResult::where($where)->get();

        foreach ($results as $result) {
            $total_credits += $result->total_credits;
            $total_grade_points += $result->total_points;
        }
        $gpa = $total_grade_points / $total_credits;

        //dd($gpa);

        $class = SRS::findGPAClass($course, $gpa);
        //  dump($gpa,$class);
        if ($gpa >= 2.0) {
            //check frm gpa setting for minimum gpa pass
            $remark = 'Pass';
        } else {
            $remark = 'Failure';
        }

        $data = [
            'total_credits' => $total_credits,
            'total_points' => $total_grade_points,
            'gpa' => $gpa,
            'remarks' => $remark,
            'classification' => $class->class_award,
            'year_of_study' => $year_of_study,
        ];
        //dd($data,$where);
        $transcript_results = Transcript::updateOrCreate($where, $data);

        return $transcript_results;
    }

    public static function updateCourseResultSummary($course_id, $pass_grade, $semester, $year_id)
    {
        $passCollection = new Collection();
        $failCollection = new Collection();

        $where = [
            'course_id' => $course_id,
            'year_id' => $year_id,
            'semester_id' => $semester,
        ];
        $results = CourseResult::where($where)->get();
        //filter by batch WhereHas
        $array = SRS::gradeArrayValue();
        foreach ($results as $result) {
            // dump($result);
            if ($array[$result->grade] > $array[$pass_grade]) {
                $failCollection->push($result->student->user);
            } else {
                $passCollection->push($result->student->user);
            }
        }

        // dd($passCollection,$failCollection);

        $passByGender = $passCollection->groupBy('gender')->map(function ($items) {
            return count($items);
        });
        $failByGender = $failCollection->groupBy('gender')->map(function ($items) {
            return count($items);
        });

        $total_male_pass = $passByGender['M'] ?? 0;
        $total_male_fail = $failByGender['M'] ?? 0;

        $total_female_pass = $passByGender['F'] ?? 0;
        $total_female_fail = $failByGender['F'] ?? 0;

        $total_pass = $total_male_pass + $total_female_pass;
        $total_fail = $total_male_fail + $total_female_fail;
        $grand_total = $total_pass + $total_fail;

        // dd($total_male_pass,$total_male_fail,$total_female_pass,$total_female_fail, $total_pass,$total_fail,$grand_total );

        //collect gender
        $malegender = CourseResult::join('users', 'users.username', '=', 'course_results.reg_no')
            ->where('gender', 'M')
            ->where('course_results.course_id', $course_id)
            ->where('course_results.year_id', $year_id)
            ->where('course_results.semester_id', $semester)
            ->get();
        $femalegender = CourseResult::join('users', 'users.username', '=', 'course_results.reg_no')
            ->where('gender', 'F')
            ->where('course_results.course_id', $course_id)
            ->where('course_results.year_id', $year_id)
            ->where('course_results.semester_id', $semester)
            ->get();
        //count male based on grade
        $totalgradeAmale = $malegender->where('grade', 'A')->count();
        $totalgradeBplusmale = $malegender->where('grade', 'B+')->count();
        $totalgradeBmale = $malegender->where('grade', 'B')->count();
        $totalgradeCmale = $malegender->where('grade', 'C')->count();
        $totalgradeDmale = $malegender->where('grade', 'D')->count();
        $totalgradeFmale = $malegender->where('grade', 'F')->count();
        //count female based on grade
        $totalgradeAfemale = $femalegender->where('grade', 'A')->count();
        $totalgradeBplusfemale = $femalegender->where('grade', 'B+')->count();
        $totalgradeBfemale = $femalegender->where('grade', 'B')->count();
        $totalgradeCfemale = $femalegender->where('grade', 'C')->count();
        $totalgradeDfemale = $femalegender->where('grade', 'D')->count();
        $totalgradeFfemale = $femalegender->where('grade', 'F')->count();
        //ge total based on grade
        $totalA = $totalgradeAmale + $totalgradeAfemale;
        $totalBplus = $totalgradeBplusmale + $totalgradeBplusfemale;
        $totalB = $totalgradeBmale + $totalgradeBfemale;
        $totalC = $totalgradeCmale + $totalgradeCfemale;
        $totalD = $totalgradeDmale + $totalgradeDfemale;
        $totalF = $totalgradeFmale + $totalgradeFfemale;

        //get ABSC
        $getcoursestudent = CourseStudent::select('reg_no')
            ->where('course_id', $course_id)
            ->get();
        $getcourseresultstudent = CourseResult::select('reg_no')
            ->where('course_id', $course_id)
            ->get();
        $getcollectioncoursestudent = collect($getcoursestudent->pluck('reg_no'));
        $collectedDiff = $getcollectioncoursestudent->diff($getcourseresultstudent->pluck('reg_no'));
        $countstudents = $getcoursestudent->count();
        //get total gender
        $gettotalgender = User::whereIn('username', $getcoursestudent->pluck('reg_no'))->get();
        $gettotalfemale = $gettotalgender->where('gender', 'F')->count();
        $gettotalmale = $gettotalgender->where('gender', 'M')->count();
        $getcoursegender = User::whereIn('username', $collectedDiff)->get();
        $gettotalabsc = $getcoursegender->count();
        $getmaleabsc = $getcoursegender->where('gender', 'M')->count();
        $getfemaleabsc = $getcoursegender->where('gender', 'F')->count();

        $data = [
            'total_male_pass' => $total_male_pass,
            'total_male_fail' => $total_male_fail,
            'total_female_pass' => $total_female_pass,
            'total_female_fail' => $total_female_fail,
            'total_pass' => $total_pass,
            'total_fail' => $total_fail,
            'grand_total' => $grand_total,
            'total_A_male' => $totalgradeAmale,
            'total_A_female' => $totalgradeAfemale,
            'total_A' => $totalA,
            'total_B_plus_male' => $totalgradeBplusmale,
            'total_B_plus_female' => $totalgradeBplusfemale,
            'total_B_plus' => $totalBplus,
            'total_B_male' => $totalgradeBmale,
            'total_B_female' => $totalgradeBfemale,
            'total_B' => $totalB,
            'total_C_male' => $totalgradeCmale,
            'total_C_female' => $totalgradeCfemale,
            'total_C' => $totalC,
            'total_D_male' => $totalgradeDmale,
            'total_D_female' => $totalgradeDfemale,
            'total_D' => $totalD,
            'total_F_male' => $totalgradeFmale,
            'total_F_female' => $totalgradeFfemale,
            'total_F' => $totalF,
            'total_ABSC_male' => $getmaleabsc,
            'total_ABSC_female' => $getfemaleabsc,
            'total_ABSC' => $gettotalabsc,
            'totalstudentcourse' => $countstudents,
            'totalstudentcoursefemale' => $gettotalfemale,
            'totalstudentcoursemale' => $gettotalmale,
            'totalgradeApercent' => ($totalA / $countstudents) * 100,
            'totalgradeBpluspercent' => ($totalBplus / $countstudents) * 100,
            'totalgradeBpercent' => ($totalB / $countstudents) * 100,
            'totalgradeCpercent' => ($totalC / $countstudents) * 100,
            'totalgradeDpercent' => ($totalD / $countstudents) * 100,
            'totalgradeFpercent' => ($totalD / $countstudents) * 100,
            'totalgradeABSCpercent' => ($gettotalabsc / $countstudents) * 100,
        ];
        // dd($gettotalgender);

        return CourseResultSummary::updateOrCreate($where, $data);
    }

    public static function updateSemesterResultSummary($course_id, $semester, $year_id, $pass_grade, $year_of_study)
    {
        $passCollection = new Collection();
        $failCollection = new Collection();
        $getcourse = CourseProgram::where('course_id', $course_id)->get();

        $where = [
            'course_id' => $course_id,
            'year_id' => $year_id,
            'semester_id' => $semester,
        ];
        $results = CourseResult::where($where)->get();
        //filter by batch WhereHas
        $array = SRS::gradeArrayValue();
        foreach ($results as $result) {
            // dump($result);
            if ($array[$result->grade] > $array[$pass_grade]) {
                $failCollection->push($result->student->user);
            } else {
                $passCollection->push($result->student->user);
            }
        }
        //    var_dump($result);
        //    exit;

        // dd($passCollection,$failCollection);

        $passByGender = $passCollection->groupBy('gender')->map(function ($items) {
            return count($items);
        });
        $failByGender = $failCollection->groupBy('gender')->map(function ($items) {
            return count($items);
        });

        $total_male_pass = $passByGender['M'] ?? 0;
        $total_male_fail = $failByGender['M'] ?? 0;

        $total_female_pass = $passByGender['F'] ?? 0;
        $total_female_fail = $failByGender['F'] ?? 0;

        $total_pass = $total_male_pass + $total_female_pass;
        $total_fail = $total_male_fail + $total_female_fail;
        $grand_total = $total_pass + $total_fail;

        // dd($total_male_pass,$total_male_fail,$total_female_pass,$total_female_fail, $total_pass,$total_fail,$grand_total );

        $data = [
            'total_male_pass' => $total_male_pass,
            'total_male_fail' => $total_male_fail,
            'total_female_pass' => $total_female_pass,
            'total_female_fail' => $total_female_fail,
            'total_pass' => $total_pass,
            'total_fail' => $total_fail,
            'grand_total' => $grand_total,
            'program_id' => $getcourse->first()->program_id,
            'year_of_study' => $year_of_study,
        ];
        $where2 = [
            //'course_id'  => $course_id,
            'year_id' => $year_id,
            'semester_id' => $semester,
        ];

        return SemesterResultSummary::updateOrCreate($where2, $data);
    }

    public static function findGPA($total_grade_point, $total_credits)
    {
        return substr($total_grade_point / $total_credits, 0, 3);
    }

    // public static function calculateRawMarksPoint($leftValue, $op, $rightValue, $rawMaks)
    // {
    //     switch ($op) {
    //         case '+':
    //             return $leftValue * $rawMaks + $rightValue;
    //             break;
    //         case '-':
    //             return $leftValue * $rawMaks - $rightValue;
    //             break;
    //         default:
    //             return null;
    //     }

    // }

    public static function examCategoryResultTotalScore($reg_no, $avgScore, $course_status, $examCategoryCode, $course, $year_id, $semester)
    {

        $total_ca = 0;
        $total_se = 0;
        $where = [
            'reg_no' => $reg_no,
            'year_id' => $year_id,
            'semester_id' => $semester->id,
            'course_id' => $course->id
        ];
    
        if ($course_status == 0) {
            if ($examCategoryCode == 'ASSGM I' || $examCategoryCode == 'ASSGM II' || $examCategoryCode == 'WR I' || $examCategoryCode == 'WR II') {
                $total_ca = $avgScore;
            } elseif ($examCategoryCode == 'WR') {
                $total_ca = CourseResult::where($where)->first()->ca_score;
               
                $total_se = $avgScore;
            }

        }else{
            if ($examCategoryCode == 'ASSGM I' || $examCategoryCode == 'ASSGM II' || 
                $examCategoryCode == 'WR I' || $examCategoryCode == 'WR II' || 
                $examCategoryCode == 'OSPE CA') {
                $total_ca = $avgScore;
            } elseif ($examCategoryCode == 'WR' || $examCategoryCode == 'OSPE SE') {
                $total_ca = CourseResult::where($where)->first()->ca_score;
               
                $total_se = $avgScore;
            }
        }
        
        $total = (float) $total_ca + (float) $total_se;

        //  return $total;
        return  [
            'total_ca' => (float) $total_ca,
            'total_se' => (float) $total_se,
            'total' => (float) $total,
        ];
        
    }

    public static function findGrade($course, $total)
    {
        $grade = null;
        $stdId = $course->first()->study_level_id;
        // $coursegrade = Grade::where('study_level_id',$stdId)->get();
        // dd($coursegrade);
        foreach ($course->grades as $g) {
            // dd(round($total));
            if (floor($total) <= $g->high_value && floor($total) >= $g->low_value) {
                $grade = $g;
            }
        }
        return $grade;
    }

    public static function findGPAClass($course, $gpa)
    {
        $class = null;
        foreach ($course->study_level->gpaClassification as $class) {
            if ($gpa <= (float) $class->high_gpa && $gpa >= (float) $class->low_gpa) {
                return $class;
            }
        }
        //    dd($class);
        //     exit;
        return $class;
    }

    public static function CourseworkStatus($course, $score)
    {
        if ($score >= $course->min_cw) {
            return 'Pass';
        } else {
            return 'Fail';
        }
    }

    public static function getCoursePracticalStatus($course_id)
    {
        $course = Course::find($course_id);
        if ($course->course_status == 0) 
        return 'No Practical'; 
    else 
    echo "<span class='badge badge-pill badge-success'>Has Practical</span>";
    }

    public static function getTotalStudentwithResult($course_id)
    {
       // Count the number of registrations for the provided course_id
        $studentResultCount = CourseResult::where('course_id', $course_id)->count();
        if ($studentResultCount == 0) {
            return 0;
        }
        return $studentResultCount;
    }

    public static function SemesterExamStatus($course, $score)
    {
        //check for   sup/carry
        if ($score >= $course->min_ue) {
            return 'Pass';
        } else {
            return 'Fail';
        }
    }

    public static function coursework($year_id, $semester, $reg_no = null)
    {
        //$yos variable has been removed from the parameter list in coursework function
        if (is_null($reg_no)) {
            $reg_no = Auth::user()->student->reg_no;
        }

        $records = CourseResult::where([
            'reg_no' => $reg_no,
            'year_id' => $year_id,
            'semester_id' => $semester,
        ])->where('ca_score', '>', 0)->with('course')->get();
        
        return $records;
    }
    public static function coursework1($year_id, $yos, $semester, $reg_no = null)
    {
        //$yos variable has been removed from the parameter list in coursework function
        if (is_null($reg_no)) {
            $reg_no = Auth::user()->student->reg_no;
        }

        $records = ExamCategoryResult::where([
            'reg_no' => $reg_no,
            'year_id' => $year_id,
            'semester_id' => $semester,
            'year_of_study' => $yos,
        ])
            ->whereHas('examCategory', function ($q) {
                $q->where('exam_categories.type', '=', 'CA');
            })
            ->get();

        // $records= ExamCategoryResult::join('exam_scores','exam_scores.reg_no','=','exam_category_results.reg_no')
        // ->where(['exam_scores.reg_no'=>$reg_no,
        //          'exam_scores.year_id'=>$year_id,
        //          'exam_scores.semester_id'=>$semester,
        //          'exam_scores.exam_category_id'=>1
        //    ])->where(['exam_category_results.reg_no'=>$reg_no,
        //              'exam_category_results.year_id'=>$year_id,
        //              'exam_category_results.semester_id'=>$semester

        //      ])
        //    ->whereHas('examCategory', function ($q) {
        //     $q->where('exam_categories.type','=','CA');
        // })->with('examCategory')->get();

        return $records;
    }

    // public static function ExamScore($year_id,$semester,$reg_no=null){
    //     if(is_null($reg_no)){
    //         $reg_no =Auth::user()->student->reg_no;
    //     }

    //     $records= ExamScore::where([
    //         'reg_no'=>$reg_no,
    //         'year_id'=>$year_id,
    //         'semester_id' =>$semester
    //     ])->whereHas('examCategory', function ($q) {
    //         $q->where('exam_categories.type','=','ASS1');

    //     })->get();
    //     return $records;
    // }

    public static function courseResult2($year_id, $year_of_study, $semester, $reg_no = null)
    {
        if (is_null($reg_no)) {
            $reg_no = Auth::user()->student->reg_no;
        }
        $total_ca = 0;
        $total_se = 0;
        $record_data = new Collection();
        $records = ExamCategoryResult::where([
            'reg_no' => $reg_no,
            'year_id' => $year_id,
            'semester_id' => $semester,
        ])->get();
        foreach ($records as $record) {
            if ($record->examCategory->type == 'CA') {
                $total_ca += $record->exam_score;
            } else {
                $total_se = $record->exam_score;
            }
            $data[] = [
                'ca' => $total_ca,
                'se' => $total_se,
                'total' => $total_ca + $total_se,
                'record' => $record,
            ];
        }
        return $data;
    }

    public static function courseResult($year_id, $year_of_study, $semester, $reg_no = null)
    {
        if (is_null($reg_no)) {
            $reg_no = Auth::user()->student->reg_no;
        }

        // $records= CourseResult::where([
        //     'reg_no'=>$reg_no,
        //     'year_of_study'=>$year_id,
        //     'semester_id' =>$semester
        // ])
        //->addSelect(['cw'=>ExamCategoryResult::select('exam_score')->whereColumn('course_id','course_results.course_id')])
        // ->get();
        // dd($year_id);

        $records = CourseResult::join('semester_results', 'semester_results.reg_no', '=', 'course_results.reg_no')
            ->where('course_results.reg_no', $reg_no)
            ->where('course_results.year_of_study', $year_of_study)
            ->where('course_results.year_id', $year_id)
            ->where('course_results.semester_id', $semester)
            ->where('semester_results.semester_id', $semester)
            ->where('semester_results.year_of_study', $year_of_study)
            ->where('semester_results.year_id', $year_id)

            ->get();

        return $records;
        //dd($records);
    }

    public static function yearofstudy($regno)
    {
        return CourseResult::select('year_id', 'year_of_study')
            ->distinct('year_id')
            ->where('reg_no', $regno)
            ->get();
    }

    public static function checkPublish($intake, $program, $campus, $semester, $year)
    {
        return PublishExam::where('program_id', $program)
            ->where('year_id', $year)
            ->where('campus_id', $campus)
            ->where('semester_id', $semester)
            ->where('intake_category_id', $intake)
            ->first();
    }

    public static function studentPaymentOutstanding($reg_no)
    {
        $client = new Client();
        // $request = $client->post('http://api.udom.ac.tz/public/api/sr/getStudentOutstandingPayment',['query'=>['reg_no'=>$reg_no]]);
        $myBody['reg_no'] = $reg_no;
        try {
            $request = $client->post('http://api.irdp.ac.tz/public/api/sr/getStudentOutstandingPayment', ['form_params' => $myBody]);
            $array = json_decode($request->getBody()->getContents(), true); // :'(
        } catch (\Exception $e) {
            $array = false;
        }
        return $array;
    }

    public static function studentControlNumber($reg_no)
    {
        $client = new Client();

        $myBody['reg_no'] = $reg_no;

        try {
            $request = $client->post('http://api.irdp.ac.tz/public/api/gepg/getbill', ['form_params' => $myBody]);
            $array = json_decode($request->getBody()->getContents(), true); // :'(
        } catch (\Exception $e) {
            $array = false;
        }
        return $array;
    }

    public static function getApplicantDetails($form4_index, $operation)
    {
        $fields_array = [];
        $field_array = [];
        $record_array = [];
        $applicant = ApplicantDetails::where(['index_number' => $form4_index, 'operation' => $operation])->get();
        foreach ($applicant as $std) {
            $fields_array = explode(';', $std->request_data);
            foreach ($fields_array as $key => $field) {
                $field_array = explode(':', $field);
                $record_array[$field_array[0]] = $field_array[1];
            }
        }
        return $record_array;
    }

    public static function insertStudentDetails()
    {
        $applicants = ApplicantDetails::all();
        foreach ($applicants as $std) {
            $basic = Srs::getApplicantDetails($std->index_number, 'BASIC');

            $next_of_kins = Srs::getApplicantDetails($std->index_number, 'NEXTOFKIN');

            $results = Srs::getApplicantDetails($std->index_number, 'RESULTS');
            $referees = Srs::getApplicantDetails($std->index_number, 'REFEREE');
            $attachments = Srs::getApplicantDetails($std->index_number, 'ATTACHMENT');
        }
    }

    public static function check_course_semester($course_id)
    {
        // dd(Auth::user());
        $data = DB::table('programs as p')
            // ->where('p.year_id', '=', Auth::user()->staff->year_id)
            //            ->join('departments as d', function ($join) {
            //                $join->on('d.id', '=', 'p.department_id');
            //            })
            ->join('courses as c', function ($join) {
                // $join->on('c.year_id', '=', 'p.year_id');
                // $join->where('c.year_id', '=', Auth::user()->staff->year_id);
            })
            ->join('course_program as cp', function ($join) {
                $join->on('cp.course_id', '=', 'c.id');
                $join->on('cp.program_id', '=', 'p.id');
                $join->where('cp.year_id', '=', Auth::user()->staff->year_id);
            })
            ->where('c.id', '=', $course_id)
            ->select('cp.semester')
            ->groupBy('c.id')
            ->get();
        $semester = '';
        if (count($data) > 0) {
            foreach ($data as $datas) {
                $semester = $datas->semester;
            }
        }
        return $semester;
    }

    public static function getParticipantProgrammes($id)
    {
        $programs = DB::table('programs as p')
            ->join('course_program as cp', function ($join) use ($id) {
                $join->on('p.id', '=', 'cp.program_id');
                $join->where('cp.course_id', '=', $id);
                //$join->where('cp.year_id', '=', Auth::user()->staff->year_id);
            })
            ->get();

        foreach ($programs as $item) {
            echo "<span class='badge badge-pill badge-success'>" . $item->program_name . '</span>';
            echo ' ';
        }
    }

    public static function checkResultStatus()
    {
        //dd(Auth::user());
        $year_id = null;
        $campus_id = null;
        $user = '';
        if (Auth::user()->type === '0') {
            $year_id = Auth::user()->studentYear->year_id;
            $user = DB::table('students')
                ->join('users', 'users.id', '=', 'students.user_id')
                ->where('users.id', '=', Auth::user()->id)
                ->first();
        } elseif (Auth::user()->type === '1') {
            $year_id = Auth::user()->staff->year_id;
            $user = DB::table('staffs')
                ->join('users', 'users.id', '=', 'staffs.user_id')
                ->where('users.id', '=', Auth::user()->id)
                ->first();
        }

        if (!is_null($user->campus_id)) {
            $campus_id = $user->campus_id;
        }
        $check_status = DB::table('faculty_settings')
            ->join('faculties', 'faculties.id', '=', 'faculty_settings.faculty_id')
            ->join('academic_years', 'academic_years.id', '=', 'faculty_settings.year_id')
            ->where('faculty_settings.year_id', '=', $year_id)
            ->where(function ($query) use ($campus_id) {
                $query->where('faculties.id', '=', $campus_id);
            })
            ->get();

        //        dd($check_status);
        return $check_status;
    }

    public static function toggleUploadStatus(Request $request, $semester, $year_id, $status)
    {
        $input = $request->all();
        try {
            $campus_id = SRS::decode($input['campus_id'])[0];
            $intake_id = SRS::decode($input['intake_category_id'])[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $where = [
            'campus_id' => $campus_id,
            'intake_category_id' => $intake_id,
            'year_id' => $year_id,
            'semester_id' => $semester,
        ];
        $data = [
            'status' => $status,
        ];
        UploadLimit::updateOrCreate($where, $data);
    }

    public static function checkUploadStatus($campus, $intake, $semester, $status, $year_id)
    {
        return UploadLimit::where([
            'campus_id' => $campus,
            'intake_category_id' => $intake,
            'semester_id' => $semester,
            'status' => $status,
            'year_id' => $year_id,
        ])->first();
    }

    public static function togglePublishExamStatus(Request $request, $semester, $year_id, $status)
    {
        $input = $request->all();
        try {
            $campus_id = SRS::decode($input['campus_id'])[0];
            $intake_id = SRS::decode($input['intake_category_id'])[0];
            $program_id = SRS::decode($input['program_id'])[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $where = [
            'campus_id' => $campus_id,
            'intake_category_id' => $intake_id,
            'year_id' => $year_id,
            'semester_id' => $semester,
            'program_id' => $program_id,
        ];
        $data = [
            'status' => $status,
            'program_code' => $input['program_code'],
        ];
        // dd($data,$where);
        PublishExam::updateOrCreate($where, $data);
    }

    public static function checkPublishedExamStatus($campus, $intake, $program, $semester, $year_id, $status)
    {
        return PublishExam::where([
            'campus_id' => $campus,
            'intake_category_id' => $intake,
            'program_id' => $program,
            'semester_id' => $semester,
            'status' => $status,
            'year_id' => $year_id,
        ])->first();
    }

    public static function toggleCourseRegistrationStatus(Request $request, $semester, $year_id, $status)
    {
        $input = $request->all();
        try {
            $campus_id = SRS::decode($input['campus_id'])[0];
            $intake_id = SRS::decode($input['intake_category_id'])[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $where = [
            'campus_id' => $campus_id,
            'intake_category_id' => $intake_id,
            'year_id' => $year_id,
            'semester_id' => $semester,
        ];
        $data = [
            'status' => $status,
        ];
        LimitCourseRegistration::updateOrCreate($where, $data);
    }

    public static function checkCourseRegistrationStatus($campus, $intake, $semester, $status)
    {
        return LimitCourseRegistration::where([
            'campus_id' => $campus,
            'intake_category_id' => $intake,
            'semester_id' => $semester,
            'status' => $status,
        ])->first();
    }

    public static function academicyear()
    {
        $year_id = AcademicYear::Active()
            ->select('id')
            ->get();
        return $year_id;
    }

    public static function getYearOfStudy($reg_no, $year_id)
    {
        $year_of_study = StudentClass::select('year_of_study')
            ->where('reg_no', $reg_no)->first();
        // ->where('class_year', $year_id)


        // $year_of_study = StudentClass::select('year_of_study')->where('reg_no',$reg_no)
        //                      ->where('class_year',$year_id)->get();

        // return  $year_of_study->first()->year_of_study;
        return $year_of_study->year_of_study;
    }

    public static function getacyear($reg_no, $yos)
    {
        $years = AnnualResult::join('academic_years', 'academic_years.id', '=', 'annual_results.year_id')
            ->where('annual_results.reg_no', $reg_no)
            ->where('annual_results.year_of_study', $yos)
            ->get();

        return $years;
    }

    public static function getNumberOfStudentsObtainGivenGradeForGivenCourse($course_id, $year_id)
    {
        return CourseResultSummary::where('course_id', $course_id)
            ->where('year_id', $year_id)
            ->first();
    }

    public static function getAnnualPercentagePassForGivenCourse($course_id, $year_id)
    {
        $total_pass_check = CourseResultSummary::where('course_id', $course_id)
            ->where('year_id', $year_id)
            ->count();
        $grand_total_check = CourseResultSummary::where('course_id', $course_id)
            ->where('year_id', $year_id)
            ->count();

        if ($total_pass_check > 0 && $grand_total_check > 0) {
            $total_pass = CourseResultSummary::where('course_id', $course_id)
                ->where('year_id', $year_id)
                ->first()->total_pass;
            $total_student_course = CourseResultSummary::where('course_id', $course_id)
                ->where('year_id', $year_id)
                ->first()->totalstudentcourse;
            $percentagePass = round(($total_pass / $total_student_course) * 100, 2);

            return '(' . $percentagePass . '%)';
        } else {
            return '';
        }
    }


    public static function GetStudentAccoountBalance($regno, $ayear = '')
    {
        $debt = DB::table('debtors')
            ->where('reg_no', $regno)
            ->where('year_id', AcademicYear::active()->first()->id)
            ->where('side', 'DR')
            ->get()->sum('amount');


        $credit = DB::table('debtors')
            ->where('reg_no', $regno)
            ->where('year_id', AcademicYear::active()->first()->id)
            ->where('side', 'CR')
            ->get()->sum('amount');

        $debt_back = DB::table('debtors')
            ->where('reg_no', $regno)
            ->where('year_id', '<', AcademicYear::active()->first()->id)
            ->where('side', 'DR')
            ->get()->sum('amount');


        $credit_back = DB::table('debtors')
            ->where('reg_no', $regno)
            ->where('year_id', '<', AcademicYear::active()->first()->id)
            ->where('side', 'CR')
            ->get()->sum('amount');


        $total_current_debt = 0;
        $total_current_credit = 0;
        $total_back_debit = 0;
        $total_back_credit = 0;
        $outstanding_balance = 0;

        if ($debt_back > $credit_back) {
            $total_back_debit = ($debt_back - $credit_back);
        } elseif ($credit_back > $debt_back) {
            $total_back_credit = ($credit_back - $debt_back);
        }
        $total_current_debt = ($debt + $total_back_debit);
        $total_current_credit = ($credit + $total_back_credit);
        $outstanding_balance = ($total_current_debt - $total_current_credit);

        return $total_current_debt . "_" . $total_current_credit . "_" . $outstanding_balance;
    }

    public static function Brought_Forward($regno, $ayear)
    {

        $debt_back = DB::table('debtors')->where('reg_no', $regno)
            ->where('year_id', '<', AcademicYear::active()->first()->id)
            ->where('side', 'DR')->get()->sum('amount');

        $credit_back = DB::table('debtors')->where('reg_no', $regno)
            ->where('year_id', '<', AcademicYear::active()->first()->id)
            ->where('side', 'CR')->get()->sum('amount');

        $brough_forward = ($debt_back - $credit_back);
        return $brough_forward;
    }

    public static function check_fee($fee_name)
    {

        $fee = Invoice::where('type', $fee_name)->first();
        // dd($fee);

        if (!empty($fee)) {
            return 1;
        }
    }

    public static function student_name($reg_no)
    {

        $user = User::where('username', $reg_no)->first();

        $fname = isset($user->first_name) ? $user->first_name : '';
        $lname = isset($user->last_name) ? $user->last_name : '';
        $name = $fname . ' ' . str_replace(',', '', $lname);

        return $name;
    }
}
