
@extends('layouts.app')

  <!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">
            

    </div>
        <div class="box" >
    
           <div class="box-header">
              <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm"  style="color: #008000;">
                <b>Add</b>
              </a>
            </div>
           
            <div class="box-body table-responsive" style="padding: 20px;" >
              
              <table class="table table-hover {{ count($faculties) > 0 ? 'datatable' : '' }}" >
              <thead>
                <tr>
                    <th>Faculty Name</th>
                    <th>Address</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Location</th>
                  </tr>
                </thead>

                <tbody>
                    @if (count($faculties) > 0)
                          @foreach($faculties as $fac)
                            <tr onclick="getTableRowId({{$fac->FacultyID}})" data-entry-id="{{ $fac->FacultyID}}">
                                  <td field-key='Faculty Name' >{{$fac->FacultyName}}</td>
                                  <td field-key='Address' >{{$fac->Address}}</td>
                                  <td field-key='Telephone' >{{$fac->Tel}}</td>
                                  <td field-key='Email' >{{$fac->Email}}</td>
                                  <td field-key='Location' >{{$fac->Location}}</td>
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
        <form class="modal-dialog"  role="form" method="POST" action="{{route('faculty.add')}}">
           {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add New Faculty</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                     <div class="card-body" style="padding: 20px;">
                            <div class="form-group">
                              <p style="float: left; font-family: sans-serif;">Select Campus</p>
                              <select class="form-control" name="CampusID" id="CampusID">
                               @foreach($campuses as $camp)
                                <option value="{{$camp->id}}">{{$camp->campus}}</option>
                               @endforeach
                              </select>
                            </div>
                         <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Faculty Name</p>
                                <input type="text" class="form-control" id="FacultyName" name="FacultyName"value=""
                                       required
                                       oninvalid="this.setCustomValidity('Must Enter Faculty Name')"
                                       oninput="this.setCustomValidity('')" >
                            </div>
                              <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Physical Address</p>
                                <input type="text" class="form-control" id="Address" name="Address"value="" >
                            </div>
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Telephone</p>
                                <input type="text" class="form-control" id="Tel" name="Tel" value="">
                            </div>
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Email</p>
                                <input type="email" class="form-control" id="Email" name="Email" value="">
                            </div>
                           <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Location</p>
                                <input type="text" class="form-control" id="Location" name="Location" value="">
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
          let url = "{{ route('Faculty/Details', ':id') }}";
          url = url.replace(':id', id);
          document.location.href=url;    }
      </script>
@endsection