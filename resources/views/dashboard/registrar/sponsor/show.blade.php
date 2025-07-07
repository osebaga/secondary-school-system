@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
    <div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
        <div class="col-sm">
             <div class="box" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Sponsor details</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    @isset($sponsor)
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <li class="item">
                                <div class="product-info">
                                  <b>Sponsor name
                                    <a>
                                    <span class="pull-right" style="font-style: normal;">{{$sponsor->sponsorname}}</span></a>
                                  </b>
                                </div>
                            </li>
                           <li class="item">
                                <div class="product-info">
                                  <b>Address
                                   <a>
                                     <span class="pull-right" style="font-style: normal;">{{$sponsor->address}}</span></a>
                                  </b>
                                </div>
                            </li>
                             <li class="item">
                                <div class="product-info">
                                  <b>Comment
                                  <a>
                                    <span class="pull-right" style="font-style: normal;">{{$sponsor->comment}}</span></a>
                                  </b>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                    @endisset
                    <!-- /.box-body -->
                <div class="box-footer text-center">
                  <div>
                  <a href="{{route('sponsor')}}" class="btn btn-default btn-rounded mb-4" 
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
      <form class="modal-dialog"  role=" form"  method="POST" action="{{ route('sponsor.edit',$sponsor->sponsorId) }}">
          {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Sponsor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                 
                        <div class="card-body" style="padding: 20px;">
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Sponsor name</p>
                                <input type="text" class="form-control" id="campus" name="sponsorname" value="{{$sponsor->sponsorname}}">
                            </div>
                              <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Address</p>
                                <input type="text" class="form-control" id="address" name="address"value="{{$sponsor->address}}" >
                            </div>
                           <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Comment</p>
                                <input type="text" class="form-control" id="tel" name="comment" value="{{$sponsor->comment}}">
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
          <form class="modal-dialog"  role="form" method="POST" action="{{ route('sponsor.dlt',$sponsor->sponsorId) }}">
            {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

                 <strong style="color: #FF6347; font-size: 15px;" > Are you sure you want to delete {{$sponsor->sponsorname}}</strong>

                  </div >
                    <div class="text-center" >
                      <button type="submit" class="btn btn-danger" style="margin-bottom: 10px;" >DELETE</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-left: 20px; margin-bottom: 10px">CANCEL</button>
                    </div>
               </div>
            </form> 
          </div>
    </div>

@endsection