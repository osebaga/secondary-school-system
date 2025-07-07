@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |GPA Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        GPA -<b class="black">{{$faculty->faculty_name}}</b>
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
                                The following are the GPA's
                            </p>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="icheck-primary m-3 pull-right">
                                        {{Form::checkbox('gpa',old('gpa'),null,['id'=>'gpa'])}}
                                        {!! Form::label('gpa','Add GPA') !!}

                                    </div>
                                </div>
                            </div>
                            <div class="card m-3" id="gpa-option" style="display: none">
                                {!! Form::open(['route' => 'gpa.store','class'=>'create-gpa','method'=>'POST','role' => 'form']) !!}
                                {!! Form::hidden('college_id',$id) !!}
                                <div class="card-body bg-light">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('sup_gpa','Continue GPA') !!}
                                                {!! Form::text('sup_gpa', old('sup_gpa'), $errors->has('sup_gpa') ? ['placeholder' => 'Enter Supplementary GPA','class' => 'form-control is-invalid','id'=>'sup_gpa'] : ['placeholder' => 'Enter Supplementary GPA','class' => 'form-control','id'=>'sup_gpa']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('continue_gpa','Continue Student GPA') !!}
                                                {!! Form::text('continue_gpa', old('continue_gpa'), $errors->has('continue_gpa') ? ['placeholder' => 'Enter lowest Continue Student GPA','class' => 'form-control is-invalid','id'=>'continue_gpa'] : ['placeholder' => 'Enter Continue Student GPA','class' => 'form-control','id'=>'continue_gpa']) !!}
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::button('Add GPA Control',['type'=>'submit','class'=>'btn btn-warning pull-right mt-4']) !!}
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
                                        <th>#</th>
                                        <th>Supplementary GPA</th>
                                        <th>Continue Student GPA</th>

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
                ajax: '{{route('gpa-settings.get-gpa',$id)}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'sup_gpa', name: 'sup_gpa'},
                    {data: 'continue_gpa', name: 'continue_gpa'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection
