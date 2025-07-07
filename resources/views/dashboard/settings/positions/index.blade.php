@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Position  Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Positions 
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
                                The following are the Staff Positions
                            </p>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="icheck-primary m-3 pull-right">
                                        {{Form::checkbox('position',old('position'),null,['id'=>'position'])}}
                                        {!! Form::label('position','Add Position') !!}

                                    </div>
                                </div>
                            </div>
                            <div class="card m-3" id="positions-option" style="display: none">
                                {!! Form::open(['route' => 'positions.store','class'=>'create-position','method'=>'POST','role' => 'form']) !!}
                                <div class="card-body bg-light">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                {!! Form::label('position_name','Position name') !!}
                                                {!! Form::text('position_name', old('position_name'), $errors->has('position_name') ? ['placeholder' => 'Enter position name','class' => 'form-control is-invalid','id'=>'position_name'] : ['placeholder' => 'Enter Position name','class' => 'form-control','id'=>'position_name']) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::button('Add Position',['type'=>'submit','class'=>'btn btn-warning pull-right mt-4']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{Form::close()}}
                            </div>


                            <div class="table-responsive">
                                <table id="posTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Position Name</th>
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
  @include('dashboard.settings.positions.modals.edit_position_modal')
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
            $('#posTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('positions.get-positions')}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'position_name', name: 'position_name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>
@endsection