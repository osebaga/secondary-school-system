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
              <table class="table table-hover {{ count($sponsors) > 0 ? 'datatable' : '' }}" >
              <thead>
                <tr>
                     <th>Sonsor Name</th>
                     <th>Address</th>
                     <th>Comments</th>
                    
                  </tr>
                </thead>

                <tbody>
                    @if (count($sponsors) > 0)
                         @foreach($sponsors as $sp)
                            <tr onclick="getTableRowId({{$sp->sponsorId}})" data-entry-id="{{$sp->sponsorId}}">
                                  <td>{{$sp->sponsorname}}</td>
                                  <td>{{$sp->address}}</td>
                                  <td>{{$sp->comment}}</td>
                                 
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
        <form class="modal-dialog"  role="form" method="POST" action="{{route('sponsor.add')}}">
           {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add New Sponsor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
             </div>
             <div class="card-body" style="padding: 20px;">
                  <div class="form-group">
                        <p style="float: left; font-family: sans-serif;">Sponsor Name</p>
                        <input type="text" class="form-control" id="" name="sponsorname" value="" >
                    </div>
                      <div class="form-group">
                        <p style="float: left; font-family: sans-serif;">Physical Address</p>
                        <input type="text" class="form-control" id="address" name="address"value="" >
                    </div>
                    <div class="form-group">
                        <p style="float: left; font-family: sans-serif;">Comment</p>
                        <input type="text" class="form-control"  name="comment" value="">
                  </div><div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
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
                             <table class="table table-hover {{ count($sponsors) > 0 ? 'datatable' : '' }}" >
                                 <thead>
                                 <tr>
                                     <th>Sonsor Name</th>
                                     <th>Address</th>
                                     <th>Comments</th>

                                 </tr>
                                 </thead>

                                 <tbody>
                                 @if (count($sponsors) > 0)
                                     @foreach($sponsors as $sp)
                                         <tr onclick="getTableRowId({{$sp->sponsorId}})" data-entry-id="{{$sp->sponsorId}}">
                                             <td>{{$sp->sponsorname}}</td>
                                             <td>{{$sp->address}}</td>
                                             <td>{{$sp->comment}}</td>

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
                         <form class="modal-dialog"  role="form" method="POST" action="{{route('sponsor.add')}}">
                             {{ csrf_field() }}
                             <div class="modal-content">
                                 <div class="modal-header text-center">
                                     <h4 class="modal-title w-100 font-weight-bold">Add New Sponsor</h4>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="card-body" style="padding: 20px;">
                                     <div class="form-group">
                                         <p style="float: left; font-family: sans-serif;">Sponsor Name</p>
                                         <input type="text" class="form-control" id="" name="sponsorname" value="" >
                                     </div>
                                     <div class="form-group">
                                         <p style="float: left; font-family: sans-serif;">Physical Address</p>
                                         <input type="text" class="form-control" id="address" name="address"value="" >
                                     </div>
                                     <div class="form-group">
                                         <p style="float: left; font-family: sans-serif;">Comment</p>
                                         <input type="text" class="form-control"  name="comment" value="">
                                     </div>
                                 </div>
                                 <div class="text-center">
                                     <button type="submit" class="btn btn-primary" style="width: 200px; height: 40px; margin-bottom: 10px;">SAVE</button>
                                 </div>
                         </form>
                     </div>
                 </div>

                 <script type="text/javascript">
                     function getTableRowId(id){
                         let url = "{{ route('Sponsor/Details', ':id') }}";
                         url = url.replace(':id', id);
                         document.location.href=url;    }
                 </script>
                      </div>
              <div class="text-center">
              <button type="submit" class="btn btn-primary" style="width: 200px; height: 40px; margin-bottom: 10px;">SAVE</button>
            </div>
      </form> 
    </div>
      </div>

      <script type="text/javascript">
        function getTableRowId(id){
          let url = "{{ route('Sponsor/Details', ':id') }}";
          url = url.replace(':id', id);
          document.location.href=url;    }
      </script>
@endsection