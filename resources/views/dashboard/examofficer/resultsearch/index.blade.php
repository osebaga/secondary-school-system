@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">   
<div class="col-sm">

  <?php $totalcrdt2=0; $exactcrdt2=0; $totalcrdt1=0; $exactcrdt1=0; ?>

    </div>
        <div class="box" style="padding:20px" >
        <div class="ibox float-e-margins">
   
    <div class="ibox-content">
      @if($student==null)
        <form action="{{route('Search Results')}}" 
        class="form-horizontal ng-pristine ng-valid" method="get" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="form-group"><label class="col-lg-3 control-label">Enter Student Registration Number : </label>
            <div class="col-lg-8">
                <input type="text" value="" name="regno" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-8">
                <input class="btn btn-sm btn-success" type="submit" value="Search Student">
            </div>
        </div>
        </form> 

      @else

    <div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Results For the Candidate {{$student->surname}}</h5>
    </div>
    <div class="ibox-content">
          <div align="center" > 
            <img alt="User Pic" src="{{ url('img/default-avatar.png') }}" id="profile-image1" 
                class="img-circle img-responsive">
                          <div style="color:#999; margin-bottom:30px;" ></div>
                          <!--Upload Image Js And Css-->
          </div>
        <form action="" class="form-horizontal ng-pristine ng-valid" method="post" accept-charset="utf-8">
        <div class="form-group"><label class="col-lg-3 control-label">Candidate: </label>

            <div class="col-lg-8">
                <p class="form-control"> <b> <span class="text-uppercase">{{$student->surname}}, </span>{{$student->firstname}} {{$student->middlename}}: {{$student->regno}}</b></p>

              </div>
        </div>
  
        <div class="ibox-title">
        <h5>SEMESTER 1  </h5>
        </div>
        <div class="ibox-content">
            <table class="table table-bordered">
                <tbody>
                  <tr>
                  <th>Course Code</th>
                  <th>Course work(CA) 50%</th>
                  <th>Semester Exam(SE) 50%</th>
                  <th>Total 100%</th>
                  <th>Credit</th>
                  <th>Grade</th>
                  <th>Remarks</th>
                </tr>

    @foreach($cozcode1 as $key => $value)
             <tr>
              

                <td>{{$value->coursecode}}</td>
                <td>{{$CA1[$key]->examscore}}</td>
                <td>{{$SE1[$key]->examscore}}</td>
                <td>{{$CA1[$key]->examscore+$SE1[$key]->examscore}}</td>
                <td>{{$Crdt1[$key]->coursecode_credit}}
                  <?php $totalcrdt1 += $Crdt1[$key]->coursecode_credit; ?>
                </td>
              <td>
                    @if($CA1[$key]->examscore+$SE1[$key]->examscore >= 40 
                    && $CA1[$key]->examscore+$SE1[$key]->examscore < 60)
                    <?php $exactcrdt1 += $Crdt1[$key]->coursecode_credit*2; ?>
                      C
                    @elseif($CA1[$key]->examscore+$SE1[$key]->examscore >= 60 
                    && $CA1[$key]->examscore+$SE1[$key]->examscore < 65)
                    <?php $exactcrdt1 += $Crdt1[$key]->coursecode_credit*3; ?>
                      B
                    @elseif($CA1[$key]->examscore+$SE1[$key]->examscore >= 65 
                    && $CA1[$key]->examscore+$SE1[$key]->examscore < 70)
                    <?php $exactcrdt1 += $Crdt1[$key]->coursecode_credit*4; ?>
                      B+
                    @elseif($CA1[$key]->examscore+$SE1[$key]->examscore >= 70 )
                    <?php $exactcrdt1 += $Crdt1[$key]->coursecode_credit*5; ?>
                      A
                      @elseif($CA1[$key]->examscore+$SE1[$key]->examscore < 40 &&
                      $CA1[$key]->examscore+$SE1[$key]->examscore >= 30)
                      <?php $exactcrdt1 += $Crdt1[$key]->coursecode_credit*1; ?>
                      D
                      @elseif($CA1[$key]->examscore+$SE1[$key]->examscore < 30)
                      <?php $exactcrdt1 += $Crdt1[$key]->coursecode_credit*0; ?>
                      E
                  @endif
              </td>
              <td>
                  @if($CA1[$key]->examscore+$SE1[$key]->examscore >= 40)
                    PASS
                  @else
                     FAIL 
                  @endif
              </td>
              
        </tr>
        @endforeach
              </tbody>
            </table>
             <lable class="pull-right" style="font-style: normal;margin-right: 200px">
             <b>SEMESTER I GPA  </b>
             @if($totalcrdt1==0)
             --
             @else
             {{$exactcrdt1/$totalcrdt1}} 
             @endif
             
              </lable>
        </div>

        <div class="ibox-title " style="margin-top:100px;">
        <h5>SEMESTER 2</h5>
        </div>
        <div class="ibox-content">
            <table class="table table-bordered">
                <tbody>
                  <tr>
                  <th>Course Code</th>
                  <th>Course work (CA) 50%</th>
                  <th>Semester Exam (SE) 50%</th>
                  <th>Total 100%</th>
                  <th>Credit</th>
                  <th>Grade</th>
                  <th>Remarks</th>
                </tr>


                @foreach($cozcode2 as $key => $value)
                <tr>
                <td>{{$value->coursecode}}</td>
                <td>{{$CA2[$key]->examscore}}</td>
                <td>{{$SE2[$key]->examscore}}</td>
                <td>{{$CA2[$key]->examscore+$SE2[$key]->examscore}}</td>
                <td>{{$Crdt2[$key]->coursecode_credit}}
                  <?php $totalcrdt2 += $Crdt2[$key]->coursecode_credit; ?>
                </td>
              <td>
                    @if($CA2[$key]->examscore+$SE2[$key]->examscore >= 40 
                    && $CA2[$key]->examscore+$SE2[$key]->examscore < 60)
                    <?php $exactcrdt2 += $Crdt2[$key]->coursecode_credit*2; ?>
                      C
                    @elseif($CA2[$key]->examscore+$SE2[$key]->examscore >= 60 
                    && $CA2[$key]->examscore+$SE2[$key]->examscore < 65)
                    <?php $exactcrdt2 += $Crdt2[$key]->coursecode_credit*3; ?>
                      B
                    @elseif($CA2[$key]->examscore+$SE2[$key]->examscore >= 65 
                    && $CA2[$key]->examscore+$SE2[$key]->examscore < 70)
                    <?php $exactcrdt2 += $Crdt2[$key]->coursecode_credit*4; ?>
                      B+
                    @elseif($CA2[$key]->examscore+$SE2[$key]->examscore >= 70 )
                    <?php $exactcrdt2 += $Crdt2[$key]->coursecode_credit*5; ?>
                      A
                      @elseif($CA2[$key]->examscore+$SE2[$key]->examscore < 40 &&
                      $CA2[$key]->examscore+$SE2[$key]->examscore >= 30)
                      <?php $exactcrdt2 += $Crdt2[$key]->coursecode_credit*1; ?>
                      D
                      @elseif($CA2[$key]->examscore+$SE2[$key]->examscore < 30 )
                      <?php $exactcrdt2 += $Crdt2[$key]->coursecode_credit*0; ?>
                      E
                  @endif
              </td>
              <td>
                  @if($CA2[$key]->examscore+$SE2[$key]->examscore >= 40)
                    PASS
                  @else
                     FAIL 
                  @endif
              </td>
              
        </tr>
        @endforeach


              </tbody>
            </table>

            <lable class="pull-right" style="font-style: normal;margin-right: 200px">
            <b>SEMESTER II GPA  </b>  
            @if($totalcrdt2==0)
             --
             @else
             {{$exactcrdt2/$totalcrdt2}} 
             @endif        
          </lable>
       
        </div>

        <div class="box-footer text-center" style="margin-top:100px;">
                  <div>
                     <a href="{{route('Search Results')}}" class="btn btn-default btn-rounded mb-4" "  
                    style="color: #000000;">
                    <b>BACK</b></a>

                  </div >
              </div>
        </form>    
      </div>
        </div>


        @endif
           
      </div>
    </div>

  </div>
</div>
      <script type="text/javascript">
        function getTableRowId(reg){
          // let url = "{{ route('Student Register', ':reg') }}";
          // url = url.replace(':reg', reg);
          document.location.href=url;    }
      </script>
@endsection