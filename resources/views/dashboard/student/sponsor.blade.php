@extends('layouts.app')
<!-- Bootstrap core CSS -->
@section('content')
    <div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
        <div class="row">
            <div class="col-md-8">
        <div class="box" >
            <div class="box-header"> Student's Sponsor Details   @if($sponsor)
                <a href="" class="btn  pull-right btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalsponsorForm"
                   style="color: #008000;"> <b>Update</b>
                </a> @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="padding: 20px;" >
                @if($sponsor)
                   <table class="table table-hover">
                         <tbody>
                  @if($sponsor->sponsor_type=='institute' &&  ($sponsors->count()>0))
                      @php  $checsp = $sponsors->where('sponsorId',$sponsor->sponsorId)->first();
                      @endphp
                      @if($checsp)
                        <tr><td>Sponsor</td><td>{{$checsp->sponsorname}}</td></tr>
                         <tr><td>Address</td><td>{{$checsp->address}}</td></tr>
                          <tr><td>Comment</td><td>{{$checsp->comment}}</td></tr>
                      @endif
                  @else
                      <tr><td>Name</td><td>{{$sponsor->name}}</td></tr>
                      <tr><td>Perment Address</td><td> {{$sponsor->address}}</td></tr>
                      <tr><td>Phone</td><td>{{$sponsor->phone}}</td></tr>
                      <tr><td>Email</td><td>{{$sponsor->email}}</td></tr>
                  @endif
                      </tbody>
                    </table>
                @else
                 <form method="POST" action="{{url('sponsor-info')}}">
                     @csrf
                    <input value="{{$regno}}"  name="regno" hidden>
                     @if($sponsors->count()>0)
                       <input name="sponsor_type" hidden  value="institute">
                        <div class="row">
                          <p><strong>FOR : Sponsored by Institute</strong> <br> (<i>If not sponsed skip this selection</i>)</p> </div>
                             <div class="col-md-6">
                               <div class="form-group">
                                  <select class="form-control" name="sponsorId">
                                      <option value="">--select sponsor--</option>
                                      @foreach($sponsors as $spons)
                                      <option value="{{$spons->sponsorId}}"> {{$spons->sponsorname}} </option> 
                                      @endforeach
                                  </select>
                                 </div>
                             </div>
                       <div class="col-md-6">
                      <div class="form-group">
                          <button class="btn btn-sm btn-primary">Save</button>
                      </div> </div> @else <p>No Sponsor updated</p>@endif
               </form>

               <hr>

               <form method="POST" action="{{url('sponsor-info')}}">
                     @csrf
                    <input value="{{$regno}}"  name="regno" hidden>
                    <input name="sponsor_type" hidden  value="private">
                    <div class="row">
                        <p><strong>FOR : Private</strong> <br> (<i>For Non-sponsed</i>)</p>
                    </div>
                        <div class="form-group">
                             <div class="col-md-12">
                            <p style="float: left; font-family: sans-serif;">Sponsor Full Name</p>
                            <input type="text" class="form-control" placeholder="Baraka Malongo" name="name"></div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Address</p>
                            <input type="text" placeholder="Address" class="form-control" id="address" name="address" >
                          </div>
                            <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Occupation</p>
                            <input type="text" placeholder="Occupation" class="form-control" id="occupation" name="occupation">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Phone Number </p>
                            <input type="text" placeholder="Phone" class="form-control" id="phone" name="phone">
                          </div>
                           <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Email </p>
                            <input type="email" class="form-control" placeholder="E-Mail" id="email" name="email" >
                          </div>
                        </div>
                      <div class="col-md-8">
                        <div class="form-group" style="padding-top: 20px;">
                            <button class="btn btn-sm btn-primary">Save</button>
                        </div>
                      </div>
               </form>
            @endif
               
            </div>
        </div>

        @if($sponsor)
        <div class="modal fade" id="modalsponsorForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <form class="modal-dialog"  role="form" method="POST" action="{{url('student-sponsors')}}">
                {{ csrf_field() }} {{method_field('patch')}}
                <input name="sponsor" value="{{$sponsor->id}}" hidden>
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Update sponsor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body" style="padding: 20px;">
                        @if($sponsor->sponsor_type=='institute' &&  ($sponsors->count()>0))
                         <div class="col-md-12">
                           <div class="form-group">
                              <select class="form-control" name="sponsorId">
                                  <option value="">--select sponsor--</option>
                                  @foreach($sponsors as $spons)
                                  <option value="{{$spons->sponsorId}}"> {{$spons->sponsorname}} </option> 
                                  @endforeach
                              </select>
                             </div>
                         </div>
                        @else
                          <div class="col-md-12">
                        <div class="form-group">
                             <div class="col-md-12">
                            <p style="float: left; font-family: sans-serif;">Sponsor Full Name</p>
                            <input type="text" class="form-control" placeholder="Baraka Malongo" value="{{$sponsor->name}}" name="name"></div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Address</p>
                            <input type="text" placeholder="Address" class="form-control"  value="{{$sponsor->address}}" id="address" name="address" >
                          </div>
                            <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Occupation</p>
                            <input type="text" placeholder="Occupation" class="form-control"  value="{{$sponsor->occupation}}" id="occupation" name="occupation">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Phone Number </p>
                            <input type="text" placeholder="Phone" class="form-control" id="phone"  value="{{$sponsor->phone}}" name="phone">
                          </div>
                           <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Email </p>
                            <input type="email" class="form-control" placeholder="E-Mail"  value="{{$sponsor->email}}" id="email" name="email" >
                          </div>
                        </div>
                      </div>
                        @endif
                        <div class="text-center" style="padding: 40px;">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                  </div>
            </form>
        </div>
        @endif

            </div>
        </div>
</div>


@endsection