<p
    style="line-height: 100%; text-align: left; margin-bottom: 0in; background: transparent; font-family: Cambria, serif; font-size: 13px; margin-left: 4.96in;">
    <span style="font-size: 12px;">
        <img id="logo" src="{{ public_path('assets/uploads/logo/logo.png') }}" width="100" height="100"></span>
</p>
{{--  <p style="text-align: center;margin: 0.07in 2.53in 0in;background: transparent;font-family: Cambria, serif;font-size:13px;line-height: 131%;"><span style="font-size: 14px;">Jamhuri ya Muungano wa Tanzania United Republic of Tanzania</span></p>  --}}
<p style="line-height: 100%;text-align: center;margin-bottom: 0in;background: transparent;margin-top: 0.09in;"><span
        size="3" style="font-size: 14px;"><strong>KANGE COLLEGE OF HEALTH AND ALLIED SCIENCES</strong></span></p>
<p
    style="line-height: 131%; text-align: center; margin-bottom: 0in; background: transparent; font-family: Cambria, serif; font-size: 13px; margin-right: 2.55in; margin-top: 0.09in;">
    <span style="font-size: 14px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Stakabadhi ya Malipo</span></p>
<hr>
{{--  <p style="text-align: left;"><span size="2" style="font-size: 14px;"><strong>&nbsp; &nbsp;
            Receipt</strong><strong>&nbsp;</strong><strong>No</strong><strong>:&nbsp;&nbsp;&nbsp;</strong>{{ $data[0]['receipt'] }}</span>
</p>  --}}
<p
    style="line-height: 100%; text-align: left; margin-bottom: 0in; background: transparent; font-family: Cambria, serif; font-size: 13px; margin-left: 0.16in; margin-top: 0.11in;">
    <span size="2"
        style="font-size: 14px;"><strong>Registration</strong><strong>&nbsp;</strong><strong>Number</strong><strong>:&nbsp;&nbsp;&nbsp;</strong><strong></strong>{{ $data[0]['payerID'] }}</span>
</p>
<p
    style="line-height: 100%; text-align: left; margin-bottom: 0in; background: transparent; font-family: Cambria, serif; font-size: 13px; margin-left: 0.16in; margin-top: 0.11in;">
    <span size="2"
        style="font-size: 14px;"><strong>Received</strong><strong>&nbsp;</strong><strong>From</strong><strong>:&nbsp;&nbsp;&nbsp;</strong>{{ $data[0]['payerName'] }}</span>
</p>
<p
    style="line-height: 100%; text-align: left; margin-bottom: 0in; background: transparent; font-family: Cambria, serif; font-size: 13px; margin-left: 0.16in; margin-top: 0.11in;">
    <span size="2"
        style="font-size: 14px;"><strong>Amount(TZS)</strong><strong>&nbsp;</strong><strong>:&nbsp;&nbsp;&nbsp;</strong>{{ number_format($data[0]['amount'], 2) }}</span>
</p>
{{--  <p style="line-height: 100%; text-align: left; margin-bottom: 0in; background: transparent; font-family: Cambria, serif; font-size: 13px; margin-left: 0.16in; margin-top: 0.11in;"><span size="2" style="font-size: 14px;"><strong>Amount in Words:&nbsp;&nbsp;&nbsp;</strong>{{ strtoupper(convert_number_to_words($data[0]['amount'] ))}}</span><strong><br></strong></p>  --}}
{{--  <p style="line-height: 100%; text-align: left; margin-bottom: 0in; background: transparent; font-family: Cambria, serif; font-size: 13px; margin-left: 0.16in; margin-top: 0.11in;"><span size="2" style="font-size: 14px;"><strong>Outstanding</strong><strong>&nbsp;</strong><strong>Balance</strong><strong>:</strong>0.00</span></p>  --}}
<p
    style="line-height: 100%; text-align: left; margin-bottom: 0in; background: transparent; font-family: Cambria, serif; font-size: 13px; margin-left: 0.16in; margin-top: 0.11in;">
    <br></p>
