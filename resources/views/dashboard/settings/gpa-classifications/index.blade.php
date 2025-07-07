@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Class Award  Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        GPA Configuration for -<b class="black">{{$study_level->level_name}}</b>
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
                                The following are the Class Award  Configuration of this Level
                            </p>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="icheck-primary m-3 pull-right">
                                        {{Form::checkbox('gpa-class',old('gpa-class'),null,['id'=>'gpa-class'])}}
                                        {!! Form::label('gpa-class','Add Class Award') !!}

                                    </div>
                                </div>
                            </div>
                            <div class="card m-3" id="gpa-class-option" style="display: none">
                                {!! Form::open(['route' => 'gpa-classifications.store','class'=>'create-gpa-class','method'=>'POST','role' => 'form']) !!}
                                {!! Form::hidden('study_level_id',$id) !!}
                                <div class="card-body bg-light">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('class_award','Class Award') !!}
                                                {!! Form::text('class_award', old('class_award'), $errors->has('class_award') ? ['placeholder' => 'Enter Class Award','class' => 'form-control is-invalid','id'=>'gpa_lass'] : ['placeholder' => 'Enter Class Award','class' => 'form-control','id'=>'gpa_class']) !!}
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('high_gpa','Low value') !!}
                                                {!! Form::number('high_gpa', old('high_gpa'), $errors->has('high_gpa') ? ['placeholder' => 'Enter lowest Class Award value','class' => 'form-control is-invalid','id'=>'low_value','step'=>'any'] : ['placeholder' => 'Enter lowest Class Award value','class' => 'form-control','id'=>'low_value','step'=>'any']) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('low_gpa','High value') !!}
                                                {!! Form::number('low_gpa', old('low_gpa'), $errors->has('low_gpa') ? ['placeholder' => 'Enter highest Class Award value','class' => 'form-control is-invalid','id'=>'high_value','step'=>'any'] : ['placeholder' => 'Enter highest Class Award value','class' => 'form-control','id'=>'high_value','step'=>'any']) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::button('Save Class Award',['type'=>'submit','class'=>'btn btn-success pull-right mt-4']) !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                {{Form::close()}}
                            </div>


                            <div class="table-responsive">
                                <table id="classTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>S/No</th>
                                        <th>Class Award</th>
                                        <th>High Value</th>
                                        <th>Low Value</th>
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
  @include('dashboard.settings.gpa-classifications.modals.edit_gpa_classification_modal')
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
            $('#classTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('gpa-classifications.get-class',$id)}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'class_award', name: 'class_award'},
                    {data: 'low_gpa', name: 'low_gpa'},
                    {data: 'high_gpa', name: 'high_gpa'},

                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection
