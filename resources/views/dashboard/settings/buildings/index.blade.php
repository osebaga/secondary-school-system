@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Offices  Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Buildings/Offices 
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
                                The following are the Staff Offices
                            </p>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="icheck-primary m-3 pull-right">
                                        {{Form::checkbox('building',old('building'),null,['id'=>'building'])}}
                                        {!! Form::label('building','Add Building/Office') !!}

                                    </div>
                                </div>
                            </div>
                            <div class="card m-3" id="building-option" style="display: none">
                                {!! Form::open(['route' => 'buildings.store','class'=>'create-building','method'=>'POST','role' => 'form']) !!}
                                <div class="card-body bg-light">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('building_name','Building/Office name') !!}
                                                {!! Form::text('building_name', old('building_name'), $errors->has('building_name') ? ['placeholder' => 'Enter Building','class' => 'form-control is-invalid','id'=>'building_name'] : ['placeholder' => 'Enter Building','class' => 'form-control','id'=>'building_name']) !!}

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('location','Office Location') !!}
                                                {!! Form::text('location', old('location'), $errors->has('location') ? ['placeholder' => 'Enter Office/building Location','class' => 'form-control is-invalid','id'=>'location'] : ['placeholder' => 'Enter Office/building Location','class' => 'form-control','id'=>'location']) !!}

                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::button('Change Building',['type'=>'submit','class'=>'btn btn-warning pull-right mt-4']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{Form::close()}}
                            </div>


                            <div class="table-responsive">
                                <table id="buildingTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Building/Office Name</th>
                                        <th>Location</th>

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
  @include('dashboard.settings.buildings.modals.edit_building_modal')
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
            $('#buildingTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('buildings.get-buildings')}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'building_name', name: 'building_name'},
                    {data: 'location', name: 'location'},

                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection