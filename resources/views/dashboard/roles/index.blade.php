@extends('layouts.dashboard',['link','title'])
@section('title-content')
    <title>STPS | Role List</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/DataTables/css/dataTables.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="m-1">
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('List of Role') }}</h6>
                        <a href="{{route('roles.create')}}" class="btn btn-sm btn-outline-success"
                           style="float: right"><i class="fa fa-edit"></i> Add Role</a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md table-bordered table-hover table-striped nowrap"
                                   style="width:100%" id="role_table">
                                <thead>
                                <tr>
                                    <th width="5%">Id</th>
                                    <th width="50%">Name</th>
                                    <th width="10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                        <div id="DeleteModal" class="modal fade text-danger" role="dialog">
                            <div class="modal-dialog ">
                                <!-- Modal content-->
                                <form action="" id="deleteForm" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header text-center bg-danger">
                                            <h4 class="modal-title w-100 font-weight-bold text-white">DELETE
                                                CONFIRMATION</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <p class="text-center">Are You Sure Want To Delete ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <center>
                                                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" name="" class="btn btn-danger btn-sm"
                                                        data-dismiss="modal" onclick="formSubmit()">Yes, Delete
                                                </button>
                                            </center>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('DataTables/DataTables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#role_table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: true,
                ajax: '{{route('getRoles')}}',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                columnDefs: [
                    {className: 'text-left', targets: [0,1]},
                ],
            });
        });
        function deleteData(id) {
            var id = id;
            var url = '{{ route('roles.destroy', ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
@section('top')
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
