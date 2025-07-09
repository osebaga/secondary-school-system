@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Program | Subject</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Programme : <strong class="black">{!! is_null($program) ? '<span class="alert-danger">No Program configured for '.(SRS::year_level($yr,$study_level)):$program->program_name.' '.(SRS::year_level($yr,$study_level)) ?? '' ." - ".(SRS::year_level($yr,$study_level))  !!} </strong>

                    </h2>

                    <div class="boxpane-icon">

                            @if(!is_null($program))

                                    <a href="{{route('program.subjects.create',[SRS::encode($program->id),SRS::encode($yr)])}}" class="btn btn-sm btn-primary p-1 m-1">
                                        <i class="fa fa-plus-circle"></i>
                                        {{"Add new Subject"}}
                                    </a>

                            @endif

                    </div>
                </div>

                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                           
                            @if(is_null($program))
                            <p class="introtext">
                                <b class="alert-danger"> Please config Program for this year!!!</b>
                            </p>
                            @endif
                            <div class="table-responsive">
                                @if(!empty($courses_sem1))
                                <table  id="sem1Table" class="table table-bordered table-hover table-striped" style="width: 100%;">
                                   <thead>
                                   <tr class="page-title-box">
                                       <th>Subject Code</th><th>Subject Name</th><th>Teacher</th>
                                       {{-- <th>Unit</th> --}}<th>Core</th><th>Actions</th>
                                   </tr>
                                   </thead>
                                    <tbody>
                                    <tr ><td colspan="9" class="text-center"><strong><i>{{(SRS::year_level($yr,$study_level))}}</i></strong></td></tr>

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
                                                <span class="alert-danger">{{'No Teacher Assigned'}}</span>
                                            @endif
                                        </td>
                                        {{-- <td>{{$course->unit}}</td> --}}
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
                                        Info! No Subjects available.
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
