@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Grade  Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Grade Configuration for -<b class="black">{{$study_level->level_name}}</b>
                    </h2>

                    <div class="boxpane-icon">
                        <ul class="btn-tasks">
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="#">
                                    <i class="icon fa fa-tasks3" data-placement="left"
                                       title="{{"Actions"}}"></i>
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">
                                The following are the grade configured
                            </p>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="icheck-primary m-3 pull-right">
                                        {{Form::checkbox('grade',old('grades'),null,['id'=>'grades'])}}
                                        {!! Form::label('grades','Add Grade') !!}

                                    </div>
                                </div>
                            </div>
                            <div class="card m-3" id="grades-option" style="display: none">
                                {!! Form::open(['route' => 'grades.store','class'=>'create-mean-test','method'=>'POST','role' => 'form']) !!}
                                {!! Form::hidden('study_level_id',SRS::encode($study_level->id)) !!}
                                <div class="card-body bg-light">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('grade','Grade') !!}
                                                {!! Form::text('grade', old('grade'), $errors->has('grade') ? ['placeholder' => 'Enter Grade','class' => 'form-control is-invalid','id'=>'grade'] : ['placeholder' => 'Enter Grade','class' => 'form-control','id'=>'grade']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('high_value','High value') !!}
                                                {!! Form::number('high_value', old('high_value'), $errors->has('high_value') ? ['placeholder' => 'Enter highest grade value','class' => 'form-control is-invalid','id'=>'high_value'] : ['placeholder' => 'Enter highest grade value','class' => 'form-control','id'=>'high_value']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('low_value','Low value') !!}
                                                {!! Form::number('low_value', old('low_value'), $errors->has('low_value') ? ['placeholder' => 'Enter lowest grade value','class' => 'form-control is-invalid','id'=>'low_value'] : ['placeholder' => 'Enter lowest grade value','class' => 'form-control','id'=>'low_value']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('grade_point','Grade Point') !!}
                                                {!! Form::number('grade_point', old('grade_point'), $errors->has('grade_point') ? ['placeholder' => 'Enter grade point','class' => 'form-control is-invalid','id'=>'grade_point'] : ['placeholder' => 'Enter grade point','class' => 'form-control','id'=>'grade_point']) !!}
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <fieldset class="customLegend row">
                                                <legend>
                                                    <h2 class="blue pb-0 mb-0">Grade Equation</h2>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                    <div class="form-group">
                                                        {!! Form::label('left_value','Left Value') !!}
                                                        {!! Form::text('left_value', old('left_value'), $errors->has('left_value') ? ['placeholder' => 'Enter Left value of RM','class' => 'form-control is-invalid','id'=>'grade'] : ['placeholder' => 'Enter Left Value of RM','class' => 'form-control','id'=>'left_value']) !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        {!! Form::label('operator','Operator') !!}
                                                        {!! Form::text('operator', old('operator'), $errors->has('operator') ? ['placeholder' => 'Enter Operator("eg. + or -")','class' => 'form-control is-invalid','id'=>'high_value'] : ['placeholder' => 'Enter Operator("eg. + or -")','class' => 'form-control','id'=>'operator']) !!}
                                                    </div>
                                                </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            {!! Form::label('right_value','Right Value') !!}
                                                            {!! Form::text('right_value', old('right_value'), $errors->has('left_value') ? ['placeholder' => 'Enter Right value of RM','class' => 'form-control is-invalid','id'=>'grade'] : ['placeholder' => 'Enter Right Value of RM','class' => 'form-control','id'=>'right_value']) !!}
                                                        </div>
                                                    </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        {!! Form::label('point_decimal_place','Grade Point Decimal Places') !!}
                                                        {!! Form::number('point_decimal_place', old('point_decimal_place'), $errors->has('grade_point') ? ['placeholder' => 'Enter grade point decimal places','class' => 'form-control is-invalid','id'=>'grade_point'] : ['placeholder' => 'Enter grade point decimal places','class' => 'form-control','id'=>'point_decimal_place']) !!}
                                                    </div>
                                                </div>
                                                </div>
                                            </fieldset>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::button('Add Grade',['type'=>'submit','class'=>'btn btn-success pull-right mt-4']) !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                {{Form::close()}}
                            </div>


                            <div class="table-responsive">
                                <table id="gradeTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>S/No</th>
                                        <th>Grade</th>
                                        <th>High Value</th>
                                        <th>Low Value</th>
                                        <th>Grade Points</th>
                                        {{-- <th>Grade Points Equation</th> --}}
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
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
  @include('dashboard.settings.grades.modals.edit_grade_modal')
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/custombox.min.css')}}">

@endsection
@section('scripts')
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/custombox.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/legacy.min.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#gradeTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('grades.get-grades',$id)}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'grade', name: 'grade'},
                    {data: 'high_value', name: 'high_value'},
                    {data: 'low_value', name: 'low_value'},
                    {data: 'grade_point', name: 'grade_point'},
                    // {data: 'eqn', name: 'eqn'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection
