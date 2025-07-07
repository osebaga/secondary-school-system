@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | Payment</title>
@endsection

@section('content')
    <style>
        .card {
            /* margin: 0 auto; */
            /* Added */
            float: none;
            /* Added */
            margin-bottom: 10px;
            /* Added */
            margin-inline: 1%
        }
    </style>
    @if ($message = Session::get('status'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header d-flex justify-content-between">
                    <h2 class="blue"><i class="fa-fw fa fa-check"></i>
                        Bills List
                    </h2>
                    <button class="btn"><a href="{{ route('payment') }}" title="Close"><i class="fa fa-close fa-2x "></i></a></button>

                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">

                            </p>
                            Payment options for paying invoice with control number of {{ $controlNumber }}
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="card col-md-6">
                            <div style="height: 20vh; width: 100%;">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2j56TCcucrZyO8wD3ZJ5A83GXiYejQwho1CZKY9Q2&s"
                                    class="img img-fluid mt-2" class="img-fluid">

                            </div>
                            <ul class=" list-inline mt-3">
                                <li class="list-inline-item"><strong>STEP 1:</strong> Piga No *150*01#</li>
                                <li class="list-inline-item"><strong>STEP 2:</strong> Chagua “4” Lipa Bili </li>
                                <li class="list-inline-item"><strong>STEP 3:</strong> Chagua “3” Ingiza namba ya Kampuni</li>
                                <li class="list-inline-item"><strong>STEP 4:</strong> Ingiza namba ya kampuni “900600”</li>
                                <li class="list-inline-item"><strong>STEP 5:</strong> Weka Kumbukumbu namba “reference number”
                                    eg.Mum040855618</li>
                                <li class="list-inline-item"><strong>STEP 6:</strong> Ingiza Kiasi cha malipo</li>
                                <li class="list-inline-item"><strong>STEP 7:</strong> Ingiza namba ya siri</li>

                            </ul>
                        </div>
                        <div class="card col-md-6">
                            <div class="w-100" style="height: 20vh;">
                                <img src="data:image/png;base64,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"
                                    class="img img-fluid mt-2" class="img-fluid">

                            </div>
                            <ul class=" list-inline mt-3">
                                <li class="list-inline-item"><strong>STEP 1:</strong> Open app</li>
                                <li class="list-inline-item"><strong>STEP 2:</strong> At the bottom menu select the fourth icon
                                    "Service/Malipo"</li>
                                <li class="list-inline-item"><strong>STEP 3:</strong> Click "Malipo Zaidi" or "More payments"</li>
                                <li class="list-inline-item"><strong>STEP 4:</strong> Search on Top MUM</li>
                                <li class="list-inline-item"><strong>STEP 5:</strong> Enter Reference number eg.Mum040855618 and click "PATA
                                    TAARIFA" button</li>
                                <li class="list-inline-item"><strong>STEP 6:</strong> Click "ENDELEA" button</li>
                            </ul>
                        </div>
                        {{-- <div class="card col">
                            <img src="data:image/png;base64,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"
                                class="img img-fluid mt-2" alt="Airtel money logo" style="height: 70px">
                            <ul class=" list-inline mt-3">
                                <li class="list-inline-item"><strong>STEP 1:</strong> Open app</li>
                                    <li class="list-inline-item"><strong>STEP 2:</strong> At the bottom menu select the fourth icon "Service/Malipo"</li>
                                    <li class="list-inline-item"><strong>STEP 3:</strong> Click "Malipo Zaidi" or "More payments"</li>
                                    <li class="list-inline-item"><strong>STEP 4:</strong> Search on Top MUM</li>
                                    <li class="list-inline-item"><strong>STEP 5:</strong> Enter Reference number eg.Mum040855618 and click "PATA TAARIFA" button</li>
                                    <li class="list-inline-item"><strong>STEP 6:</strong> Click "ENDELEA" button</li>
                            </ul>
                        </div> --}}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
