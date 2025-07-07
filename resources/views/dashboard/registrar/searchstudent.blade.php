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
    <div class="ibox-content">
        <form method="POST" action="{{url('filter-students')}}">
          @csrf
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>Programme</label>
                <select name="programe" class="form-control" >
                  @if($programs->count()>0)
                   <option value="">-select-</option>
                   @foreach($programs as $prog)
                    <option>{{$prog->Title}}</option>
                   @endforeach
                  @else
                   No program
                   @endif
              </select>
              </div>
            </div>
             <div class="col-sm-3">
               <div class="form-group">
                <label>Entry Year</label>
              <select name="entryear" class="form-control" >
                <option value="">-select-</option>
                <option>2015</option> <option>2016</option> <option>2017</option> <option>2018</option> <option>2019</option> <option>2025</option>
              </select></div>
            </div>
             <div class="col-sm-3">
               <div class="form-group">
                <label>Academic Year</label>
              <select name="acdamyear" class="form-control">
                @if($academyear->count()>0)
                   <option value="">-select-</option>
                   @foreach($academyear as $yr)
                    <option>{{$yr->title}}</option>
                   @endforeach
                  @else
                   No program
                   @endif
              </select></div>
            </div>
             <div class="col-sm-3">
               <div class="form-group" style="padding-top: 20px;">
              <button class="btn btn-info btn-sm">Filter</button>
            </div> </div>
          </div>
        </form>
    </div>
    <div class="ibox-content">
            <div class="box-body table-responsive" style="padding: 20px;" >
              <table class="table table-hover {{ count($students) > 0 ? 'datatable' : '' }}">
              <thead>
                  <tr>
                  <th>SN</th>
                  <th>Name</th>
                  <th>RegNo</th>
                  <th>Sex</th>
                  <th>Programme</th>
                  <th>Sponsorship</th>
                  <th>Cohort</th>
                  <th>Photo</th>
                </tr>
              </thead>
                @if (count($students) > 0)
                @foreach($students as $key => $value)
                <tr onclick="getTableRowId({{$value->id}})" data-entry-id="{{$value->id}}">
                    <td>{{$key+1}}</td>
                    <td>{{$value->surname}}, {{$value->firstname}} {{$value->middlename}}</td>
                    <td>{{$value->regno}}</td>
                    <td>{{$value->sex}}</td>
                    <td>{{$value->programmeofstudy}}</td>
                    <td>{{$value->sponsor}}</td>
                    <td>{{$value->IntakeValue}} </td>
                    <td>
                    @if($value->photo=="")
                    <img  class="" style="width:10%; height:20%" alt="User Pic"   src="{{ url('img/default-avatar.png') }}" 
                    class="img-circle img-responsive"> <a href="{{url('student/'. $value->id)}}">Change</a>
                    @else
                    <img  class="" style="width:10%; height:20%" alt="User Pic"    src="/storage/pictures/{{ $value->photo }}" 
                    class="img-circle img-responsive"> <a href="{{url('student/'.$value->id)}}">Change</a>
                  <!--   <a href="{{route('show upload picture', $value->regno)}}">Change</a> -->
                    @endif
                    </td>
                </tr>
                @endforeach
                @else
                      <tr>
                        <td colspan="8">No students Registered yet!</td>
                      </tr>
                @endif
              </tbody>
            </table>
          </div>   
      </div>
    </div>

 
           
      </div>
    </div>

  </div>
</div>

 <script type="text/javascript">
           function getTableRowId(id){
               let link = "{{ url('student') }}";
               let open = link + "/" +id;
               window.location = open;
             }
       </script>

@endsection