@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Index</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue"><i class="fa-fw fa fa-users"></i>Restore Students Deleted</h2>

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
                            <form action="{{ route('admissions.restorecheck') }}" method="POST" role="form">
                                @csrf 
                            <div class="text-center">
        <a href="#" class="btn btn-primary btn-sm checkall">check all</a>   
        <a href="#" class="btn btn-primary btn-sm uncheckall">uncheck all</a>  <button type="submit" href="#" class="btn btn-primary btn-sm">Restore</button> 

                            </div>
                            <table id="usrTable" class="table-bordered data-table table"  style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width:20px">#</th>
                                    <th>Student Name</th>
                                    <th>Sex</th>
                                    <th>REG No</th>
                                    <th>Programme</th>
                                    <th>Intake Category</th>
                                    <th>Check</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;  ?>
                                 @foreach($student as $log)
                                   <tr>
                                 <td><?php echo $i++;  ?></td>
                                 <td>{{ $log->user->first_name ?? '' }} {{ $log->user->last_name ?? ''}}</td>
                                 <td>{{ $log->user->gender ?? '' }}</td>
                                 <td>{{ $log->reg_no }}</td>
                                 <td>{{ $log->program->program_acronym }}</td>
                                 <td>{{ $log->intake_category->name }}</td>
                                 <td><input type="checkbox" name="id[]" value="{{ $log->id }}"></td>
                                 <td><a href="{{ route('admissions.restorelogs',$log->id) }}" class="btn btn-primary btn-sm">Restore</a></td>
                                   </tr>
                                   @endforeach
                                </tbody>
                            </table>

                            </form>
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
            
         $(document).ready(function() {
             // Check All
             $('.checkall').click(function() {
                 $(":checkbox").attr("checked", true);
             });
             // Uncheck All
             $('.uncheckall').click(function() {
                 $(":checkbox").attr("checked", false);
             });
         });
    </script>
    <script>
     <script>
      
      </script>

    </script>

@endsection
