@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Programs</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-8">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    Programme Details
                </h2>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext"></p>
                        <div class="table-responsive">
                            <table  id="cprTable" class="tablex table-bordered table-hover table-striped" style="width: 100%;">
                                <tbody>
                                <tr>
                                    <th>Title</th><td>{{$program->program_name}}</td>
                                </tr>
                                <tr>
                                    <th>Code</th><td>{{$program->program_code}}</td>
                                </tr>

                                <tr>
                                    <th>Type</th><td>{{$program->program_type}}</td>
                                </tr>
                                
                                <tr>
                                    <th>Short Name</th><td>{{$program->program_acronym}}</td>
                                </tr>
                                <tr>
                                    <th>Duration</th><td>{{$program->program_duration}}</td>
                                </tr>

                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-md-4">
        <div class="card">
            <div class="card-header">Year of Study Semester Module Configuration</div>
            <div class="card-body">
                <ul class="list-group-flush">
                    @for($i=1;$i<=$program->program_duration;$i++)
                    <li class="list-group-item">{!! html_entity_decode(link_to(route('program-courses.index',[SRS::encode($program->id),SRS::encode($i)]),(SRS::year_level($i)).' Modules'))!!}</li>
                    @endfor
                </ul>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>



@endsection
