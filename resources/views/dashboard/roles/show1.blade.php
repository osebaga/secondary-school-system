@extends('layouts.dashboard',['link','title'])
@section('title-content')
    <title>SAMIS | Role Show</title>
    {{--    <title>{{ config('app.name') }} | Dashboard--}}
@endsection
@section('css')

@endsection
@section('content')
    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">

                <h2 class="blue"><i class="fa-fw fa fa-registered"></i>Role Permissions</h2>
                <div class="boxpane-icon"></div>
            </div>
                    <!-- Card Body -->
            <div class="boxpane-content">

                                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', SRS::encode($role->id)]]) !!}
                                {!! Form::hidden('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

                                 @include('dashboard.roles.form.form')
                                    <div class="form-group text-right mb-0">
                                        <button class="btn btn-primary waves-effect waves-light mr-1 btn-block col-3" type="submit">
                                            Update
                                        </button>
                                    </div>

                {!! Form::close() !!}

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $role->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 bg-light alert-danger">
                        <div class="form-group">
                            <strong>Permissions:</strong>
                            @if(!empty($role_permission))
                                @foreach($role_permission as $v)
                                    <label class="label label-success">{{ $v->name }},</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                    </div>
                </div>
            </section>
        </div>

    </section>
@endsection
@section('scripts')
    <script src="{{asset('select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('select2/dist/js/select2.js')}}"></script>
    <script type="text/javascript">

        $('#roleTable').DataTable();
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
