
@extends('layouts.app')

  <!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">
           

    </div>
        <div class="box" >
    
           <div class="box-header">
              <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm"  
                style="color: #008000;">
                <b>Add</b>
              </a>
          
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive " style="padding: 20px;">
              <table class="table table-hover {{ count($departments) > 0 ? 'datatable' : '' }}" >
              <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Physical Address</th>
                    <th>Address</th>
                    <th>Email</th>
                     <th>Tel</th>
                    <th>Location</th>
                  </tr>
                </thead>

                <tbody>
                    @if (count($departments) > 0)
                         @foreach($departments as $dept)
                            <tr onclick="getTableRowId({{$dept->DeptID}})" data-entry-id="{{$dept->DeptID}}">
                                  <td>{{$dept->DeptName}}</td>
                                  <td>{{$dept->DeptPhysAdd}}</td>
                                  <td>{{$dept->DeptAddress}}</td>
                                  <td>{{$dept->DeptEmail}}</td>
                                  <td>{{$dept->DeptTel}}</td>
                                  <td>{{$dept->DeptHead}}</td>
                            </tr>

                        @endforeach
                    @else
                      <tr>
                        <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                      </tr>
                    @endif
                </tbody>
            </table>

            </div>
        </div>

        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <form class="modal-dialog"  role="form" method="POST" action="{{route('dept.add')}}">
            {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add New Department</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <div class="card-body" style="padding: 20px;">
                  <div class="form-group">
                        <p style="float: left; font-family: sans-serif;">Select Faculty</p>
                        <select class="form-control" name="FacultyID">
                        @foreach($faculties as $fac)
                          <option value="{{$fac->FacultyID}}">{{$fac->FacultyName}}</option>
                        @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <p style="float: left; font-family: sans-serif;">Department name</p>
                    <input type="text" class="form-control" id="DeptName" name="DeptName" value="" required
                           oninvalid="this.setCustomValidity('Must Enter Department Name')"
                           oninput="this.setCustomValidity('')" >
                  </div>
                  <div class="form-group">
                    <p style="float: left; font-family: sans-serif;">Physical Address</p>
                    <input type="text" class="form-control" id="DeptPhysAdd" name="DeptPhysAdd"value="" >
                  </div>
                 <div class="form-group">
                    <p style="float: left; font-family: sans-serif;">Address</p>
                    <input type="text" class="form-control" id="DeptAddress" name="DeptAddress" value="">
                  </div>
                  <div class="form-group">
                    <p style="float: left; font-family: sans-serif;">Email</p>
                    <input type="email" class="form-control" id="DeptEmail" name="DeptEmail" value="">
                  </div>
                   <div class="form-group">
                    <p style="float: left; font-family: sans-serif;">Tel</p>
                    <input type="text" class="form-control" id="DeptTel" name="DeptTel" value="">
                  </div>
                   <div class="form-group">
                    <p style="float: left; font-family: sans-serif;">Department Head</p>
                    <input type="text" class="form-control" id="DeptHead" name="DeptHead" value="">
                </div>
              </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" style="width: 200px; height: 40px; margin-bottom: 10px;">SAVE</button>
            </div>
          </div>
      </form> 
      </div>
      
       <script type="text/javascript">
        function getTableRowId(id){
          let url = "{{ route('Department/Details', ':id') }}";
          url = url.replace(':id', id);
          document.location.href=url;    }
      </script>
 
@endsection