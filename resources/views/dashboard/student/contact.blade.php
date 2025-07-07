@extends('layouts.app')
<!-- Bootstrap core CSS -->
@section('content')
    <div class="container-fluid" style="margin-right: 20px; margin-left: 20px;">
        <div class="row">
            <div class="col-md-8">
        <div class="box" >
            <div class="box-header"> Student's Contact Details   @if($contact)
                <a href="" class="btn  pull-right btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm"
                   style="color: #008000;"> <b>Update</b>
                </a> @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="padding: 20px;" >
                @if($contact)
                    <table class="table table-hover">
                         <tbody>
                          <tr><td>Address</td><td>{{$contact->address}}</td></tr>
                          <tr><td>Perment Address</td><td> {{$contact->region}} - {{$contact->district}}</td></tr>
                          <tr><td>Phone</td><td>{{$contact->phone1}} - {{$contact->phone2}}</td></tr>
                          <tr><td>Email</td><td>{{$contact->email1}} - {{$contact->email2}}</td></tr>
                        </tbody>
                    </table>

                @else
                 <form method="POST" action="{{url('student-contacts')}}">
                     @csrf
                    <input value="{{$regno}}"  name="regno" hidden>
                        <div class="form-group">
                             <div class="col-md-12">
                            <p style="float: left; font-family: sans-serif;">Address</p>
                            <input type="text" class="form-control" placeholder="S.L.P. XXX" name="address"></div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Region</p>
                            <input type="text" class="form-control" id="region" required name="region" >
                          </div>
                            <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">District</p>
                            <input type="text" class="form-control" id="district" name="district">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Phone Number *</p>
                            <input type="text" class="form-control" id="phone1" required name="phone1">
                          </div>
                            <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Phone Number 2</p>
                            <input type="text" class="form-control" id="phone2" name="phone2">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Email *</p>
                            <input type="text" class="form-control" id="email1" required name="email1" >
                          </div>
                            <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Email 2</p>
                            <input type="text" class="form-control" id="email2" name="email2">
                          </div>
                        </div>
                        <div class="form-group" style="padding-top: 200px;">
                            <label>  - </label><br>
                            <button class="btn btn-sm btn-primary">Save</button>
                        </div>
                      

               </form>
            @endif
               
            </div>
        </div>

        @if($contact)
        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <form class="modal-dialog"  role="form" method="POST" action="{{url('student-contacts')}}">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Update Contacts</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body" style="padding: 20px;">
                          <input value="{{$regno}}"  name="regno" hidden>
                        <div class="form-group">
                             <div class="col-md-12">
                            <p style="float: left; font-family: sans-serif;">Address</p>
                            <input type="text" class="form-control" value="{{$contact->address}}" placeholder="S.L.P. XXX" name="address"></div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Region</p>
                            <input type="text" class="form-control" value="{{$contact->region}}" id="region" required name="region" >
                          </div>
                            <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">District</p>
                            <input type="text" class="form-control" value="{{$contact->district}}" id="district" name="district">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Phone Number *</p>
                            <input type="text" class="form-control" value="{{$contact->phone1}}" id="phone1" required name="phone1">
                          </div>
                            <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Phone Number 2</p>
                            <input type="text" class="form-control" value="{{$contact->phone2}}" id="phone2" name="phone2">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Email *</p>
                            <input type="text" class="form-control" value="{{$contact->email1}}" id="email1" required name="email1" >
                          </div>
                            <div class="col-md-6">
                                <p style="float: left; font-family: sans-serif;">Email 2</p>
                            <input type="text" class="form-control" value="{{$contact->email2}}" id="email2" name="email2">
                          </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <label> -</label> <br>
                        <button type="submit" class="btn btn-primary" style="width: 200px; height: 40px; margin-bottom: 10px;">Update</button>
                    </div>
            </form>
        </div>
        @endif

            </div>
        </div>
</div>


@endsection