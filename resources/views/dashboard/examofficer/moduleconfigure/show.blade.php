@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
        <div class="col-sm">
          @isset($module)
          <div class="box form-horizontal ng-pristine ng-valid">
          <div class="box-header with-border">
              <h3 class="box-title">Program Module Configuration Details </h3>
          </div>
              <div class="form-group" style="border-bottom: 1px dotted #ccc; margin-left: 1px; margin-right: 5px; padding-bottom: 5px; margin-bottom:0px;">
                <label class="col-lg-3 control-label">Module code :</label>
                <div class="col-lg-8">
                    <label class="checkbox-inline">
                        {{$module->module_code}}
                    </label>
                </div>
            </div>
                <div class="form-group" style="border-bottom: 1px dotted #ccc; margin-left: 1px; margin-right: 5px; padding-bottom: 5px; margin-bottom:0px;">
                    <label class="col-lg-3 control-label">Year of Study:</label>
                    <div class="col-lg-8">
                        <label class="checkbox-inline">
                        {{$module->year_of_study}}
                        </label>
                    </div>
                </div>
                <div class="form-group" style="border-bottom: 1px dotted #ccc; margin-left: 1px; margin-right: 5px; padding-bottom: 5px; margin-bottom:0px;">
                    <label class="col-lg-3 control-label">Semester :</label>
                    <div class="col-lg-8">
                        <label class="checkbox-inline">
                        {{$module->semester->semester}}
                        </label>
                    </div>
                </div>
                <div class="form-group" style="border-bottom: 1px dotted #ccc; margin-left: 1px; margin-right: 5px; padding-bottom: 5px; margin-bottom:0px;">
                    <label class="col-lg-3 control-label">Credit :</label>
                    <div class="col-lg-8">
                        <label class="checkbox-inline">
                        {{$module->credit}}
                        </label>
                    </div>
                </div>
                 <div class="form-group" style="border-bottom: 1px dotted #ccc; margin-left: 1px; margin-right: 5px; padding-bottom: 5px; margin-bottom:0px;">
                    <label class="col-lg-3 control-label">Category :</label>
                    <div class="col-lg-8">
                        <label class="checkbox-inline">
                        {{$module->category}}
                        </label>
                    </div>
                </div>
                @endisset

                <div class="box-footer text-center">
                  <div>
                  <a href="{{url('admin/programe/'.$module->programme_id.'/module-configure')}}" class="btn btn-default btn-rounded mb-4" style="color: #000000;">
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
      <form class="modal-dialog"  role=" form"  method="POST" action="{{ route('update program module') }}">
          @csrf {{method_field('patch')}}
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Module Programme Configuration</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <input type="number" name="id" value="{{$module->id}}" hidden>
                    <div class="card-body" style="padding: 20px;">
                           <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Module Code</p>
                            <select class="form-control" required name="module_code" id="module_code">
                               <option>{{$module->module_code}}</option>
                                 @if($modus->count()>0)
                                    @foreach($modus as $mod)
                                         <option value="{{$mod->coursecode}}">{{$mod->coursecode}} - {{$mod->modulename}}</option>
                                    @endforeach
                                 @endif
                            </select>
                            </div>

                          <div class="form-group">
                            <p style="float: left; font-family: sans-serif;">Year of Study</p>
                              <select class="form-control" required name="year_of_study" id="year_of_study">
                                  <option>{{$module->year_of_study}}</option>
                                @foreach($yearofstudy as $std)
                                <option>{{$std->title}}</option>
                                @endforeach
                              </select>
                            </div>

                          <div class="form-group">
                            <p style="float: left; font-family: sans-serif;">Semester</p>
                            <select class="form-control" required name="semester_id" id="semester_id">
                               <option value="{{$module->semester_id}}">{{$module->semester->semester}}</option>
                                 @if($semesters->count()>0)
                                    @foreach($semesters as $sem)
                                         <option value="{{$sem->id}}">{{$sem->semester}}</option>
                                    @endforeach
                                 @endif
                            </select>
                            </div>

                            <div class="form-group">
                            <p style="float: left; font-family: sans-serif;">Category</p>
                            <select class="form-control" required name="category" id="category">
                               <option value="{{$module->category}}">{{$module->category}}</option>
                               <option>Core</option>
                               <option>Elective</option>
                               <option>Fundamental</option>
                            </select>
                            </div>
                             
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Credits</p>
                                <input type="number" class="form-control" id="credit" name="credit" value="{{$module->credit}}"
                                required
                                oninvalid="this.setCustomValidity('Must Enter Module Credits')"
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
          <form class="modal-dialog"  role="form" method="POST" action="{{route('delete-progr-module')}}">
            {{ csrf_field() }}
            <div class="modal-content">
              <input type="number" name="module" value="{{$module->id}}" hidden>
              <input type="number" name="program" value="{{$module->programme_id}}" hidden>
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