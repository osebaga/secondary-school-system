<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidate Transcript</title>

    <style>
        * {
            font-size: 0.94em;
            box-sizing: border-box;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            padding: 5px;
            border: 3px solid rgb(5, 180, 5);
            align-items: center;
        }

        .profile {
            margin-top: 2%;
            height: 80px;
        }

        .logo {
            margin-top: 2%;
            height: 80px;
        }

        table {
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding-left: 5px;
        }

        .column {
            float:left;
            /* padding: 20px; */
        }
        .right{
            margin-left: 90px;
        }

        .left,
        .right {
            width: 25%;
        }

        .middle {
            width: 50%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>
    <div class="row" style="margin-bottom: 3%;">
        <div class="column left"><img class="logo" src="{{ public_path() }}/assets/uploads/logo/logo.png"
                alt="logo"></div>
        <div class="column middle" style="text-align: center; margin-top: 0%">
            <h3 style="color: rgb(58, 61, 9); margin-bottom: 0; font-size: inherit">{{ strtoupper(\App\Models\Institution::first()->institution_name ?? '') }}</h3>
            <p class="addr" style="margin-top: 0%;">P.O BOX 5079 TANGA, TANZANIA<br>
                Phone: +255672187936 <br>
                Email: kacohas2022@gmail.com  <br>
                Website: https://kacohas.ac.tz
            </p>
        </div>
        <div class="column right">
            {{-- @if ($user->avatar) --}}
                <img src="{{ public_path() }}/assets/uploads/avatars/{{ basename($user->avatar)}}"  class="profile" alt="student">
            {{-- @else --}}
                {{-- <img src="{{ public_path() }}/assets/uploads/avatars/default/profile.jpg" class="profile" alt="Insert Image"> --}}
            {{-- @endif --}}
        </div>
    </div>

    <div style="text-align: center; margin-bottom: 0%;">
        <h4 style="margin-bottom: 0%"><strong>ACADEMIC TRANSCRIPT</strong></h4>
    </div>
    <table style="margin-bottom: 1rem; margin-top: 0%;">

        <tr>
            <th style="text-align:left;">Name</th>
            <th>Registration Number</th>
            <th style="width: 3%; text-align: center">Sex</th>
            <th style="width: 3%">Date of Birth</th>
            <th style="width: 3%">Nationality</th>
            <th style="width: 3%">Admitted</th>
            <th style="width: 3%">Completed</th>
        </tr>

        <tr>
            <td>{{ $student->full_name ?? '' }}</td>
            <td style="text-align: center">{{ $student->reg_no ?? '' }}</td>
            <td style="text-align: center">{{ $user->gender ?? '' }}</td>
            <td style="text-align: center">{{ $student->dob ?? '' }}</td>
            <td style="text-align: center">{{ $student->citizenship ?? '-' }}</td>
            <td style="text-align: center">{{ $admitted ?? '' }}</td>
            <td></td>
        </tr>
        <tr>
            <th colspan="2" style="border-right: 0px; text-align:left;">Program Study</th>
            <th style="border-left: 0px;"></th>
            <th style="width: 15%;">Overall G.P.A</th>
            <th style="width: 15%">Classification</th>
            <th style="width: 15%">Total Credit Passed</th>
            <th>Sponsor</th>
        </tr>
        <tr>
            <td colspan="2" style="border-right: 0px;">{{ $student->program->program_name ?? '' }}</td>
            <td style="border-left: 0px;"></td>
            <td style="text-align: center">{{ $transcript->gpa }}</td>
            <td style="text-align: center">{{ $transcript->classification }}</td>
            <td style="text-align: center">{{ $transcript->total_credits }}</td>
            <td style="text-align: center">{{ strtoupper($student->sponsorship) }}</td>
        </tr>
    </table>

    @if ($academicYear > 0)
        @for ($i = 1; $i <= $academicYear; $i++)
            <table style="border: none;">
                <td style="border: none;">
                   
                    @if (count($results[$i - 1]['year' . $i . 'semester1']) > 0)
                        <table>
                            <tr>
                                <th colspan="5">{{ strtoupper(\App\Helpers\SRS::year_level($i)) }} RESULTS :
                                     <!-- before -->
                                    {{-- {{ $results[0]['academicYear'] }} --}}

                                    <!-- before -->
                              <!-- get all academic year -->
                                    {{ $year = SRS::getacyear($student->reg_no,$i)->first()->year }}- Semester I
                                </th>
                            </tr>
                            <tr>
                                <th style="width:15%">CODE</th>
                                <th>COURSE NAME</th>
                                <th style="width:1%">UNIT</th>
                                <th style="width:1%">GRADE</th>
                                <th style="width:1%">POINT</th>
                            </tr>
                            @foreach ($results[$i - 1]['year' . $i . 'semester1'] as $r)
                                <tr>
                                    <td style="text-align: center">{{ \App\Models\Course::find($r->course_id)->course_code ?? '' }}</td>
                                    <td>{{ \App\Models\Course::find($r->course_id)->course_name ?? '' }}</td>
                                    <td style="text-align: center">{{ $r->credits }}</td>
                                    <td style="text-align: center">{{ $r->grade }}</td>
                                    <td style="text-align: center">{{ $r->total_score }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </td>
                <td style="border: none">
                    @if (count($results[$i - 1]['year' . $i . 'semester2']) > 0)
                        <table>
                            <tr>
                                <th colspan="5">{{ strtoupper(\App\Helpers\SRS::year_level($i)) }} RESULTS :
                                    {{-- {{ $results[0]['academicYear'] }} --}}
                                  <!-- get all academic year -->
                                    {{ $year = SRS::getacyear($student->reg_no,$i)->first()->year }} - Semester II</th>
                            </tr>
                            <tr>
                                <th style="width:15%">CODE</th>
                                <th>COURSE NAME</th>
                                <th style="width:1%">UNIT</th>
                                <th style="width:1%">GRADE</th>
                                <th style="width:1%">POINT</th>
                            </tr>
                            @foreach ($results[$i - 1]['year' . $i . 'semester2'] as $r)
                                <tr>
                                    <td style="text-align: center">{{ \App\Models\Course::find($r->course_id)->course_code ?? '' }}</td>
                                    <td>{{ \App\Models\Course::find($r->course_id)->course_name ?? '' }}</td>
                                    <td style="text-align: center">{{ $r->credits }}</td>
                                    <td style="text-align: center">{{ $r->grade }}</td>
                                    <td style="text-align: center">{{ $r->total_score }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </td>
            </table>

            <div align="right" style="margin-bottom: 0px; margin-right: 20px">
                <strong>{{ strtoupper(\App\Helpers\SRS::year_level($i)) }} GPA:
                    {{ \App\Models\AnnualResult::where('year_of_study', $i)->where('reg_no', $reg_no)->first()->gpa ?? '' }}</strong>
            </div>
            <hr style="opacity: 0.5">

        @endfor
    @endif
    <div style="display: table;width:100%;margin: 50px 10px 20px 10px">
        <div style="text-align: center; display:table-cell">
            _____________________________________
            <br><strong>Dean,
                {{ $student->program->faculty->faculty_name ?? '' }}</strong>
        </div>
        <div style="text-align: center;display:table-cell;">
            <span style="text-decoration: underline">{{ date('d/m/Y') }}</span><br>
            DATE
        </div>
        <div style="text-align: center;display:table-cell; margin: 0;padding:0">
            _____________________________________
            <br>
            <strong>Deputy Vice Chancellor - Academic</strong>
        </div>
    </div>

    <div class="end-transcript " style="margin: 50px 10px 20px 10px">
        <p style="text-align: center;">|||||||||||||||||||| <strong>KEY TO GRADING</strong> ||||||||||||||||||||
        </p>
        <p style="margin-bottom: 0px; font-size:11px;">1. The Transcript will be valid only if it bears the institution Seal
            <br>
            2. Key for Course Credits: ONE CREDIT IS EQUIVALENT TO 15 CONTACT HOURS. <br>
            POINTS = GRADE POINTS MULTIPLIED BY NUMBER OF CREDITS. <br>
            3. Key to the Grades and other Symbols for Examinations: SEE THE TABLE BELOW
        </p>

        <table style="font-style: italic; margin-top: 0px;">
            <thead>
                <tr>
                    <td>GRADE</th>
                    <td style="text-align: center;">A</td>
                    <td style="text-align: center;">B+</td>
                    <td style="text-align: center;">B</td>
                    <td style="text-align: center;">C</td>
                    <td style="text-align: center;">D</td>
                    <td style="text-align: center;">E</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>MARKS</td>
                    <td style="text-align: center;">70% - 100%</td>
                    <td style="text-align: center;">60% - 69%</td>
                    <td style="text-align: center;">50% - 59%</td>
                    <td style="text-align: center;">40% - 49%</td>
                    <td style="text-align: center;">35% - 39%</td>
                    <td style="text-align: center;">0% - 34%</td>
                </tr>
                <tr>
                    <td>GRADE POINTS</td>
                    <td style="text-align: center;">5.0</td>
                    <td style="text-align: center;">4.0</td>
                    <td style="text-align: center;">3.0</td>
                    <td style="text-align: center;">2.0</td>
                    <td style="text-align: center;">1.0</td>
                    <td style="text-align: center;">0.0</td>
                </tr>
                <tr>
                    <td>REMARKS</td>
                    <td style="text-align: center;">Excellent</td>
                    <td style="text-align: center;">Very Good</td>
                    <td style="text-align: center;">Good</td>
                    <td style="text-align: center;">Satisfactory</td>
                    <td style="text-align: center;">Marginal Fail</td>
                    <td style="text-align: center;">Absolute Fail</td>
                </tr>
            </tbody>
        </table>
        <p class="mt-1" style="margin-bottom: 0px; font-style: italic;">4. Key to Classification of Awards: SEE
            THE TABLE BELOW </p>
        <table style="font-style: italic; margin-top: 0px;">

            <thead>
                <tr>
                    <td style="text-align: center;" colspan="2">AWARDS CLASSIFICATION</td>
                </tr>
                <tr style="text-align: center;">
                    <td style="width: 50%;">OVERALL G.P.A</td>
                    <td>CLASS</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">4.4 - 5.0</td>
                    <td>FIRST CLASS</td>
                </tr>
                <tr>
                    <td style="text-align: center;">2.7 - 3.4</td>
                    <td>LOWER SECOND CLASS</td>
                </tr>
                <tr>
                    <td style="text-align: center;">2.0 - 2.6</td>
                    <td>PASS</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script type="text/php">
            if ( isset($pdf) ) {
                    //Global variables
                    $w = $pdf->get_width();
                    $h = $pdf->get_height();
                    // Watermark
                    $watermark = $pdf->open_object();
                    $pdf->set_opacity(0.1);
                    $pdf->image("{{public_path()}}/assets/uploads/logo/logo.png", ($w-$w/2)/2, ($h-$w/2 + 40)/2, $w/2, $w/2);
                    $pdf->close_object();
                    $pdf->add_object($watermark, 'all');   
                    // Page Numbers
                    $pdf->page_text($w-90, $h-30, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 12, array(0,0,0));
                    $pdf->page_text(35, $h-30, "Printed: {{date('Y-m-d')}} {{date('H:m:s')}} ", null, 12, array(0,0,0));          
                }
            </script>
</body>

</html>
