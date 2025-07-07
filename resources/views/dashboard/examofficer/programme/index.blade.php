
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
            <div class="box-body table-responsive no-padding">
             <table class="table table-hover {{ count($programme) > 0 ? 'datatable' : '' }}" >
              <thead>
                <tr>
                     <th>Programme Code</th>
                     <th>Short Name</th>
                     <th>Full Name</th>
                     <th>View</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($programme) > 0)
                      @foreach($programme as $prog)
                        <tr onclick="getTableRowId({{ $prog->ProgrammeID}})" data-entry-id="{{$prog->ProgrammeID}}">
                          <td>{{$prog->ProgrammeCode}}</td>
                          <td>{{$prog->Title}}</td>
                          <td>{{$prog->ProgrammeName}}</td>
                          <td><a href="{{url('admin/programme/'.$prog->ProgrammeID)}}"><i class="fa fa-eye"></i></a></td>
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
        <form class="modal-dialog"  role="form" method="POST" action="{{route('prog.add')}}">
           {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add New Programme</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
                  <div class="card-body" style="padding: 20px;">
                      <div class="form-group">
                        <p style="float: left; font-family: sans-serif;">Select Department</p>
                        <select class="form-control" name="DeptID" id="DeptID">
                        @foreach($department as $dept)
                          <option value="{{$dept->DeptID}}">{{$dept->DeptName}}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <p style="float: left; font-family: sans-serif;">Select Award</p>
                        <select class="form-control" name="Ntalevel" id="Ntalevel">
                        @foreach($studylevel as $std)
                          <option value="{{$std->levelname}}">{{$std->levelname}}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                          <p style="float: left; font-family: sans-serif;">Programme Code</p>
                          <input type="number" class="form-control" id="campus" name="ProgrammeCode"value="" 
                          required
                                oninvalid="this.setCustomValidity('Must Enter Programme Code')"
                                oninput="this.setCustomValidity('')">
                      </div>
                        <div class="form-group">
                          <p style="float: left; font-family: sans-serif;">Programme Short Name</p>
                          <input type="text" class="form-control" name="Title" value=""
                          required
                                oninvalid="this.setCustomValidity('Must Enter Programme Short Name')"
                                oninput="this.setCustomValidity('')"  >
                      </div>
                      <div class="form-group">
                          <p style="float: left; font-family: sans-serif;">Programme Full Name</p>
                          <input type="text" class="form-control" name="ProgrammeName" value=""
                          required
                                oninvalid="this.setCustomValidity('Must Enter Programme Full Name')"
                                oninput="this.setCustomValidity('')">
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
          let url = "{{ route('Programme/Details', ':id') }}";
          url = url.replace(':id', id);
          document.location.href=url;    }
      </script>
@endsection