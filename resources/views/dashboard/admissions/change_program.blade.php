@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Dash Index</title>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Changing Programme for :<b class="black">{{$student->user->last_name.', '.$student->user->first_name.' '.$student->user->middle_name.'('.$student->reg_no.')'}}</b>
                    </h2>

                    <div class="boxpane-icon">
                        <ul class="btn-tasks">
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="#">
                                    <i class="icon fa fa-tasks3" data-placement="left"
                                       title="{{"Actions"}}"></i>
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">
                                Here below is the list of information of the student to be edited,please you can edit the information,then click the button save to save changes or cancel to go back.
                            </p>
                            <div class="col-md-12">
                                {!! Form::model($student, ['method' => 'PATCH','route' => ['admissions.update-student.details', SRS::encode($student->user->id)]]) !!}
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    {!! Form::label('program_id','Select Programme') !!}
                                    {!! Form::select('program_id',$programs, null, array('id'=>'program_id','placeholder' => 'Select Program','class' => 'form-control')) !!}
                                </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 float-right">
                                    <div class="form-group">

                                        {!! html_entity_decode(link_to(route('admissions.student-info',[SRS::encode($student->user_id),SRS::encode($student->campus_id)]),'<span class="btn btn-lg btn-warning float-right p-2"><i class="fa fa-long-arrow-left " aria-hidden="true"></i>Cancel</span>')) !!}
                                        {!! Form::submit('Update',array('class' => 'btn btn-lg btn-primary float-right')) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#program_id').select2({
                //minimumResultsForSearch: -1,
                placeholder:  'Select Program',
            });
        });
     </script>
@endsection
