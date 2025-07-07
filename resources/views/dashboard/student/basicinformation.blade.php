@extends('layouts.app')
<!-- Bootstrap core CSS -->
@section('content')
    <div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
        <div class="row">
            <div class="col-md-8">
	        <div class="box" >
	            <div class="box-header"> Student's Basic Details 
	            </div>
	            <div class="box-body table-responsive" style="padding: 20px;" >
	               <form role="form" method="POST" action="{{url('student/'.$student->id)}}">
			         @csrf 
			          <div class="col-md-6">
		                	 <div class="form-group">
		                        <label for="regno">Registration Number</label>
		                        <input type="text" disabled class="form-control" value="{{$student->regno}}" name="regno"  />
		                    </div>
		                </div>
		               <div class="col-md-6">
		                	 <div class="form-group">
		                        <label for="status">Status</label>
		                        <input type="text" disabled class="form-control" value="{{$student->status}}" name="status"  />
		                    </div>
		                </div>
		                <div class="col-md-6">
		                	<div class="form-group">
		                        <label for="firstname">First name</label>
		                        <input type="text" value="{{$student->firstname}}" class="form-control" name="firstname"  />
		                    </div>
		                </div>
		                 <div class="col-md-6">
		                	 <div class="form-group">
		                        <label for="middlename">Middle name</label>
		                        <input type="text" value="{{$student->middlename}}" class="form-control" name="middlename"  />
		                    </div>
		                </div>
		                 <div class="col-md-6">
		                	<div class="form-group">
		                        <label for="surname">Surname</label>
		                        <input type="text" class="form-control" value="{{$student->surname}}" name="surname"  />
		                    </div>
		                </div>
		                  <div class="col-md-6">
		                	 <div class="form-group">
		                        <label for="dob">Date of Birth</label>
		                        <input type="date" value="{{$student->dbirth}}" class="form-control" name="dbirth"  />
		                    </div>
		                </div>
		                 <div class="col-md-6">
		                	<div class="form-group">
		                        <label for="countrybirth">Country of Birth</label>
		                        <select required name="countrybirth" class="form-control">
		                        	@if($student->countrybirth)
		                        	<option>{{ $student->countrybirth }}</option>
		                        	@endif
		                        	<option>Tanzania</option>
		                        	<option>Uganda</option><option>Kenya</option><option>Rwanda</option><option>Burundi</option><option>Other</option>
		                        </select>
		                    </div>
		                </div>
		               
		                 <div class="col-md-6">
		                	<div class="form-group">
		                        <label for="regionbirth">Region of Birth</label>
		                        <input type="text" class="form-control" value="{{$student->regionbirth}}" name="regionbirth"  />
		                    </div>
		                </div>
		                 <div class="col-md-6">
		                	<div class="form-group">
		                        <label for="districtbirth">District of Birth</label>
		                        <input type="text" class="form-control" value="{{$student->districtbirth}}" name="districtbirth"  />
		                    </div>
		                </div>
		                 <div class="col-md-6">
		                	<div class="form-group">
		                        <label for="nationality">Nationality</label>
		                        <select required name="nationality" class="form-control"> @if($student->nationality)
		                        	<option>{{ $student->nationality }}</option>
		                        	@endif
		                        	<option>Tanzanian</option><option>Kenyan</option><option>Other</option>
		                        </select>
		                    </div>
		                </div>
		                   
		                
		                <div class="col-md-6">
		                    <div class="form-group">
		                        <label for="sex">Sex</label>
		                         <select class="form-control" name="sex" required>
		                            @if($student->sex=='M')
		                            <option value="M">Male</option>
		                            <option value="F">Female</option>
		                            @elseif($student->sex=='F')
		                            <option value="F">Female</option>
									 <option value="M">Male</option>
									 @else
									 <option value="">-select-</option>
		                             <option value="F">Female</option>
									 <option value="M">Male</option>
		                            @endif
		                        </select>
		                    </div>
		                </div>
		               
		                 @if($maritals->count()>0)
		                 <div class="col-md-6">
		                     <div class="form-group">
		                        <label for="maritalstatus">Marital Status</label>
		                        <select class="form-control" name="maritalstatus">
		                            <option>{{$student->maritalstatus}}</option>
		                            @foreach($maritals as $mar)
		                            <option>{{$mar->status}} </option> 
		                            @endforeach
		                        </select>
		                       </div>
		                 </div>@endif

		                 <div class="col-md-6">
		                	<div class="form-group">
		                        <label for="religion">Religion</label>
		                        <select required name="religion" class="form-control">
		                        	@if($student->religion)
		                        	<option>{{ $student->religion }}</option>
		                        	@endif
		                        	<option>Non</option>
		                        	<option>Christian</option><option>Muslim</option><option>Hinduism</option> <option>Buddhism</option><option>Other</option>
		                        </select>
		                    </div>
		                </div>

		                <div class="col-md-6">
		                	<div class="form-group">
		                        <label for="disability">Disability</label>
		                        <select required name="disability" class="form-control">
		                        	@if($student->disability)
		                        	<option>{{ $student->disability }}</option>
		                        	@endif 
		                        	<option>Non</option>
		                        	<option>vision Impairment</option><option>deaf</option><option>ental health conditions.</option> <option>intellectual disability</option> <option>physical disability.</option><option>Other</option>
		                        </select>
		                    </div>
		                </div>

		                </div>
		                
			            <div class="form-row">
			                <div class="form-group" style="padding: 20px;">
			                     <button class="btn btn-primary">Update</button>
			                </div>
			          </div>
			      </form> 
	               
	            </div>
	        </div>
            </div>
        </div>
	</div>


@endsection