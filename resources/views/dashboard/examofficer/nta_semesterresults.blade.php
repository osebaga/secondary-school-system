
@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">
         
  </div>
  <div class="box" style="padding:20px" >
      
  <div class="ibox float-e-margins">
  <div class="ibox-title">
      <h4>Printing Examination Results Report</h4>
  </div>
  <div class="ibox-content">

      <form action="{{route('Download NTA SemesterExcel')}}" class="form-horizontal ng-pristine ng-valid" method="get" accept-charset="utf-8">
      {{ csrf_field() }}
      <div class="form-group"><label class="col-lg-3 control-label">Programme : </label>

        <div class="col-lg-8">
            <select class="form-control" name="institution_id" id="institution_id">
                    <option value="">--select programme--</option>
                    @foreach($programme as $prog)
                    <option value=""> {{$prog->Title}} </option>        
                    @endforeach
            </select>
        </div>
        </div>

        <div class="form-group"><label class="col-lg-3 control-label">Intake Year : </label>

        <div class="col-lg-8">
        <select class="form-control" name="year" >
                                <option value="">--select intake Year--</option>
                                @foreach($Ayear as $yr)
                                <option value="{{$yr->title}}"> {{$yr->title}} </option>        
                                @endforeach     
                </select>
        </div>
        </div>

      <div class="form-group"><label class="col-lg-3 control-label">Academic Year : </label>

        <div class="col-lg-8">
        <select class="form-control" name="year" >
                                
                                <option value="">--select Academic Year--</option>
                                @foreach($Ayear as $yr)
                                <option value="{{$yr->title}}"> {{$yr->title}} </option>        
                                @endforeach     
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
        @if (Session::has('success'))
                      <div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                          <p>{{ Session::get('success') }}</p>
                      </div>
        @endif
        @if (Session::has('error'))
                      <div class="alert alert-error">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                          <p>{{ Session::get('error') }}</p>
                      </div>
        @endif
      <div class="box-footer text-center">
                <div>
                <a href="{{route('Search Results')}}" class="btn btn-default btn-rounded mb-4" 
                  style="color: #000000;">
                  <b>BACK</b></a>

                  <button type="submit" class="btn btn-default btn-rounded mb-4"  
                  style="color: #008000;margin-left: 50px; ">
                  <b>PRINT EXCEL</b></button>
                </div>
            </div>
      </form>   
     </div>
   </div>
</div>
</div>

@endsection