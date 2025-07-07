
@extends('layouts.app')

  <!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;"><div class="col-sm">
  
    </div>
        <div class="box" >
           <div class="box-header">
            <p style="align-content: center;"><strong>Attachments: </strong> </p>
              <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalAttachment"  
                style="color: #008000;">
                <b>Add</b>
              </a>
            </div>
            <!-- /.box-header -->
            @if($attachments->count()>0)
            <div class="box-body table-responsive">
             <table class="table table-hover">
              <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($attachments as $attach)
                    <tr>
                      <td>{{$attach->name}}</td>
                      <td>{{$attach->description}}</td>
                      <td>
                        <form method="POST" action="{{ url('attachments/'.$attach->id)}}" >
                          @csrf {{method_field('delete')}}
                          <button onclick="return confirm('This is permanent delete,proceed?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            </div>
            @else
                  <p>
                    There is no any record!
                  </p>
            @endif
        </div>

       
      </div>


      <div class="modal fade" id="modalAttachment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <form class="modal-dialog"  role="form" method="POST" action="{{ url('attachments') }}">
          {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">New attachment</h4>
            </div>
         <div class="card-body" style="padding: 20px;">
            <div class="form-group">
                <input type="text" placeholder="Name :e.g. Birth Certificate" class="form-control" id="name" name="name"
                required>
            </div>
            <div class="form-group">
              <textarea name="description" class="form-control" rows="2" placeholder="Any description about the Attachment" maxlength="50"></textarea>
            </div>
          
     
            <div class="form-group">
              <button type="submit" class="btn btn-primary" style="width: 200px; height: 40px; margin-bottom: 10px;">SAVE</button>
            </div>
          </div>
          </div>
      </form> 
      </div>

     
@endsection