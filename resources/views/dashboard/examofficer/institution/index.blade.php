
@extends('layouts.app')

  <!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">
  
    </div>
        <div class="box" >
    
           <div class="box-header">
           @can('registrar')
              <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm"  
                style="color: #008000;">
                <b>Add</b>
              </a>
           @endcan   
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="padding: 20px;" >
             <table class="table table-hover {{ count($institutions) > 0 ? 'datatable' : '' }}" >
              <thead>
                <tr>
                    <th>Name</th>
                    <th>Physical Address</th>
                    <th>Website URL</th>
                    <th>Telephone</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($institutions) > 0)
                        @foreach ($institutions as $inst)
                            <tr onclick="getTableRowId({{$inst->id}})" data-entry-id="{{ $inst->id }}">
                                <td field-key='Name'>{{$inst->Name }}</td>
                                <td field-key='Physical Address'>{{$inst->Address }}</td> 
                                <td field-key='Website URL'>{{$inst->website }}</td>
                                <td field-key='Telephone'>{{$inst->tel }}</td>
                                <td field-key='Email'>{{$inst->email }}</td>      
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
        <form class="modal-dialog"  role="form" method="POST" action="{{ route('institution.add') }}">
          {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add New Institution</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                     <div class="card-body" style="padding: 20px;">
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Name</p>
                                <input type="text" class="form-control" id="Name" name="Name" value=""
                                required
                                oninvalid="this.setCustomValidity('Must Enter Institution Name')"
                                oninput="this.setCustomValidity('')" >
                            </div>
                              <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Physical Address</p>
                                <input type="text" class="form-control" id="Address" name="Address"value="" >
                            </div>
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">City</p>
                                <input type="text" class="form-control" id="city" name="city" value="">
                            </div>
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Website URL</p>
                                <input type="text" class="form-control" id="website" name="website" value="">
                            </div>
                               <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Telephone</p>
                                <input type="text" class="form-control" id="tel" name="tel" value="">
                            </div>
                               <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Fax</p>
                                <input type="text" class="form-control" id="fax" name="fax" value="">
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
          let url = "{{ route('Institution/Details', ':id') }}";
          url = url.replace(':id', id);
          document.location.href=url;    }
      </script>
@endsection