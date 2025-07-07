@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
    <div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
        <div class="col-sm">
             <div class="box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Module details</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    @isset($mod)
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                        
                           <li class="item">
                                <div class="product-info">
                                  <b>Module code
                                   <a>
                                     <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$mod->coursecode}}</span></a>
                                  </b>
                                </div>
                            </li>
                             <li class="item">
                                <div class="product-info">
                                  <b>TModule Name
                                  <a>
                                    <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$mod->modulename}}</span></a>
                                  </b>
                                </div>
                            </li>
                             <li class="item">
                                <div class="product-info">
                                  <b>Credits
                                  <a>
                                      <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$mod->credits}}</span></a>
                                  </b>
                                </div>
                            </li>
                            <li class="item">
                                <div class="product-info">
                                  <b>Capacity
                                  <a>
                                      <span class="pull-right" style="font-style: normal; margin-right: 200px">{{$mod->capacity}}</span></a>
                                  </b>
                                </div>
                            </li>
                               <li class="item">
                                <div class="product-info">
                                  <b>Exam Regulation
                                  <a>
                                      <span class="pull-right" style="font-style: normal; margin-right: 200px"> {{$mod->studylevel->levelname}} </span></a>
                                  </b>
                                </div>
                            </li>

                        </ul>
                    </div>
                    @endisset
                    <!-- /.box-body -->
                <div class="box-footer text-center">
                  <div>
                     <a href="{{route('Module')}}" class="btn btn-default btn-rounded mb-4" "  
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
      <form class="modal-dialog"  role=" form"  method="POST" action="{{ route('edit module')}}">
         {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Module</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                          <div class="card-body" style="padding: 20px;">
                          <input type="number" name="module_id" value="{{$mod->moduleid}}" hidden>
                         <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Module Code</p>
                                <input type="text" class="form-control" id="code" name="coursecode"value="{{$mod->coursecode}}" 
                                required
                                oninvalid="this.setCustomValidity('Must Enter Module code')"
                                oninput="this.setCustomValidity('')">
                            </div>
                              <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Module Name</p>
                                <input type="text" class="form-control" id="modulename" name="modulename"value="{{$mod->modulename}}" 
                                required
                                oninvalid="this.setCustomValidity('Must Enter Module Name')"
                                oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Credits</p>
                                <input type="number" class="form-control" id="credits" name="credits" value="{{$mod->credits}}"
                                required
                                oninvalid="this.setCustomValidity('Must Enter Module Credits')"
                                oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Capacity</p>
                                <input type="number" class="form-control" id="capacity" name="capacity" value="{{$mod->capacity}}">
                            </div>
                          <div class="form-group">
                              <p style="float: left; font-family: sans-serif;">Select Exam Regulation</p>
                              <select class="form-control" name="studylevel_id" >
                                <option value="{{$mod->studylevel->id}}">{{$mod->studylevel->levelname}}</option>
                                @foreach($studylevel as $std)
                                <option value="{{$std->id}}">{{$std->levelname}}</option>
                                @endforeach
                              </select>
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
          <form class="modal-dialog"  role=" form" method="POST" action="{{ route('mod.dlt',$mod->moduleid) }}">
             {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

                 <strong style="color: #FF6347; font-size: 15px;" > Are you sure you want to delete {{$mod->modulename}}</strong>

                  </div >
                    <div class="text-center" >
                      <button type="submit" class="btn btn-danger" style="margin-bottom: 10px;">DELETE</button>

                      <button type="button" data-dismiss="modal"  class="btn btn-primary" style="margin-left: 20px; margin-bottom: 10px">CANCEL</button>
                    </div>
               </div>
            </form> 
          </div>
    </div>

@endsection