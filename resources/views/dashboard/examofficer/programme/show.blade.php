@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
    <div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
        <div class="col-sm">
             <div class="box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Programme details</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    @isset($programme)
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <li class="item">
                                <div class="product-info">
                                  <b>Programme Name
                                    <a>
                                    <span class="pull-right" style="font-style: normal; margin-right: 200px">{{$programme->ProgrammeName}}</span></a>
                                  </b>
                                </div>
                            </li>
                              <li class="item">
                                <div class="product-info">
                                  <b>Programme Short Name
                                    <a>
                                    <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$programme->Title}}</span></a>
                                  </b>
                                </div>
                            </li>
                           <li class="item">
                                <div class="product-info">
                                  <b>NTA Level
                                   <a>
                                     <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$programme->Ntalevel}}</span></a>
                                  </b>
                                </div>
                            </li>
                             <li class="item">
                                <div class="product-info">
                                  <b>Department
                                  <a>
                                    <span class="pull-right" style="font-style: normal; margin-right: 200px">{{$dept->DeptName}}</span></a>
                                  </b>
                                </div>
                            </li>
                             <li class="item">
                                <div class="product-info">
                                  <b>Programme Code
                                  <a>
                                      <span class="pull-right" style="font-style: normal; margin-right: 200px">{{$programme->ProgrammeCode}}</span></a>
                                  </b>
                                </div>
                            </li>
                             <li class="item">
                                <div class="product-info">
                                  <b>Configuration
                                    <span class="pull-right" style="margin-right: 200px;"> <a href="{{(url('admin/programe/'.$programme->ProgrammeID.'/module-configure'))}}" class="btn btn btn-md"> Module</a> <a href="{{(url('admin/programe/'.$programme->ProgrammeID.'/credit-configure'))}}" class="btn btn"> Credit</a></span>
                                  </b>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endisset
                    <!-- /.box-body -->
                <div class="box-footer text-center">
                  <div>
                    <a href="{{route('Programme')}}" class="btn btn-default btn-rounded mb-4"
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

      <div class="modal fade" id="modaleditform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
      <form class="modal-dialog"  role=" form"  method="POST" action="{{ route('prog.edit',$programme->ProgrammeID) }}">
        {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Programme</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                            <div class="card-body" style="padding: 20px;">
                              <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Select Department</p>
                                <select class="form-control" name="DeptID" id="DeptID">
                                @foreach($departments as $depts)
                                  <option value="{{$dept->DeptID}}">{{$depts->DeptName}}</option>
                                @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Select Award</p>
                                <select class="form-control" name="Ntalevel" id="Ntalevel">
                                @foreach($studylevels as $std)
                                  <option value="{{$std->levelname}}">{{$std->levelname}}</option>
                                @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                  <p style="float: left; font-family: sans-serif;">Programme Code</p>
                                  <input type="number" class="form-control" id="campus" name="ProgrammeCode"
                                  value="{{$programme->ProgrammeCode}}" 
                                  required
                                    oninvalid="this.setCustomValidity('Must Enter Programme Code')"
                                    oninput="this.setCustomValidity('')">
                              </div>
                                <div class="form-group">
                                  <p style="float: left; font-family: sans-serif;">Programme Short Name</p>
                                  <input type="text" class="form-control" name="Title" value="{{$programme->Title}}" 
                                  required
                                oninvalid="this.setCustomValidity('Must Enter Programme Short Name')"
                                oninput="this.setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                  <p style="float: left; font-family: sans-serif;">Programme Full Name</p>
                                  <input type="text" class="form-control" name="ProgrammeName" value="{{$programme->ProgrammeName}}"
                                  required
                                oninvalid="this.setCustomValidity('Must Enter Programme Full Name')"
                                oninput="this.setCustomValidity('')">
                              </div>
                        </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" style="width: 200px; height: 40px; margin-bottom: 10px;">SAVE</button>
                    </div>

                  </div>
               </div>
            </form> 
      </div>


      <div class="modal fade" id="modaldeleteAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
          <form class="modal-dialog"  role=" form" method="POST" action="{{ route('prog.dlt',$programme->ProgrammeID) }}">
            {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

                 <strong style="color: #FF6347; font-size: 15px;" > Are you sure you want to delete {{$programme->ProgrammeName}}</strong>

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