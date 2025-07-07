<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidate Statement</title>
    <style>
        * {
            font-size: 0.94em;
        }

        body {
            border: 2px solid green;
            align-items: center;
            padding: 10px;
        }

        table {
            border-collapse: collapse;
        }

        .table1 {
            white-space: nowrap;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid black;
        }

        td {
            padding: 5px;
        }
    </style>

</head>


<body>

    <table style="border:none; width:100%">
        <tr style="border:none 0px">
            <td style="border:none 0px!important; width:150px">
                <img src="{{ public_path() }}/assets/uploads/logo/logo.png" alt="" srcset="" width="100px"
                    height="100px">
            </td>
            <td style="border:none 0px!important; text-align:center;font-size:14px; line-spacing:1.5px;">
                <span style="color: rgb(70, 65, 6); font-size:1.4em; font-weight: bold">
                    {{ strtoupper(\App\Models\Institution::first()->institution_name ?? '') }}
                </span><br>
                P.O BOX 5079 TANGA, TANZANIA<br>
                Phone: +255672187936 <br>
                Email: kacohas2022@gmail.com  <br>
                Website: https://kacohas.ac.tz
            </td>
            <td style="border:none 0px!important; width:100px">
                @if ($user->avatar)
                    <img src="{{ public_path() }}/assets/uploads/avatars/{{ basename($user->avatar) }}" alt=""
                        srcset="" width="100px" height="100px">
                @else
                    <img src="{{ public_path() }}/assets/uploads/avatars/default/profile.jpg" alt=""
                        srcset="" width="100px" height="100px">
                @endif
            </td>
        </tr>
    </table>

    <h1 style="text-align:center;">PROGRESS REPORT ON STUDENT ACADEMIC PERFORMANCE</h1>
    <table style="margin:auto;width: 100%;" class="table1">
        <tr>
            <th>Name</th>
            <th style="padding:5px;">Registration Number</th>
            <th>Sex</th>
            <th>Date of Birth</th>
            <th>Nationality</th>
        </tr>
        <tr>
            <td>{{ $student->full_name ?? '' }}</td>
            <td>{{ $student->reg_no ?? '' }}</td>
            <td>{{ $user->gender ?? '' }}</td>
            <td>{{ $student->dob ?? '' }}</td>
            <td>{{ $student->citizenship ?? '-' }}</td>
        </tr>
        <tr>
            <th colspan="2">Program of Study</th>
            <th colspan="3">Faculty of Study</th>
        </tr>
        <tr>
            <td colspan="2">{{ $student->program->program_name ?? '' }}</td>
            <td colspan="3">{{ $student->program->faculty->faculty_name ?? '' }}</td>
        </tr>
    </table>

    @if ($academicYear > 0)
        @for ($i = 1; $i <= $academicYear; $i++)
            @if (count($results[$i - 1]['year' . $i . 'semester1']) > 0)
                <table style="width: 100%;margin-top: 20px;">
                    <tr>
                        <th colspan="5">{{ strtoupper(\App\Helpers\SRS::year_level($i)) }} RESULTS :
                            {{ $results[0]['academicYear'] }} - SEMESTER I</th>
                    </tr>
                    <tr>
                        <td>CODE</td>
                        <td>COURSE NAME</td>
                        <td>UNIT</td>
                        <td>GRADE</td>
                        <td>POINT</td>
                    </tr>
                    @foreach ($results[$i - 1]['year' . $i . 'semester1'] as $r)
                        <tr>
                            <td>{{ \App\Models\Course::find($r->course_id)->course_code ?? '' }}</td>
                            <td>{{ \App\Models\Course::find($r->course_id)->course_name ?? '' }}</td>
                            <td>{{ $r->credits }}</td>
                            <td>{{ $r->grade }}</td>
                            <td>{{ $r->total_score }}</td>
                        </tr>
                    @endforeach
                </table>
            @endif

            @if (count($results[$i - 1]['year' . $i . 'semester2']) > 0)
                <table style="width: 100%;margin-top: 20px;">
                    <tr>
                        <th colspan="5">{{ strtoupper(\App\Helpers\SRS::year_level($i)) }} RESULTS :
                            {{ $results[0]['academicYear'] }} - SEMESTER II</th>
                    </tr>
                    <tr>
                        <td>CODE</td>
                        <td>COURSE NAME</td>
                        <td>UNIT</td>
                        <td>GRADE</td>
                        <td>POINT</td>
                    </tr>
                    @foreach ($results[$i - 1]['year' . $i . 'semester2'] as $r)
                        <tr>
                            <td>{{ \App\Models\Course::find($r->course_id)->course_code ?? '' }}</td>
                            <td>{{ \App\Models\Course::find($r->course_id)->course_name ?? '' }}</td>
                            <td>{{ $r->credits }}</td>
                            <td>{{ $r->grade }}</td>
                            <td>{{ $r->total_score }}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
            <h2 style="text-align:right;margin-right:100px;">{{ strtoupper(\App\Helpers\SRS::year_level($i)) }} GPA:
                {{ \App\Models\AnnualResult::where('year_id', 11)->where('reg_no', $reg_no)->first()->gpa ?? '' }}</h2>
            <hr>
        @endfor
    @endif

    <div style="display: table;width:100%;margin: 40px 10px 20px 10px">
        <div style="text-align: center; display:table-cell">
            ______________________________
            <br><strong>Dean,
                {{ $student->program->faculty->faculty_name ?? '' }}</strong>
        </div>
        <div style="text-align: center;display:table-cell;">
            <u style="border-bottom:1px solid #000;">{{ date('d/m/Y') }}</u><br>
            <strong>Date</strong>
        </div>
        <div style="text-align: center;display:table-cell; margin: 0;padding:0">
            _______________________________
            <br>
            <strong>Deputy Vice Chancellor - Academic</strong>
        </div>
    </div>

    <div>
        <p style="text-align: center">|||||||||||||||||||| KEY TO GRADING ||||||||||||||||||||</p>
        <ol>
            <li>The statement will be valid only if it bears the institution Seal</li>
            <li>Key for Course Credits: ONE CREDIT IS EQUIVALENT TO 15 CONTACT HOURS.
                POINTS = GRADE POINTS MULTIPLIED BY NUMBER OF CREDITS.</li>
            <li>Key to the Grades and other Symbols for Examinations: SEE THE TABLE BELOW</li>

            <table style="margin-top:20px;width: 100%;">
                <thead>
                    <tr style="">
                        <th>Grade</th>
                        <th>A</th>
                        <th>B+</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>E</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Marks</td>
                        <td>70%-100%</td>
                        <td>60%-69%</td>
                        <td>50%-59%</td>
                        <td>40%-49%</td>
                        <td>35%-39%</td>
                        <td>0%-34%</td>
                    </tr>
                    <tr>
                        <td>Grade Points</td>
                        <td>5.0</td>
                        <td>4.0</td>
                        <td>3.0</td>
                        <td>2.0</td>
                        <td>1.0</td>
                        <td>0.0</td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td>Excellent</td>
                        <td>Very Good</td>
                        <td>Good</td>
                        <td>Satisfactory</td>
                        <td>Marginal Fail</td>
                        <td>Absolute Fail</td>
                    </tr>
                </tbody>
            </table>
            <li>Key to Classification of Awards: SEE THE TABLE BELOW</li>
            <table style="margin-top:20px;width: 100%;">
                <thead>
                    <tr style="text-align: center; text-transform: uppercase">
                        <th colspan="5">Awards Classification</th>
                    </tr>
                    <tr>
                        <th>Overall G.P.A.</th>
                        <td>4.4 - 5.0</td>
                        <td>3.5 - 4.3</td>
                        <td>2.7 - 3.4</td>
                        <td>2.0 - 2.6</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>CLASS</th>
                        <td>FIRST</td>
                        <td>UPPER SECOND</td>
                        <td>LOWER SECOND</td>
                        <td>PASS</td>
                    </tr>
                </tbody>
            </table>
        </ol>
    </div>
    <script type="text/php"> 
            if ( isset($pdf) ) {
                //Global variables
                $w = $pdf->get_width();
                $h = $pdf->get_height();
                // Watermark
                $watermark = $pdf->open_object();
                $pdf->set_opacity(0.1);
                $pdf->image("{{public_path()}}/assets/uploads/logo/logo.png", 20, ($h-$w+40)/2, $w-40, $w-40);
                $pdf->close_object();
                $pdf->add_object($watermark, 'all');   
                // Page Numbers
                $pdf->page_text($w-90, $h-30, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 12, array(0,0,0));
                $pdf->page_text(35, $h-30, "Printed at {{date('H:m:s')}} on {{date('D d, M Y')}}", null, 12, array(0,0,0));          
            }
        </script>
</body>

</html>
