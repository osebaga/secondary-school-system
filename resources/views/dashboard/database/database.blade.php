@extends('layouts.dashboard')


@section('title')
    Query For Administration
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="boxpane">
                    <div class="boxpane-header">
                        <h2 class="blue">
                            Adhoc Query For Administration
                        </h2>
                    </div>
                    <div class="boxpane-content">
                        {!! Form::open(['route' => 'database.query','class'=>'query-db','method'=>'POST','role' => 'form']) !!}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('sql','Please Enter Your SQL Query') !!}
                                    {!! Form::textarea('sql', old('sql'), $errors->has('sql') ? ['placeholder' => 'SQL QUERY.','class' => 'form-control is-invalid','id'=>'sql'] : ['placeholder' => '','class' => 'form-control','id'=>'sql']) !!}
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group pull-right">
                                        {!! Form::button('Execute Query',['type'=>'submit','class'=>'btn btn-primary pull-right mt-4']) !!}
                                    </div>
                                </div>

                            </div>

                        </div>
                        {!! Form::close() !!}

                        <div class="row">
                            <p class="p-t-10">
                                @if (!is_null($result))
                                    @foreach($result as $r)

                                            @dump($r)</br>
                                    @endforeach
                                @endif
                            </p>
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
