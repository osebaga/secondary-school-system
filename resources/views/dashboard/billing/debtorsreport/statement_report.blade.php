<p
    style="line-height: 100%; text-align: left; margin-bottom: 0in; background: transparent; font-family: Cambria, serif; font-size: 13px; margin-left: 4.96in;">
    <span style="font-size: 12px;">
        <img id="logo" src="{{ public_path('assets/uploads/logo/logo.png') }}" width="100" height="100"></span>
</p>
<p style="line-height: 100%;text-align: center;margin-bottom: 0in;background: transparent;margin-top: 0.09in;"><span
    size="3" style="font-size: 14px;"><strong> {{ strtoupper(\App\Models\Institution::first()->institution_name ?? '') }}</strong></span></p>

<p style="line-height: 100%;text-align: center;margin-bottom: 0in;background: transparent;font-family: Cambria, serif;font-size:13px;margin-top: 0.05in;">STUDENT&apos;S&nbsp;INSTALMENTS&nbsp;PAYMENT&nbsp;SUMMARY&nbsp;FOR&nbsp;ACADEMIC&nbsp;YEAR&nbsp;{{ $data[0]['account_year'] }}</p>
<hr>
<p style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-left: 0.16in;'><br></p>
<p style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-left: 0.16in;'><span size="2" style="font-size:15px;"><strong>Student</strong><strong>&nbsp;</strong><strong>Name</strong><strong>:&nbsp;</strong>{{ $data[0]['payerName'] }}</span></p>
<p style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-left: 0.16in;margin-top: 0.11in;'><span size="2" style="font-size:15px;"><strong>Registration</strong><strong>&nbsp;</strong><strong>Number</strong><strong>&nbsp;</strong><strong>:</strong><strong>&nbsp;</strong>{{ $data[0]['payerID'] }}</span></p>
<p style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-top: 0in;'><br></p>
<table style="width: 100%; border-collapse: collapse; border: 1px solid rgb(19, 11, 11);">
    <tbody>
        <tr>
            <td style="width: 9.6394%; border: 1px solid rgb(19, 11, 11);">
                <p style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.04in;margin-top: 0.11in;"><span size="2" style="font-size:15px;"><strong>Date</strong></span></p>
            </td>
            <td style="width: 28.4345%; border: 1px solid rgb(19, 11, 11);">
                <p style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.04in;margin-top: 0.11in;"><span size="2" style="font-size:15px;"><strong>Fee Descriptions</strong></span></p>
            </td>
            <td style="width: 13.9664%; border: 1px solid rgb(19, 11, 11);">
                <p style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.04in;margin-top: 0.11in;"><span size="2" style="font-size:15px;"><strong>Reference&nbsp;</strong><strong>Number</strong></span></p>
            </td>
            <td style="width: 10.9664%; border: 1px solid rgb(19, 11, 11);">
                <p style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.04in;margin-top: 0.11in;"><span size="2" style="font-size:15px;"><strong>Receipt&nbsp;</strong><strong>Number</strong></span></p>
            </td>
            <td style="width: 10.7251%; border: 1px solid rgb(19, 11, 11);">
                <p style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.04in;margin-top: 0.03in;"><span size="2" style="font-size:15px;"><strong>Billed&nbsp;</strong><strong>Amount</strong></span></p>
            </td>
            <td style="width: 13.2857%; border: 1px solid rgb(19, 11, 11);">
                <p style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.04in;margin-top: 0.03in;"><span size="2" style="font-size:15px;"><strong>Paid&nbsp;</strong><strong>Amount</strong></span></p>
            </td>
            <td style="width: 13.2857%; border: 1px solid rgb(19, 11, 11);">
                <p style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.04in;margin-top: 0.03in;"><span size="2" style="font-size:15px;"><strong>&nbsp;Balance</strong></span></p>
            </td>
        </tr>
        @php 
        $year_array = explode("/", $data[0]['account_year']);
        $previous_year = ($year_array[0] - 1) . '/' . $year_array[0];
        $brough_forward = SRS::Brought_Forward($data[0]['payerID'],$data[0]['account_year']); @endphp
        <tr>
            <td style="width: 9.6394%; border: 1px solid rgb(19, 11, 11);">
                <p style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.04in;margin-top: 0.11in;"><span size="2" style="font-size:15px;"><strong>&nbsp;&nbsp;{{  $previous_year }}</strong></span></p>
            </td>
            <td style="width: 28.4345%; border: 1px solid rgb(19, 11, 11);">
                <p style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.04in;margin-top: 0.03in;"><span size="2" style="font-size:15px;"><strong>BALANCE BROUGHT&nbsp;</strong><strong>FORWARD</strong></span></p>
            </td>
            <td style="width: 8.9004%; border: 1px solid rgb(19, 11, 11);"></td>
            <td style="width: 15.9664%; border: 1px solid rgb(19, 11, 11);"></td>
            <td style="width: 12.7251%; border: 1px solid rgb(19, 11, 11);"></td>
            <td style="width: 14.2857%; border: 1px solid rgb(19, 11, 11);"></td>
            <td style="width: 14.2857%; border: 1px solid rgb(19, 11, 11);">
                <p style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.089in;margin-top: 0.11in;"><span size="2" style="font-size:15px;"><strong>{{ number_format($brough_forward) }}</strong></span></p>
            </td>
        </tr>

        @foreach ($bills as $bill) 
        @php $brough_forward += $bill->amount @endphp
 
        <tr>
            <td style="width: 9.6394%; border: 1px solid rgb(19, 11, 11);">&nbsp;&nbsp;{{ $bill->year }}</td>
            <td style="width: 28.4345%; border: 1px solid rgb(19, 11, 11);">
                <p style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.04in;margin-top: 0.03in;"><span size="2" style="font-size:15px;">{{ $bill->type }}</span></p>
            </td>
            <td style="width: 8.9004%; border: 1px solid rgb(19, 11, 11); ">&nbsp;&nbsp;{{$bill->control_number}}</td>
            <td style="width: 15.9664%; border: 1px solid rgb(19, 11, 11);"></td>
            <td style="width: 12.7251%; border: 1px solid rgb(19, 11, 11);">&nbsp;&nbsp;{{number_format($bill->amount)}}</td>
            <td style="width: 14.2857%; border: 1px solid rgb(19, 11, 11);"></td>
            <td style="width: 14.2857%; border: 1px solid rgb(19, 11, 11);">&nbsp;&nbsp;{{number_format($brough_forward)}}</td>
        </tr>
        @endforeach
        @foreach ($trans_details as $trans )

        @php $brough_forward -= $trans->amount @endphp
        <tr>
            <td style="width: 9.6394%; border: 1px solid rgb(19, 11, 11);">&nbsp;&nbsp;{{ $trans->transactionDate }}</td>
            <td style="width: 28.4345%; border: 1px solid rgb(19, 11, 11);">&nbsp;&nbsp;{{ $trans->paymentDesc }}</td>
            <td style="width: 8.9004%; border: 1px solid rgb(19, 11, 11);">&nbsp;&nbsp;{{ $trans->paymentReference }}</td>
            <td style="width: 15.9664%; border: 1px solid rgb(19, 11, 11);">&nbsp;&nbsp;{{ $trans->receipt }}</td>
            <td style="width: 12.7251%; border: 1px solid rgb(19, 11, 11);"></td>
            <td style="width: 14.2857%; border: 1px solid rgb(19, 11, 11);">&nbsp;&nbsp;{{ number_format($trans->amount) }}</td>
            <td style="width: 14.2857%; border: 1px solid rgb(19, 11, 11);">&nbsp;&nbsp;{{ number_format($brough_forward) }}</td>
        </tr>
        @endforeach

        <tr>
            <td style="width: 88.8355%; border: 1px solid rgb(19, 11, 11);" colspan="6"><div style="align-content: right"><b><font color="#a52a2a">Note:</font><font style="color:rgb(6, 116, 70);align-content: right;">&nbsp;&nbsp;&nbsp;&nbsp;Total outstanding balance as at {{ date("d/m/Y") }}</font></b></div></td>
            <td style="width: 14.2857%; border: 1px solid rgb(19, 11, 11);"><b><font color="#a52a2a">&nbsp;&nbsp;{{ number_format($brough_forward) }}</font></b></td>
        </tr>
    </tbody>
