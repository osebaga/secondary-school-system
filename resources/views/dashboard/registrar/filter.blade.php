@extends('layouts.app')

@section('content')

<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
        <div class="box" style="padding:20px" >
        <div class="ibox float-e-margins">

    <div class="ibox-content">



    <div class="ibox float-e-margins">
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
                </tr>
              </thead>
              <tbody>
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
                </tr>
                @endforeach
                @else
                      <tr>
                        <td colspan="8">There is no list from your options!</td>
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