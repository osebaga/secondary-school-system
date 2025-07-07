@extends('layouts.dashboard')


@section('title')
    Update Student Remark
@endsection

@section('content')
 
 
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="boxpane">
                    <div class="boxpane-header">
                        <h2 class="blue">
                            Update Student Remark
                        </h2>
                    </div>
                    <div class="boxpane-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table table-responsive justify-content-center">
                                    <div class="card" style="width: 50rem;">
                                        <div class="card-header"> </div>
                                        <div class="card-body">
    
                                            <form class="" action="{{ route('dashabord.administration.update_student_remark') }}" method="POST">
                                                @csrf

                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Student RegNo:</label>
                                                    <div class="col-sm-10">
                                                   <input type="text" class="form-control " name="reg_no" value="" id="search">
                                                   <p id="display"></p>
                                                    </div>
                                                </div>
                                                 
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Semester:</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="Semester"
                                                            id="exampleFormControlSelect1">
                                                            <option value="">--Select semester--</option>
                                                            @foreach ($semester as $y)
                                                                <option value="{{ $y->semester }}" selected>
                                                                    {{ $y->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Academic
                                                        Year:</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="AYear"
                                                            id="exampleFormControlSelect1">
                                                            <option value="">--Select Year --</option>
                                                            @foreach ($years as $y)
                                                                <option value="{{ $y->id }}">{{ $y->year }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                 
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Remark:</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control tag" name="Remark"
                                                            id="exampleFormControlSelect1">
                                                            <option value="">--Select Remark --</option>
                                                            @foreach ($remark as $y)
                                                                <option value="{{ $y->Remark}}">{{ $y->Description }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-12 ">
                                                        <button type="submit" 
                                                        class="btn btn-primary pull-left">Save</button>
            
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


    </div>
@endsection
@section('modals')

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/custombox.min.css')}}">
    
@endsection
@section("scripts")
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/custombox.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/legacy.min.js')}}"></script>
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
  

<script type="text/javascript">

    var route = "{{ route('autocomplete') }}";
    $('#search').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                 });
            }
        });

</script>
@endsection
