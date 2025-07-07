
@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">
         
  </div>
  <div class="box" style="padding:20px" >
      
  <div class="ibox float-e-margins">
  <div class="ibox-title">
      <h4>Annual Report Examination Results
      </h4>
  </div>
  <div class="ibox-content">

      <form  
      @if($progs==null)
      action="{{route('Annual Results')}}"
      @else action="{{route('Download Annual')}}"
      @endif class="form-horizontal ng-pristine ng-valid" method="get" accept-charset="utf-8">
      {{ csrf_field() }}

      @if($progs==null)
      <div class="form-group"><label class="col-lg-3 control-label">Programme : </label>

        <div class="col-lg-8">
            <select class="form-control" name="programme" >
                    <option value="">--select programme--</option>
                    @foreach($programme as $prog)
                    <option value="{{$prog->Title}}"> {{$prog->Title}} </option>        
                    @endforeach
            </select>
        </div>
        </div>

        @else
        <p> Annual results for {{$progs}} </p>
        <div class="form-group"><label class="col-lg-3 control-label">Intake Year : </label>
        <div class="col-lg-8">
        <select class="form-control" name="Inyear" >
        <option value="">--select intake Year--</option>
              @foreach($Ayear as $yr)
              <option value="{{$yr->title}}"> {{$yr->title}} </option>        
              @endforeach     
        </select>
        </div>
        </div>

        <input type="hidden" name="programme" value="{{$progs}}"></input>

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
        @endif
      <div class="box-footer text-center">
                <div>
                <a href="{{route('Annual Results')}}" class="btn btn-default btn-rounded mb-4" 
                  style="color: #000000;">
                  <b>BACK</b></a>

                  <button type="submit" class="btn btn-default btn-rounded mb-4"  
                  style="color: #008000;margin-left: 50px; ">
                  @if($progs==null)
                  <b>VIEW</b>
                    @else
                    <b>View Annual Results</b>
                  @endif
                  </button>

                  <!-- @if(!$progs==null)
                  <button type="submit" class="btn btn-default btn-rounded mb-4"  
                  style="color: #008000;margin-left: 50px; ">
                  <b>Annual Results Marks</b>
                  </button>
                  @endif -->
               
                </div >
            </div>
      </form>   
     </div>
   </div>
</div>


@endsection