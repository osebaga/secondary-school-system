@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Institutions </h2>
                @can('institutions-create')
                <div class="boxpane-icon">
                    <a href="#" data-url="{{route('institutions.create')}}" class="btn btn-sm btn-primary p-1 m-1"
                       id="resource-institution-add-button"> <i class="fa fa-pencil"></i> Add Institution</a>
                </div>
                @endcan
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">@lang('app.intro-text')</p>
                    <div class="table-responsive">
                        <table id="instTable" class="table table-bordered table-hover" style="width: 100%;">
                           <thead>
                           <tr>
                               <th>S/No</th> 
                               <th>Institute Name</th>
                               <th>Institute Acronym</th> 
                               <th>Actions</th>
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
    @include('dashboard.settings.institutions.modals.inst_modal')
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/custombox.min.css')}}">

@endsection
@section('scripts')

    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>


    <script type="text/javascript">

        $(document).ready(function () {
            $('#instTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('institutions.get-institutions')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'institution_name', name: 'institution_name'},
                    {data: 'institution_acronym', name: 'institution_acronym'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection
