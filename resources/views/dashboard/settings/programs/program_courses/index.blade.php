@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Program | Module</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Programme : <strong class="black">{!! is_null($program) ? '<span class="alert-danger">No Program configured for '.(SRS::year_level($yr)):$program->program_name ?? '' ." - ".(SRS::year_level($yr))  !!} </strong>

                    </h2>

                    <div class="boxpane-icon">

                            @if(!is_null($program))

                                    <a href="{{route('program-courses.create',[SRS::encode($program->id),SRS::encode($yr)])}}" class="btn btn-sm btn-primary p-1 m-1">
                                        <i class="fa fa-plus-circle"></i>
                                        {{"Add Semester Module"}}
                                    </a>

                            @endif

                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Static backdrop</h4>
                                <p class="sub-header">Examples of Static backdrop.</p>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Launch static backdrop modal
                                </button>
                                
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                    <div class="boxpane">
                                                        <div class="boxpane-header">
                                                            <h2 class="blue">
                                                                <b class="black">{{$program->program_name ?? ''}}</b>
                                                            </h2>
                                                        </div>
                                                        <div class="boxpane-content">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <p class="introtext">Assign New Module/course to {{$program->program_code ?? ''}} program</p>
                                                                    {!! Form::open(['route' => 'program-courses.store','class'=>'create-program-course','method'=>'POST','role' => 'form']) !!}
                                                                    {!! Form::hidden('program_id',$program->id) !!}
                                                                    {!! Form::hidden('year',$yr) !!}
                                            
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                            
                                                                            <div class="row">
                                                                                <div class="col-sm-5">
                                                                                    <div class="form-group">
                                            
                                                                                        {!! Form::select('course_id', $courses,null, $errors->has('course_id') ? ['class' => 'form-control is-invalid','id'=>'course_id'] : ['class' => 'form-control','id'=>'course_id']) !!}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group">
                                            
                                                                                        {!! Form::select('core', $course_options,null, $errors->has('core') ? ['class' => 'form-control is-invalid','id'=>'core'] : ['class' => 'form-control','id'=>'core']) !!}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group">
                                            
                                                                                        {!! Form::select('semester', $course_semester,null, $errors->has('semester') ? ['class' => 'form-control is-invalid','id'=>'semester'] : ['class' => 'form-control','id'=>'semester']) !!}
                                                                                    </div>
                                                                                </div>
                                            
                                            
                                                                                <div class="col-sm-1">
                                                                                    <div class="form-group">
                                                                                        {{Form::button('Save Data',['type'=>'submit','class'=>'btn btn-success  pull-right'])}}
                                                                                    </div>
                                                                                </div>
                                            
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{Form::close()}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Understood</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                           
                            @if(is_null($program))
                            <p class="introtext">
                                <b class="alert-danger"> Please config Program  for this academic year!!!</b>
                            </p>
                            @endif
                            <div class="table-responsive">
                                @if(!empty($courses_sem1))
                                <table  id="sem1Table" class="table table-bordered table-hover table-striped" style="width: 100%;">
                                   <thead>
                                   <tr class="page-title-box">
                                       <th>Code</th><th>Course Name</th><th>Instructor</th><th>Credit</th><th>Core</th><th>Actions</th>
                                   </tr>
                                   </thead>
                                    <tbody>
                                    <tr ><td colspan="9" class="text-center"><strong><i>Semester 1</i></strong></td></tr>

                                    @foreach($courses_sem1 as $course)
                                    <tr>
                                        <td>{{$course->course_code}}</td>
                                        <td>{{$course->course_name}}</td>
                                        <td>
                                            @if($course->staffs->count() >0)

                                              @foreach($course->staffs as $staff)
                                              <span class="alert-success">
                                                {{ ($staff->user->last_name ?? '') . ', ' . ($staff->user->first_name ?? '') . ' ' . ($staff->user->middle_name ?? '') }}
                                            </span>
                                               @endforeach
                                            @else
                                                <span class="alert-danger">{{'No Instructor Assigned'}}</span>
                                            @endif
                                        </td>
                                        <td>{{$course->unit}}</td>
                                        <td>{{SRS::course_option($course->pivot->core)}}</td>
                                        <td>

                                            <?php
                                            $edit_link=link_to(route('program-courses.edit',SRS::encode($course->pivot->id)),'<i class="fa fa-edit p-2" aria-hidden="true"></i>Edit');

                                            $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Course from This Program") . "</b>' data-content=\"<p>"
                                                . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" .route('program-courses.destroy',SRS::encode($course->pivot->id)) . "'>"
                                                . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o red p-2\"></i>Delete "
                                            ."</a>";

                                            echo html_entity_decode($edit_link).html_entity_decode($delete_link);
                                            ?>
                                        </td>
                                    </tr>

                                    @endforeach



                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                                @else
                                    <div class="alert alert-warning alert-dismissable">
                                        Info! No courses available for Semester One
                                    </div>


                                @endif


                            </div>
                            <div class="table-responsive mt-5">
                                @if(!empty($courses_sem2))
                                <table  id="sem2Table" class="table table-bordered table-hover table-striped" style="width: 100%;">
                                    <thead>
                                    <tr class="page-title-box">
                                        <th>Code</th><th>Course Name</th><th>Instructor</th><th>Credit</th><th>Core</th><th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ><td colspan="8" class="text-center"><strong><i>Semester 2</i></strong></td></tr>

                                    @foreach($courses_sem2 as $course)
                                        <tr>
                                            <td>{{$course->course_code}}</td>
                                            <td>{{$course->course_name}}</td>
                                            <td>
                                                @if($course->staffs->count() >0)
                                                    <span class="alert-success"> {{'Instructor Assigned'}}</span>
                                                @else
                                                    <span class="alert-danger">{{'No Instructor Assigned'}}</span>
                                                @endif
                                            </td>
                                            <td>{{$course->unit}}</td>
                                            <td>{{SRS::course_option($course->pivot->core)}}</td>
                                            <td>
                                                <?php
                                                $edit_link=link_to(route('program-courses.edit',SRS::encode($course->pivot->id)),'<i class="fa fa-edit p-2" aria-hidden="true"></i>Edit');

                                                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Course from This Program") . "</b>' data-content=\"<p>"
                                                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" .route('program-courses.destroy',SRS::encode($course->pivot->id)) . "'>"
                                                    . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o red p-2\"></i>Delete "
                                                    ."</a>";

                                                echo html_entity_decode($edit_link).html_entity_decode($delete_link);
                                                ?>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                                @else
                                    <div class="alert alert-warning alert-dismissable">
                                        Info! No courses available for Semester Two
                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('loginAssets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('loginAssets/js/app.min.js') }}"></script>

<script>
    $('#sem3Table').dataTable();
</script>

@endsection
