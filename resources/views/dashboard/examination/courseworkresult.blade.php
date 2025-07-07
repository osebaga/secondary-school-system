@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Course Work</title>

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
                <h2 class="blue"><i class="fa-fw fa fa-gear"></i>Coursework Results</h2>

                <div class="boxpane-icon">
                  
                </div>
            </div>
            <div class="boxpane-content">
                
                    <div class="col-lg-12">
                         <p class="introtext">@lang('app.intro-text')</p>
                         
                             <div class="" style="margin-left:10%;">
                              <form action="{{ route('get.caby.program') }}" method="post">
                                @csrf
                                <div class="form-row align-items-center">
                                  <div class="col-4">
                                    
                                    <select class="custom-select mr-sm-2 tag" name="course_id" id="inlineFormCustomSelect2">
                                      <option value="0" selected>Choose Course</option>
                                     @foreach ($course as $c)
                                       <option value="{{ $c->id}}">{{ $c->course_code }}</option>
                                     @endforeach
                                    </select>
                                  </div>
                                  <div class="col-4">
                                    
                                    <select class="custom-select mr-sm-2 tag" name="program" id="inlineFormCustomSelect">
                                      <option value="0" selected>Choose Program</option>
                                     @foreach ($program as $pr )
                                       <option value="{{ $pr->id }}">{{ $pr->program_acronym }} - {{ $pr->program_name }}</option>
                                     @endforeach
                                    </select>
                                  </div>
                                  {{-- <input type="hidden" name="course_id" value="@php echo SRS::encode($courseresults->first()->course_id ?? '')@endphp" > --}}
                                  
                                  <div class="col-auto my-1">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                  </div>
                                </div>
                              </form>
                            </div> 
                        
                            <div id="alerts"></div>
                           <br>
                           @if (Session('results'))
                             
                          
                            <table id="courseTable" class="table-bordered data-table table"  style="width:100%">
                                <thead>
                                <tr>
                                  <th>SNo</th>
                                  <th>Student Name</th>
                                  <th>Gender</th>
                                  <th>RegNO</th>
                                  <th>Program</th>
                                  <th>Module</th>
                                  <th>CA/40</th>
                                  <th>Remark</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php $i = 1; ?>
                                  
                                  @foreach(Session('results') as $cr)
                                     <tr>
                                           <td>{{$i++}}</td>
                                           <td>{{$cr->first_name}} {{$cr->last_name}} </td>
                                           <td>{{$cr->gender}}</td>
                                           <td>{{$cr->reg_no}}</td>
                                           <td>{{$cr->student->program->program_acronym ?? ''}}</td>
                                           <td>{{$cr->course->course_code}}</td>
                                           <td>{{$cr->ca_score}}</td>
                                           <td>@if($cr->ca_score < 20) NOT ELEGIBLE @else  ELIGIBLE   @endif</td>
                                          
                                     </tr>
                                 @endforeach
                                 
                            

                                </tbody>
                            </table>
                            @endif
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

    <script>
      $(document).ready(function(){

       $('#courseTable').DataTable();

      //  $(this).parent().find('tag').select2({

       // });
      });


      </script>

@endsection
@section('scripts')
<script>
  $(document).ready(function(){

   $('.tag').select2();
  });


  </script>

<script>
  $(document).ready(function(){

   $('.tag').select2({
     
   });
  });


  </script>
@endsection
