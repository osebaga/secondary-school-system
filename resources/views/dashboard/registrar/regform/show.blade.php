@extends('layouts.app')

@section('content')

<div class="content" style="margin-right: 20px; margin-left: 20px;">   
<div class="row">
  @if($student)
  <div class="col-md-4">
      <div class="box">
        <div class="box-header">
           <div  align="center"> 
            @if($photo)
             <img alt="User Pic" src="{{asset('storage/'.$photo->photo_path)}}" style="height:200px; width: 200px;" id="profile-image1" class="img-circle img-responsive">
            <a href="#" data-toggle="modal"  data-target="#photo">Change </a>
            @else
               <img alt="User Pic" src="{{ url('img/default-avatar.png') }}" id="profile-image1" class="img-circle img-responsive">
                <a href="#" data-toggle="modal"  data-target="#photo">Upload </a>
            @endif
            <div class="modal fade" id="photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <form class="modal-dialog"  role="form" method="POST" action="{{url('photo-upload')}}" enctype="multipart/form-data">
               @csrf 
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Photo Upload</h4>
                  </div>
                    <div class="card-body" style="padding: 20px;">
                       <input value="{{$regno}}" name="regno" hidden>
                       <div class="row">
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="photo" id="avatarFile" aria-describedby="fileHelp">
                          <input type="hidden" name="regno" value="{{$regno}}"></div> 
                       </div>
                       <div class="form-row">
                          <div class="form-group" style="padding: 20px;">
                              <div class="col-md-4">
                           <button type="submit" class="btn btn-primary">Upload</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel </button></div>
                          </div>
                   </div>
                </div>
              </div>
            </form> 
            </div>
          </div>
        </div>

          <div class="box-body">
                <table class="table">
                  <tbody>
                    <tr> <td>Name:</td> <td> {{$student->firstname}} {{$student->surname}} </td>  </tr>
                    <tr> <td>Gender:</td>  <td>{{$student->sex}}</td></tr>
                    <tr> <td>Birthdate</td>  <td>{{$student->dbirth}}</td></tr>
                    <tr> <td>Marital Status</td>  <td> {{$student->maritalstatus}} </td>
                    </tr>
                      <tr> <td>Nationality</td>  <td> {{$student->nationality}} </td>
                    </tr>
                      <tr> <td>Birth Country</td>  <td> {{$student->countrybirth}} </td>
                    </tr>
                    <tr> <td>Religion</td>  <td> {{$student->religion}} </td>
                    </tr>
                    <tr> <td>Attachments</td>  <td> <a href="{{url('student-attachment/'.$student->id)}}">Preview </a> </td>
                    </tr>
                    <tr></td><td>
                         <td> <a href="{{url('student/'.$student->id.'/info')}}">More <i class="fa fa-pencil"></i></a> 
                         </td>
                  </tbody>
                </table>
          </div>
      </div>

    <div class="box">
      <div class="box-header">CONTACT INFORMATION  <a href="{{url('student-contacts/'.$student->id)}}" class="pull-right btn-md">Update <i class="fa fa-pencil"></i></a>  </div>

      <div class="box-body">
        <div class="col-md-6">
          @if($contact)
          <table class="table">
            <tbody>
                <tr><td>Address:</td><td>{{$contact->address}}</td></tr>
                <tr><td>Permanent Address:</td><td> {{$contact->region}} - {{$contact->district}}</td></tr>
                <tr><td>Phone:</td><td>{{$contact->phone1}} - {{$contact->phone2}}</td></tr>
                <tr><td>Email:</td><td>{{$contact->email1}} - {{$contact->email2}}</td></tr>
              </tbody>
          </table> @else <p>Contact not updated!</p> @endif
        </div>
      </div>
    </div>

      <div class="box">
          <div class="box-header">Student Status </div>
          <div class="box-body">
              <div class="col-md-6">
                 -
              </div>
          </div>
      </div>

  </div>

  <div class="col-md-8">
    <div class="box">
      <div class="box-header">STUDY PROGRAMME INFORMATION  <a href="#" class="pull-right btn-md" data-toggle="modal"  data-target="#stdyprogr">Update <i class="fa fa-pencil"></i></a> </div>
      <div class="box-body">
        @if($student->mannerofentry)
        <div class="col-md-6">
          <table class="table">
            <tbody>
              <tr><td>Admission No</td><td>-</td></tr>
              <tr><td>Registration No</td><td>{{$student->regno}}</td></tr>
              <tr><td>Year of Admission</td><td>{{$student->yearofstudy}}</td></tr>
              <tr><td>Programme Registered</td><td>{{$student->programmeofstudy}}</td></tr>
               <tr><td>Graduation Date</td><td>-</td></tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-6">
           <table class="table">
            <tbody>
              <tr><td>Manner of Entry</td><td>{{$student->mannerofentry}}</td></tr>
           <tr><td>Level of Study Registered</td><td>-</td></tr>
              <tr><td>Campus</td><td>-</td></tr>
            </tbody>
          </table>
        </div>
        @else
        <p>There is no information updated!</p>

        @endif
      </div>
    </div>

    <div class="box">
      <div class="box-header">EDUCATION HISTORY  <a href="#" class="pull-right btn-md" data-toggle="modal"  data-target="#educback"> <i class="fa fa-plus"></i> Add </a>
    </div>
      <div class="box-body">
        @if($educt->count()>0) 
         <table class="table table-hover">
            <tbody>
              @foreach($educt as $edu)
              <tr><td>{{$edu->level}}</td><td>{{$edu->index_no}}</td><td>{{$edu->start_year}} - {{$edu->end_year}}</td><td>{{$edu->grade}} </td> <td>{{$edu->institution_name}}</td> <td>
                <form method="POST" action="{{url('edu-histry/'.$edu->id)}}">
                  @csrf {{method_field('delete')}}
                  <button class="pull btn-danger" onclick="return confirm('Remove this record?');"><i class="fa fa-trash"></i></button>
                </form>
              </td></tr>
              @endforeach
            </tbody>
          </table>
        @else
      <p>There is no information</p>
      @endif  
      </div> 
    </div>

    <div class="box">
    <div class="box-header"> SPONSOR  <a href="{{url('sponsor-info/'.$student->id)}}" class="pull-right btn-md"> <i class="fa fa-plus"></i> Update </a>  </div>
      <div class="box-body">
         @if($banks->count()>0)
             <table class="table">
                <tbody>
                  @foreach($banks as $bank)
                    <tr><td>{{$bank->bankname}}</td><td> {{$bank->accountnumber}} </td> <td>{{$bank->sponsor}}</td> <td>{{$bank->status}}</td>
                      <td>
                      <form method="POST" action="{{url('bank-info/'.$bank->id)}}">
                        @csrf {{method_field('delete')}}
                        <button class="pull-right btn-danger" onclick="return confirm('Remove this Account?');"><i class="fa fa-trash"></i></button>
                      </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @else
          <p>There is no information!</p>
          @endif 
       </div>
    </div>

    <div class="box">
    <div class="box-header"> PAYMENTS  <a href="{{url('student-payments/'.$student->id)}}" class="pull-right btn-md"> Preview </a> </div>
      <div class="box-body">
         @if($payments->count()>0)
             <table class="table">
                <tbody>
                  @foreach($payments as $pay)
                  <tr> <td>{{$pay->amount}}</td> <td> {{$pay->semester}}</td> <td>{{$pay->yearofstudy}}</td></tr>
                  @endforeach
                </tbody>
              </table>
            @else
          <p>There is no record for this!</p>
          @endif 
       </div>
    </div>

     <div class="box">
    <div class="box-header"> BANK INFORMATION  <a href="#" class="pull-right btn-md" data-toggle="modal"  data-target="#bankinfo"> <i class="fa fa-plus"></i> Add </a> </div>
      <div class="box-body">
         @if($banks->count()>0)
             <table class="table">
                <tbody>
                  @foreach($banks as $bank)
                    <tr><td>{{$bank->bankname}}</td><td> {{$bank->accountnumber}} </td> <td>{{$bank->sponsor}}</td> <td>{{$bank->status}}</td>
                      <td>
                      <form method="POST" action="{{url('bank-info/'.$bank->id)}}">
                        @csrf {{method_field('delete')}}
                        <button class="pull-right btn-danger" onclick="return confirm('Remove this Account?');"><i class="fa fa-trash"></i></button>
                      </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @else
          <p>There is no information!</p>
          @endif 
       </div>
    </div>

    <div class="box">
      <div class="box-header"> DEPENDANT  <a href="#" class="pull-right btn-md" data-toggle="modal"  data-target="#dependant">  <i class="fa fa-plus"></i> Add</a>
    </div>
      <div class="box-body">
         @if($dependants->count()>0)
           @foreach($dependants as $depend)
               <div class="row">
                  <div class="col-md-6">
                 <table class="table table-hover">
                    <tbody>
                      <tr><td>Name</td><td>{{$depend->name}}</td></tr>
                      <tr><td>Relationship</td><td>{{$depend->relationship}}</td></tr>
                      <tr><td>Phone</td><td>{{$depend->phone1}} <br> {{$depend->phone2}}</td></tr>
                      @if($depend->email)
                      <tr><td>Email</td><td>{{$depend->email}}</td></tr>@endif
                    </tbody>
                  </table>
                </div>

                <div class="col-md-6">
                 <table class="table table-hover">
                    <tbody>
                      <tr><td>Gender</td><td>{{$depend->gender}}</td></tr>
                      <tr><td>Address</td><td>{{$depend->address}}</td></tr>
                      <tr><td>Relationship</td><td>{{$depend->relationship}} <br>
                        <form method="POST" action="{{url('dependants/'.$depend->id)}}">
                          @csrf {{method_field('delete')}}
                          <button class="btn btn-sm pull-right btn-danger" onclick="return confirm('Click Ok to remove this person permanently!');"><i class="fa fa-trash"></i></button>
                        </form>
                       </td></tr>
                    </tbody>
                  </table>
                </div>
               </div>
           @endforeach
        @else
      <p>There is no information</p>
      @endif 
      </div>
    </div>

     <div class="box">
      <div class="box-header"> NEXT OF KIN  <a href="#" class="pull-right btn-md" data-toggle="modal"  data-target="#NextofKin">  <i class="fa fa-plus"></i> Add</a> 
    </div>
      <div class="box-body">
         @if($nextofs->count()>0)
           @foreach($nextofs as $next)
               <div class="row">
                  <div class="col-md-6">
                 <table class="table table-hover">
                    <tbody>
                      <tr><td>Name</td><td>{{$next->name}}</td></tr>
                      <tr><td>Relationship</td><td>{{$next->relationship}}</td></tr>
                      <tr><td>Phone</td><td>{{$next->phone1}} <br> {{$next->phone2}}</td></tr>
                    </tbody>
                  </table>
                </div>

                  <div class="col-md-6">
                 <table class="table table-hover">
                    <tbody>
                      <tr><td>Gender</td><td>{{$next->gender}}</td></tr>
                      <tr><td>Address</td><td>{{$next->address}}</td></tr>
                      <tr><td>Relationship</td><td>{{$next->relationship}} <br>
                        <form method="POST" action="{{url('nextkin/'.$next->id)}}">
                          @csrf {{method_field('delete')}}
                          <button class="btn btn-sm pull-right btn-danger" onclick="return confirm('Click Ok to remove this person permanently!');"><i class="fa fa-trash"></i></button>
                        </form>
                       </td></tr>
                    </tbody>
                  </table>
                </div>
               </div> 
           @endforeach
        @else
      <p>There is no information</p>
      @endif 
    </div>
