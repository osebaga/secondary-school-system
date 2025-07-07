@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} |Examination Type</title>
@endsection
@section('content')
    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue"><i class="fa fa-tachometer1"></i>Examination Type</h2>

                <div class="boxpane-icon">
                    <a href="#" data-url="{{route('exam-category.create')}}" class="btn btn-sm btn-primary p-1 m-1"
                       id="resource-exam-cat-add-button"> <i class="fa fa-pencil"></i> Add Examination Type</a>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">The following is the list of Examination Type</p>
                        <div class="table-responsive">
                            <table id="batchTable" class="table table-bordered table-hover table-striped" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>S/No</th>
                                    <th>CODE</th>
                                    <th>Examination Type</th>
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
    @include('dashboard.settings.exam-category.modals.exam_modal')
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
                ajax: '{{route('exam-category.get-exam-category')}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'code', name: 'code'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection
