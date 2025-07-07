 
   
    @extends('layouts.dashboard')


    @section('title-content')
    
        <title>{{ config('app.name') }} </title>
    
    @endsection
    
    
    @section('content')
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" >
    
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    
        <section class="content">
          @if($message = Session::get('status'))
          <div class="alert alert-success" >
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
          <p>{{ $message }}</p>
           @endif
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue"><i class="fa-fw fa fa-gear"></i>Semester Results</h2>
    
                    <div class="boxpane-icon">
                      
                    </div>
                </div>
                <div class="boxpane-content">
                    
                        <div class="col-lg-12">
                             <p class="introtext">@lang('app.intro-text')</p>
                                
                           
                                <div id="alerts"></div>
                               
                                
                                <table id="example" class="table-bordered data-table table"  style="width:100%">
                                   
                                    <thead>
                                        
                                   

                                        <tr>
                                            <th rowspan=""></th>
                                            <th rowspan="" ></th>
                                            <th rowspan=""></th>
                                            <th rowspan=""></th>   
                                    @foreach($coz ?? '' as $cr)
                                <th colspan="4" >{{ $cr->course_code }}({{$cr->unit}})</</th>  
                                @endforeach 
                                <th rowspan=""></th>
                                <th rowspan=""></th>
                                <th rowspan=""></th>
                                <tr>
                                    <th rowspan="">#</th>
                                    <th rowspan="">Name</th>
                                    <th rowspan="">Sex</th>
                                    <th rowspan="">RegNo</th>  
                                      <?php  
                                        $count = $coz->count();
                                        
                                        for($i=1; $i<=$count; $i++) { 
                                      ?>
                                        
                                        <th>CA</th>
                                        <th>ESE</th>
                                        <th>Total</th>
                                        <th>GD</th>
                                    <?php } ?>
                                <th rowspan="">GPA</th>
                                <th rowspan="">AWARD</th>
                                <th rowspan="">REMARK</th>
                                </tr>
                                    </thead>
                                <tbody>
                                <?php $i =1; ?>
                                @foreach($student as $m)
                                <tr>
                                    <td><?php echo $i++ ;?></td>
                                    <td class="">{{ $m->first_name }} {{ $m->last_name }}</td>
                                    <td>{{ $m->gender}}</td>
                                    <td>{{ $m->reg_no }}</td> 
                                    @foreach($coz as $c)
                                    @foreach($semesterresult as $se)
                                      @if($se->reg_no == $m->reg_no && $se->course_id == $c->id)
                                     <td>{{ $se->ca_score ?? '-'}}</td>
                                     <td>{{ $se->se_score ?? '-'}}</td>
                                     <td>{{ $se->total_score ?? '-'}}</td>
                                     @if($se->grade =="D" || $se->grade=="F")
                                     <td class="bg-primary">
                                    <span >{{ $se->grade }}</td> @else<td> {{ $se->grade }}</td>@endif 
                                     
                                      @endif
                                       
                                   @endforeach    
                                  
                                   @endforeach  
                                    
                                   @foreach($semesterresult as $se)
                                   @if($se->reg_no == $m->reg_no)
                                   
                                  <td>{{ $se->gpa ?? '-'}}</td>
                                  <td>{{ $se->remarks?? '-'}}</td>
                                  <td>@if($se->gpa < 2) SUPP @else {{ $se->classification ?? '-'}} @endif</td>
                                  @break
                                  
                                   @endif
                               
                                @endforeach 
                                 
                                  </tr>
                                  @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                     
              
            </div>
        </section>
       
         
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
         <script scr="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.65/pdfmake.js"></script>
        <script scr="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script scr="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
        <script>
       $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','excelHtml5'
        ]
    } );
} );
          </script>
    @endsection
     
    