
@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">
         
  </div>
      <div class="box" style="padding:20px" >
      <div class="ibox float-e-margins">
 
  <div class="ibox-content">
    @if($student==null)
      <form action="{{route('Student Remarks')}}" 
      class="form-horizontal ng-pristine ng-valid" method="get" accept-charset="utf-8">
      {{ csrf_field() }}
      <div class="form-group"><label class="col-lg-3 control-label">Enter Student Registration Number : </label>
          <div class="col-lg-8">
              <input type="text" value="" name="regno" class="form-control">
          </div>
      </div>

      <div class="form-group">
          <div class="col-lg-offset-3 col-lg-8">
              <input class="btn btn-sm btn-success" type="submit" value="Search Student">
          </div>
      </div>
      </form> 
      @else

  <div class="ibox float-e-margins">
  <div class="ibox-title">
      <h5>Student Exam Remarks</h5>
  </div>
  <div class="ibox-content">

      <form action="{{route('Update Student Remarks')}}" class="form-horizontal ng-pristine ng-valid" method="get" accept-charset="utf-8">
      {{ csrf_field() }}
      <div class="form-group"><label class="col-lg-3 control-label">Candidate: </label>
      <div class="col-lg-8">
              <p class="form-control"> <b> <span class="text-uppercase">{{$student->surname}}, </span>{{$student->firstname}} {{$student->middlename}}: {{$student->regno}}</b></p>
            </div>
      </div>

      <input type="hidden" name="regno" value="{{$student->regno}}"></input>

      <div class="form-group"><label class="col-lg-3 control-label">Semester : </label>

          <div class="col-lg-8">
              <select class="form-control" name="semester" >
                      <option value="">--select semeter--</option>
                      @foreach($semester as $sem)
                      <option value="{{$sem->semester}}">{{$sem->semester}}</option>        
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
      <div class="form-group"><label class="col-lg-3 control-label">Remark : </label>

      <div class="col-lg-8">
      <select class="form-control" name="status" >
              <option value="">--select status--</option>
                @foreach($status as $s)
                <option value="{{$s->status}}">{{$s->status}}</option>
                @endforeach
              </select>
        </div>
      </div>

      <div class="box-footer text-center">
                <div>
                   <a href="{{route('Student Remarks')}}" class="btn btn-default btn-rounded mb-4" "  
                  style="color: #000000;">
                  <b>BACK</b></a>

                  <button type="submit" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modaleditform"  
                   style="color: #008000;margin-left: 50px; ">
                  <b>SAVE</b></button>
                </div >
            </div>
      </form>    
    </div>
      </div>


      @endif
         
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