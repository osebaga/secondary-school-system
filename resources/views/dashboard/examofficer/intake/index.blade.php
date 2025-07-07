
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
                style="color: #008000;"> <b>Add</b></a>
           @endcan   
            </div>
            <!-- /.box-header -->
          @if (count($intakes) > 0)
            <div class="box-body table-responsive" style="padding: 20px;" >
             <table class="table table-hover {{ count($intakes) > 0 ? 'datatable' : '' }}" >
              <thead>
                <tr>
                    <th>Name</th>
                    <th>Descriptions</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>
                </thead>
                <tbody>
                        @foreach ($intakes as $intk)
                            <tr onclick="getTableRowId({{$intk->id}})" data-entry-id="{{ $intk->id }}">
                                <td field-key='Name'>{{$intk->name }}</td>
                                <td field-key='Descriptions'>{{$intk->descriptions }}</td> 
                                <td field-key='Status'>{{$intk->status }}</td>
                                <td field-key='Preview'><i class="fa fa-eye"></i></td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
            </div>
            @else
                 <div class="box-body">
                    <p>There is no any Intake Category Added!</p>
                 </div>
            @endif
        </div>

        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <form class="modal-dialog"  role="form" method="POST" action="{{ route('intake.add') }}">
          {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add New Intake</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <div class="card-body" style="padding: 20px;">
                    <div class="form-group">
                        <p style="float: left; font-family: sans-serif;">Name</p>
                        <input type="text" class="form-control" id="Name" name="name" value=""required oninvalid="this.setCustomValidity('Must Enter intake Name')"
                        oninput="this.setCustomValidity('')" >
                    </div>
                    <div class="form-group">
                        <p style="float: left; font-family: sans-serif;">Description</p>
                        <textarea name="descriptions" rows="3" class="form-control" id="descriptions"></textarea>
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
          let url = "{{ route('Intake-Category/Details', ':id') }}";
          url = url.replace(':id', id);
          document.location.href=url;    }
      </script>
@endsection