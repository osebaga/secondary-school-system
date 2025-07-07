<?php

namespace App\Imports;

use App\Helpers\SRS;
use App\Models\ExamCategoryResult;
use App\Models\ExamScore;
use App\Models\Result;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

class ExamCategoryImport implements ToCollection,WithCalculatedFormulas,WithHeadingRow
{
use  Importable;

protected $course;
protected $examCategory;
protected $year_id;
protected $semester;
protected $status;
public $rejected ;
public $rejected_string;

public function __construct($course,$examCategory,$year_id,$semester,$status)
{
//dd($course);
   // HeadingRowFormatter::default('none');
    HeadingRowFormatter::extend('custom', function($value) {
          $values =explode('/',$value);

          return "" . Str::slug($values[0]);
    });
    $this->course = $course;
    $this->examCategory=$examCategory;
    $this->year_id=$year_id;
    $this->semester=$semester;
    $this->status=$status;
    $this->rejected = new Collection();
    $this->rejected_string = "";
}

    public function collection(Collection $rows)
    {

      // dd(ExamCategoryResult::all());
         // dd($rows);

//DB::beginTransaction();
//        try {

           
            // $reg_no = "";
            $score = "";     
            $pracscore = '';        
            // $ass1 = 0;
            // $ass2 = 0;
            // $t1 = 0;
            // $t2 = 0;
          //dd($this->status);

          if($this->status  == 0)
          {

            foreach ($rows as $row) {

                if($this->examCategory->id == 2)
                {
                    $reg_no = $row['reg-no'];
                    $score = $row['score'];
                    $ass1 = "";
                    $ass2 = "";
                    $t1 = "";
                    $t2 = "";
                   // dd($reg_no);


                }elseif($this->examCategory->id == 1){ 
               
                $reg_no = $row['reg-no'];
                
                $ass1 = $row['ass1'];
                $ass2 = $row['ass2'];
                $t1 = $row['t1'] ;
                $t2 = $row['t2'];
                $score = "";      



                }
                
                if (is_null($reg_no) || (($ass1 > 100 || $ass2 > 100 || $t1 > 100 || $t2 >100 )&& $this->examCategory->type =="CA") ||($score > 100 )&& $this->examCategory->type =="SE") {
                    if (is_null($reg_no)) {
                        $this->rejected_string .= 'The User Has no Registration name.,';
                        
                    }
                    if ($row['ass1'] > 100 || $row['ass2'] > 100 || $row['t1'] > 100 || $row['t2'] > 100  ) {
                        $this->rejected_string .= 'Score out of Range.,';
                    }
                    $err = [
                        'reg_no' => $reg_no,
                        'reason' => $this->rejected_string
                    ];
                    
                    $this->rejected->push($err);
                } else {

                    $student = SRS::checkIFStudentRegisteredForTheCourse($reg_no, $this->course, $this->year_id);
                  // dd(count($student));
                    if (!is_null($student)) {
                        $where = [
                            'reg_no' => $reg_no,
                            'year_id' => $this->year_id,
                            'semester_id' => $this->semester->id,
                            'course_id' => $this->course->id,
                            'exam_category_id' => $this->examCategory->id,
                        ];

                        $where2 = [

                            ['reg_no','=', $reg_no],
                            ['year_id','=', $this->year_id],
                            ['semester_id','=', $this->semester->id],
                            ['course_id' , '=',$this->course->id],
                           
                        ];
                         //do math here for now only course and semester scores
                         $result = 0;
                         $resultscore = '';
                        // dd($this->examCategory->id);
                         if($this->examCategory->id == 1)
                         {
                      
                             $ass1cal = (5/100)*($ass1 ?: 1);
                             $ass2cal = (5/100)* ($ass2 ?: 1) ;
                             $t1cal = (15/100)*$t1;
                             $t2cal = (15/100)*$t2;
                             $sum = $ass1cal + $ass2cal + $t1cal + $t2cal;
                              
                            $result = [

                                'exam_score' => $sum,
                                'uploadedby' => Auth::user()->username

    
                            ];

                           


                         }elseif($this->examCategory->id == 2)
                         {

                           $ese = (60/100) * $score;
                         
                            $result = [

                                'exam_score' => $ese,
                                'uploadedby' => Auth::user()->username
    
                            ];



                         }

                         $resultscore = [
                            'assignment1' => $ass1,
                            'assignment2' => $ass2,
                            'test1' => $t1,
                            'test2' => $t2,
                            'uploadedby' => Auth::user()->username,
                            'reg_no' => $reg_no,
                            'year_id' => $this->year_id,
                            'semester_id' => $this->semester->id,
                            'course_id' => $this->course->id,
                            'exam_category_id' => $this->examCategory->id
                            
                       ];

                       $resultscoreSE = [
                        'ese' => $score,
                        'uploadedby' => Auth::user()->username,
                        'reg_no' => $reg_no
                        
                   ];
                        
                       
                        
                        //dd($where);
                        
                       
                        DB::beginTransaction();
                        try {

                            //dd($result);
                           if($this->examCategory->id == 1){ 
                          $r01 = ExamScore::updateOrCreate($where, $resultscore);
                        
                           }elseif($this->examCategory->id == 2)
                           {
                            $r02 = DB::table('exam_scores')->where($where2)->update($resultscoreSE);
                            
                          // dd($r02);
                           
                           }
                            $r0=  ExamCategoryResult::updateOrCreate($where, $result);
                             //dd($where);

                           $r1 = SRS::updateCourseResults($reg_no, $this->course, $this->semester, $this->year_id);
                           $r11= SRS::updateCourseResultSummary($this->course->id,$this->course->pass_grade,$this->semester->id,$this->year_id);
                          // dd($r1);
                           $r2 = SRS::updateSemesterResultsTable($reg_no,$this->semester->id, $this->year_id,$this->course);
                           $r22 = SRS::updateSemesterResultSummary($this->course->id,$this->semester->id,$this->year_id,$this->course->pass_grade);

                           $r3 = SRS::updateAnnualResultsTable($reg_no,$this->year_id,$this->course);
                           $r33 = SRS::updateAnnualResultsSummary($this->course->id,$this->semester->id,$this->year_id,$this->course->pass_grade);
                           $r4 = SRS::updateTranscriptsTable($reg_no,$this->year_id,$this->course);
                          // dd("ccc",$r1);
                         DB::commit();
                        }catch (\Exception $e){
                           DB::rollBack();
                            throw $e;

                            
                        }
                       // dd($cr);
                    } else {
                        $this->rejected->push(
                            [
                                'reg_no' => $reg_no,
                                'reason' => 'Not registered for this course'
                            ]
                        );
                    }

                }


                //check if student reg no is available

            }
          }elseif($this->status  == 1)
          {

           // dd($rows);
            foreach ($rows as $row) {

                  
                if($this->examCategory->id == 2)
                {
                    $reg_no = $row['reg-no'];
                    $score = $row['ese'];
                    $pracscore = $row['prac-score'];
                    $ass1 = "";
                    $ass2 = "";
                    $t1 = "";
                    $prac1 = "";
                    $prac2 = "";
                   // dd($reg_no);


                }elseif($this->examCategory->id == 1){ 
               
                $reg_no = $row['reg-no'];
                
                $ass1 = $row['ass1'];
                $ass2 = $row['ass2'];
                $t1 = $row['t1'] ;
                $prac1 = $row['prac1'];
                $prac2 = $row['prac2'];
                $score = "";      



                }
                
                if (is_null($reg_no) || (($ass1 > 100 || $ass2 > 100 || $t1 > 100 ||  $prac1 >100 || $prac2 >100 )&& $this->examCategory->type =="CA") ||($score > 100 )&& $this->examCategory->type =="SE") {
                    if (is_null($reg_no)) {
                        $this->rejected_string .= 'The User Has no Registration name.,';
                        
                    }
                    if ($row['ass1'] > 100 || $row['ass2'] > 100 || $row['t1'] > 100 || $row['prac1'] > 100 || $row['prac2'] > 100  ) {
                        $this->rejected_string .= 'Score out of Range.,';
                    }
                    $err = [
                        'reg_no' => $reg_no,
                        'reason' => $this->rejected_string
                    ];
                    
                    $this->rejected->push($err);
                } else {

                    $student = SRS::checkIFStudentRegisteredForTheCourse($reg_no, $this->course, $this->year_id);
                  // dd(count($student));
                    if (!is_null($student)) {
                        $where = [
                            'reg_no' => $reg_no,
                            'year_id' => $this->year_id,
                            'semester_id' => $this->semester->id,
                            'course_id' => $this->course->id,
                            'exam_category_id' => $this->examCategory->id,
                        ];

                        $where2 = [

                            ['reg_no','=', $reg_no],
                            ['year_id','=', $this->year_id],
                            ['semester_id','=', $this->semester->id],
                            ['course_id' , '=',$this->course->id],
                           
                        ];
                         //do math here for now only course and semester scores
                         $result = 0;
                         $resultscore = '';
                         $roundese = '';
                         
                         if($this->examCategory->id == 1)
                         {
                      
                             $ass1cal = (4/100)*($ass1 ?: 1);
                             $ass2cal = (4/100)* ($ass2 ?: 1) ;
                             $t1cal = (12/100)*$t1;
                             $prac1cal = (10/100)*$prac1;
                             $prac2cal = (10/100)*$prac2;
                             $sum = $ass1cal + $ass2cal + $prac1cal + $prac2cal + $t1cal ;
                              $roundsum = round($sum);

                            $result = [

                                'exam_score' => $roundsum,
                                'uploadedby' => Auth::user()->username
    
                            ];

                          


                         }elseif($this->examCategory->id == 2)
                         {

                          $ese = ($score + $pracscore)/200 * 60 ;
                         //  dd($ese);
                           $roundese = round($ese,4,1);
                         
                            $result = [

                                'exam_score' => $roundese,
                                'uploadedby' => Auth::user()->username
    
                            ];


                            //dd($result);
                         }

                         $resultscore = [
                            'assignment1' => $ass1,
                            'assignment2' => $ass2,
                            'test1' => $t1,
                            'pract1' => $prac1,
                            'pract2' => $prac2,
                            'uploadedby' => Auth::user()->username,
                            'reg_no' => $reg_no,
                            'year_id' => $this->year_id,
                            'semester_id' => $this->semester->id,
                            'course_id' => $this->course->id,
                            'exam_category_id' => $this->examCategory->id
                            
                       ];
                      $remark = "";
                      if($score < 50 || $pracscore < 50)
                      {
                        $remark = "SUPP";
                      }elseif($score >= 50 || $pracscore >= 50){
                            $remark = "PASS";
                      }
                      
                       $resultscoreSE = [
                        'ese' => $score,
                        'pract_ese' => $pracscore,
                        'uploadedby' => Auth::user()->username,
                        'reg_no' => $reg_no,
                        'exam_remark' => $remark
                        
                   ];
                        
                       
                        
                        //dd($where);
                        
                       
                        DB::beginTransaction();
                        try {

                            //dd($result);
                           if($this->examCategory->id == 1){ 
                          $r01 = ExamScore::updateOrCreate($where, $resultscore);
                        
                           }elseif($this->examCategory->id == 2)
                           {
                            $r02 = DB::table('exam_scores')->where($where2)->update($resultscoreSE);
                            
                          // dd($r02);
                           
                           }
                            $r0=  ExamCategoryResult::updateOrCreate($where, $result);
                             //dd($where);

                           $r1 = SRS::updateCourseResults($reg_no, $this->course, $this->semester, $this->year_id);
                           $r11= SRS::updateCourseResultSummary($this->course->id,$this->course->pass_grade,$this->semester->id,$this->year_id);
                          // dd($r1);
                           $r2 = SRS::updateSemesterResultsTable($reg_no,$this->semester->id, $this->year_id,$this->course);
                           $r22 = SRS::updateSemesterResultSummary($this->course->id,$this->semester->id,$this->year_id,$this->course->pass_grade);

                           $r3 = SRS::updateAnnualResultsTable($reg_no,$this->year_id,$this->course);
                           $r33 = SRS::updateAnnualResultsSummary($this->course->id,$this->semester->id,$this->year_id,$this->course->pass_grade);
                           $r4 = SRS::updateTranscriptsTable($reg_no,$this->year_id,$this->course);
                          // dd("ccc",$r1);
                         DB::commit();
                        }catch (\Exception $e){
                           DB::rollBack();
                            throw $e;

                            
                        }
                       // dd($cr);
                    } else {
                        $this->rejected->push(
                            [
                                'reg_no' => $reg_no,
                                'reason' => 'Not registered for this course'
                            ]
                        );
                    }

                }


                //check if student reg no is available

            }

          }else{

            return 'module has no practical status';
          }

            
          //function for practical



//            DB::commit();
//        }catch (\Exception $e){
//            DB::rollBack();
//            throw $e;
//        }
     //   dd($this->rejected);

    }
    public function headingRow(): int
    {
        return 2;
    }




}
