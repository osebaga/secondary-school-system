
@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">
         
  </div>
      <div class="box" style="padding:20px" >
     
      <div class="ibox float-e-margins">
      <div class="ibox float-e-margins">
  <div class="ibox-title">
      <h5>Update Registered Students</h5>
  </div>
  <div class="ibox-content">

      <form action="{{route('update classlist')}}" class="form-horizontal ng-pristine ng-valid" method="get" accept-charset="utf-8">
      {{ csrf_field() }}
      <div class="form-group"><label class="col-lg-3 control-label">Intake Year : </label>
        <div class="col-lg-8">
        <select class="form-control" name="inyear" >
                                
                                <option value="">--select Intake Year--</option>
                                @foreach($year as $yr)
                                <option value="{{$yr->title}} "> {{$yr->title}} </option>        
                                @endforeach    
                                
                </select>
          </div>
        </div>

        <div class="form-group"><label class="col-lg-3 control-label">Academic Year : </label>
        <div class="col-lg-8">
        <select class="form-control" name="year" >
                                
                                <option value="">--select Intake Year--</option>
                                @foreach($year as $yr)
                                <option value="{{$yr->title}} "> {{$yr->title}} </option>        
                                @endforeach    
                                
                </select>
          </div>
        </div>
        <div class="form-group"><label class="col-lg-3 control-label">Programme : </label>

        <div class="col-lg-8">
        <select class="form-control" name="programme" >
                                
                                <option value="">--select Programme--</option>
                                @foreach($programme as $prog)
                                <option value="{{$prog->Title}}"> {{$prog->Title}} </option>        
                                @endforeach    
                                
                </select>
          </div>
        </div>
        <div class="form-group"><label class="col-lg-3 control-label">Semester : </label>

        <div class="col-lg-8">
            <select class="form-control" name="semester" >
                    <option value="">--select semeter--</option>
                    @foreach($semester as $sem)
                    <option value="{{$sem->semester}}"> {{$sem->semester}} </option>        
                    @endforeach
            </select>
        </div>
        </div>

      <div class="form-group"><label class="col-lg-3 control-label">Class : </label>

      <div class="col-lg-8">
      <select class="form-control" name="class" >

                          <option value="">--select class--</option>
                            @foreach($class as $c)
                            <option value="{{$c->class}}">{{$c->class}}</option>
                            @endforeach
                               
                             
              </select>
        </div>
      </div>

      <div class="box-footer text-center">
                <div>
                  <button type="submit" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modaleditform"  
                  style="color: #008000;margin-left: 50px; ">
                  <b>UPDATE</b></button>
               
                </div >
            </div>
      </form>    
    </div>
      </div>
  </div>

</div>

    <script type="text/javascript">
      function getTableRowId(reg){
        // let url = "{{ route('Student Register', ':reg') }}";
        // url = url.replace(':reg', reg);
        document.location.href=url;    }
    </script>
@endsection