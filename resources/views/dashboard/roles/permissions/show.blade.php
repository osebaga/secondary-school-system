@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Show</title>

@endsection

@section('content')
    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">

                <h2 class="blue"><i class="fa-fw fa fa-folder-open"></i>Role Permissions</h2>
                <div class="boxpane-icon"></div>
            </div>

            <div class="boxpane-content">
                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                {!! Form::hidden('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

                <div class="row">
                    <div class="col-lg-12 margin-tb">

                        <p class="introtext">@lang('app.set_permissions')</p>
                        <div class="table-responsive">
                            <table id="roleTable" class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th colspan="6" class="text-center"> {{$role->name}} @lang('app.permissions')</th>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="text-center">@lang('app.module_name')
                                    </th>
                                    <th colspan="5" class="text-center">@lang('app.permissions')</th>
                                </tr>
                                <tr>
                                    <th class="text-center">@lang('app.view')</th>
                                    <th class="text-center">@lang('app.add')</th>
                                    <th class="text-center">@lang('app.edit')</th>
                                    <th class="text-center">@lang('app.delete')</th>
                                    <th class="text-center">@lang('app.misc')</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>Users</td>
                                    <td class="text-center">
                                        <div class="icheck-primary">
                                        {{ Form::checkbox('permission[]', $user_obj->{'user-index'}{'id'},  $rolePermissions->contains($user_obj->{'user-index'}{'id'}) ? true : false, ['class' => 'form-control','id'=>$user_obj->{'user-index'}{'id'}]) }}
                                            {{Form::label($user_obj->{'user-index'}{'id'},' ')}}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="icheck-primary">
                                        {{ Form::checkbox('permission[]', $user_obj->{'user-add'}{'id'},  $rolePermissions->contains($user_obj->{'user-add'}{'id'}) ? true : false, ['class' => 'form-control','id'=>$user_obj->{'user-add'}{'id'}]) }}
                                        {{Form::label($user_obj->{'user-add'}{'id'},' ')}}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="icheck-primary">
                                            {{ Form::checkbox('permission[]', $user_obj->{'user-edit'}{'id'},  $rolePermissions->contains($user_obj->{'user-edit'}{'id'}) ? true : false, ['class' => 'form-control','id'=>$user_obj->{'user-edit'}{'id'}]) }}
                                            {{Form::label($user_obj->{'user-edit'}{'id'},' ')}}

                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="icheck-primary">
                                        {{ Form::checkbox('permission[]', $user_obj->{'user-delete'}{'id'},  $rolePermissions->contains($user_obj->{'user-delete'}{'id'}) ? true : false, ['class' => 'form-control','id'=>$user_obj->{'user-delete'}{'id'}]) }}
                                        {{Form::label($user_obj->{'user-delete'}{'id'},' ')}}
                                        </div>
                                    </td>
                                    <td></td>

                                </tr>

                                <tr>
                                    <td>Roles</td>
                                    <td class="text-center">
                                        <div class="icheck-warning">
                                        {{ Form::checkbox('permission[]', $role_obj->{'role-index'}{'id'},  $rolePermissions->contains($role_obj->{'role-index'}{'id'}) ? true : false, ['class' => 'form-control','id'=>$role_obj->{'role-index'}{'id'}]) }}
                                        {{Form::label($role_obj->{'role-index'}{'id'},' ')}}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="icheck-primary">
                                        {{ Form::checkbox('permission[]', $role_obj->{'role-add'}{'id'},  $rolePermissions->contains($role_obj->{'role-add'}{'id'}) ? true : false, ['class' => 'form-control','id'=>$role_obj->{'role-add'}{'id'}]) }}
                                        {{Form::label($role_obj->{'role-add'}{'id'},' ')}}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="icheck-primary">
                                        {{ Form::checkbox('permission[]', $role_obj->{'role-edit'}{'id'},  $rolePermissions->contains($role_obj->{'role-edit'}{'id'}) ? true : false, ['class' => 'form-control','id'=>$role_obj->{'role-edit'}{'id'}]) }}
                                        {{Form::label($role_obj->{'role-edit'}{'id'},' ')}}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="icheck-primary">
                                        {{ Form::checkbox('permission[]', $role_obj->{'role-delete'}{'id'},  $rolePermissions->contains($role_obj->{'role-delete'}{'id'}) ? true : false, ['class' => 'form-control','id'=>$role_obj->{'role-delete'}{'id'}]) }}
                                        {{Form::label($role_obj->{'role-delete'}{'id'},' ')}}
                                        </div>
                                    </td>
                                    <td></td>

                                </tr>

                                <tr>
                                    <td>Settings</td>
                                    <td class="text-center">
                                        <div class="icheck-primary">
                                        {{ Form::checkbox('permission[]', $setting_obj->{'setting-index'}{'id'},  $rolePermissions->contains($setting_obj->{'setting-index'}{'id'}) ? true : false, ['class' => 'form-control','id'=>$setting_obj->{'setting-index'}{'id'}]) }}
                                        {{Form::label($setting_obj->{'setting-index'}{'id'},' ')}}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="icheck-primary">
                                        {{ Form::checkbox('permission[]', $setting_obj->{'setting-add'}{'id'},  $rolePermissions->contains($setting_obj->{'setting-add'}{'id'}) ? true : false, ['class' => 'form-control','id'=>$setting_obj->{'setting-add'}{'id'}]) }}
                                        {{Form::label($setting_obj->{'setting-add'}{'id'},' ')}}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="icheck-primary">
                                        {{ Form::checkbox('permission[]', $setting_obj->{'setting-edit'}{'id'},  $rolePermissions->contains($setting_obj->{'setting-edit'}{'id'}) ? true : false, ['class' => 'form-control','id'=>$setting_obj->{'setting-edit'}{'id'}]) }}
                                        {{Form::label($setting_obj->{'setting-edit'}{'id'},' ')}}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="icheck-primary">
                                        {{ Form::checkbox('permission[]', $setting_obj->{'setting-delete'}{'id'},  $rolePermissions->contains($setting_obj->{'setting-delete'}{'id'}) ? true : false, ['class' => 'form-control','id'=>$setting_obj->{'setting-delete'}{'id'}]) }}
                                        {{Form::label($setting_obj->{'setting-delete'}{'id'},' ')}}
                                        </div>
                                    </td>
                                    <td></td>

                                </tr>


                                </tbody>
                            </table>
                        </div>

                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                </div>
                {!! Form::close() !!}

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $role->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permissions:</strong>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <label class="label label-success">{{ $v->name }},</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section("scripts")
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/lib/lightbox/js/lightbox.min.js')}}"></script>
    <script src="{{asset('assets/js/icheck/icheck.min.js')}}"></script>


    <script type="text/javascript">
        $('input[type=checkbox]').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            increaseArea: '20%' // optional
        });

    </script>
@endsection
