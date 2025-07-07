@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Index2</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue"><i class="fa-fw fa fa-users"></i>Users </h2>
            <!--
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>-->
                <div class="boxpane-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon fa fa-chevron-circle-down tip" data-placement="left" title="{{"Actions"}}"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu" aria-labelledby="dLabel">
                                <li>
                                    <a href="{{route('users.create')}}">
                                        <i class="fa fa-plus-circle"></i>
                                        {{"Add User"}}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
<div class="boxpane-content">
    <p class="introtext">{{"list results"}}</p>

    <div class="table-responsive">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <table id="usrTable" class="table table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->first_name }} {{ $user->last_name }} {{ $user->middle_name }}</td>

                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>


                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


            {!! $data->render() !!}
        </div>
        </div>
        </div>
    </section>


@endsection
@section("scripts")
    <script src="{{asset('assets/js/jquery.dataTables-1.10.16.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap-1.10.16.min.js')}}"></script>


    <script type="text/javascript">


          var userTable=$('#usrTable').DataTable({
              bAutoWidth:false,
              processing: true,
              serverSide: true,
               "aoColumns":[
                   null,null,null,null,null
               ],
              "aaSorting":[],
               //"bProcessing":true,
               //"bServerSide":true,
               //"sAjaxSource":"http//localhost/table.php",
               select:{
                   style:'multi'
               }
        })

    </script>
@endsection