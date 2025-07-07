<?php

namespace App\Http\Controllers\Dashboard\Reports;

use App\Exports\NacteReport;
use App\Exports\AnnualReport;
use App\Exports\SemisterReport;
use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Campus;
use App\Models\Course;
use App\Models\CourseProgram;
use App\Models\CourseResult;
use App\Models\Institution;
use App\Models\Program;
use App\Models\Semester;
use App\Models\SemesterResult;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\Translation\Extractor\PhpExtractor;

class ExcelReportController extends Controller
{
    public function generateSemisterReport(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'program' => 'required',
            'campus_id' => 'required',
            'ayear' => 'required',
            'studyyear' => 'required',
            'semester' => 'required',
            'intake' => 'required',
            'sub' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        return Excel::download(new SemisterReport($request), date('Y-m-d', time()) . '_' . rand(0, 1000) . '_semister_report.xlsx');
    }

    public function generateAnnualReport(Request $request)
    {
        return Excel::download(new AnnualReport($request), 'annual_report.xlsx');
    }

    public function generateNacteReport(Request $request)
    {
        // if ($request->has('nacte_test_result')) {
        //     return Excel::download(new NacteReport($request), date('Y-m-d',time()).'_'.rand(0,1000).'_nacte_report.xlsx');
        // }

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

        $studentdata = Student::where('program_id', $program)
            ->where('class_year', $academicyear)
            ->get();
        //dd(count($studentdata));

        if (count($studentdata) <= 0) {
            return back()->with('error', 'No Student Records found');
        }

        $fileName = 'SAMIS_Exam_Results.xlsx';
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
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFA0A0A0',
                ],
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
        $nameofcurrentyear = $curyear->first()->year;
        $prog = Program::where('id', $program)->get();
        $semest = Semester::where('id', $semester)->get();
        $campus = Campus::where('id', $campus)->get();
        $entry = intval(substr($ayear->first()->year, 0, 4));
        $current = intval(substr($nameofcurrentyear, 0, 4));
        $yearofstudy = $current - $entry;
        $class = '';
        if ($yearofstudy == 0) {
            $class = 'FIRST YEAR';
        } elseif ($yearofstudy == 1) {
            $class = 'SECOND YEAR';
        } elseif ($yearofstudy == 2) {
            $class = 'THIRD YEAR';
        } elseif ($yearofstudy == 3) {
            $class = 'FOURTH YEAR';
        } elseif ($yearofstudy == 4) {
            $class = 'FIFTH YEAR';
        } elseif ($yearofstudy == 5) {
            $class = 'SIXTH YEAR';
        } elseif ($yearofstudy == 6) {
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
            ->setCellValue('A4', 'NTA LEVEL :  ' . strtoupper(substr($prog->first()->program_code, -1)) . '                                          FIELD OF STUDY  :  ' . strtoupper($prog->first()->program_name))
            ->setCellValue('A5', 'YEAR OF STUDY :  ' . $class . '         SEMESTER : ' . strtoupper($semest->first()->title) . '           DATE :.....................................           WEIGHT : CA 40%            WEIGHT : SE60%');
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
            $name = stripslashes($rowstudent->user->first_name . '  ' . $rowstudent->user->first_name);
            $sex = $rowstudent->user->gender;
            $bdate = $rowstudent->dob;
            $ststatus = stripslashes($rowstudent->status);

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
