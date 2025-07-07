
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
    @if($date== null)
      <h5><b>WARNING : </b> You did not set the date for examination results system continue with today's date!</h5>
    @endif
      <h5><b>CATEGORY: </b> <span class="text-uppercase">{{$category}}, </span></h5>
      <h5><b>CORSE: </b> <span class="text-uppercase">{{$course}}, </span></h5>
      <h5><b>PROGRAMME: </b> <span class="text-uppercase"> {{$programme}}. </span> </h5>
      <h5><b>ACADEMIC YEAR: </b> <span class="text-uppercase"> {{$ayear}}. </span> </h5>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
  </div>
  <div class="ibox-content">

      <form action="{{route('uploadresults')}}" class="form-horizontal ng-pristine ng-valid" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group"><a href="{{URL::asset('/img/results_template.xls')}}" class="col-lg-3 control-label">Click to download template</a>
      <div class="col-lg-8">
      <div class="input-group date">
          <input  name="import_file" type="file" class="form-control pull-right" id="import_file">
          <div class="form-check">
          <input type="checkbox" name="overwrite" class="form-check-input" value="yes">
          <label class="form-check-label">Overwrite Existing</label>
        </div>
        </div>
        </div>
      </div>

      <input type="hidden" name="semester" value="{{$semester}}"></input>
              <input type="hidden" name="ayear" value="{{$ayear}}"></input>
              <input type="hidden" name="programme" value="{{$programme}}"></input>
              <input type="hidden" name="date" value="{{$date}}"></input>
              <input type="hidden" name="category" value="{{$category}}"></input>
              <input type="hidden" name="course" value="{{$course}}"></input>
              <input type="hidden" name="credit" value="{{$credit->credits}}"></input>

      <div class="box-footer text-center">
                <div>
                  <a href="{{route('Grade book')}}" class="btn btn-default btn-rounded mb-4" style="color: #000000;"><b>BACK</b>
                  </a>

                  <button type="submit" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modaleditform"  
                  style="color: #008000;margin-left: 50px; ">
                  <b>UPLOAD</b></button>
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
              <table class="table table-hover" {{ count($results) > 0 ? 'datatable' : '' }}">
              <thead>
                <tr>
                     <th>RegNo</th>
                     <th>Score</th>
                  </tr>
                </thead>

                <tbody>
                    @if (count($results) > 0)
                         @foreach($results as $res)
                            <tr data-toggle="modal" data-target="#modaldeleteAlert">
                                  <td>{{$res->regno}}</td>
                                  <td>{{$res->examscore}}</td> 
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
    
    <script type="text/javascript">
      function getTableRowId(id){
       
        }
    </script>
@endsection