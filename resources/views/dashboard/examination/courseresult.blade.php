@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Index</title>

@endsection


@section('content')

    <section class="content">
      @if($message = Session::get('status'))
      <div class="alert alert-success" >
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      </div>
      <p>{{ $message }}</p>
       @endif
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue"><i class="fa-fw fa fa-gear"></i>Course Results</h2>

                <div class="boxpane-icon">
                  
                </div>
            </div>
            <div class="boxpane-content">
                
                    <div class="col-lg-12">
                         <p class="introtext">@lang('app.intro-text')</p>
                            <div class="" style="margin-left:40%;">
                              <form action="{{route('report.courseresultpdf')}}" method="post">
                                @csrf
                                <div class="form-row align-items-center">
                                  <div class="col-auto my-1">
                                    
                                    <select class="custom-select mr-sm-2" name="program" id="inlineFormCustomSelect">
                                      <option value="0" selected>Choose Program</option>
                                      @foreach($getprogram as $p)
                                      <option value="{{ $p->id }}">{{ $p->program_acronym }}</option>
                                       @endforeach
                                    </select>
                                  </div>
                                  <input type="hidden" name="course_id" value="@php echo SRS::encode($courseresults->first()->course_id ?? '')@endphp" >
                                  
                                  <div class="col-auto my-1">
                                    <button type="submit" class="btn btn-primary">Print</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                        
                            <div id="alerts"></div>
                           
                            <table id="courseTable" class="table-bordered data-table table"  style="width:100%">
                                <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Student Name</th>
                                  <th>Gender</th>
                                  <th>RegNO</th>
                      
                                  <th>CA/40</th>
                                  <th>ESE/60</th>
                                  <th>Total</th>
                                   <th>Grade</th>
                                  <th>Remark</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php $i = 1; ?>
                                  @if (count($courseresults ?? '') > 0)
                                  @foreach($courseresults ?? '' as $cr)
                                     <tr>
                                           <td>{{$i++}}</td>
                                           <td>{{$cr->first_name}} {{$cr->last_name}} </td>
                                           <td>{{$cr->gender}}</td>
                                           <td>{{$cr->reg_no}}</td>
                                           <td>{{$cr->ca_score}}</td>
                                           <td>{{$cr->se_score}}</td>
                                           <td>{{$cr->total_score}}</td>
                                           <td>{{$cr->grade}}</td>
                                           <td>{{$cr->remarks}}</td>
                                          
                                     </tr>
                                 @endforeach
                                 @foreach ($abscstudentcourse  ?? '' as $cr)
                                 <tr>
                                 <td>{{ $i++ }}</td>
                                         <td>{{$cr->first_name}} {{$cr->last_name}} </td>
                                         <td>{{$cr->gender}}</td>
                                         <td>{{$cr->username}}</td>
                                         <td>{{$cr->ca_score ?? '-'}}</td>
                                         <td>{{$cr->se_score ?? '-'}}</td>
                                         <td>{{$cr->total_score ?? '-'}}</td>
                                         <td>{{$cr->grade ??'-'}}</td>
                                         <td>{{$cr->remarks ?? '-'}}</td>
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
    </section>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
      $(document).ready(function(){

       $('#courseTable').DataTable();
      });
      </script>
@endsection
 
