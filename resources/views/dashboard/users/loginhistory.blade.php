@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Index</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue"><i class="fa-fw fa fa-users"></i>Users Login History</h2>

                <div class="boxpane-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            {{-- <a data-toggle="dropdown" href="#">
                                <i class="icon fa fa-chevron-circle-down tip" data-placement="left"
                                   title="{{"Actions"}}"></i>
                            </a> --}}
                            <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu"
                                aria-labelledby="dLabel">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('users.create')}}">
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
                <div class="row">
                    <div class="col-lg-12">
                         <p class="introtext">@lang('app.intro-text')</p>

                        <div class="table-responsive">
                            <div id="alerts"></div>
                           @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <table id="usrTable" class="table-bordered data-table table"  style="width:100%">
                                <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Device</th>
                                    <th>Last Login</th>
                                    <th>Ip Address</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;  ?>
                                 @foreach($login as $log)
                                   <tr>
                                 <td><?php echo $i++;  ?></td>
                                 <td>{{ $log->device }}</td>
                                 <td>{{ $log->last_login }}</td>
                                 <td>{{ $log->ipaddress }}</td>
                                   </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section("scripts")
   


    <script type="text/javascript">
         $('#usrTable').DataTable();
            

    </script>
    <script>


    </script>

@endsection
