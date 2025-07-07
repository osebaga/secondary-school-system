
@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">
         
  </div>
  <div class="box" style="padding:20px" >
      
  <div class="ibox float-e-margins">
  <div class="ibox-title">
      <h4></h4>
  </div>
  <div class="ibox-content">

      <form action="{{route('Upload Students')}}" class="form-horizontal ng-pristine ng-valid" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group"><label class="col-lg-3 control-label">Campus : </label>
        <div class="col-lg-8">
        <select class="form-control" name="campus" >  
                                <option value="">--select Campus--</option>
                                @foreach($campuses as $camp)
                                <option value="{{$camp->campus}}"> {{$camp->campus}} </option>        
                                @endforeach        
                </select>
        </div>
        </div>

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

        <div class="form-group"><label class="col-lg-3 control-label"></label>

        <div class="col-lg-8">
        <div class="form-control">

        <input  name="imports_file" type="file" id="import_file" >

        </div>
        <input type="checkbox" name="update" class="form-check-input" value="yes">
          <label class="form-check-label">Overwrite Existing</label>
        </div>
        </div>
        <div class="form-group"><label class="col-lg-3 control-label">Template</label>

        <div class="col-lg-8">
        <div class="form-control">

        <a href="{{URL::asset('/img/students_template.xlsx')}}">Click to download template</a>

        </div>
      
        </div>
        </div>
       <!--  @if (Session::has('success'))
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
        @endif -->
      <div class="box-footer text-center">
                <div>
           
                  <button type="submit" class="btn btn-default btn-rounded mb-4"  
                  style="color: #008000;margin-left: 50px; ">
                  <b>UPLOAD</b></button>
               
                </div >
            </div>
      </form>   
     </div>
   </div>
</div>
</div>

@endsection