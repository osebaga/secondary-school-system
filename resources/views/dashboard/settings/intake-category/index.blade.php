@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} |Class Group</title>
@endsection
@section('content')
    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue"><i class="fa fa-tachometer1"></i>Class Group </h2>

                <div class="boxpane-icon">
                    <a href="#" data-url="{{route('intake-categories.create')}}" class="btn btn-sm btn-outline-success p-1 m-1"
                       id="resource-intake-add-button"> <i class="fa fa-pencil"></i> Add Class Group</a>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">The following is the list of Class Group(s) available</p>
                        <div class="table-responsive">
                            <table id="intakeTable" class="table table-bordered table-hover table-striped" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>S/No</th>
                                    <th>Class Group</th>
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
    @include('dashboard.settings.intake-category.modals.intake_modal')
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
            $('#intakeTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('intake-categories.get-intake-category')}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection
