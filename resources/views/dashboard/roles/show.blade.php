@extends('layouts.dashboard',['link','title'])
@section('title-content')
    <title>srs | Role Show</title>
    {{--    <title>{{ config('app.name') }} | Dashboard--}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="m-1">
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Show Role') }}</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                            <form action="{{route('roles.update',$srs->encode($role->id))}}" accept-charset="UTF-8"
                                  method="post">
                                @csrf
                                <fieldset>
                                    {{--                    <legend style="text-align: start"> Register New User</legend>--}}
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
                                                           value="{{$role->name}}"
                                                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                           readonly
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{--                                        --}}{{--                            <div class="form-group">--}}
                                            <strong>Module Permission :</strong>
                                            {{--                                        <br/>--}}
                                            {{--                                        @foreach($permission as $value)--}}
                                            {{--                                            <div class="form-check form-check-inline">--}}
                                            {{--                                                <input class="form-check-input" type="checkbox" name="permission[]"--}}
                                            {{--                                                       value="{{ $value->id }}"--}}
                                            {{--                                                       id="inlineCheckbox1">--}}
                                            {{--                                                <label class="form-check-label" for="inlineCheckbox1">--}}
                                            {{--                                                    {{ $value->name }}--}}
                                            {{--                                                </label>--}}
                                            {{--                                            </div>--}}
                                            {{--                                            <br/>--}}
                                            {{--                                        @endforeach--}}
                                            <table class="table table-bordered table-hover table-responsive-sm"
                                                   style="width:100%" id="role_table">
                                                <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-justify" width="5%" rowspan="2">#</th>
                                                    <th class="text-justify" width="15%" rowspan="2">Module</th>
                                                    <th class="text-center" colspan="4">Action</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">List</th>
                                                    <th class="text-center">Create</th>
                                                    <th class="text-center">Edit</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-justify">1.</td>
                                                    <th class="text-justify">Staff</th>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'staff') !== false)
                                                                @if(strpos($value->name, 'staff-list') !== false)

                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input"
                                                                               type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                    {{--                                                                    @else--}}

                                                                    {{--                                                                    @endif--}}
                                                                    {{--                                                                @endforeach--}}
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'staff') !== false)
                                                                @if(strpos($value->name, 'staff-create') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'staff') !== false)
                                                                @if(strpos($value->name, 'staff-edit') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'staff') !== false)
                                                                @if(strpos($value->name, 'staff-delete') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-justify">2.</td>
                                                    <th class="text-justify">College</th>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'college') !== false)
                                                                @if(strpos($value->name, 'college-list') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'college') !== false)
                                                                @if(strpos($value->name, 'college-create') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'college') !== false)
                                                                @if(strpos($value->name, 'college-edit') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'college') !== false)
                                                                @if(strpos($value->name, 'college-delete') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify">3.</td>
                                                    <th class="text-justify">Department</th>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'department') !== false)
                                                                @if(strpos($value->name, 'department-list') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'department') !== false)
                                                                @if(strpos($value->name, 'department-create') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'department') !== false)
                                                                @if(strpos($value->name, 'department-edit') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'department') !== false)
                                                                @if(strpos($value->name, 'department-delete') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify">4.</td>
                                                    <th class="text-justify">Travel</th>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'travel') !== false)
                                                                @if(strpos($value->name, 'travel-list') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'travel') !== false)
                                                                @if(strpos($value->name, 'travel-create') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'travel') !== false)
                                                                @if(strpos($value->name, 'travel-edit') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'travel') !== false)
                                                                @if(strpos($value->name, 'travel-delete') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify">5.</td>
                                                    <th class="text-justify">Delegation</th>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'delegation') !== false)
                                                                @if(strpos($value->name, 'delegation-list') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify">6.</td>
                                                    <th class="text-justify">Task</th>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'task') !== false)
                                                                @if(strpos($value->name, 'task-list') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'task') !== false)
                                                                @if(strpos($value->name, 'task-create') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'task') !== false)
                                                                @if(strpos($value->name, 'task-edit') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'task') !== false)
                                                                @if(strpos($value->name, 'task-delete') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify">7.</td>
                                                    <th class="text-justify">User</th>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'user') !== false)
                                                                @if(strpos($value->name, 'user-list') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'user') !== false)
                                                                @if(strpos($value->name, 'user-create') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'user') !== false)
                                                                @if(strpos($value->name, 'user-edit') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'user') !== false)
                                                                @if(strpos($value->name, 'user-delete') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify">8.</td>
                                                    <th class="text-justify">Role</th>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'role') !== false)
                                                                @if(strpos($value->name, 'role-list') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'role') !== false)
                                                                @if(strpos($value->name, 'role-create') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'role') !== false)
                                                                @if(strpos($value->name, 'role-edit') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'role') !== false)
                                                                @if(strpos($value->name, 'role-delete') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify">9.</td>
                                                    <th class="text-justify">Leave</th>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'leave') !== false)
                                                                @if(strpos($value->name, 'leave-list') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'leave') !== false)
                                                                @if(strpos($value->name, 'leave-create') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'leave') !== false)
                                                                @if(strpos($value->name, 'leave-edit') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-justify">
                                                        @foreach($permission as $value)
                                                            @if(strpos($value->name, 'leave') !== false)
                                                                @if(strpos($value->name, 'leave-delete') !== false)
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               name="permission[]"
                                                                               value="{{ $value->id }}"
                                                                               @foreach($role_permission as $roles)
                                                                               @if($roles->permission_id==$value->id)
                                                                               checked
                                                                               @endif
                                                                               @endforeach
                                                                               id="inlineCheckbox1">
                                                                        <label class="form-check-label"
                                                                               for="inlineCheckbox1">
                                                                            {{ $value->name }}
                                                                        </label>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <input name="_method" type="hidden" value="PUT">
                                    <div class="col-auto" style="float: right; alignment: right">
                                        <button class="btn btn-success btn-md" type="submit" name="action"
                                                style="color: white;  float: right">Update
                                        </button>
                                    </div>
                                </fieldset>
                            </form>

                    </div>
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

