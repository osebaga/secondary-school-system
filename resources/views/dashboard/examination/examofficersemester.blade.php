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
                <h2 class="blue"><i class="fa-fw fa fa-gear"></i>Semester Results</h2>

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
                                         
                                @foreach($coz ?? '' as $cr)
                            <th colspan="6">{{ $cr->course_code }}({{$cr->unit}})</</th>  
                            @endforeach 
                            <tr>
                                <th>#</th>
                                  <?php  
                                    $count = $coz->count();
                                    
                                    for($i=0; $i<=$count; $i++) { 
                                  ?>
                                    <th>CA</th>
                                    <th>SE</th>
                                    <th>Total</th>
                                    <th>GD</th>
                                    <th>Course</th>
                                   
                                    
                               
                                <?php } ?>
                            </tr>
                                </thead>
                            </tbody>
                            <tr>
                                <td>#</td>
                                <td>Otto</td>
                                <td>@mdo</td>   
                                <td>Odoo</td>         
                                <td>@mdo</td>   
                                <td>Odoo</td>                  
                                </tr>
                                <tr>
                                    <td>#</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>   
                                    <td>Odoo</td>         
                                    <td>@mdo</td>   
                                    <td>Odoo</td>                  
                                    </tr>
                                  
                                   
                                   <tbody>
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
 
