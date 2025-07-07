
@extends('layouts.app')

  <!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;margin-bottom:20px;">   
<div class="col-sm">
           
    </div>
        <div class="box" style="padding:20px" >
        <div class="ibox float-e-margins">
   
    <div class="ibox-content">
      @if($student==null)
      <div class="ibox-title">
      <h4>Course Registration Form</h4>
        </div>
        <form action="{{route('Student Register')}}" 
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
        <h4>Course Registration Form</h4>
    </div>
    <div class="ibox-content">

        <form action="{{route('Course Register')}}" class="form-horizontal ng-pristine ng-valid" method="get" accept-charset="utf-8">
        <div class="form-group"><label class="col-lg-3 control-label">Candidate: </label>

            <div class="col-lg-8">
                <p class="form-control"> <b> <span class="text-uppercase">{{$student->surname}}, </span>{{$student->firstname}} {{$student->middlename}}: {{$student->regno}}</b></p>
              </div>
        </div>
        <input   hidden name="regno" value="{{$student->regno}}"></input>
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
        <div class="form-group"><label class="col-lg-3 control-label">Course : </label>

          <div class="col-lg-8">
          <select class="form-control" name="coursecode" >
            <option value="">--select course Code--</option>
            @foreach($modules as $mod)
            <option value="{{$mod->coursecode}}"> ({{$mod->coursecode}}) {{$mod->modulename}} </option>  @endforeach                
          </select>
        </div>
      </div>
        <div class="form-group"><label class="col-lg-3 control-label">Academic Year : </label>

        <div class="col-lg-8">
        <select class="form-control" name="Ayear" >
            <option value="">--select Academic Year--</option>
            @foreach($year as $yr)
            <option value="{{$yr->title}}"> {{$yr->title}} </option>        
            @endforeach    
                                
                </select>
          </div>
        </div>
        <div class="form-group"><label class="col-lg-3 control-label">Status : </label>

        <div class="col-lg-8">
        <select class="form-control" name="status" >

                                <option value="Core">Core</option>
                                <option value="Elective">Elective</option>
                              

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
                    <a href="{{route('Student Register')}}" class="btn btn-default btn-rounded mb-4" style="color: #000000;">
                    <b>BACK</b></a>
                    <button type="submit" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modaleditform"  
                    style="color: #008000;margin-left: 50px; ">
                    <b>SAVE</b></button>
                  </div>
              </div>
        </form>    
      </div>
        </div>

        @endif
           
    </div>



    </div>




    
  </div>


  @if($student==null)
  <div class="box" style="padding:20px;" >

  <div class="ibox float-e-margins">
    <div class="ibox-title">
        <h4>Students Registration Form</h5>
    </div>
    <div class="ibox-content">

        <form action="{{route('Register Students')}}" class="form-horizontal ng-pristine ng-valid" method="get" accept-charset="utf-8">
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
        <div class="form-group"><label class="col-lg-3 control-label">Intake Year : </label>

        <div class="col-lg-8">
        <select class="form-control" name="Inyear" >
                                
                                <option value="">--select Intake Year--</option>
                                @foreach($year as $yr)
                                <option value="{{$yr->title}}"> {{$yr->title}} </option>        
                                @endforeach    
                                
                </select>
          </div>
        </div>
        <div class="form-group"><label class="col-lg-3 control-label">Academic Year : </label>

        <div class="col-lg-8">
        <select class="form-control" name="Ayear" >
                                
                                <option value="">--select Academic Year--</option>
                                @foreach($year as $yr)
                                <option value="{{$yr->title}}"> {{$yr->title}} </option>        
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
        <div class="form-group"><label class="col-lg-3 control-label">Registration Status : </label>

        <div class="col-lg-8">
        <select class="form-control" name="status" >
                                <option value="">--select status--</option>
                                @foreach($status as $s)
                                <option value="{{$s->status}}">{{$s->status}}</option>
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

                    <button type="submit" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modaleditform"  
                    style="color: #008000;margin-left: 50px; ">
                    <b>REGISTER STUDENTS</b></button>

                  
                  </div >

              </div>
        </form>    
      </div>
     </div>
  </div>
@endif

<!-- <script>
  var url = window.location;
</script> -->


@endsection