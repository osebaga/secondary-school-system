
@extends('layouts.dashboard')

  <!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;"><div class="col-sm">

    </div>
        <div class="box" >
           <div class="box-header">
              <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm"
                style="color: #008000;">
                <b>Add</b>
              </a>
            </div>
            <!-- /.box-header -->
            @if($payments->count()>0)
            <div class="box-body table-responsive">
             <table class="table table-hover">
              <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($payments as $pay)
                    <tr>
                      <td>{{$pay->name}}</td>
                      <td>{{$pay->descriptions}}</td>
                      <td>{{$pay->status}}</td>
                      <td><a href="{{url('payments/'.$pay->id.'/edit')}}">Edit</a></td>
                      <td>
                        <form method="POST" action="{{ url('payments/'.$pay->id)}}" >
                          @csrf {{method_field('delete')}}
                          <button onclick="return confirm('This is permanent delete, you can go to edit and change status instead or proceed?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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


      <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <form class="modal-dialog"  role="form" method="POST" action="{{ url('payments') }}">
          {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add New Payment Types</h4>
            </div>
         <div class="card-body" style="padding: 20px;">
            <div class="form-group">
                <p style="float: left; font-family: sans-serif;">Name</p>
                <input type="text" placeholder="Payment Type" class="form-control" id="name" name="name" value=""
                required>
            </div>
               <div class="form-group">
                <textarea name="descriptions" placeholder="Any descriptions about this Type!" class="form-control" rows="4"></textarea>
            </div>


            <div class="form-group">
              <button type="submit" class="btn btn-primary" style="width: 200px; height: 40px; margin-bottom: 10px;">SAVE</button>
            </div>
          </div>
          </div>
      </form>
      </div>


@endsection
