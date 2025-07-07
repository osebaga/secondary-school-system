
@extends('layouts.app')

<!-- Bootstrap core CSS -->

@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">

    </div>
        <div class="box" >
    
           <div class="box-header">
              <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm"  
                style="color: #008000;">
                <b>Add</b>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive " style="padding: 20px;">
               <table class="table table-hover {{ count($modules) > 0 ? 'datatable' : '' }}" >
              <thead>
                <tr>
                     <th>Module Code</th>
                     <th>Year of Study</th>
                     <th>Credit</th>
                     <th>Semester</th>
                     <th>Category</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($modules) > 0)
                        @foreach($modules as $mod)
                            <tr>
                                <td>{{$mod->module_code}} </td>
                                <td>{{$mod->year_of_study}} </td>
                                <td>{{$mod->credit}} </td>
                                <td>{{$mod->semester->semester}} </td>
                                <td>{{$mod->category}} </td>
                                <td><a href="{{(url('admin/prog-module/'.$mod->id.'/edit'))}}"><i class="fa fa-eye"></i></a></td>
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
        <form class="modal-dialog"  role="form" method="POST" action="{{route('module configure')}}">
           {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add New Module Configuration</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                     <div class="card-body" style="padding: 20px;">
                        <input type="number" name="programme_id" value="{{$programme}}" hidden>
                           <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Module Code</p>
                            <select class="form-control" required name="module_code" id="module_code">
                               <option value="">-Select-</option>
                                 @if($modus->count()>0)
                                    @foreach($modus as $mod)
                                         <option value="{{$mod->coursecode}}">{{$mod->coursecode}} - {{$mod->modulename}}</option>
                                    @endforeach
                                 @endif
                            </select>
                            </div>

                          <div class="form-group">
                            <p style="float: left; font-family: sans-serif;">Year of Study</p>
                              <select class="form-control" required name="year_of_study" id="year_of_study">
                                  <option value="">-Select-</option>
                                @foreach($yearofstudy as $std)
                                <option>{{$std->title}}</option>
                                @endforeach
                              </select>
                            </div>

                          <div class="form-group">
                            <p style="float: left; font-family: sans-serif;">Semester</p>
                            <select class="form-control" required name="semester_id" id="semester_id">
                               <option value="">-Select-</option>
                                 @if($semesters->count()>0)
                                    @foreach($semesters as $sem)
                                         <option value="{{$sem->id}}">{{$sem->semester}}</option>
                                    @endforeach
                                 @endif
                            </select>
                            </div>

                            <div class="form-group">
                            <p style="float: left; font-family: sans-serif;">Category</p>
                            <select class="form-control" required name="category" id="category">
                               <option value="">-Select-</option>
                               <option>Core</option>
                               <option>Elective</option>
                               <option>Fundamental</option>
                            </select>
                            </div>
                             
                            <div class="form-group">
                                <p style="float: left; font-family: sans-serif;">Credits</p>
                                <input type="number" class="form-control" id="credit" name="credit" value=""
                                required
                                oninvalid="this.setCustomValidity('Must Enter Module Credits')"
                                oninput="this.setCustomValidity('')">
                            </div>
                      </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" style="width: 200px; height: 40px; margin-bottom: 10px;">SAVE</button>
            </div>
          </div>
      </form> 
      </div>

    
@endsection