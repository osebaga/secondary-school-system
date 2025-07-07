@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | My courses</title>

@endsection


@section('content')
<style>
  .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}
  </style>
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                      Course/Module Results
                    </h2>

                   
                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">
                              
                            </p>
                            <div class="table table-responsive justify-content-center">
                              <div class="card" style="width: 50rem;">
                                <div class="card-header">Search Course Results</div>
                                <div class="card-body">
                  
                          <form class="" action="{{route('report.courseresult') }}" method="POST">  
                            @csrf
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">Academic Year</label>
                              <div class="col-sm-10">
                                <select class="form-control tag" name="ayear" id="exampleFormControlSelect1" required>
                                  <option>--Select Academic Year--</option>
                                  @foreach($Ayear as $y)
                                  <option value="{{ $y->id }}">{{ $y->year }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Year of Study:</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="studyyear" id="exampleFormControlSelect1">
                                  <option>--Select Year of Study--</option>
                                  
                                  <option value="1">First Year</option>
                                  <option value="2">Second Year</option>
                                  <option value="3">Third Year</option>

                                 
                                </select>
                               </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Course Code:</label>
                              <div class="col-sm-10">
                                <select class="form-control tag"  name="course" id="exampleFormControlSelect1">
                                  <option>--Select Course Code --</option>
                                  @foreach($module as $y)
                                  <option value="{{ $y->id }}">{{ $y->course_code }}-{{$y->course_name  }}</option>
                                  @endforeach
                                </select>
                               </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Study Programme:</label>
                              <div class="col-sm-10">
                                <select class="form-control program" name="program" id="exampleFormControlSelect1">
                                  <option>--Select Programme--</option>
                                  @foreach($program as $y)
                                  <option value="{{ $y->id }}">{{ $y->program_acronym }}</option>
                                  @endforeach
                                </select>
                               </div>
                            </div>
                            
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Campus:</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="campus_id" id="exampleFormControlSelect1">
                                  {{-- <option>--Select Campus--</option> --}}
                                  @foreach($campus as $y)
                                  <option value="{{ $y->id }}" selected>{{ $y->campus_name }}</option>
                                  @endforeach
                                </select>
                               </div> 
                            </div>
                          <!--
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Sessions:</label>
                              <div class="col-sm-10">
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>--Select Academic Year--</option>
                                  @foreach($Ayear as $y)
                                  <option value="{{ $y->id }}">{{ $y->year }}</option>
                                  @endforeach
                                </select>
                               </div>
                            </div>
                          -->
                            {{-- <fieldset class="form-group">
                              <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Report Details</legend>
                                <div class="col-sm-10">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                      CA & Exam in Summary 
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                      CA Only in Details
                                    </label>
                                  </div>
                                  
                                </div>
                              </div>
                            </fieldset>

                            <fieldset class="form-group">
                              <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Show Names</legend>
                                <div class="col-sm-10">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios2" id="gridRadios1" value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                     Yes
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios2" id="gridRadios2" value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                     No
                                    </label>
                                  </div>
                                  
                                </div>
                              </div>
                            </fieldset> --}}

                            <div class="form-group ">
                              <div class="col-sm-12 ">
                                <button type="submit" name="sub" value="1" class="btn btn-primary pull-left">Preview</button>
                                <button type="submit" name="sub" value="2" class="btn btn-primary pull-right">Print Pdf</button>
                            </div>
                          </form>

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

@section('scripts')

    <script>
      $(document).ready(function() {
		$('.tag').select2();
});
 

        
    </script>
@endsection