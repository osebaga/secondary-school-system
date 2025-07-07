@extends('layouts.dashboard',['link','title'])
@section('title-content')
    <title>SAMIS | Role Edit</title>
    {{--    <title>{{ config('app.name') }} | Dashboard--}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Create Role') }}</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col" style="margin-bottom: 5px">
                            <div class="form-group">

                                <strong>Role Name:</strong>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-registered"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="name" required
                                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           placeholder="Role Name">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('dashboard.roles.form.form_create')

                    <div class="col-auto" style="float: right; alignment: right">
                        <button class="btn btn-info btn-sm" type="submit" name="action"
                                style="color: white;  float: right">Create
                        </button>
                    </div>
                    {!! Form::close() !!}






                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('select2/dist/js/select2.js')}}"></script>
    <script type="text/javascript">
        $('#ttype').select2({
            placeholder: "Select Travel Type",
        });
        $('#rtype').select2({
            placeholder: "Select Reason Type",
        });
    </script>
@endsection
@section('top')
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
