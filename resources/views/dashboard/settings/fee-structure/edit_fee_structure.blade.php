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
                @can('sponsors-view')
                <div class="boxpane-icon">
                    {{-- <a href="#" class="btn btn-sm btn-primary p-1 m-1"
                       id="resource-fee-add-button"> <i class="fa fa-pencil"></i> Add Fee Structure</a> --}}
                </div>
                @endcan
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">@lang('app.intro-text')</p>

                        <form action="{{ route('fee.update', ['id' => $fee->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input placeholder="{{$fee->name}}" value="{{$fee->name}}" type="text" name="name" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <input placeholder="{{$fee->amount}}" value="{{$fee->amount}}" type="number" class="form-control" name="amount" required>
                            </div>
        
                            <div class="form-group">
                                <input type="text" name="programme_code" value="{{$fee->programme_code}}" class="form-control" placeholder="Programme Code">
                                
                            </div>
        
                            <div class="form-group">
                                <select name="amount_type" class="form-control">
                                    <option value="{{$fee->amount_type}}">{{$fee->amount_type}}</option>
                                    <option value="fixed">Fixed</option>
                                    <option value="flexible">Flexible</option>
                                    <option value="full">Full</option>
                                </select>
                            </div>
        
                            <div class="form-group">
                                <input placeholder="{{$fee->payment_type}}" value="{{$fee->payment_type}}" type="number" class="form-control" name="payment_type"
                                    required>
                            </div>
        
                            <div class="fom-group">
                                <input class="btn btn-success btn-block" type="submit" value="Update Fee Structure">
                            </div>
                        </form>

                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/custombox.min.css')}}">

@endsection
@section('scripts')

    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>


@endsection
