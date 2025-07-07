@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }}Modules | register</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Student Module Registration
                </h2>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">Pick the below program to register modules to each student at once by pushing</p>
                    <div class="table-responsive">
                        <table id="courseTable" class="table table-striped table-bordered table-hover" style="width: 100%;">
                           <thead>
                           <tr>
                                <th>Programme Name</th>
                                <th>Action</th>
                           </tr>
                           </thead>
                            <tbody>
                                @foreach ($programs as $prog )
                                <tr>
                                    <td>{{ $prog->program_name}}</td>
                                    <td><a href="{{ route('students.pushcourse',$prog->id) }}" class="btn btn-success text-white">Register Courses</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

@section('scripts')
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>
@endsection
