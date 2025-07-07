<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
        }

        #header {
            background-color: #f0f0f0;
        }

        #header table {
            padding: 10px;
        }

        #logo {
            width: 80px;
            height: 80px;
            margin-right: 5px;
        }

        #company-info {
            font-weight: bold;
        }

        #receipt-number {
            text-align: right;
        }

        #receipt-info {
            display: flex;
            justify-content: space-between;
        }

        #customer-info,
        #receipt-details {
            flex-grow: 1;
        }

        hr {
            border: #e6e6e6;
        }
    </style>
</head>

<body>
    <div id="header">
        <table>
            <tr>
                <td>
                    <img id="logo" src="{{ public_path('assets/uploads/logo/logo.png') }}" alt="Logo">
                </td>
                {{-- <td id="company-info">
                    <h4>{{ strtoupper(\App\Models\Institution::first()->institution_name ?? '') }}</h4>
                </td> --}}
                <td id="receipt-number">
                    <strong>Receipt #: {{ $data[0]['receipt'] }}</strong><br>
                    Time: {{ Illuminate\Support\Carbon::now() }}
                </td>
            </tr>
        </table>
    </div>
    <div id="receipt-info">
        <div id="customer-info">
            <h4 style="margin-bottom: 2px">Student Information</h4>
            <hr>
            <table>
                <tr>
                    <td width="30%">Name:</td>
                    <td width="70%">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</td>
                </tr>
                <tr>
                    <td width="30%">Registration #:</td>
                    <td width="70%">{{ $data[0]['payerID'] }}</td>
                </tr>
                <tr>
                    <td width="30%">Phone Number:</td>
                    <td width="70%">{{ $data[0]['payerMobile'] }}</td>
                </tr>

            </table>
        </div>

        <div id="receipt-details">
            <h4 style="margin-bottom: 2px">Payment Details</h4>
            <hr>
            <table>
                <tr>
                    <td width="30%">Reference Number:</td>
                    <td width="70%"> {{ $data[0]['paymentReference'] }}</td>
                </tr>
                <tr>
                    <td width="30%">Fee:</td>
                    <td width="70%">{{ $data[0]['paymentDesc'] }}</td>
                </tr>
                <tr>
                    <td width="30%">Payment Date:</td>
                    <td width="70%">{{ $data[0]['transactionDate'] }}</td>
                </tr>

                <tr>
                    <td width="30%">Payment Channel:</td>
                    <td width="70%">{{ $data[0]['transactionChannel'] }}</td>
                </tr>
                <tr>
                    <td width="30%">Currency:</td>
                    <td width="70%">{{ $data[0]['currency'] }}</td>
                </tr>


            </table>
            <hr>
            <table>
                <tr>
                    <td width="30%">Total Amount:</td>
                    <td width="70%">{{ $data[0]['amount'] }}</td>
                </tr>
            </table>
            <hr>
        </div>
    </div>
</body>

</html>
