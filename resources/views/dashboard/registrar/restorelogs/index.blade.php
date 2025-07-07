@extends('layouts.app')

@section('content')

<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">

    </div>
        <div class="box" style="padding:20px" >
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
        <div class="ibox float-e-margins">

    <div class="ibox-content">


    <div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5></h5>
    </div>
    <div class="ibox-content">
            <div class="box-body table-responsive" style="padding: 20px;" >
              <table class="table table-hover {{ count($students) > 0 ? 'datatable' : '' }}">
              <thead>
                  <tr>
                  <th>SN</th>
                  <th>Name</th>
                  <th>RegNo</th>
                  <th>Programme</th>
                  <th>Action</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Select</th>
                 
                </tr>
              </thead>
                @if (count($students) > 0)
                @foreach($students as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->surname}}, {{$value->firstname}} {{$value->middlename}}</td>
                    <td>{{$value->regno}}</td>
                    <td>{{$value->programmeofstudy}}</td>
                    <td>{{$value->action}}</td>
                    <td>{{$value->user}} </td>
                    <td>{{$value->date}}</td>
                    <td><input type="checkbox" name="selected"></td>
                </tr>
                @endforeach
                @else
                      <tr>
                        <td colspan="8">No students Deleted yet!</td>
                      </tr>
                @endif
              </tbody>
            </table>
          </div>   
      </div>

      <div class="box-footer text-center">
        <button type="submit" class="btn btn-default btn-rounded mb-4"  
          style="color: #008000;margin-left: 50px; ">
          <b> Restore</b></button>


          <button type="submit" class="btn btn-default btn-rounded mb-4"  
          style="color: #008000;margin-left: 50px; ">
          <b> Delete Completely </b></button>

      </div >

    </div>

      </div>
    </div>

  </div>
</div>

@endsection