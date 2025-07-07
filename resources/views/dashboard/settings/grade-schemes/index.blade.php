@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Grade Scheme Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">Grade Scheme </h2>

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
                                The following is the list of grade schemes which are used to grade students, click the scheme name to view the grades of the scheme

                            </p>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="icheck-primary m-3 pull-right">
                                        {{Form::checkbox('grade-scheme',old('grade-scheme'),null,['id'=>'grade-scheme'])}}
                                        {!! Form::label('grade-scheme','Add Grade Scheme') !!}

                                    </div>
                                </div>
                            </div>
                            <div class="card m-3" id="grade-scheme-option" style="display: none">
                                {!! Form::open(['route' => 'grade-schemes.store','class'=>'create-mean-test','method'=>'POST','role' => 'form']) !!}

                                <div class="card-body bg-light">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name','Grade Scheme Name') !!}
                                                {!! Form::text('name', old('name'), $errors->has('name') ? ['placeholder' => 'Grade Scheme Name.','class' => 'form-control is-invalid','id'=>'name'] : ['placeholder' => 'Grade Scheme Name','class' => 'form-control','id'=>'name']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::button('Add Grade Scheme',['type'=>'submit','class'=>'btn btn-warning pull-right mt-4']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{Form::close()}}
                            </div>


                            <div class="table-responsive">
                                <table id="instTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>   <th>Scheme Name</th>  <th>GPA Classification</th><th>Actions</th>
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
 @include('dashboard.settings.grade-schemes.modals.edit_grade_scheme_modal')
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
            $('#instTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('grade-schemes.get-grade-schemes')}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'gpa_classification', name: 'gpa_classification',orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection
