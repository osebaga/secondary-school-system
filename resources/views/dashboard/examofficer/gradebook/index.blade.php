
@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">
         
  </div>
  <div class="box" style="padding:20px" >
      
  <div class="ibox float-e-margins">
  <div class="ibox-title">
    @if($head==null)
      <h4>Select Appropriate Academic Year and Semester</h4>
      @else
      <h5>{{$head}}</h5>
    @endif
  </div>
  <div class="ibox-content">

      <form action="{{route('Import Grade')}}" class="form-horizontal ng-pristine ng-valid" method="get" accept-charset="utf-8">
      {{ csrf_field() }}

      <div class="form-group"><label class="col-lg-3 control-label">Academic Year : </label>
              <div class="col-lg-8">
              <select class="form-control" name="year" >
                      <option value="">--select Academic Year--</option>
                      @foreach($Ayear as $yr)
                      <option value="{{$yr->title}}"> {{$yr->title}} </option> @endforeach     
                      </select>
                </div>
              </div>

              <div class="form-group"><label class="col-lg-3 control-label">Semester : </label>
              <div class="col-lg-8">
              <select class="form-control" name="sem" >
                    <option value="">--select Semester--</option>
                    @foreach($semester as $seme)
                    <option value="{{$seme->semester}}">{{$seme->semester}}</option> @endforeach     
                      </select>
                </div>
              </div>

            <div class="form-group"><label class="col-lg-3 control-label">Module Code : </label>


              <div class="col-lg-8">
              <select class="form-control" name="coursecode" >
                  <option value="">--select Course code--</option>
                  @foreach($modules as $mod)
                  <option value="{{$mod->coursecode}}"> {{$mod->coursecode}} </option>        
                  @endforeach        
                </select>
                </div>
              </div>

            <div class="form-group"><label class="col-lg-3 control-label">Exam Category : </label>
              <div class="col-lg-8">
              <select class="form-control" name="examcat" > 
                  <option value="">--select Exam Category--</option>
                  @foreach($examcat as $cat)
                  <option value="{{$cat->description}}"> {{$cat->description}} </option>        
                  @endforeach     
                      </select>
                </div>
              </div>
              
              <div class="form-group"><label class="col-lg-3 control-label">Exam Date : </label>
              <div class="col-lg-8">
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input  name="date" type="date" class="form-control pull-right" id="datepicker">
                </div>
                </div>
              </div>

            <div class="box-footer text-center">
         
                      <div>
                      <a href="{{route('Grade book')}}" class="btn btn-default btn-rounded mb-4" 
                        style="color: #000000;">
                        <b>BACK</b></a>

                        <button type="submit" class="btn btn-default btn-rounded mb-4"  
                        style="color: #008000;margin-left: 50px; ">
                        <b>EDIT RECORDS</b></button>
                    
                      </div >
                  </div>
        </form>  

   
    </div>
      
  </div>
  
</div>

    <script type="text/javascript">
      function getTableRowId(reg){ }
    </script>
@endsection