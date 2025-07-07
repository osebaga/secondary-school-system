@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Admit new student</title>

@endsection


@section('content')
    <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">
                            
                            Download the template format to import blocked student
                            <button type="button" class="btn btn-outline-primary">{{link_to(asset('assets/uploads/formats/BlockedStudent.xlsx'),'Required Excel File Format')}}</button>
                         
                        </p>
                        {!! Form::open(['route' => 'blocked.student.import','class'=>'block-student','method'=>'POST','role' => 'form', 'enctype' => 'multipart/form-data'])!!}
                         <br>
                        <div class="row ">
                            
                            <div class="col-sm-4">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Intake</label>
                                <div class="col-sm-10">
                                  <select class="form-control tag" name="intake" id="exampleFormControlSelect1" required>
                                    <option>--Select Intake--</option>
                                    @foreach($intake as $y)
                                    <option value="{{ $y->id }}">{{ $y->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Semester:</label>
                                <div class="col-sm-10">
                                  <select class="form-control" name="semester" id="exampleFormControlSelect1">
                                    <option>--Select Semester--</option>
                                    
                                    @foreach($semester as $y)
                                    <option value="{{ $y->id }}">{{ $y->title }}</option>
                                    @endforeach
  
                                   
                                  </select>
                                 </div>
                              </div>
                            </div>

                            <div class="col-sm-4">
                              <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                 <input type="file" name="blockedstudentexcel" class="" >
                                 </div>
                              </div>

                            
                                <div class="form-group pull-right">
                                    {{Form::button('Upload',['type'=>'submit','class'=>'btn btn-primary'])}}
                                </div>
                            </div>
                        </div>
                        {!! Form::close()!!}
                    </div>
                </div>


        @if(!empty($blockedstudent))
                <div class="table-responsive">
                    <div id="alerts"></div>
                   @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form action="{{ route('unblocked.student') }}" method="POST" role="form">
                        @csrf 
                    <div class="text-center">
<a href="#" class="btn btn-primary btn-sm checkall">check all</a>   
<a href="#" class="btn btn-primary btn-sm uncheckall">uncheck all</a>  <button type="submit" href="#" class="btn btn-primary btn-sm">Unblock</button> 

                    </div>
                    <table id="usrTable" class="table-bordered data-table table"  style="width:100%">
                        <thead>
                        <tr>
                            <th style="width:20px">#</th>
                            <th>Check</th>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>REG No</th>
                            <th>Programme</th>
                            <th>Intake</th>
                            <th>Blocked By</th>
                            <th>Blocked Date</th>
                            <th>UnBlocked By</th>
                            <th>UnBlocked Date</th>
                            <th>Action</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;  ?>
                         @foreach($blockedstudent as $log)
                           <tr>
                         <td><?php echo $i++;  ?></td>
                         <td><input type="checkbox" name="id[]" value="{{ $log->reg_no }}"></td>
                         <td>{{ $log->student->user->first_name ?? '' }} {{ $log->student->user->last_name ?? ''}}</td>
                         <td>{{ $log->student->user->gender ?? '' }}</td>
                         <td>{{ $log->reg_no }}</td>
                         <td>{{ $log->student->program->program_acronym }}</td>
                         <td>{{ $log->student->intake_category->name }}</td>

                         <td>{{ $log->user->username }}</td>
                         <td>{{ $log->blocked_date }}</td>

                         <td>{{ $log->user2->username ?? 'N/A' }}</td>
                         <td>{{ $log->unblocked_date}}</td>
                         <td><a href="{{ route('unsingle.student',$log->id) }}" class="btn btn-primary btn-sm">block</a></td>
                           </tr>
                           @endforeach
                        </tbody>
                    </table>

                    </form>
                </div>
            </div>
     @endif

            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#campus_id').select2({
                minimumResultsForSearch: -1,
                placeholder: 'Select Campus',
            });
        });
        $("#admission-file").fileinput({
            showUpload: false,
            dropZoneEnabled: false,
            mainClass: "input-group-lg"
        });
    </script>

<script type="text/javascript">
    $('#usrTable').DataTable();
       
    $(document).ready(function() {
        // Check All
        $('.checkall').click(function() {
            $(":checkbox").attr("checked", true);
        });
        // Uncheck All
        $('.uncheckall').click(function() {
            $(":checkbox").attr("checked", false);
        });
    });
</script>

@endsection
