<head>

    <style>
        table {
            font-family: Arial, Helvetica;
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
          }
    
          td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 6px;
          }
    
          /* tr:nth-child(even) {
            background-color: #dddddd; */
          }
        </style>
    </head>
    <div class="content">

           <div class="col-md-12">
               <div class="nav-tabs-customx">
                   {{-- <ul class="nav nav-tabs tabs-bordered" id="tabMenu">
                           <li class=" nav-item">
                               <a class="nav-link active" href="#coursework" data-toggle="tab"
                                  aria-expanded="false">
                                   COURSEWORK(CA)
                               </a>
                           </li>
                       <li class=" nav-item">
                           <a class="nav-link" href="#courseresult" data-toggle="tab"
                              aria-expanded="false">
                               COURSE RESULT (SE)
                           </a>
                       </li>

                   </ul> --}}
                   <div class="tab-content">
                           <div class="tab-pane active" id="coursework">
                               <div class="boxpane">
                                   <div class="boxpane-header">
                                  
                              <table>
                               
                                           
                                <tr>
                                    <td>CAMPUS:</td>
                                    
                                </tr>
                                <tr>
                                    <td>DEPARTMENT:</td>
                                    
                                </tr>
                                <tr>
                                    <td>PROGRAMME:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>SEMESTER:</td>
                                
                                </tr>
                              
                              </table>
                                   </div>
                                   <br>
                                   
                                   <table>
                                    <thead>

                                        <tr>
                                            <th>Code</th>
                                            <th>Module Name</th>
                                            <th>Credits</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                          <tr>
                                    
                                       <td>{{ $course->course_code }}</td>
                                       <td>{{ $course->course_name }}</td>
                                       <td>{{ $course->unit }}</td>
                                    
                                    </tr>  
                                    
                                    </tbody>
                               
                                </table>
                                <br>
                                   <div class="boxpane-content">
                                       <div class="table-responsive">
                                     
                                           <table id="caTable" class="table table-striped table-bordered table-hover text-justify"
                                                  style="width: 100%;">
                                               <thead>
                                               <tr>
                                                  <?php  $i =1 ?>
                                                   <th>#</th>
                                                   <th>Name</th>
                                                   <th>Sex</th>
                                                   <th>Reg Number</th>
                                                   <th>Ass I</th>
                                                   <th>Ass II</th>
                                                   <th>WR I</th>
                                                   <th>WR II</th>
                                                   <th>Score</th>
                                               </tr>

                                               </thead>
                                          
                                           
                                               <tbody>
                                                @foreach ($data as $d )
                                                <tr>
                                               <td><?php echo $i++ ?></td>
                                               <td>{{ $d->first_name. ' '.$d->last_name }}</td>
                                               <td>{{ $d->gender }}</td>
                                               <td>{{ $d->reg_no }}</td>
                                               <td>{{ $d->assignment1 }}</td>
                                               <td>{{ $d->assignment2 }}</td>
                                               <td>{{ $d->test1 }}</td>
                                               <td>{{ $d->test2 }}</td>
                                               <td>{{ $d->exam_score }}</td>
                                               </tr>
                                              
                                               </tbody>
                                               @endforeach
                                               
                                           </table>
                         
                                       </div>
                                   </div>
                               </div>

                           </div>
                   </div>
                   <!-- /.tab-content -->
               </div>
           </div>

        </div>


    </div>

 @section('modals')

@endsection
@section('css')

    <link rel="stylesheet" href="{{asset('assets/dashboard/css/custombox.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link href="{{asset('assets/dashboard/fileInput/themes/explorer-fas/theme.css')}}" media="all" rel="stylesheet"
          type="text/css"/>

@endsection
@section("scripts")
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

{{-- 
    <script type="text/javascript">

        $(document).ready(function () {
            $('#exam_category_id').select2({
                minimumResultsForSearch: -1,
                placeholder: 'Select Exam Category',
            });
        });
        let caTable = $('#caTable').DataTable({
            processing: true,
            serverSide: false,
            ajax: '{{route('courses.get-student-coursework',[SRS::encode($course_id),SRS::encode($intake_id)])}}',
            columns: [
                {data: 'DT_RowIndex',name:'id'},
                {data: 'full_name', name: 'full_name'},
                {data: 'sex', name: 'sex'},
                {data: 'reg_no', name: 'reg_no'},
                {data: 'assignment1', name: 'assignment1'},
                {data: 'assignment2', name: 'assignment2'},
                {data: 'test1', name: 'test1'},
                {data: 'test2', name: 'test2'},
                {data: 'exam_score', name: 'exam_score'},

            ],
            columnDefs: [
                // {className: 'text-center', targets: [2,4,5,6,7,8,9,10,11,12,13]}
            ],

        });


        let seTable = $('#seTable').DataTable({
            processing: true,
            serverSide: false,
            ajax: '{{route('courses.get-student-course-results',[SRS::encode($course_id),SRS::encode($intake_id)])}}',
            columns: [
                {data: 'DT_RowIndex',name:'id'},
                {data: 'full_name', name: 'full_name'},
                {data: 'sex', name: 'sex'},
                {data: 'reg_no', name: 'reg_no'},
                {data: 'ese', name: 'ese'},
                {data: 'ca_score', name: 'ca_score'},
                {data: 'se_score', name: 'se_score'},
                {data: 'total_score', name: 'total_score'},
                {data: 'grade', name: 'grade'},
                {data: 'exam_remark', name: 'exam_remark'},

            ],
            columnDefs: [
                // {className: 'text-center', targets: [2,4,5,6,7,8,9,10,11,12,13]}
            ],

        });

    </script> --}}
@endsection 
