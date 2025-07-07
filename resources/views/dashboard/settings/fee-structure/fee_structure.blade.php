@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Fee Structure</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Fee Structure </h2>
                @can('fee-straucture-create')
                <div class="boxpane-icon">
                    <a href="#" class="btn btn-sm btn-primary p-1 m-1"
                       id="resource-fee-add-button"> <i class="fa fa-pencil"></i> Add Fee Structure</a>
                </div>
                @endcan
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">@lang('app.intro-text')</p>
                    <div class="table-responsive">
                        <table id="feetable" class="table table-bordered table-hover" style="width: 100%;">
                           <thead>
                           <tr>
                               <th>Fee Name</th> 
                               <th>Program Code</th>
                               <th>Amount</th> 
                               <th>Action</th> 
                           </tr>
                           </thead>
                            <tbody>
                                @foreach ($fees as $fee)
                                <tr>
                                    <td>{{$fee->name}}</td>
                                    <td>{{$fee->programme_code}}</td>
                                    <td>{{$fee->amount}}</td>
                                    @php $check_fee_in_invoice = SRS::check_fee(trim($fee->name)) @endphp
                                    @if($check_fee_in_invoice==1)
                                    <td>
                                        <a href="#"><button class="btn btn-danger btn-sm" disabled><i class="fa fa-trash"></i></button></a>
                                        <a href="#" ><button class="btn btn-warning btn-sm" disabled><i class="fa fa-pencil"></i></button></a>
                                    </td>
                                    @else
                                    <td>
                                        <a href="{{ route('fee.delete', ['id' => SRS::encode($fee->id)])}}"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                        <a href="{{ route('fee.edit', ['id' => SRS::encode($fee->id)])}}" ><button class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button></a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection

@section('modals')
    @include('dashboard.settings.fee-structure.modals.fee_modal')
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/custombox.min.css')}}">

@endsection
@section('scripts')

    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>


@endsection
