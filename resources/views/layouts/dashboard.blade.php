<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = '{!! json_encode(['csrfToken' => csrf_token()]) !!}'
    </script>

    <!-- title content defined by individual pages ( a.k.a blades) -->
    @yield('title-content')

    <!-- the favicon is loaded here -->
    @include('layouts.dependency[favicon]')

    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" type="text/css">


    <style>
        .loader {
            display: none;
            border: 4px solid #f3f3f3;
            border-top: 4px solid rgb(16, 159, 16);
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 2s linear infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        thead tr {
            background-color: #efeeee;
            /* text-align: left; */
            /* padding: 8px; */
        }

        tr:nth-child(even) {
            background-color: #F6F9FF;
        }

        .not-allowed {
            cursor: not-allowed;
            pointer-events: all !important;
        }
    </style>

    @yield('css')
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        @include('dashboard.partials.header')
        @include('dashboard.partials.sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Welcome: <span
                                        class="badge badge-primary p-1">{{ ucwords(auth()->user()->username) }}</span> </h4>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item font-weight-bold pl-2 pr-5">
                                        @if (auth()->user()->type == 1)
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                  <i>  {!! Form::label('year_id', 'change working year') !!}</i>
                                                </div>
                                                <div class="col-md-4">
                                                    {!! Form::model(auth()->user()->staff, ['method' => 'PATCH', 'route' => ['staffs.update-year', SRS::encode(auth()->id())], 'class' => 'd-inline']) !!}
                                                    
                                                    
                                                        <div class="form-group mb-0">
                                                        {!! Form::select('year_id', $academic_years, auth()->user()->staff->academicYear->id, [
                                                            'class' => $errors->has('year_id') ? 'form-control is-invalid' : 'form-control',
                                                            'id' => 'year_id', 'onchange' => 'this.form.submit()'
                                                        ]) !!}
                                                    </div>
                                                    
                                                    {!! Form::close() !!}
                                                </div>
                                                <div class="col-4">
                                                    <span class="badge badge-primary p-2">Active User Year:
                                                        {{ auth()->user()->staff->academicYear->year }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                    
                                    <li class="breadcrumb-item font-weight-bold pl-2 pr-5"><span
                                            class="badge badge-secondary p-2">Current Academic Year:{!! empty($academic_year) ? 'Undefined' : $academic_year !!}</span></li>
                                    @foreach ($bc as $b)
                                        @if ($b['link'] === '#')
                                            <li class="breadcrumb-item active">{!! $b['page'] !!}</li>
                                        @else
                                            <li class="breadcrumb-item"><a
                                                    href="{{ $b['link'] }}">{!! $b['page'] !!}</a></li>
                                        @endif
                                    @endforeach

                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            @if (session('message'))
                                <div class="alert alert-success">
                                    <button data-dismiss="alert" class="close" type="button">×</button>
                                    {{ session('message') }}

                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('errors'))
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems.<br><br>
                                    <ul>

                                        <li>Make sure all input are selected</li>

                                    </ul>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    <button data-dismiss="alert" class="close" type="button">×</button>
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if (session('warning'))
                                <div class="alert alert-warning">
                                    <button data-dismiss="alert" class="close" type="button">×</button>
                                    {{ session('warning') }}
                                </div>
                            @endif
                            <div id="alerts"></div>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </div>
            @include('dashboard.partials.footer')

        </div>
    </div>
    @yield('modals')
    <script type="text/javascript">
        var resizefunc = [];
        let base_url = "{!! url('/') !!}";
    </script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script><!-- Popper for Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/fastclick.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.form.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    {{-- <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script> --}}
    {{-- <script src="{{asset("assets/plugins/datatables/jszip.min.js")}}"></script> --}}
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    {{-- <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script> --}}
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>


    <!-- Responsive examples -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!-- Selection table -->
    <script src="{{ asset('assets/plugins/datatables/dataTables.select.min.js') }}"></script>




    <!-- Custom main Js -->
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/custombox/dist/custombox.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custombox/dist/legacy.min.js') }}"></script>
    <!-- notify js -->
    <script src="{{ asset('assets/plugins/bootstrap-notify-3.1.3/dist/bootstrap-notify.min.js') }}"></script>


    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.myTable').DataTable({
                pageLength: 20,
                dom: "<'d-flex mb-1'<'.mr-auto'l><'#accidents-table-buttons'B><'.ml-2'f>>" +
                    "<'d-flex'tr>" +
                    "<'d-flex justify-content-between'ip>",
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-outline-success rounded-left border-0'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-outline-success border-0'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-outline-success border-0'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-outline-success border-0',
                        title: "Payments",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        },
                    }
                ],
            })
        })

        $('#year_id').select2({});
    </script>
    @yield('scripts')
</body>

</html>
