@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Terms</h2>
                <div class="boxpane-icon">
                    <a href="#" data-url="{{route('semesters.create')}}" class="btn btn-sm btn-primary p-1 m-1"
                       id="resource-semester-add-button"> <i class="fa fa-pencil"></i> Add New Term</a>

                    </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">@lang('app.intro-text')</p>
                    <div class="table-responsive">
                        <table id="semesterTable" class="table table-bordered table-hover" style="width: 100%;">
                           <thead>
                           <tr>
                               <th>S/No</th>  
                               {{-- <th>Term</th> --}}
                               <th>Term Title</th>
                               <th>Term Status</th>
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
    <div id="custom-modal" class="modal-view" style="">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>×</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Modal title</h4>
        <div class="custom-modal-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
    </div>
    @include('dashboard.settings.semester.modals.semester_modal')
@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#semesterTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('semesters.get-semesters')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    // {data: 'semester', name: 'semester'},
                    {data: 'title', name: 'title'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        })
    </script>


@endsection
