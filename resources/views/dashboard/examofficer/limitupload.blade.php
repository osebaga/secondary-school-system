
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
        <h4>Setting of Course Results Upload Deadline</h4>
    </div>
    <div class="ibox-content">

        <form action="{{route('Set Limit')}}" class="form-horizontal ng-pristine ng-valid" 
        method="get" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="form-group"><label class="col-lg-3 control-label">Academic Year : </label>
          <div class="col-lg-8">
          <select class="form-control" name="Ayear">
                                  
                                  <option value="">--select Academic Year--</option>
                                  @foreach($year as $yr)
                                  <option value="{{$yr->title}}"> {{$yr->title}} </option>        
                                  @endforeach    
                                  
                  </select>
            </div>
          </div>
        <div class="form-group"><label class="col-lg-3 control-label">Semester : </label>

            <div class="col-lg-8">
                <select class="form-control" name="semester">
                        <option value="">--select semeter--</option>
                        @foreach($semester as $sem)
                        <option value="{{$sem->semester}}"> {{$sem->semester}} </option>        
                        @endforeach
                </select>
             </div>
        </div>
        <div class="form-group"><label class="col-lg-3 control-label">Deadline : </label>

        <div class="col-lg-8">
        <input  name="deadline" type="date" class="form-control pull-right" id="datepicker">
            </div>
      </div>
     
        <div class="form-group"><label class="col-lg-3 control-label">Deadline : </label>

        <div class="col-lg-8">
        <select class="form-control" name="status">

                                <option value="">-----------</option>
                                <option value="set deadline">set deadline</option>
                                <option value="unset deadline">unset deadline</option>

                </select>
          </div>
        </div>

        <div class="box-footer text-center">
                  <div>
                     <a href="{{route('Limit Upload')}}" class="btn btn-default btn-rounded mb-4" "  
                    style="color: #000000;">
                    <b>BACK</b></a>

                    <button type="submit" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modaleditform"  
                    style="color: #008000;margin-left: 50px; ">
                    <b>CONFIRM</b></button>
                 
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