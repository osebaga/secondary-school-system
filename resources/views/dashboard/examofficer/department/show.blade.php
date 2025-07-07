@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
    <div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
        <div class="col-sm">
             <div class="box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Department Details</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                              <li class="item">
                                <div class="product-info">
                                  <b>Campus Name
                                    <a>
                                    <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$camp->campus}}</span></a>
                                  </b>
                                </div>
                            </li>
                            <li class="item">
                                <div class="product-info">
                                  <b>Faculty Name
                                   <a>
                                     <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$fac->FacultyName}}</span></a>
                                  </b>
                                </div>
                            </li>
                            <li class="item">
                                <div class="product-info">
                                  <b>Department name
                                    <a>
                                    <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$dept->DeptName}}</span></a>
                                  </b>
                                </div>
                            </li>
                            <li class="item">
                                <div class="product-info">
                                  <b>Physical Address
                                   <a>
                                     <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$dept->DeptPhysAdd}}</span></a>
                                  </b>
                                </div>
                            </li>
                             <li class="item">
                                <div class="product-info">
                                  <b>Address
                                  <a>
                                    <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$dept->DeptAddress}}</span></a>
                                  </b>
                                </div>
                              </li>
                             <li class="item">
                                <div class="product-info">
                                  <b>Email
                                  <a>
                                      <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$dept->DeptEmail}}</span></a>
                                  </b>
                                </div>
                                </li>
                                <li class="item">
                                  <div class="product-info">
                                  <b>Telephone
                                  <a>
                                      <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$dept->DeptTel}}</span></a>
                                  </b>
                                </div>
                              </li>
                                <li class="item">
                                  <div class="product-info">
                                  <b>Department Head
                                  <a>
                                      <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$dept->DeptHead}}</span></a>
                                  </b>
                                </div>
                            </li>
                        </ul>
                    </div>
                   
                    <!-- /.box-body -->
                <div class="box-footer text-center">
                  <div>
                      <a href="{{route('Department')}}" class="btn btn-default btn-rounded mb-4"  
                    style="color: #000000;">
                    <b>BACK</b></a>
                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modaleditform"  
                    style="color: #008000;margin-left: 50px; ">
                    <b>EDIT</b></a>
                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modaldeleteAlert"  
                   style="margin-left: 50px;color: #FF6347;">
                    <b>DELETE</b> </a>
                  </div >
              </div>
          </div>
      </div>

       <div class="modal fade" id="modaleditform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
         <form class="modal-dialog"  role=" form"  method="POST" action="{{ route('dept.edit',$dept->DeptID) }}">
            {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Edit Department</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <div class="card-body" style="padding: 20px;">
                  <div class="form-group">
                        <p style="float: left; font-family: sans-serif;">Select Faculty</p>
                        <select class="form-control" name="FacultyID">
                        @foreach($faculties as $fac)
                          <option value="{{$fac->FacultyID}}">{{$fac->FacultyName}}</option>
                        @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                    <p style="float: left; font-family: sans-serif;">Department name</p>
                    <input type="text" class="form-control" id="DeptName" name="DeptName" value="{{$dept->DeptName}}"
                           required
                           oninvalid="this.setCustomValidity('Must Enter Department Name')"
                           oninput="this.setCustomValidity('')" >
                  </div>
                  <div class="form-group">
                    <p style="float: left; font-family: sans-serif;">Physical Address</p>
                    <input type="text" class="form-control" id="DeptPhysAdd" name="DeptPhysAdd"value="{{$dept->DeptPhysAdd}}" >
                  </div>
                 <div class="form-group">
                    <p style="float: left; font-family: sans-serif;">Address</p>
                    <input type="text" class="form-control" id="DeptAddress" name="DeptAddress" value="{{$dept->DeptAddress}}">
                  </div>
                  <div class="form-group">
                    <p style="float: left; font-family: sans-serif;">Email</p>
                    <input type="email" class="form-control" id="DeptEmail" name="DeptEmail" value="{{$dept->DeptEmail}}">
                  </div>
                   <div class="form-group">
                    <p style="float: left; font-family: sans-serif;">Tel</p>
                    <input type="text" class="form-control" id="DeptTel" name="DeptTel" value="{{$dept->DeptTel}}">
                  </div>
                   <div class="form-group">
                    <p style="float: left; font-family: sans-serif;">Department Head</p>
                    <input type="text" class="form-control" id="DeptHead" name="DeptHead" value="{{$dept->DeptHead}}">
                </div>
              </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" style="width: 200px; height: 40px; margin-bottom: 10px;">SAVE</button>
            </div>
          </div>
      </form> 
      </div>

      <div class="modal fade" id="modaldeleteAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
          <form class="modal-dialog"  role=" form"  method="POST" action="{{ route('dept.dlt',$dept->DeptID) }}">
              {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

                 <strong style="color: #FF6347; font-size: 15px;" > Are you sure you want to delete {{$dept->DeptName}}</strong>

                  </div >
                    <div class="text-center" >
                      <button type="submit" class="btn btn-danger" style="margin-bottom: 10px;">DELETE</button>
                      <button type="button" data-dismiss="modal" class="btn btn-primary" style="margin-left: 20px; margin-bottom: 10px">CANCEL</button>
                    </div>
               </div>
            </form> 
          </div>
    </div>

@endsection