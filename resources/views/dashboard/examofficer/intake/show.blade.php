@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
    <div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
        <div class="col-sm">
             <div class="box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Intake details</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    @isset($intdetails)
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <li class="item">
                                <div class="product-info">
                                  <b>Name
                                    <a>
                                    <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$intdetails->name}}</span></a>
                                  </b>
                                </div>
                            </li>
                           <li class="item">
                                <div class="product-info">
                                  <b> Descriptions
                                   <a>
                                     <span class="pull-right" style="font-style: normal;margin-right: 200px">{{$intdetails->descriptions}}</span></a>
                                  </b>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                    @endisset
                    <!-- /.box-body -->
                <div class="box-footer text-center">
                  <div>
                       <a href="{{route('intake-categories')}}" class="btn btn-default btn-rounded mb-4"  
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
      <form class="modal-dialog"  role=" form"  method="POST" action="{{ route('intake.edit',$intdetails->id) }}">
          {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Intake</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                       <div class="card-body" style="padding: 20px;">
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Intake Name</p>
                                <input type="text" class="form-control" id="Name" name="name" value="{{$intdetails->name}}"
                                required
                                oninvalid="this.setCustomValidity('Must Enter Intake Name')"
                                oninput="this.setCustomValidity('')" >
                            </div>
                              <div class="form-group">
                                <p style="float: left; font-family: sans-serif;"> Descriptions</p>
                                <input type="text" class="form-control" id="Descriptions" name="Descriptions"value = "{{$intdetails->descriptions}}" >
                            </div>
                      </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" style="width: 200px; height: 40px; margin-bottom: 10px;">SAVE</button>
                    </div>
               </div>
            </form> 
      </div>


      <div class="modal fade" id="modaldeleteAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
         <form class="modal-dialog"  role="form" method="POST" action="{{ route('int.dlt',$intdetails->id) }}">
            {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

                 <strong style="color: #FF6347; font-size: 15px;" > Are you sure you want to delete {{$intdetails->name}}</strong>
                  </div >
                    <div class="text-center" >

                      <button type="submit" class="btn btn-danger" style="margin-bottom: 10px;">DELETE</button>

                      <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-left: 20px; margin-bottom: 10px">CANCEL</button>

                    </div>
               </div>
            </form> 
          </div>
    </div>


@endsection