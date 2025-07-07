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
   
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script scr="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script scr="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script>
      $(document).ready(function(){

       $('#courseTable').DataTable({

        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
       });

      });

      
      </script>
@endsection
 
 