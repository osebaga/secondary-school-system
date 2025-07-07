@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} |Students Election</title>

@endsection


@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" >

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

    <div class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Election
                </h2>
            </div>
            <div class="boxpane-content">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12 m-3">
                                <div class="boxpane">
                                    <div class="boxpane-header">
                                        <h2 class="blue"><i class="fa-fw fa fa-tasks"></i>
                                            ELECTION POST
                                        </h2>

                                        <div class="boxpane-icon">


                                            <a href="#" data-url="{{route('add-election-post')}}" class="" style="float-right:20%"
                                               id="resource-electionpost-button"> <i class="fa fa-edit p-2 m-1"></i> Add Election Post</a>


                                        </div>
                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                               
                                                <table id="example" class="table-bordered data-table table"  style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Post</th>
                                                        <th>Period</th>
                                                        <th>Start</th>
                                                        <th>End</th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1;  ?>
                                                        @foreach($electionpost as $post)
                                                          <tr>
                                                              <td><?php echo $i++; ?></td>
                                                              <td>{{ $post->post }}</td>
                                                              <td>{{ $post->period }}</td>
                                                              <td>{{ $post->startdate }}</td>
                                                              <td>{{ $post->enddate }}</td>
                                                          </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>


                                            </div>


                                        </div>

                                    </div>

                                </div>
                            </div>
                            
                            
                            
                            


                    </div>


                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12 m-3">
                                <div class="boxpane">
                                    <div class="boxpane-header">
                                        <h2 class="blue"><i class="fa-fw fa fa-tasks"></i>
                                            ELECTION CANDIDATES
                                        </h2>

                                        <div class="boxpane-icon">


                                            <a href="#" data-url="{{route('add-election-candidate')}}"
                                               id="resource-electioncandidate-button"> <i class="fa fa-edit p-2 m-1"></i> Set Candidate</a>


                                        </div>
                                    </div>
                                    <div class="boxpane-content">
                                        <div class="row">
                                            <div class="col-sm-12">
                                               
                                                <table id="example2" class="table-bordered data-table table"  style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Name</th>
                                                        <th>Post</th>
                                                        <th>Period</th>
                                                        <th>Campus</th>
                                                        <th>Action</th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1;  ?>
                                                        @foreach($postcandidate as $post)
                                                          <tr>
                                                              <td><?php echo $i++; ?></td>
                                                              <td>{{ $post->name }}</td>
                                                              <td>{{ $post->post->post ?? '' }}</td>
                                                              <td>{{ $post->period }}</td>
                                                              <td>{{ $post->campus }}</td>
                                                              <td>
                                                                <form method="POST" action="{{ route('delete-election-candidate') }}">
                                                                    {{ csrf_field() }}
                                                                    
                                                            <input type="hidden" name="id" value="{{ $post->id }}">
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-danger btn-sm delete-user">
                                                                        <i class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </form>
                                                              </td>
                                                          </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>


                                            </div>


                                        </div>

                                    </div>

                                </div>
                            </div>
                            
                            
                            
                             


                    </div>


                </div>


                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12 m-3">
                            <div class="boxpane">
                                <div class="boxpane-header">
                                    <h2 class="blue"><i class="fa-fw fa fa-tasks"></i>
                                        ELECTION RESULTS
                                    </h2>

                                    <div class="boxpane-icon">

 


                                    </div>
                                </div>
                                <div class="boxpane-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                           <caption></caption>
                                            <table id="example3" class="table-bordered data-table table"  style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Name</th>
                                                    <th>Post</th>
                                                    <th>Period</th>
                                                    <th>Campus</th>
                                                    <th>Votes</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=1;  ?>
                                                    @foreach($votes as $post)
                                                      <tr>
                                                          <td><?php echo $i++; ?></td>
                                                          <td>{{ $post->candidate->name ?? ''}}</td>
                                                          <td>{{ $post->candidate->post->post ?? ''  }}</td>
                                                          <td>{{ $post->candidate->period ?? '' }}</td>
                                                          <td>{{ $post->candidate->campus ?? ''}}</td>
                                                          <td>
                                                             {{ $post->total }}
                                                          </td>
                                                      </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>


                                        </div>


                                    </div>

                                </div>

                            </div>
                        </div>
                        
                        
                        
                         


                </div>

            </div>
        </div>
    </div>
    </div>

@endsection
 
@section('modals')
    @include('dashboard.admissions.modals.general_modal')
    {{--    @include('dashboard.admissions.modals.study-program-info.program_info_modal')--}}
@endsection

@section('scripts')

     
   
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
$('#example').DataTable();

$('#example2').DataTable();

$('#example3').DataTable( {
   dom: 'Bfrtip',
   buttons: [
       'copy', 'csv', 'excel', 'pdf', 'print','excel'
   ]
} );



} );
     </script>

@endsection
