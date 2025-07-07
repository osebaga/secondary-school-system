@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Department>Index</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Departments </h2>
                <div class="boxpane-icon">
                    <a href="#" data-url="{{route('departments.create')}}" class="btn btn-sm btn-primary p-1 m-1"
                       id="resource-dept-add-button"> <i class="fa fa-pencil"></i> Add Departments</a>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">@lang('app.intro-text')</p>
                    <div class="table-responsive">
                        <table id="factTable" class="table table-bordered table-hover" style="width: 100%;">
                           <thead>
                           <tr>
                               <th>#</th>  
                               <th>Department Name</th>
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
    @include('dashboard.settings.departments.modals.dept_modal')
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
            $('#factTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('departments.get-departments')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'department_name', name: 'department_name'},
                   
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection
