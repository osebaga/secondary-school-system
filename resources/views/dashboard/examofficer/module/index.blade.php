
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
               <table class="table table-hover {{ count($modules) > 0 ? 'datatable' : '' }}" >
              <thead>
                <tr>
                     <th>Course Code</th>
                     <th>Module Name</th>
                     <th>Credits</th>
                     <th>Preview</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($modules) > 0)
                        @foreach($modules as $mod)
                            <tr onclick="getTableRowId({{ $mod->moduleid}})" data-entry-id="{{ $mod->moduleid}}">
                                <td>{{$mod->coursecode}} </td>
                                <td>{{$mod->modulename}} </td>
                                <td>{{$mod->credits}} </td>
                                 <td><a href="{{url('admin/module/'.$mod->moduleid)}}"><i class="fa fa-eye"></i></a></td>
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
        <form class="modal-dialog"  role="form" method="POST" action="{{route('mod.add')}}">
           {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add New Module</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                     <div class="card-body" style="padding: 20px;">
      
                         <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Module Code</p>
                                <input type="text" class="form-control" id="code" name="coursecode"value="" 
                                required
                                oninvalid="this.setCustomValidity('Must Enter Module code')"
                                oninput="this.setCustomValidity('')">
                            </div>
                              <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Module Name</p>
                                <input type="text" class="form-control" id="modulename" name="modulename"value="" 
                                required
                                oninvalid="this.setCustomValidity('Must Enter Module Name')"
                                oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Credits</p>
                                <input type="number" class="form-control" id="credits" name="credits" value=""
                                required
                                oninvalid="this.setCustomValidity('Must Enter Module Credits')"
                                oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Capacity</p>
                                <input type="number" class="form-control" id="capacity" name="capacity" value="">
                            </div>
                          <div class="form-group">
                              <p style="float: left; font-family: sans-serif;">Select Exam Regulation</p>
                              <select class="form-control" name="studylevel_id" id="studylevel_id">
                                 <option value="">--select--</option>
                                @foreach($studylevel as $std)
                                <option value="{{$std->id}}">{{$std->levelname}}</option>
                                @endforeach
                              </select>
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
          let url = "{{ route('Module/Details', ':id') }}";
          url = url.replace(':id', id);
          document.location.href=url;    }
      </script>
@endsection