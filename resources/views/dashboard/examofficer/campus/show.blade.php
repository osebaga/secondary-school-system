@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
        <div class="col-sm">
          @isset($camp)
          <div class="box form-horizontal ng-pristine ng-valid">
          <div class="box-header with-border">
                        <h3 class="box-title">Campus details</h3>>
                    </div>
                  <div class="form-group" style="border-bottom: 1px dotted #ccc; margin-left: 20px; margin-right: 20px; padding-bottom: 5px; margin-bottom:0px;">
                    <label class="col-lg-4 control-label">Campus name :</label>

                    <div class="col-lg-1">
                        <label class="checkbox-inline">
                            {{$camp->campus}}
                        </label>
                    </div>
                </div>
                <div class="form-group" style="border-bottom: 1px dotted #ccc; margin-left: 20px; margin-right: 20px; padding-bottom: 5px; margin-bottom:0px;">
                    <label class="col-lg-4 control-label">Campus Address :</label>

                    <div class="col-lg-1">
                        <label class="checkbox-inline">
                        {{$camp->address}}
                        </label>
                    </div>
                </div>
                <div class="form-group" style="border-bottom: 1px dotted #ccc; margin-left: 20px; margin-right: 20px; padding-bottom: 5px; margin-bottom:0px;">
                    <label class="col-lg-4 control-label">Campus Telephone :</label>

                    <div class="col-lg-1">
                        <label class="checkbox-inline">
                        {{$camp->tel}}
                        </label>
                    </div>
                </div>
                <div class="form-group" style="border-bottom: 1px dotted #ccc; margin-left: 20px; margin-right: 20px; padding-bottom: 5px; margin-bottom:0px;">
                    <label class="col-lg-4 control-label">Campus Email :</label>

                    <div class="col-lg-1">
                        <label class="checkbox-inline">
                        {{$camp->email}}
                        </label>
                    </div>
                </div>
                @endisset

                <div class="box-footer text-center">
                  <div>
                  <a href="{{route("campus")}}" class="btn btn-default btn-rounded mb-4" "  
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

      </div>

      <div class="modal fade" id="modaleditform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
      <form class="modal-dialog"  role=" form"  method="POST" action="{{ route('campus.edit',$camp->id) }}">
          {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Campus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                        <div class="card-body" style="padding: 20px;">
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Campus name</p>
                                <input type="text" class="form-control" id="campus" name="campus" value="{{$camp->campus}}"
                                required oninvalid="this.setCustomValidity('Must enter Campus Name')"
                                       oninput="this.setCustomValidity('')" >
                            </div>
                              <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Address</p>
                                <input type="text" class="form-control" id="address" name="address"value="{{$camp->address}}" >
                            </div>
                           <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Telephone</p>
                                <input type="text" class="form-control" id="tel" name="tel" value="{{$camp->tel}}">
                            </div>
                           <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Email</p>
                                <input type="email" class="form-control" id="email" name="email" value="{{$camp->email}}">
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
          <form class="modal-dialog"  role="form" method="POST" action="{{ route('campus.dlt',$camp->id) }}">
            {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

                 <strong style="color: #FF6347; font-size: 15px;" > Are you sure you want to delete {{$camp->campus}}</strong>

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