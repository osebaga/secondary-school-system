@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Program Schools| Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">        <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Publish Exams By programmes -Intake of [{{$intake->name}}]
                    </h2>
                    <div class="boxpane-icon">
                        <a class="btn btn-sm btn-primary p-1 m-1" href="{{ url()->previous() }}"><i
                                    class="fa fa-arrow-circle-left"></i> Back</a>
                    </div>

                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">
                                The following is the list of Faculty(s) and Programme(s) available click faculty name to continue
                            </p>
                            <div class="table-responsive">
                                <table id="campusTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Faculty Name</th>
                                        <th>Programme Name</th>
                                        <th>Semester I</th>
                                        <th>Semester II</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;?>
                                    @foreach($module_programs as $f)
                                        <tr>
                                            @if(count($f->programs)>0)
                                                <th rowspan="{{count($f->programs)+1}}">
                                                    {{$f->faculty_name}}
                                                </th>
                                            @else
                                                <th rowspan="2">{{$f->faculty_name}}</th>
                                            @endif
                                        </tr>

                                        @forelse($f->programs as $p)
                                        <?php
                                           $sem1_published=  SRS::checkPublishedExamStatus($campus_id,$intake_id,$p->id,1,$year_id,1);
                                           $sem2_published= SRS::checkPublishedExamStatus($campus_id,$intake_id,$p->id,2,$year_id,1);

                                            ?>
                                            <tr>
                                                <td >
                                                    {{$p->program_name}}
                                                </td>
                                                <td>
                                                @if(is_null($sem1_published))
                                                {!! Form::open(['route' => 'administrations.publishExamSemOne','method'=>'POST','role' => 'form']) !!}
                                                {!! Form::hidden('program_id',SRS::encode($p->id)) !!}
                                                {!! Form::hidden('program_code',$p->program_code) !!}
                                                {!! Form::hidden('campus_id',SRS::encode($campus_id)) !!}
                                                {!! Form::hidden('intake_category_id',SRS::encode($intake_id)) !!}
                                                {!! Form::button('[Publish Exam]',['type'=>'submit','class'=>'btn btn-sm btn-primary p-2']) !!}
                                                {!! Form::close() !!}
                                                @else
                                                {!! Form::open(['route' => 'administrations.unPublishExamSemOne','method'=>'POST','role' => 'form']) !!}
                                                {!! Form::hidden('program_id',SRS::encode($p->id))!!}
                                                {!! Form::hidden('program_code',$p->program_code) !!}
                                                {!! Form::hidden('campus_id',SRS::encode($campus_id)) !!}
                                                {!! Form::hidden('intake_category_id',SRS::encode($intake_id)) !!}
                                                {!! Form::button('[Un-Publish Exam]',['type'=>'submit','class'=>'btn btn-sm btn-danger p-2']) !!}
                                                {!! Form::close() !!}
                                                @endif

                                                </td>
                                                <td>
                                                    @if(is_null($sem2_published))
                                                        {!! Form::open(['route' => 'administrations.publishExamSemTwo','method'=>'POST','role' => 'form']) !!}
                                                        {!! Form::hidden('program_id',SRS::encode($p->id)) !!}
                                                        {!! Form::hidden('program_code',$p->program_code) !!}
                                                        {!! Form::hidden('campus_id',SRS::encode($campus_id)) !!}
                                                        {!! Form::hidden('intake_category_id',SRS::encode($intake_id)) !!}
                                                        {!! Form::button('[Publish Exam]',['type'=>'submit','class'=>'btn btn-sm btn-primary p-2']) !!}
                                                        {!! Form::close() !!}
                                                    @else
                                                        {!! Form::open(['route' => 'administrations.unPublishExamSemTwo','method'=>'POST','role' => 'form']) !!}
                                                        {!! Form::hidden('program_id',SRS::encode($p->id))!!}
                                                        {!! Form::hidden('program_code',$p->program_code) !!}
                                                        {!! Form::hidden('campus_id',SRS::encode($campus_id)) !!}
                                                        {!! Form::hidden('intake_category_id',SRS::encode($intake_id)) !!}
                                                        {!! Form::button('[Un-Publish Exam]',['type'=>'submit','class'=>'btn btn-sm btn-danger p-2']) !!}
                                                        {!! Form::close() !!}
                                                    @endif

                                                </td>



                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="bg-inverse white">{{"No Program"}}</td>
                                            </tr>
                                        @endforelse
                                        <?php $i++?>
                                    @endforeach
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


