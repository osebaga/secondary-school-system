@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} |Sponsor</title>
@endsection
@section('content')
    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue"><i class="fa fa-tachometer1"></i>Sponsor </h2>

                <div class="boxpane-icon">
                    <a href="#" data-url="{{route('sponsor.create')}}" class="btn btn-sm btn-outline-success p-1 m-1"
                       id="resource-sponsor-add-button"> <i class="fa fa-pencil"></i> Add Sponsor</a>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">The following is the list of  Sponsor(s) available</p>
                        <div class="table-responsive">
                            <table id="batchTable" class="table table-bordered table-hover table-striped" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sponsor Name</th>
                                    <th>Address</th>
                                    <th>Comments</th>
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
@section('modals')
    @include('dashboard.settings.sponsor.modals.sponsor_modal')
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
            $('#batchTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('sponsor.get-sponsors')}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'sponsor_name', name: 'sponsor_name'},
                    {data: 'address', name: 'address'},
                    {data: 'comment', name: 'comment'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection
