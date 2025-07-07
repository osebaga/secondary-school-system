@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
        <div class="col-sm">
          @isset($credit)
          <div class="box form-horizontal ng-pristine ng-valid">
          <div class="box-header with-border">
              <h3 class="box-title">Program Credit Details </h3>
          </div>
                <div class="form-group" style="border-bottom: 1px dotted #ccc; margin-left: 1px; margin-right: 5px; padding-bottom: 5px; margin-bottom:0px;">
                    <label class="col-lg-3 control-label">Year of Study:</label>
                    <div class="col-lg-8">
                        <label class="checkbox-inline">
                        {{$credit->year_of_study}}
                        </label>
                    </div>
                </div>
                <div class="form-group" style="border-bottom: 1px dotted #ccc; margin-left: 1px; margin-right: 5px; padding-bottom: 5px; margin-bottom:0px;">
                    <label class="col-lg-3 control-label">Semester :</label>
                    <div class="col-lg-8">
                        <label class="checkbox-inline">
                        {{$credit->semester->semester}}
                        </label>
                    </div>
                </div>
                <div class="form-group" style="border-bottom: 1px dotted #ccc; margin-left: 1px; margin-right: 5px; padding-bottom: 5px; margin-bottom:0px;">
                    <label class="col-lg-3 control-label">Credit :</label>
                    <div class="col-lg-8">
                        <label class="checkbox-inline">
                        {{$credit->credit}}
                        </label>
                    </div>
                </div>
                 <div class="form-group" style="border-bottom: 1px dotted #ccc; margin-left: 1px; margin-right: 5px; padding-bottom: 5px; margin-bottom:0px;">
                    <label class="col-lg-3 control-label">Study Class :</label>
                    <div class="col-lg-8">
                        <label class="checkbox-inline">
                        {{$credit->academic_year}}
                        </label>
                    </div>
                </div>
                @endisset

                <div class="box-footer text-center">
                  <div>
                  <a href="{{url('admin/programe/'.$credit->programme_id.'/credit-configure')}}" class="btn btn-default btn-rounded mb-4" style="color: #000000;">
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
      <form class="modal-dialog"  role=" form"  method="POST" action="{{ route('update program credit') }}">
          @csrf {{method_field('patch')}}
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit credit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <input type="number" name="id" value="{{$credit->id}}" hidden>
                    <div class="card-body" style="padding: 20px;">
                        
                          <div class="form-group">
                            <p style="float: left; font-family: sans-serif;">Year of Study</p>
                              <select class="form-control" required name="year_of_study" id="year_of_study">
                                  <option>{{$credit->year_of_study}}</option>
                                @foreach($yearofstudy as $std)
                                <option>{{$std->title}}</option>
                                @endforeach
                              </select>
                            </div>

                          <div class="form-group">
                            <p style="float: left; font-family: sans-serif;">Semester</p>
                            <select class="form-control" required name="semester_id" id="semester_id">
                               <option value="{{$credit->semester_id}}">{{$credit->semester->semester}}</option>
                                 @if($semesters->count()>0)
                                    @foreach($semesters as $sem)
                                         <option value="{{$sem->id}}">{{$sem->semester}}</option>
                                    @endforeach
                                 @endif
                            </select>
                            </div>

                            <div class="form-group">
                              <p style="float: left; font-family: sans-serif;">Level/Class</p>
                                <select class="form-control" required name="academic_year" id="academic_year">
                                    <option value="">-Select-</option>
                                    <option value="1">First Year</option>
                                    <option value="2">Second Year</option>
                                    <option value="3">Third Year</option>
                                    <option value="4">Fourth</option>
                                </select>
                            </div>
                             
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Credits</p>
                                <input type="number" class="form-control" id="credit" name="credit" value="{{$credit->credit}}"
                                required
                                oninvalid="this.setCustomValidity('Must Enter credit Credits')"
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
          <form class="modal-dialog"  role="form" method="POST" action="{{route('delete-progr-credit')}}">
            {{ csrf_field() }}
            <div class="modal-content">
              <input type="number" name="credit" value="{{$credit->id}}" hidden>
              <input type="number" name="program" value="{{$credit->programme_id}}" hidden>
              <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button> <strong style="color: #FF6347; font-size: 15px;" > Are you sure you want to delete this?</strong>
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