
@extends('layouts.app')

  <!-- Bootstrap core CSS -->
@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">
          

    </div>
        <div class="box">
           <div class="box-header">
              <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm"  
                style="color: #008000;">
                <b>Add</b>
              </a>
            
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="padding: 20px;" >
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
              <table class="table table-hover {{ count($progcourse) > 0 ? 'datatable' : '' }}">
              <thead>
                <tr>
                     <th>Programme</th>
                     <th>Semester</th>
                     <th>Class</th>
                     <th>Module</th>
                     <!-- <th>Intake Year</th> -->
                     <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($progcourse) > 0)
                         @foreach($progcourse as $progcoz)
                            <tr>
                                  <td>{{$progcoz->programme}}</td>
                                  <td>{{$progcoz->semester}}</td>
                                  <td>{{$progcoz->class}}</td>
                                  <td>{{$progcoz->coursecode}}</td>  
                                  <!-- <td>{{$progcoz->intakeyear}}</td>   -->
                                  <td>{{$progcoz->status}}</td> 
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

        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <form class="modal-dialog"  role="form" method="POST" action="{{route('regmod.add')}}">
           {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Register Module to a programme</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                     <div class="card-body" style="padding: 20px;">
                            <div class="form-group">
                              <p style="float: left; font-family: sans-serif;">Select Programme</p>
                              <select class="form-control" name="programme" >
                                @foreach($programmes as $prog)
                                <option value="{{$prog->Title}}">{{$prog->Title}}</option>
                                @endforeach
                              </select>
                            </div>
                            <!-- <div class="form-group">
                              <p style="float: left; font-family: sans-serif;">Select Intake Year</p>
                              <select class="form-control" name="intakeyear" >
                              @foreach($Ayear as $yr)
                              <option value="{{$yr->title}}"> {{$yr->title}} </option>        
                              @endforeach  
                              </select>
                            </div> -->
                            <div class="form-group">
                              <p style="float: left; font-family: sans-serif;">Select Class</p>
                              <select class="form-control" name="class" >
                                <option value="First Year">First Year</option>
                                <option value="Second Year">Second Year</option>
                                <option value="Third Year">Third Year</option>
                                <option value="Fourth Year">Fourth Year</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <p style="float: left; font-family: sans-serif;">Select Semester</p>
                              <select class="form-control" name="semester" >
                                <option value="">-select-</option>
                                @foreach($semester as $seme)
                                <option value="{{$seme->semester}}">{{$seme->semester}}</option>        
                                @endforeach 
                              </select>
                            </div>
              
                            <div class="form-group">
                              <p style="float: left; font-family: sans-serif;">Select Module</p>
                              <select class="form-control" required name="coursecode" >
                                <option value="">-select-</option>
                                @foreach($modules as $mod)
                                <option value="{{$mod->coursecode}}">{{$mod->coursecode}}</option>        
                                @endforeach 
                              </select>
                            </div>

                            <div class="form-group">
                              <p style="float: left; font-family: sans-serif;">Module Status</p>
                              <select class="form-control" name="status" >
                                <option value="Core">Core</option>
                                <option value="Elective">Elective</option>
                              </select>
                            </div>

                      </div>
              <div class="text-center">
              <button type="submit" class="btn btn-primary" style="width: 200px; height: 40px; margin-bottom: 10px;">SAVE</button>
            </div>
          </div>
      </form> 
      </div>
@endsection