</table>
{{--  <p style='line-height: 165%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-left: 0.16in;margin-right: 1.71in;margin-top: 0.09in;'><span size="2" style="font-size:15px;"><strong>Amount</strong><strong>&nbsp;</strong><strong>in</strong><strong>&nbsp;</strong><strong>word(s)</strong><strong>&nbsp;&nbsp;</strong><strong>:</strong><strong>&nbsp;</strong><strong>ONE</strong><strong>&nbsp;</strong><strong>MILLION,</strong><strong>&nbsp;</strong><strong>ONE</strong><strong>&nbsp;</strong><strong>HUNDRED</strong><strong>&nbsp;</strong><strong>AND</strong><strong>&nbsp;</strong><strong>TEN</strong><strong>&nbsp;</strong><strong>THOUSAND</strong><strong>&nbsp;</strong><strong>ONLY</strong></span></p>  --}}
<p style='line-height: 165%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-left: 0.16in;margin-right: 1.71in;margin-top: 0.09in;'><span size="2" style="font-size:15px;"><strong>Printed By &nbsp;:&nbsp;</strong>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</span></p>
<p style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-left: 0.16in;margin-top: 0.08in;'><span size="2" style="font-size:15px;"><strong>Printed</strong><strong>&nbsp;</strong><strong>On&nbsp;</strong><strong>:&nbsp;</strong>{{ Illuminate\Support\Carbon::now() }}</span></p>
<p style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-left: 0.16in;margin-top: 0.11in;'><span size="2" style="font-size:15px;"><strong>Signature&nbsp;</strong><strong>:&nbsp;</strong>----------------------------------------</span></p>
<html>
    <body>
        <!-- Your content here -->
        <script type="text/php">
            if ( isset($pdf) ) { 
                $pdf->page_script('
                    if ($PAGE_COUNT >= 1) {
                        $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal", 12);
                        $size = 12;
                        $pageText = "Page " . $PAGE_NUM . " of " . $PAGE_COUNT;
                        $y = 550;
                        $x = 400;
                        $pdf->text($x, $y, $pageText, $font, $size);
                    }
                ');
            }
        </script>
    </body>
    </html>