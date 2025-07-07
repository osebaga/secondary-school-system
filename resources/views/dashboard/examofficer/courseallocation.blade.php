
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
      <h5>Lecturer Course Allocation</h5>
  </div>
  <div class="ibox-content">

      <form action="{{route('allocating')}}" class="form-horizontal ng-pristine ng-valid" method="post" accept-charset="utf-8">
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
              <select class="form-control" name="semester" >
                      <option value="">--select semeter--</option>
                      @foreach($semester as $sem)
                      <option value="{{$sem->semester}}"> {{$sem->semester}} </option>        
                      @endforeach
              </select>
           </div>
      </div>

      <div class="form-group"><label class="col-lg-3 control-label">Course Code : </label>

      <div class="col-lg-8">
      <select class="form-control" name="coursecode">

                              <option value="">--select course code--</option>
                              @foreach($modules as $code)
                              <option value="{{$code->modulename}}">{{$code->modulename}}</option>
                              @endforeach

              </select>
        </div>
      </div>

      <div class="form-group"><label class="col-lg-3 control-label">Lecture ID : </label>

      <div class="col-lg-8">
      <select class="form-control" name="lecturername">

                              <option value="">--select Lecture--</option>
                              <option value="Dr Lungo,Juma">Dr Lungo,Juma</option>
                              <option value="Mr Nassoro,Yusuph">Mr Nassoro,Yusuph</option>
                              <!-- @foreach($modules as $code)
                              <option value="">{{$code->modulename}}</option>
                              @endforeach -->

              </select>
        </div>
      </div>

      <div class="box-footer text-center">
                <div>
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

 <!-- /.box-header -->
 <div class="box ibox-content">
 <div class="box-body table-responsive" style="padding: 20px;" >
              <table class="table table-hover {{ count($Lectures) > 0 ? 'datatable' : '' }}">
              <thead>
                <tr>
                     <th>Name</th>
                     <th>Position</th>
                     <th>Academic Year</th>
                     <th>Semester</th>
                     <th>CourseCode</th>
                  </tr>
                </thead>

                <tbody>
                    @if (count($Lectures) > 0)
                         @foreach($Lectures as $Lect)
                            <tr data-toggle="modal" data-target="#modaldeleteAlert"   >
                                  <td>{{$Lect->lecturername}}</td>
                                  <td>{{$Lect->Position}}</td>  
                                  <td>{{$Lect->Ayear}}</td>
                                  <td>{{$Lect->semester}}</td>
                                   <td>{{$Lect->coursecode }}</td>  
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


@endsection