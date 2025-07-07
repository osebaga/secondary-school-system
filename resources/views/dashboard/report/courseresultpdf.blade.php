<!doctype html>
<html>

<head>
    <style>
        table.table1 {
            border: solid 2px #090909;
        }

        table tr th {
            border: solid 1px #0a0a0a;
        }

        table tr td {
            border: solid 1px #000000;

        }

        table {
            width: 100%;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        table.table5 th,
        td {
            padding: 5px;
            text-align: left;
            font-size: 12px;
        }

        table.table1 th,
        td {
            padding: 5px;
            text-align: left;
        }

        table.table2 th,
        td {
            padding: 5px;
            text-align: left;
        }

        table.table3 th,
        td {
            padding: 5px;
            text-align: left;
        }

        table.table4 {
            border: ;
            text-align: center;
            width: 100%;
        }

        table.table4 th {
            border: none;

            width: 100%;
        }

        table.table4 td {
            border: none;
            text-align: center;
            width: 100%;
        }

        /* .column {
            float: left;
            width: 50%;
        } */

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .row {
            display: flex;
        }

        .col_left {
            flex: 30%;
        }

        .col_right {
            flex: 60%;
        }

        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }

    </style>



</head>

<body>

    <div class="row" style="max-height: 120px;">
        <div class="col_left" style="align-content: center" align="center">
            <img src="assets/uploads/logo/logo.png" alt="" srcset="" width="100px" height="100px">
        </div>
        <div class="col_right" style="text-align: center; align-content: center">
            <p style="text-align: center;">
            <h2>{{ strtoupper(\App\Models\Institution::first()->institution_name ?? '') }}</h2>
            </p>
            <p style="text-align: center;">
            <h4>COURSE/MODULE EXAMINATION RESULTS FOR ACADEMIC YEAR: {{ $ayear }}</h4>
            </p>
        </div>
    </div>
    <table class="table1" style="margin-top: 150px">
        {{-- <tr>
            <th>DEPARTMENT:</th>
            <th>{{ $department->first()->department_name ?? '' }}</th>
        </tr> --}}
        <tr>
            <th>PROGRAMME:</th>
            <th>{{ $programname->first()->program_name ?? '' }}</th>
        </tr>
    </table>
    <br>
    <table class="table2">
        <tr>
            <th>Code: &nbsp; {{ $courses->first()->course_code }}</th>
            <th>Module Name: &nbsp; {{ $courses->first()->course_name }}</th>
            <th>Credits: {{ $courses->first()->unit }}</th>
        </tr>

    </table>
    <br>
    <table class="table5">

        <tr>
            <th>S/No</th>
            <th>Student Name</th>
            <th>Sex</th>
            <th>Reg No</th>
            <th>CW/40</th>
            <th>UE/60</th>
            <th>Total</th>
            <th>Grade</th>
            <th>Remark</th>
        </tr>
        <?php $i = 1; ?>

        @if (count($courseresults ?? '') > 0)
            @foreach ($courseresults ?? '' as $cr)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $cr->first_name }} {{ $cr->last_name }} </td>
                    <td>{{ $cr->gender }}</td>
                    <td>{{ $cr->reg_no }}</td>

                    <td>{{ $cr->ca_score ?? '-' }}</td>
                    <td>{{ $cr->se_score ?? '-' }}</td>
                    <td>{{ $cr->total_score ?? '-' }}</td>
                    <td>{{ $cr->grade ?? '-' }}</td>
                    <td>{{ $cr->remarks ?? '-' }}</td>

                </tr>
            @endforeach
            @foreach ($abscstudentcourse ?? '' as $cr)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $cr->first_name }} {{ $cr->last_name }} </td>
                    <td>{{ $cr->gender }}</td>
                    <td>{{ $cr->username }}</td>

                    <td>{{ $cr->ca_score ?? '-' }}</td>
                    <td>{{ $cr->se_score ?? '-' }}</td>
                    <td>{{ $cr->total_score ?? '-' }}</td>
                    <td>{{ $cr->grade ?? '-' }}</td>
                    <td>{{ $cr->remarks ?? '-' }}</td>
                </tr>
            @endforeach
        @endif

    </table>
    <br>
    <table class="table3">
        <tr>
            <th>Grade</th>
            <th colspan="2">A</th>
            <th colspan="2">B+</th>
            <th colspan="2">B</th>
            <th colspan="2">C</th>
            <th colspan="2">D</th>
            <th colspan="2">F</th>
            <th colspan="2">I (ABSC)</th>
            <th colspan="2">TOTAL</th>
        </tr>
        <tr>
            <td>Gender</td>
            <td>M</td>
            <td>F</td>
            <td>M</td>
            <td>F</td>
            <td>M</td>
            <td>F</td>
            <td>M</td>
            <td>F</td>
            <td>M</td>
            <td>F</td>
            <td>M</td>
            <td>F</td>
            <td>M</td>
            <td>F</td>
            <td>M</td>
            <td>F</td>

        </tr>
        <tr>
            <td>Subtotal</td>
            <td>{{ $courseresultsummary->first()->total_A_male ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->total_A_female ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->total_Bplus_male ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->total_Bplus_male ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->total_B_male ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->total_B_female ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->total_C_male ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->total_C_female ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->total_D_male ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->total_D_female ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->total_F_male ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->total_F_female ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->total_ABSC_male ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->total_ABSC_female ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->totalstudentcoursemale ?? '0' }}</td>
            <td>{{ $courseresultsummary->first()->totalstudentcoursefemale ?? '0' }}</td>

        </tr>
        <tr>
            <td>Grandtotal</td>
            <td colspan="2">{{ $courseresultsummary->first()->total_A ?? '0' }}
                ({{ number_format(floor($courseresultsummary->first()->totalgradeApercent ?? '0' * 100) / 100, 2) }}%)
            </td>
            <td colspan="2">{{ $courseresultsummary->first()->total_Bplus ?? '0' }}
                ({{ number_format(floor($courseresultsummary->first()->totalgradeBpluspercent ?? '0' * 100) / 100, 2) }}%)
            </td>
            <td colspan="2">{{ $courseresultsummary->first()->total_B ?? '0' }}
                ({{ number_format(floor($courseresultsummary->first()->totalgradeBpercent ?? '0' * 100) / 100, 2) }}%)
            </td>
            <td colspan="2">{{ $courseresultsummary->first()->total_c ?? '0' }}
                ({{ number_format(floor($courseresultsummary->first()->totalgradeCpercent ?? '0' * 100) / 100, 2) }}%)
            </td>
            <td colspan="2">{{ $courseresultsummary->first()->total_D ?? '0' }}
                ({{ number_format(floor($courseresultsummary->first()->totalgradeDpercent ?? '0' * 100) / 100, 2) }}%)
            </td>
            <td colspan="2">{{ $courseresultsummary->first()->total_F ?? '0' }}
                ({{ number_format(floor($courseresultsummary->first()->totalgradeFpercent ?? '0' * 100) / 100, 2) }}%)
            </td>
            <td colspan="2">{{ $courseresultsummary->first()->total_ABSC ?? '0' }}
                ({{ number_format(floor($courseresultsummary->first()->totalgradeABSCpercent ?? '0' * 100) / 100, 2) }}%)
            </td>
            <td colspan="2">{{ $courseresultsummary->first()->totalstudentcourse ?? '0' }}

            </td>

        </tr>
    </table>
    <br>

    <table class="table4">
        {{-- <tr>
            <th colspan="2">######## END OF EXAM RESULTS ########</th>
        </tr> --}}
        <br><br><br>
        <tr>
            <td>..............................................<br>
                Course Lecturer's Name
            </td>
            <td>...........................
                <br>
                Signature
            </td>
        </tr>
        {{-- <tr>
            <td>............................................<br>
                Date Approved by the Head of the Department
            </td>
            <td>.............................<br>
                Signature</td>
        </tr>
        <tr>
            <td>............................................<br>
                Date Approved by the Dean of the Faculty
            </td>
            <td>.............................<br>
                Signature</td>
        </tr> --}}
    </table>
</body>

</html>
