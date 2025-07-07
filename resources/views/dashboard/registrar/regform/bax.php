@extends('layouts.app')

<link rel="stylesheet" href="{{asset('regstyle/css/style.css')}}">
<link rel="stylesheet" href="{{asset('regstyle/font/material-icon/css/material-design-iconic-font.min.css')}}">
<link rel="stylesheet" href="{{asset('regstyle/vendor/nouislider/nouislider.min.css')}}">

@section('content')
<div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
    <div class="col-sm">
    <div class="box container">
        <form id="signup-form" class="signup-form" 
        role="form" method="POST" action="{{route('student.add')}}">
        {{ csrf_field() }}
          
         <div id="first">
              <div class="row">
                  <h3> <center>Registration Number</center></h3><hr> 
                </div>
                <div class="form-row">
                   <!--  <div class="form-group">
                        <label for="admno">Admission No</label>
                        <input type="text" value="asdf" readonly="true" ondblclick="this.readOnly='';">
                        <input type="text" required class="form-control" name="admissionNo"  />
                    </div> -->
                    <div class="form-group">
                        <label for="regno">Registration No</label>
                        <input type="text" class="form-control" name="regno" required />
                    </div>
                    <div class="form-group">
                        <label>-</label>
                       <button class="btn btn-success">Proceed</button>
                    </div>
                </div>
               <!--  <div class="form-row">
                    <div class="form-group">
                        <label for="adminssion">Year of Admission</label>
                        <select class="form-control" name="FacultyID">
                            <option> select academic year</option>
                            @foreach($ayears as $yr)
                              <option>{{$yr->title}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="programme">Programme Registered</label>
                        <select class="form-control" name="programme">
                            <option value="">--select programme--</option>
                            @foreach($programme as $prog)
                            <option value="{{$prog->Title}}"> {{$prog->Title}} </option>        
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="entry">Manner of Entry</label>
                        @if($entries->count()>0)
                        <select class="form-control" name="FacultyID">
                            <option> select here</option>
                            @foreach($entries as $entry)
                            <option>{{$entry->mannerofentry}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                </div>
 -->
               <!--  <div class="form-row">
                    <div class="form-group">
                        <label for="strean">Class Stream</label>
                        @if($streams->count()>0)
                        <select class="form-control" name="FacultyID">
                            <option> select here</option>
                            @foreach($streams as $str)
                            <option>{{$str->name}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="studylevel">Level of Study Registered for</label>
                        @if($levels->count()>0)
                        <select class="form-control" name="FacultyID">
                            <option> select here</option>
                            @foreach($levels as $lev)
                            <option>{{$lev->levelname}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="campus">Campus</label>
                         @if($campus->count()>0)
                        <select class="form-control" name="FacultyID">
                            <option> select here</option>
                            @foreach($campus as $camp)
                            <option>{{$camp->campus}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                </div> -->

               <!--   <div class="form-row">
                    <div class="form-group">
                        <button class="btn btn-sm btn-success">Next</button>
                        <a href="#" class="btn btn-success"  onclick="second()"> Next  <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div> -->



         </div>

         <div id="second" style="display: none;">
              <div class="row">
                  <h3> <center>PERSONAL INFORMATION</center></h3><hr> 
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Surname</label>
                        <input type="text" class="form-control" name="surname"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Middle name</label>
                        <input type="text" class="form-control" name="middlename"  />
                    </div>
                    <div class="form-group">
                        <label for="email">First name</label>
                    
                        <input type="text" class="form-control" name="firstname"  />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Date of Birth</label>
                        <input type="date" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">District of Birth</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Region of Birth</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Sex</label>
                        <select class="form-control" name="FacultyID">
                            <option> select here</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Nationality</label>
                        <select class="form-control" name="FacultyID">
                            <option> select here</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Marital Status</label>
                        <select class="form-control" name="FacultyID">
                            <option> select here</option>
                        </select>
                    </div>

                </div>


          

               <div class="form-row">
                    <div class="form-group">
                        <button class="btn btn-sm btn-info">Next</button>
                       <!-- <a href="#" class="btn btn-default" onclick="first()"><i class="fa fa-arrow-left"></i>  Back </a>   
                        <a href="#" class="btn btn-success"  onclick="third()"> Next  <i class="fa fa-arrow-right"></i></a> -->
                    </div>
                </div>


         </div>

 <!--         <div id="third" style="display: none;">
            <div class="row">
                  <h3> <center> MORE PERSONAL INFORMATION</center></h3><hr> 
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Country of Birth</label>
                        <select class="form-control" name="FacultyID">
                            <option> select here</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Religion</label>
                        <select class="form-control" name="FacultyID">
                            <option> select here</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Disability</label>
                        <select class="form-control" name="FacultyID">
                            <option> select here</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Student Status</label>
                        <select class="form-control" name="FacultyID">
                            <option> select here</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Permanent Address</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Curent Address</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Phone</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input  required type="text" class="form-control" name="email"  />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Name of Next of Kin</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Next of Kin Address</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Next of Kin Phone</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Next of Kin Occupation</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Name of Sponsor</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Sponsor Phone</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Sponsor Email</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Sponsor Occupation</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                </div>

            

               <div class="form-row">
                    <div class="form-group">
                       <a href="#" class="btn btn-default" onclick="second()"><i class="fa fa-arrow-left"></i>  Back </a>   
                        <a href="#" class="btn btn-success"  onclick="forth()"> Next  <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>

         </div> -->

<!-- 
         <div id="forth" style="display: none;">
            <div class="row">
                  <h3> <center>   BANK INFORMATION</center></h3><hr> 
                </div>
                  <div class="form-row">
                    <div class="form-group">
                        <label for="email">Name of Bank</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Name of Branch</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Account Number</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="password">Sponsorship</label>
                        <select class="form-control" name="FacultyID">
                            <option> select here</option>
                        </select>
                    </div>
                </div>
    
                <p>ENTRY QUALIFICATION INFORMATION</p>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Form IV School Name</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Form VI School Name</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Equivalent Institute Name</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Form IV Necta Number</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Form VI Necta Number </label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>
                    <div class="form-group">
                        <label for="email">Equivalent Qualification</label>
                        <input type="text" class="form-control" name="paddress"  />
                    </div>

                </div>
               
              
            
               <div class="form-row">
                    <div class="form-group">
                       <a href="#" class="btn btn-default" onclick="third()"><i class="fa fa-arrow-left"></i>  Back </a>
                     <a href="#"  class="btn btn-primary" onclick="document.getElementById('signup-form').submit();"> submit </a>
                    </div>
                </div>

         </div> -->

        </form>
    </div>
    </div>

 </div>

<script type="text/javascript" src="{{asset('regstyle/js/reg.js')}}"></script>

@endsection