
@extends('layouts.app')

<!-- Bootstrap core CSS -->
@section('content')

<div class="content" style="margin-right: 20px; margin-left: 20px;">   

@if (Session::has('error'))
              <div class="alert alert-error">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                  <p>{{ Session::get('error') }}</p>
              </div>
      @endif
      @if (Session::has('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
@endif

<div class="box" style="padding:20px">

<div class="box-header with-border">
  <h3 class="box-title">{{$student->surname}},  {{$student->firstname}}  {{$student->middlename}}</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" action="" method="get">
  <div class="box-body">
    <div class="form-group">

  </div>
  <!-- /.box-body -->

    <div class="box-footer text-center">

        <button type="submit" class="btn btn-default btn-rounded mb-4"  
        style="color: #008000;margin-left: 50px; ">
        <b> save </b></button>

      </div >
      
    </form>
    <!--end of form-->
</div >


</div >

  </div>

@endsection