</div>

    <div class="modal fade" id="bankinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <form class="modal-dialog"  role="form" method="POST" action="{{url('bank-info')}}">
         @csrf 
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Bank Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <div class="card-body" style="padding: 20px;">
                 <input value="{{$regno}}" name="regno" hidden>
                 <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                        <label for="fornecta">Name of the Bank</label>
                       <input type="text" name="bankname" class="form-control">
                  </div></div> 
                   <div class="col-md-6">
                        <div class="form-group">
                        <label for="fornecta">Account Number</label>
                       <input type="text" name="accountnumber"  class="form-control">
                  </div></div>
                 </div>
                 <div class="row">
                  @if($sponsors->count()>0)
                   <div class="col-md-6">
                     <div class="form-group">
                        <label for="sponsor">Sponsor</label>
                        <select class="form-control" name="sponsor">
                            <option value="">--select Sponsor--</option>
                            @foreach($sponsors as $spons)
                            <option value="{{$spons->sponsorname}}"> {{$spons->sponsorname}} </option> 
                            @endforeach
                        </select>
                       </div>
                 </div>@endif
                </div>
                </div>
                 <div class="form-row">
                    <div class="form-group" style="padding: 20px;">
                     <button type="submit" class="btn btn-primary">SAVE</button>
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel </button>
                    </div>
             </div>
          </div>
      </form> 
      </div>

          <div class="modal fade" id="dependant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <form class="modal-dialog"  role="form" method="POST" action="{{url('dependants')}}">
         @csrf 
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Dependant</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <input value="{{$regno}}"  hidden name="regno">
              <div class="card-body" style="padding: 20px;">
                 <div class="row">
                  <div class="col-md-12">
                        <div class="form-group">
                        <label for="fornecta">Full Name</label>
                       <input type="text" name="name" required class="form-control">
                  </div></div> 
                    <div class="col-md-12">
                     <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" required name="gender">
                            <option value="">--select--</option>
                            <option>Male</option> 
                            <option>Female</option> 
                        </select>
                       </div>
                 </div>
                   <div class="col-md-12">
                        <div class="form-group">
                        <label for="address">Address / Location</label>
                       <input type="text" required name="address" class="form-control">
                  </div></div>

                    <div class="col-md-12">
                     <div class="form-group">
                        <label for="relationship">Relationship</label>
                        <select class="form-control" name="relationship">
                            <option value="">--select--</option>
                            <option>Father</option> 
                            <option>Mother</option> 
                            <option>Husband</option>
                            <option>Wife</option>
                            <option>Son</option> 
                            <option>Daughter</option>
                            <option>Uncle</option> 
                            <option>Aunt</option> 
                        </select>
                       </div>
                 </div>

                 <div class="col-md-12">
                        <div class="form-group">
                        <label for="phone1">Phone Number (1)</label>
                       <input type="text" required name="phone1" class="form-control">
                  </div></div>

                  <div class="col-md-12">
                        <div class="form-group">
                        <label for="phone2">Phone Number (2)</label>
                       <input type="text" placeholder="Any other phone Number?" name="phone2" class="form-control">
                  </div></div>
                   <div class="col-md-12">
                        <div class="form-group">
                        <label for="email">E-Mail</label>
                       <input type="text" placeholder="Email Address" name="email" class="form-control">
                  </div></div>

                 </div>
                 
              <div class="form-row">
                <div class="form-group" style="padding: 20px;">
                     <button type="submit" class="btn btn-primary">SAVE</button>
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel </button>
                </div>
              </div>
          </div>
      </form> 
      </div>

  </div>  <!-- end second colomn -->

        <div class="modal fade" id="stdyprogr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <form class="modal-dialog"  role="form" method="POST" action="{{url('student-info/'.$student->id)}}">
         @csrf 
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Study Program Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <div class="card-body" style="padding: 20px;">
                 <div class="row">
                  @if($entries->count()>0)
                  <div class="col-md-6">
                        <div class="form-group">
                        <label for="adminssion">Manner of Entry</label>
                        <select name="mannerofentry" required class="form-control">
                            @if($student->mannerofentry)
                             <option>{{$student->mannerofentry}}</option>
                            @else
                            <option value="">select here</option>
                            @endif
                          @foreach($entries as $enty)
                            <option>{{$enty->mannerofentry}}</option>
                          @endforeach
                        </select>
                  </div></div> @endif
                  @if($ayears->count()>0)
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="adminssion">Year of Admission</label>
                        <select class="form-control" required name="yearofstudy">
                           @if($student->yearofstudy)
                             <option>{{$student->yearofstudy}}</option>
                            @else
                            <option value=""> select academic year</option>
                            @endif
                            @foreach($ayears as $yr)
                              <option>{{$yr->title}} </option>
                            @endforeach
                        </select>
                    </div>
                  </div>@endif
                 </div>
                 <div class="row">
                  <!-- <div class="col-md-6">
                      <div class="form-group">
                        <label for="admno">Admission No</label>
                        <input type="text" required class="form-control" name="admissionNo"  />
                    </div>
                  </div> -->  
                   @if($programme->count()>0)
                   <div class="col-md-6">
                     <div class="form-group">
                        <label for="programme">Programme Registered</label>
                        <select class="form-control" name="programmeofstudy">
                           @if($student->programmeofstudy)
                             <option>{{$student->programmeofstudy}}</option>
                            @else
                              <option value="">--select programme--</option>
                            @endif
                            @foreach($programme as $prog)
                            <option value="{{$prog->Title}}">{{$prog->Title}} </option> 
                            @endforeach
                        </select>
                       </div>
                 </div>@endif
                <!--  @if($sponsors->count()>0)
                   <div class="col-md-6">
                     <div class="form-group">
                        <label for="sponsor">Sponsor</label>
                        <select class="form-control" name="sponsorId">      
                          @if($student->sponsorId && ($sponsors->count()>0)) 
                            @php  $checsp = $sponsors->where('sponsorId',$student->sponsorId)->first();
                            @endphp
                              @if($checsp)
                               <option value="{{$checsp->sponsorId}}"> {{$checsp->sponsorname}}
                              </option>
                              @endif
                          @else
                           <option value="">--select Sponsor--</option>
                          @endif
                            @foreach($sponsors as $spons)
                            <option value="{{$spons->sponsorId}}"> {{$spons->sponsorname}} </option> 
                            @endforeach
                        </select>
                       </div>
                 </div>@endif
 -->
                </div>
                </div>
            <div class="form-row">
                <div class="form-group" style="padding: 20px;">
                     <button type="submit" class="btn btn-primary">SAVE</button>
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel </button>
                </div>
          </div>
          </div>
      </form> 
      </div>

       <div class="modal fade" id="educback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <form class="modal-dialog"  role="form" method="POST" action="{{url('edu-histry')}}">
         @csrf  
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Education History</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <div class="card-body" style="padding: 20px;">
                <input value="{{$student->id}}" name="regno" hidden>
                     <div class="form-group">
                        <label for="level">Education Level</label>
                        <select class="form-control" name="level">
                            <option value="">--select level--</option>
                            <option>Ordinary Level </option>
                            <option>Advance Level</option>
                        </select>
                       </div>
                   <div class="form-group">
                        <label for="institution_name">Institution/College/School Name</label>
                       <input type="text" name="institution_name" required class="form-control">
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                           <label for="index_no">Index / Certificate Number</label>
                          <input type="text" name="index_no" required class="form-control">
                       </div>
                     </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="grade">Grade</label>
                            <select class="form-control" name="grade">
                            <option value="">--select level--</option>
                            <option>DIV. I</option>
                            <option>DIV. II</option>
                            <option>DIV. III</option>
                            <option>DIV. IV</option>
                            <option>DIV. 0</option>
                        </select>
                        </div>
                     </div>
                    
                  </div>
                  
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                        <label for="start_year">Start Year</label>
                       <input type="text" name="start_year" required class="form-control">
                  </div></div> 
                   <div class="col-md-6">
                        <div class="form-group">
                        <label for="end_year">End Year</label>
                       <input type="text" name="end_year"  required class="form-control">
                  </div></div>
                </div>
                <div class="form-row">
                <div class="form-group" style="padding: 20px;">
                     <button type="submit" class="btn btn-primary">SAVE</button>
                     <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel </button>
                </div>
          </div>
          </div>
      </form> 
      </div>

       
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  @else
  <p>
   <button class="btn btn-success btn-md" data-toggle="modal"  data-target="#stdinfo">  Add  </button> 
  </p>

    <div class="modal fade" id="stdinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <form class="modal-dialog"  role="form" method="POST" action="{{url('student/'.$regno)}}">
          {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Personal Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                     <div class="card-body" style="padding: 20px;">
                <div class="form-row">
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" name="surname"  />
                    </div>
                    <div class="form-group">
                        <label for="middlename">Middle name</label>
                        <input type="text" class="form-control" name="middlename"  />
                    </div>
                    <div class="form-group">
                        <label for="firstname">First name</label>
                        <input type="text" class="form-control" name="firstname"  />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" name="dbirth"  />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Sex</label>
                         <select class="form-control" name="sex" required>
                            <option value=""> select here</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                </div>
                 @if($maritals->count()>0)
                   <div class="form-row">
                     <div class="form-group">
                        <label for="maritalstatus">Marital Status</label>
                        <select class="form-control" name="maritalstatus">
                            <option value="">--select status--</option>
                            @foreach($maritals as $mar)
                            <option> {{$mar->status}} </option> 
                            @endforeach
                        </select>
                       </div>
                 </div>@endif

                  </div>
            <div class="form-row">
                <div class="form-group" style="padding: 20px;">
                     <button type="submit" class="btn btn-primary">SAVE</button>
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel </button>
                </div>
          </div>
          </div>
      </form> 
      </div>

  @endif

</div>

</div>

       <div class="modal fade" id="NextofKin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <form class="modal-dialog"  role="form" method="POST" action="{{url('nextkin')}}">
         @csrf 
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Next Of Kin</h4>
            </div>
            <input value="{{$regno}}"  hidden name="regno">
              <div class="card-body" style="padding: 20px;">
                 <div class="row">
                  <div class="col-md-12">
                        <div class="form-group">
                        <label for="fornecta">Full Name</label>
                       <input type="text" name="name" required class="form-control">
                  </div></div> 
                    <div class="col-md-12">
                     <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" required name="gender">
                            <option value="">--select--</option>
                            <option>Male</option> 
                            <option>Female</option> 
                        </select>
                       </div>
                 </div>
                   <div class="col-md-12">
                        <div class="form-group">
                        <label for="address">Address / Location</label>
                       <input type="text" required name="address" class="form-control">
                  </div></div>

                    <div class="col-md-12">
                     <div class="form-group">
                        <label for="relationship">Relationship</label>
                        <select class="form-control" name="relationship">
                            <option value="">--select--</option>
                            <option>Father</option> 
                            <option>Mother</option> 
                            <option>Husband</option>
                            <option>Wife</option>
                            <option>Son</option> 
                            <option>Daughter</option>
                            <option>Uncle</option> 
                            <option>Aunt</option>
                        </select>
                       </div>
                 </div>

                 <div class="col-md-12">
                        <div class="form-group">
                        <label for="phone1">Phone Number (1)</label>
                       <input type="text" required name="phone1" class="form-control">
                  </div></div>

                  <div class="col-md-12">
                        <div class="form-group">
                        <label for="phone2">Phone Number (2)</label>
                       <input type="text" placeholder="Any other phone Number?" name="phone2" class="form-control">
                  </div></div>

                 </div>
                 
              <div class="form-row">
                <div class="form-group" style="padding: 20px;">
                     <button type="submit" class="btn btn-primary">SAVE</button>
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel </button>
                </div>
              </div>
          </div>
        </div>
      </form> 
      </div>

@endsection