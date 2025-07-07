
@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">
         
  </div>
  <div class="box" style="padding:20px" >
      
  <div class="ibox float-e-margins">
  <div class="ibox-title">
      <h4>Semester Reports Examination Results      </h4>
  </div>
  <div class="ibox-content">

      <form action="" class="form-horizontal ng-pristine ng-valid" method="get" accept-charset="utf-8">
      {{ csrf_field() }}
      <div class="form-group"><label class="col-lg-3 control-label">Programme : </label>

        <div class="col-lg-8">
            <select class="form-control" name="programme" >
                <option value="">--select programme--</option>
                @foreach($program as $prog)
                <option value="{{$prog->Title}}"> {{$prog->Title}} </option>        
                @endforeach
            </select>
        </div>
        </div>

        
        <div class="form-group"><label class="col-lg-3 control-label">Intake Year : </label>

        <div class="col-lg-8">
        <select class="form-control" name="intakeyear" >
                <option value="">--select intake Year--</option>
                @foreach($Ayear as $yr)
                <option value="{{$yr->title}}"> {{$yr->title}} </option>        
                @endforeach     
                </select>
        </div>
        </div>
        <div class="form-group"><label class="col-lg-3 control-label">Academic Year : </label>

          <div class="col-lg-8">
          <select class="form-control" name="academicyear" >
                  <option value="">--select intake Year--</option>
                  @foreach($Ayear as $yr)
                  <option value="{{$yr->title}}"> {{$yr->title}} </option>        
                  @endforeach     
                  </select>
          </div>
          </div>


        <div class="form-group"><label class="col-lg-3 control-label">Class : </label>

        <div class="col-lg-8">
        <select class="form-control" name="class" >         
                  <option value="">--select Class--</option>
                  <option value="First Year">First Year</option>
                  <option value="Second Year">Second Year</option>
                  <option value="Third Year">Third Year</option>
                  <option value="Fourth Year">Fourth Year</option>   
                </select>
          </div>
        </div>


        <div class="form-group"><label class="col-lg-3 control-label">Semester : </label>

        <div class="col-lg-8">
        <select class="form-control" name="semester" >
                <option value="">--select Semester--</option>
                @foreach($semester as $seme)
                <option value="{{$seme->semester}}">{{$seme->semester}}</option>        
                @endforeach     
                </select>
        </div>
        </div>

        <div class="box-footer text-center">
                <div>
                <a href="" class="btn btn-default btn-rounded mb-4" 
                  style="color: #000000;">
                  <b>BACK</b></a>

                  <button type="submit" class="btn btn-default btn-rounded mb-4"  
                  style="color: #008000;margin-left: 50px; ">
                  <b>PRINT EXCEL</b></button>
               
                </div >
            </div>
      </form>   
     </div>
   </div>
</div>
</div>

@endsection