
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
            <div class="box-body table-responsive" style="padding: 20px;" >
              <table class="table table-hover {{ count($campuses) > 0 ? 'datatable' : '' }}">
              <thead>
                <tr>
                     <th>Campus Name</th>
                     <th>Address</th>
                     <th>Telephone</th>
                     <th>Email</th>
                  </tr>
                </thead>

                <tbody>
                    @if (count($campuses) > 0)
                         @foreach($campuses as $campus)
                            <tr onclick="getTableRowId({{$campus->id}})" data-entry-id="{{ $campus->id }}">
                                  <td field-key='Name'>{{$campus->campus}}</td>
                                  <td>{{$campus->address}}</td>
                                  <td>{{$campus->tel}}</td>
                                  <td>{{$campus->email}}</td>  
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
        <form class="modal-dialog"  role="form" method="POST" action="{{route('campus.add')}}">
           {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add New Campus</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                     <div class="card-body" style="padding: 20px;">
                            <div class="form-group">
                              <p style="float: left; font-family: sans-serif;">Select Institution</p>
                              <select class="form-control" name="institution_id" id="institution_id">
                                @foreach($institution as $inst)
                                <option value="{{$inst->id}}">{{$inst->Name}}</option>
                                @endforeach
                              </select>
                            </div>
                         <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Campus Name</p>
                                <input type="text" class="form-control" id="campus" name="campus" value="" required oninvalid="this.setCustomValidity('Must Enter Campus Name')"
                                       oninput="this.setCustomValidity('')"  >
                            </div>
                              <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Physical Address</p>
                                <input type="text" class="form-control" id="address" name="address"value="" >
                            </div>
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Telephone</p>
                                <input type="text" class="form-control" id="tel" name="tel" value="">
                            </div>
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Email</p>
                                <input type="email" class="form-control" id="email" name="email" value="">
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
          let url = "{{ route('Campus/Details', ':id') }}";
          url = url.replace(':id', id);
          document.location.href=url;    }
      </script>
@endsection