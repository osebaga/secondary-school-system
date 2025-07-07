@extends('layouts.dashboard')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.role.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
         
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.role.fields.id') }}
                        </th>
                        <td>
                            {{ $role->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.role.fields.name') }}
                        </th>
                        <td>
                            {{ $role->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Abilities
                        </th>
                        <td>
                            @foreach($role->abilities as $id => $abilities)
                                <span class="badge badge-info">{{ $abilities->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-default" href="{{ url()->previous() }}">
                <button style="margin-left: 100%;"  class="btn btn-primary">{{ trans('global.back_to_list') }}</button> 
             </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection
