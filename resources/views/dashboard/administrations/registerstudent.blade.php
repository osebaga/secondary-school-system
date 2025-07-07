@extends('layouts.dashboard')


@section('title')
    Search Student Record
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="boxpane">
                    <div class="boxpane-header">
                        <h2 class="blue">
                            Search Student Record
                        </h2>
                    </div>
                    <div class="boxpane-content">
                        <form action="{{ route('administrations.register-student-course') }}" role="role" method="POST"  >
                       @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('search','Enter  Registration Number') !!}
                     <input type="text" name="search" class="form-control" placeholder="Enter student registration Number" required>
                                 </div>
                                <div class="col-md-12">
                                    <div class="form-group pull-right">
                                        {!! Form::button('Go',['type'=>'submit','class'=>'btn btn-primary pull-right mt-4']) !!}
                                    </div>
                                </div>

                            </div>

                        </div>
                        {!! Form::close() !!}

                        <div class="row">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('modals')

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/custombox.min.css')}}">

@endsection
@section("scripts")
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/custombox.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/legacy.min.js')}}"></script>

    <script type="text/javascript">
        var coursesTable = $('#coursesTable').DataTable({
            processing: true,
            serverSide: false,
            language : {
                sLoadingRecords : '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>'
            },

        })

    </script>
@endsection
