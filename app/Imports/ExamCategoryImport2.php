<?php

namespace App\Imports;

use App\Helpers\SRS;
use App\Models\ExamCategoryResult;
use App\Models\ExamScore;
use App\Models\CourseStudent;
use App\Models\Result;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class ExamCategoryImport2 implements ToCollection, WithCalculatedFormulas, WithHeadingRow
{
    use Importable;

    protected $course;
    protected $examCategory;
    protected $year_id;
    protected $semester;
    protected $status;
    public $rejected;
    public $rejected_string;

    public function __construct($course, $examCategory, $year_id, $semester, $status)
    {
        HeadingRowFormatter::extend('custom', function ($value) {
            $values = explode('/', $value);

            return '' . Str::slug($values[0]);
        });
        $this->course = $course;
        $this->examCategory = $examCategory;
        $this->year_id = $year_id;
        $this->semester = $semester;
        $this->status = $status;
        $this->rejected = new Collection();
        $this->rejected_string = '';
    }

    public function collection(Collection $rows)
    {
        
        foreach ($rows as $row) {
            $reg_no = $row['registration-no'];
            $score = $row['score'];
            
            if($score > 100 ) {
                $this->rejected_string .= 'Score out of Range.,';
            
                if (is_null($reg_no)) {
                    $this->rejected_string .= 'The User Has no Registration name.,';
                }
           

                $err = [
                    'registration-no' => $reg_no,
                    'reason' => $this->rejected_string,
                ];

                $this->rejected->push($err);
            }else {
                
                $student = SRS::checkIFStudentRegisteredForTheCourse($reg_no, $this->course);
                $year_of_study = SRS::getYearOfStudy(trim($reg_no), $this->year_id);
                if (!is_null($student)) {
                    $where = [
                        'reg_no' => $reg_no,
                        'year_id' => $this->year_id,
                        'semester_id' => $this->semester->id,
                        'course_id' => $this->course->id,
                        'exam_category_id' => $this->examCategory->id,
                        'year_of_study' => $year_of_study,
                    ];

                    $where2 = [
                        'reg_no' => $reg_no,
                        'year_id' => $this->year_id,
                        'semester_id' => $this->semester->id,
                        'course_id' => $this->course->id,
                        'year_of_study' => $year_of_study,
                    ];
                    
                    DB::beginTransaction();
                    try {

                        //this is how to calculate ca for module with no practical

                        // examCategory->id = 1 //ASSGM I
                        // examCategory->id = 2 //ASSGM II
                        // examCategory->id = 3 //WR I
                        // examCategory->id = 4 //WR II
                        // examCategory->id = 5 //SE
                        $r0 = ExamCategoryResult::updateOrCreate($where, ['exam_score' => $score, 'uploadedby' => Auth::user()->username, 'year_of_study' => $year_of_study]);

                        if($this->status==0){ 
                    
                        if($this->examCategory->id==4)
                        {
                         
                            $assgm1 = ExamCategoryResult::where($where2)->where('exam_category_id', 1)->first();
                            $assgm2 = ExamCategoryResult::where($where2)->where('exam_category_id', 2)->first();
                            $wr1 = ExamCategoryResult::where($where2)->where('exam_category_id', 3)->first();
                            $wr2 = ExamCategoryResult::where($where2)->where('exam_category_id', 4)->first();

                            if (!is_null($assgm1) && !is_null($assgm2) && !is_null($wr1) && !is_null($wr2)) {
                                $avgScore = round( (((($assgm1->exam_score + $assgm2->exam_score) / 2) / 100) * 10) +
                                    (((($wr1->exam_score + $wr2->exam_score) / 2) / 100) * 30),1);                                                           
                             
                                    $r1 = SRS::updateCourseResults($reg_no,$avgScore,$this->status,$this->examCategory->id, $this->course, $this->semester, $this->year_id, $year_of_study);
                                    $r11 = SRS::updateCourseResultSummary($this->course->id, $this->course->pass_grade, $this->semester->id, $this->year_id);
                                    $r2 = SRS::updateSemesterResultsTable($reg_no, $this->semester->id, $this->year_id, $this->course, $year_of_study);
                                    $r22 = SRS::updateSemesterResultSummary($this->course->id, $this->semester->id, $this->year_id, $this->course->pass_grade, $year_of_study);
            
                                    $r3 = SRS::updateAnnualResultsTable($reg_no, $this->year_id, $this->course, $year_of_study);
                                    $r33 = SRS::updateAnnualResultsSummary($this->course->id, $this->semester->id, $this->year_id, $this->course->pass_grade, $year_of_study);
                                    $r4 = SRS::updateTranscriptsTable($reg_no, $this->year_id, $this->course, $year_of_study);
                                }
                        }elseif($this->examCategory->id==5){
                            $wr_score = ExamCategoryResult::where($where2)->where('exam_category_id', 5)->first()->exam_score;
                            if (!is_null($wr_score)) {
                                $avgScore = round((($wr_score / 100) * 60),1);

                                $r1 = SRS::updateCourseResults($reg_no,$avgScore,$this->status,$this->examCategory->id, $this->course, $this->semester, $this->year_id, $year_of_study);
                                $r11 = SRS::updateCourseResultSummary($this->course->id, $this->course->pass_grade, $this->semester->id, $this->year_id);
                                $r2 = SRS::updateSemesterResultsTable($reg_no, $this->semester->id, $this->year_id, $this->course, $year_of_study);
                                $r22 = SRS::updateSemesterResultSummary($this->course->id, $this->semester->id, $this->year_id, $this->course->pass_grade, $year_of_study);
                
                                $r3 = SRS::updateAnnualResultsTable($reg_no, $this->year_id, $this->course, $year_of_study);
                                $r33 = SRS::updateAnnualResultsSummary($this->course->id, $this->semester->id, $this->year_id, $this->course->pass_grade, $year_of_study);
      
                            }
                        }
                    } else { //this is how to calculate ca for module with practical
                    
                        if($this->examCategory->id==6) // OSPE CA
                        {
                            //CA calculation
                            $assgm1 = ExamCategoryResult::where($where2)->where('exam_category_id', 1)->first();
                            $assgm2 = ExamCategoryResult::where($where2)->where('exam_category_id', 2)->first();
                            $wr1 = ExamCategoryResult::where($where2)->where('exam_category_id', 3)->first();
                            $wr2 = ExamCategoryResult::where($where2)->where('exam_category_id', 4)->first();
                            $opseca = ExamCategoryResult::where($where2)->where('exam_category_id', 6)->first();

                            if (!is_null($assgm1) && !is_null($assgm2) && !is_null($wr1) && !is_null($wr2) && !is_null($opseca)) {
                                $avgScore = round( (((($assgm1->exam_score + $assgm2->exam_score) / 2) / 100) * 5) +
                                                   (((($wr1->exam_score + $wr2->exam_score) / 2) / 100) * 15) +
                                                   (($opseca->exam_score / 100) * 20) ,1);                                                           
                             
                                    $r1 = SRS::updateCourseResults($reg_no,$avgScore,$this->status,$this->examCategory->id, $this->course, $this->semester, $this->year_id, $year_of_study);
                                    $r11 = SRS::updateCourseResultSummary($this->course->id, $this->course->pass_grade, $this->semester->id, $this->year_id);
                                    $r2 = SRS::updateSemesterResultsTable($reg_no, $this->semester->id, $this->year_id, $this->course, $year_of_study);
                                    $r22 = SRS::updateSemesterResultSummary($this->course->id, $this->semester->id, $this->year_id, $this->course->pass_grade, $year_of_study);
            
                                    $r3 = SRS::updateAnnualResultsTable($reg_no, $this->year_id, $this->course, $year_of_study);
                                    $r33 = SRS::updateAnnualResultsSummary($this->course->id, $this->semester->id, $this->year_id, $this->course->pass_grade, $year_of_study);
                                    $r4 = SRS::updateTranscriptsTable($reg_no, $this->year_id, $this->course, $year_of_study);
                                }
                        }//end of OSPE CA
                        
                        if($this->examCategory->id==7 ){ //SE
                            //SE calculation
                            $wr_score = ExamCategoryResult::where($where2)->where('exam_category_id', 5)->first();
                            $ospe_se_score = ExamCategoryResult::where($where2)->where('exam_category_id', 7)->first();
                            // dd($wr_score);

                            if (!is_null($wr_score && !is_null($ospe_se_score))) {
                                $avgScore = round(((($wr_score->exam_score + $ospe_se_score->exam_score)/2) / 100 * 60),1);
                                
                                $r1 = SRS::updateCourseResults($reg_no,$avgScore,$this->status,$this->examCategory->id, $this->course, $this->semester, $this->year_id, $year_of_study);
                                $r11 = SRS::updateCourseResultSummary($this->course->id, $this->course->pass_grade, $this->semester->id, $this->year_id);
                                $r2 = SRS::updateSemesterResultsTable($reg_no, $this->semester->id, $this->year_id, $this->course, $year_of_study);
                                $r22 = SRS::updateSemesterResultSummary($this->course->id, $this->semester->id, $this->year_id, $this->course->pass_grade, $year_of_study);
                
                                $r3 = SRS::updateAnnualResultsTable($reg_no, $this->year_id, $this->course, $year_of_study);
                                $r33 = SRS::updateAnnualResultsSummary($this->course->id, $this->semester->id, $this->year_id, $this->course->pass_grade, $year_of_study);
      
                            }
                        }
                        
                    }
                        
                        DB::commit();
                    } catch (\Exception $e) {
                        DB::rollBack();
                        throw $e;
                    }
                } else {
                    $this->rejected->push([
                        'registration-no' => $reg_no,
                        'reason' => 'Not registered for this course',
                    ]);
                }
            }
        }
    }
    public function headingRow(): int
    {
        return 2;
    }
}
