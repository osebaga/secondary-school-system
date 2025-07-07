@extends('layouts.app')

  <!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">

    </div>
        <div class="box" >
           <div class="box-header">
           @can('registrar')
              <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#stdinfo"  
                style="color: #008000;">
                <b>Add</b>
              </a>
           @endcan 
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-restonsive" style="padding: 20px;" >
              <table class="table table-hover {{ count($students) > 0 ? 'datatable' : '' }}" >
              <thead>
                <tr>
                     <th>Registration number</th>
                     <th>Firstname</th>
                     <th>Middlename</th>
                     <th>Surname</th>
                     <th>Programme</th>
                     <th>Academic Year</th>
                     <th>Profile</th>
                </tr>
              </thead>
                <tbody>
                    @if($students->count()>0)
                         @foreach($students as $st)
                              <tr onclick="getTableRowId({{$st->id}})" data-entry-id="{{$st->id}}">
                                 <td>{{$st->regno}}</td>
                                 <td>{{$st->firstname}}</td>
                                 <td>{{$st->middlename}}</td>
                                 <td>{{$st->surname}}</td>
                                 <td>{{$st->programmeofstudy}}</td>
                                 <td>{{$st->yearofstudy}}</td>
                                 <td><a href="{{url('student/'.$st->id)}}"><i class="fa fa-eye"></i></a></td>
                            </tr>
                          @endforeach
                    @else
                      <tr>
                        <td colstan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                      </tr>
                    @endif
                </tbody>
              </table>
            </div>
        </div>

        <div class="modal fade" id="stdinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <form class="modal-dialog"  role="form" method="POST" action="{{route('student.add')}}">
          {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold"><strong>Personal Information</strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                     <div class="card-body" style="padding: 20px;">
                <div class="form-row">
                    <div class="form-group">
                        <label for="regno">Registration Number:</label>
                        <input type="text" class="form-control" name="regno" required  />
                    </div>
                      <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" name="surname"  />
                    </div>
                    <div class="form-group">
                        <label for="middlename">Middle Name</label>
                        <input type="text" class="form-control" name="middlename"  />
                    </div>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstname"  />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" name="dbirth"  />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Sex</label>
                         <select class="form-control" name="sex" required>
                            <option value=""> select here</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                </div>
                 @if($maritals->count()>0)
                   <div class="form-row">
                     <div class="form-group">
                        <label for="maritalstatus">Marital Status</label>
                        <select class="form-control" name="maritalstatus">
                            <option value="">--select status--</option>
                            @foreach($maritals as $mar)
                            <option> {{$mar->status}} </option> 
                            @endforeach
                        </select>
                       </div>
                 </div>@endif

                  </div>
            <div class="form-row">
                <div class="form-group" style="padding: 20px;">
                     <button type="submit" class="btn btn-primary">SAVE</button>
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel </button>
                </div>
          </div>
          </div>
      </form> 
      </div>

    </div>

       <script type="text/javascript">
           function getTableRowId(id){
               let link = "{{ url('student') }}";
               let open = link + "/" +id;
               window.location = open;
             }
       </script>

@endsection