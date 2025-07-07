@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Registered Students</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Registered Students-<b class="black"> [{{$campus->campus_name}}]</b>
                </h2>
                <div class="boxpane-icon">
                    <ul class="btn-tasks">
                        <a class="btn btn-sm btn-primary p-1 m-1" href="{{ url()->previous() }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
                    </ul>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">
                            Here below is the list of all students
                        </p>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="icheck-primary m-3 pull-right">
                                    {{Form::checkbox('admission-filter',old('admission-filter'),null,['id'=>'admission-filter'])}}
                                    {!! Form::label('admission-filter','Filter For Student') !!}

                                </div>
                            </div>
                        </div>

                        <div class="card mb-4 bg-light display-none"  id="admission-filter-option">
                            <div class="card-body">
                                {!! Form::open([null,'id'=>'filter-form','class'=>'create-direct-cost','method'=>'POST','role' => 'form']) !!}

                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            {!! Form::label('Registration_type') !!}
                                            {!! Form::select('index_type', $index_no,null, $errors->has('form') ? ['class' => 'form-control is-invalid','id'=>'index_type'] : ['class' => 'form-control','id'=>'index_type']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            {!! Form::label('index_no', 'Enter Index No.') !!}
                                            {!! Form::text('index_no', old('index_no'), $errors->has('index_no') ? ['placeholder' => 'Type No.','class' => 'form-control is-invalid'] : ['placeholder' => 'Index No.','class' => 'form-control']) !!}

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            {!! Form::label('surname', 'Type Surname.') !!}
                                            {!! Form::text('surname', old('surname'), $errors->has('surname') ? ['placeholder' => 'Type Surname.','class' => 'form-control is-invalid'] : ['placeholder' => 'Type Surname.','class' => 'form-control']) !!}

                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            {!! Form::label('gender','gender') !!}
                                            {!! Form::select('gender', $gender,'All', $errors->has('gender') ? ['class' => 'form-control is-invalid','id'=>'gender'] : ['class' => 'form-control','id'=>'gender']) !!}

                                        </div>
                                    </div>

                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            {!! Form::label('program','Studying') !!}
                                            {!! Form::select('program', $programs,'All', $errors->has('program') ? ['class' => 'form-control is-invalid','id'=>'program'] : ['class' => 'form-control','id'=>'program']) !!}

                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group pt-4 pull-right">

                                            {!! Form::button('Go',['type'=>'submit','class'=>'btn btn-primary']) !!}

                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="admTable" class="table table-bordered table-hover" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th style="width:20px">#</th>
                                    <th>Student Name</th>
                                    <th>Sex</th>
                                    <th>REG NO.</th>
                                    <th>Program</th>
                                    <th>Class Group</th>
                                    <th>Student Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <!-- X-editable css -->
    <link type="text/css" href="{{asset('assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet" />
@endsection

@section('scripts')
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- X-editable Plugin -->
    <script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.min.js')}}"></script>


    <script type="text/javascript">
        $('#index_type').select2({
            minimumResultsForSearch: -1,
            placeholder: 'Select Type',
        });
        $('#srs,#sps,#acs,#dvs,#ras,#gender,#program').select2({
            minimumResultsForSearch: -1,
            // placeholder: 'Select SRS',
        });
        $(document).ready(function () {
            let admTable=  $('#admTable').DataTable({
                processing: true,
                serverSide: true,
                sDom: 'ltipr',
                ajax: {
                    url: '{{route('student-panel.get-campus-students',SRS::encode($campus->id))}}',
                    data: function (d) {
                        d.index_type  = $('select[name=index_type]').val();
                        d.index_no = $('input[name=index_no]').val();
                        d.surname  = $('input[name=surname]').val();
                        d.gender   = $('input[name=gender]').val();
                        d.All      = $('select[name=All]').val();
                        d.program = $('select[name=program]').val();

                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data:  'full_name',name:'full_name'},
                    {data:  'gender',name:'gender'},
                    {data: 'reg_no', name: 'reg_no'},
                    {data:  'program_acronym',name:'program_acronym'},
                    {data:  'intake_category.name',name:'intake_category.name'},
                    {data:  'std_status',name:'std_status'},
                    {data:  'actions',name:'actions', searchable:false,orderable:false}
                ]
            });
            $('#filter-form').on('submit', function(e) {
                admTable.draw();
                e.preventDefault();
            });
            $('#admTable').on('draw.dt', function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        })


        $(function() {
            //modify buttons style
            $.fn.editableform.buttons =
                '<button type="submit" class="btn btn-primary editable-submit btn-sm waves-effect waves-light"><i class="mdi mdi-check"></i></button>' +
                '<button type="button" class="btn btn-light editable-cancel btn-sm waves-effect"><i class="mdi mdi-close"></i></button>';
        });

        $('.student_disco_status').editable({
            prepend: "Select Status",
            mode: 'inline',
            inputclass: 'form-control-sm',
            source: [
                {value:'In Progress', text: 'In Progress'},
                {value: 'SPECIAL', text: 'SPECIAL'},
                {value: 'ABSCONDED', text: 'ABSCONDED'},
                {value: 'POSTPONED', text: 'POSTPONED'},


            ],
            display: function(value, sourceData) {
                var colors = {"": "gray", 1: "green", 2: "blue"},
                    elem = $.grep(sourceData, function(o){return o.value == value;});

                if(elem.length) {
                    $(this).text(elem[0].text).css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            },
            params: function(params) {
                // add additional params from data-attributes of trigger element
                params._token = $('meta[name="csrf-token"]').attr('content');
                //// params.value = $(this).editable().data('value');
                // params.cs_id = $(this).editable().data('cs_id');
                return params;
            },
            send:'always',
            ajaxOptions: {
                dataType: 'json',
                type: 'post'
            },
            success:function (data) {
                console.log(data) ;
            },
            error:function (response,newValue) {

                console.log(response);
            }
        });


    </script>
@endsection
