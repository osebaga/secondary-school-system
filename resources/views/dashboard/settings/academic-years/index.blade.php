@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Academic Year>>Index</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue"><i class="fa fa-tachometer1"></i>Academic Year </h2>

                <div class="boxpane-icon">
                    <a href="#" data-url="{{route('academic-years.create')}}" class="btn btn-sm btn-primary p-1 m-1"
                       id="resource-academic-year-add-button"> <i class="fa fa-pencil"></i> Add Academic Year</a>
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
                               <th>#</th>   <th>Academic Years</th> <th>Status</th> <th>Actions</th>
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
    @include('dashboard.settings.academic-years.modals.year_modal')
@endsection
@section('css')

@endsection
@section('scripts')

    <script type="text/javascript">

        $(document).ready(function () {
            $('#factTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('academic-years.get-academic-years')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'year', name: 'year'},
                    {data: 'status', name: 'status'},
                  {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection
