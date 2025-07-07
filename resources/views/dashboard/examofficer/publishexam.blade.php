
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
        <h5>Publishing and or Unpublishing Exam Results</h5>
    </div>
    <div class="ibox-content">

        <form action="" class="form-horizontal ng-pristine ng-valid" method="post" accept-charset="utf-8">
        <div class="form-group"><label class="col-lg-3 control-label">Entry Year : </label>

          <div class="col-lg-8">
          <select class="form-control" name="institution_id" id="institution_id">
                                  
                                  <option value="">--select Academic Year--</option>
                                  @foreach($year as $yr)
                                  <option value=""> {{$yr->title}} </option>        
                                  @endforeach    
                                  
                  </select>
            </div>
          </div>
          <div class="form-group"><label class="col-lg-3 control-label">Academic Year : </label>

            <div class="col-lg-8">
            <select class="form-control" name="institution_id" id="institution_id">
                                    
                                    <option value="">--select Academic Year--</option>
                                    @foreach($year as $yr)
                                    <option value=""> {{$yr->title}} </option>        
                                    @endforeach    
                                    
                    </select>
              </div>
            </div>
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
          <div class="form-group"><label class="col-lg-3 control-label">Semester : </label>

                <div class="col-lg-8">
                    <select class="form-control" name="institution_id" id="institution_id">
                            <option value="">--select semeter--</option>
                            @foreach($semester as $sem)
                            <option value=""> {{$sem->semester}} </option>        
                            @endforeach
                    </select>
                </div>
                </div>
     
        <div class="form-group"><label class="col-lg-3 control-label">Choose Action : </label>

        <div class="col-lg-8">
        <select class="form-control" name="institution_id" id="institution_id">
                                <option value="">-------</option>
                                <option value="">Publish</option>
                                <option value="">Unpublish</option>

                </select>
          </div>
        </div>

        <div class="box-footer text-center">
                  <div>
                     <a href="{{route('Student Register')}}" class="btn btn-default btn-rounded mb-4" "  
                    style="color: #000000;">
                    <b>CANCEL</b></a>

                    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modaleditform"  
                    style="color: #008000;margin-left: 50px; ">
                    <b>CONFIRM</b></a>

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