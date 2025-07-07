@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Enrollment Lists</title>

@endsection


@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" >
    
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    {{-- Enrolled Students-<b class="black"> [{{$campus->campus_name}}]</b> --}}
                    Enrollment Lists</b>

                </h2>

                <div class="boxpane-icon">

                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        {{-- <p class="introtext">

                            Here below is the list of all students that have been admitted successful to the
                          <strong> {{ $campus->institution->institution_name }} ({{ $campus->institution->institution_acronym }})</strong> this academic year,click on student name to perform registration process on that
                            student or use the form bellow to filter students
                        </p> --}}
                        {{-- <div class="row mb-4">
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

                                    <div class="col-sm-2">
                                            <div class="form-group">
                                                {!! Form::label('index_type') !!}
                                                {!! Form::select('index_type', $index_no,null, $errors->has('form') ? ['class' => 'form-control is-invalid','id'=>'index_type'] : ['class' => 'form-control','id'=>'index_type']) !!}

                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                {!! Form::label('index_no', 'Enter Index No.') !!}
                                                {!! Form::text('index_no', old('index_no'), $errors->has('index_no') ? ['placeholder' => 'Index No.','class' => 'form-control is-invalid'] : ['placeholder' => 'Index No.','class' => 'form-control']) !!}

                                            </div>
                                        </div>
                                    <div class="col-sm-2">
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

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            {!! Form::label('program','Studying') !!}
                                            {!! Form::select('program', $programs,'All', $errors->has('program') ? ['class' => 'form-control is-invalid','id'=>'program'] : ['class' => 'form-control','id'=>'program']) !!}

                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group pt-4">

                                            {!! Form::button('Go',['type'=>'submit','class'=>'btn btn-primary']) !!}

                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div> --}}

                        <div class="table-responsive">
                            <table id="admTable" class="table table-bordered table-hover admTable" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th style="width:20px">#</th>
                                    <th>Full Name</th>
                                    <th>Sex</th>
                                    <th>Registration Number</th>
                                    <th>Program</th>
                                    <th>Class Group</th>
                                    {{-- <th>Action</th> --}}
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

@section('scripts')
 
    <script type="text/javascript">
        $('#index_type').select2({
            minimumResultsForSearch: -1,
            placeholder: 'Select Level Index',
        });
        $('#gender,#program').select2({
            minimumResultsForSearch: -1,
        });
        $(document).ready(function () {
          let admTable=  $('#admTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{route('admissions.get-admitted-students',SRS::encode($school))}}',
                    data: function (d) {
                        d.index_type  = $('select[name=index_type]').val();
                        d.index_no = $('input[name=index_no]').val();
                        d.surname  = $('input[name=surname]').val();
                        d.gender   = $('select[name=gender]').val();
                        d.All      = $('select[name=All]').val();
                        d.program = $('select[name=program]').val();

                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data:  'full_name',name:'full_name'},
                    {data:  'gender',name:'gender'},
                    {data: 'reg_no', name: 'reg_no'},
                    {data:  'program_code',name:'program_code'},
                    {data:  'intake_name',name:'intake_name'},
                    // {data:  'actions',name:'actions',searchable:false,sortable:false}
                ],
                dom: 'Bfrtip',
                buttons: [
                    'csv','excel'
                ]
            });
            $('#filter-form').on('submit', function(e) {
                admTable.draw();
                e.preventDefault();
            });
        })
    </script>
 
@endsection