<table style="width: 98%; border-collapse: collapse; border: 1px solid rgb(41, 40, 40); margin-left: calc(4%);">
    <tbody>
        <tr>
            <td style="width: 16.6773%; border: 1px solid rgb(41, 40, 40);">
                <p
                    style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.04in;margin-top: 0.03in;">
                    <span size="2"
                        style="font-size: 14px;"><strong>Reference&nbsp;</strong><strong>Number</strong></span></p>
            </td>
            <td style="width: 63.6348%; border: 1px solid rgb(41, 40, 40);">
                <p
                    style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.04in;margin-top: 0.03in;">
                    <span size="2" style="font-size: 14px;"><strong>Item
                            &nbsp;</strong><strong>description(s)</strong></span></p>
            </td>
            <td style="width: 19.5622%; border: 1px solid rgb(41, 40, 40);">
                <p
                    style="line-height: 100%;text-align: right;margin-bottom: 0in;background: transparent;margin-right: 0.02in;margin-top: 0.03in;">
                    <span size="2" style="font-size: 14px;"><strong>Receipt
                            &nbsp;</strong><strong>Number</strong></span></p>
            </td>
            <td style="width: 19.5622%; border: 1px solid rgb(41, 40, 40);">
                <p
                    style="line-height: 100%;text-align: right;margin-bottom: 0in;background: transparent;margin-right: 0.02in;margin-top: 0.03in;">
                    <span size="2" style="font-size: 14px;"><strong>Item
                            &nbsp;</strong><strong>Amount</strong></span></p>
            </td>
        </tr>
        <tr>
            <td style="width: 16.6773%; border: 1px solid rgb(41, 40, 40);"><span
                    style='color: rgb(0, 0, 0); font-family: "Times New Roman"; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline !important;'>&nbsp;{{ $data[0]['paymentReference'] }}</span>
            </td>
            <td style="width: 63.6348%; border: 1px solid rgb(41, 40, 40);">
                <p
                    style="line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;margin-left: 0.04in;margin-top: 0.03in;">
                    <span style="text-align: left;font-size: 14px;">{{ $data[0]['paymentDesc'] }}</span></p>
            </td>
            <td style="width: 19.5622%; border: 1px solid rgb(41, 40, 40);">
                <p
                    style="line-height: 100%;text-align: right;margin-bottom: 0in;background: transparent;margin-right: 0.02in;margin-top: 0.03in;">
                    <span size="2" style="font-size: 14px;">{{ $data[0]['transactionRef'] }}</span></p>
            </td>
            <td style="width: 19.5622%; border: 1px solid rgb(41, 40, 40);">
                <p
                    style="line-height: 100%;text-align: right;margin-bottom: 0in;background: transparent;margin-right: 0.02in;margin-top: 0.03in;">
                    <span size="2" style="font-size: 14px;">{{ number_format($data[0]['amount'], 2) }}</span></p>
            </td>
        </tr>
        <tr>
            <td style="width: 87.3832%; border: 1px solid rgb(41, 40, 40);" colspan="3">
                <div style="text-align: center;"><span size="2" style="font-size: 14px;"><strong>Total Billed Amount</strong></span></div>
            </td>

            <td style="width: 12.4943%; text-align: center; border: 1px solid rgb(41, 40, 40);">
                <div style="text-align: right;"><span style="font-size: 14px;"><strong>{{ number_format($data[0]['amount'], 2) }}(TZS)</strong></span></div>
            </td>
        </tr>
    </tbody>
</table>
<p
    style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-left: 0.16in;margin-top: 0.11in;'>
    <br></p>
<p
    style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-left: 0.16in;margin-top: 0.11in;'>
    <span size="2" style="font-size: 14px;"><strong>Payment
            Date:&nbsp;&nbsp;&nbsp;</strong>{{ $data[0]['transactionDate'] }}</span></p>
<p
    style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-left: 0.16in;margin-top: 0.11in;'>
    <span size="2" style="font-size: 14px;"><strong>Issued
            By:&nbsp;&nbsp;&nbsp;</strong>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</span></p>
<p
    style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-left: 0.16in;margin-top: 0.11in;'>
    <span size="2"
        style="font-size: 14px;"><strong>Date&nbsp;Issued:&nbsp;&nbsp;&nbsp;</strong>{{ Illuminate\Support\Carbon::now() }}</span>
</p>
<p
    style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-left: 0.16in;margin-top: 0.11in;'>
    <span size="2" style="font-size: 14px;"><strong>Signature
            :----------------------------------------</strong></span></p>
<p
    style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;'>
    <span style="font-size: 14px;"><strong><br></strong></span></p>
<p
    style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;'>
    <span style="font-size: 14px;"><strong><br></strong></span></p>
<p
    style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;'>
    <span style="font-size: 14px;"><strong><br></strong></span></p>
<p
    style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;'>
    <span style="font-size: 14px;"><strong><br></strong></span></p>
<p
    style='line-height: 100%;text-align: left;margin-bottom: 0in;background: transparent;font-family: "Cambria", serif;font-size:13px;margin-left: 0.11in;'>
    <br></p>
{{--  <hr>  --}}
{{--  <p
    style="line-height: 100%; text-align: justify; margin-bottom: 0in; background: transparent; font-family: Cambria, serif; font-size: 13px; margin-left: 0.11in;">
    <span size="2"
        style="font-size: 14px;"><strong><em>Printed</em><em>&nbsp;</em><em>on</em><em>&nbsp;</em><em>:{{ Illuminate\Support\Carbon::now() }}</em><em></em><em></em><em>&nbsp;</em><em>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;</em></strong></span><span size="2" style="font-size:15px;"><span size="1"
            style="font-size: 14px;"><strong><em>Page&nbsp;</em><em>1/1&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;SAMIS SOFTWARE
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</em></strong></span><span
            size="1" style="font-size: 12px;"><strong><em>&nbsp;</em></strong></span></span>
        </p>  --}}
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