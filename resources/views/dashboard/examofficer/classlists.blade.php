
@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')

<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">
         
  </div>
      <div class="box" style="padding:20px" >
      <div class="ibox float-e-margins">
      <div class="ibox float-e-margins">
      @if($students == null)
  <div class="ibox-title">
      <h5>Registered Students in Course</h5>
  </div>
  <div class="ibox-content">

      <form action="{{route('Class Lists')}}" class="form-horizontal ng-pristine ng-valid" method="get" accept-charset="utf-8">
      <div class="form-group"><label class="col-lg-3 control-label">Academic Year : </label>
      {{csrf_field()}}
        <div class="col-lg-8">
        <select class="form-control" name="ayear" >
                                
                                <option value="">--select Academic Year--</option>
                                @foreach($year as $yr)
                                <option value="{{$yr->title}}"> {{$yr->title}} </option>        
                                @endforeach    
                                
                </select>
          </div>
        </div>

      <div class="form-group"><label class="col-lg-3 control-label">Course Code : </label>

      <div class="col-lg-8">
      <select class="form-control" name="course" >

                              <option value="">--select course code--</option>
                              @foreach($modules as $code)
                              <option value="{{$code->coursecode}}">({{$code->coursecode}}) {{$code->modulename}}</option>
                              @endforeach

              </select>
        </div>
        
      </div>

      <div class="box-footer text-center">
                <div>
                  <button type="submit" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modaleditform"  
                  style="color: #008000;margin-left: 50px; ">
                  <b>VIEW ALL</b></button>
               
                </div >
            </div>
      </form>    
    </div>
      </div>

  </div>
  @else 

  <div class="box-header">
       
       </div>
       <!-- /.box-header -->
       <div class="box-body table-responsive" style="padding: 20px;" >
         <table class="table table-hover {{ count($students) > 0 ? 'datatable' : '' }}">
         <thead>
           <tr>
                <th>Registration number</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Academic Year</th>
             </tr>
           </thead>
           <tbody>
               @if (count($students) > 0)
                    @foreach($students as $student)
                    <tr>
                      <td>{{$student->regno}}</td>
                      <td>{{$coursecode}}</td>
                      <td>{{$student->semester}}</td>
                      <td>{{$student->Ayear}}</td>
                    </tr>
                   @endforeach
               @else
                 <tr>
                   <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                 </tr>
               @endif
           </tbody>
       </table>
       </div>
      </div>
</div>
  
   @endif
</div>




@endsection