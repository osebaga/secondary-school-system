
@extends('layouts.app')

  <!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;"><div class="col-sm">
  
    </div>
        <div class="box" >
           <div class="box-header">
            <p style="align-content: center;"><strong>Name: {{$student->firstname}}  {{$student->surname}} </strong> </p>
            </div>
            <!-- /.box-header -->
            @if($attachments->count()>0)
            @php $file = ''; @endphp
            <div class="box-body table-responsive">
             <table class="table table-hover">
              <thead>
                <tr>
                    <th>Name</th>
                    <th>Preview</th>
                    <th>Update</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($attachments as $attach)
                   @php $file = $student->attach()->where('attachment_id',$attach->id)->first();
                   @endphp
                     <tr>
                       <td>{{$attach->name}}</td>
                           @if($file)
                           <td><a href="{{url('storage/'.$file->attachment_path)}}">Open</a> </td>
                           <td>
                              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-id="{{$attach->id }}" data-target="#attch{{$attach->id}}">Update</button>
                           </td>
                           <td>
                             <form method="POST" action="{{url('remove-attachment/'.$file->id)}}">
                               @csrf {{method_field('delete')}}
                               <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                             </form>
                           </td>
                           @else
                           <td>-</td>
                            </td>
                           <td>
                              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-id="{{$attach->id }}" data-target="#attch{{$attach->id}}">Update</button>
                           </td>
                           <td>-</td>
                           @endif
                           
                             
                           <div class="modal fade" id="attch{{$attach->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title"> {{$attach->name}} </h4>
                                </div>
                                <div class="modal-body">
                                     <form method="POST" action="{{url('update-student-attachments')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input name="student" value="{{$student->id}}" hidden>
                                        <input name="attachment" value="{{$attach->id}}" hidden>
                                        <div class="form-group">
                                          <input type="file" required name="file">
                                        </div>
                                        <div class="form-group">
                                         <button class="btn btn-md btn-primary">Update</button>
                                           <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel </button>
                                        </div>
                                   </form>
                              </div>
                            </div>
                          </div>
                        </div>


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


    

     
@endsection