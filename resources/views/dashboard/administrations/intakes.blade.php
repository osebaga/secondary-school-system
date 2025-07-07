@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Batches| Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                        Intake Category
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
                                The following is the list of Intake Category(s) available click batch name to get list of students
                            </p>
                            <div class="table-responsive">
                                <table id="batchTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Intake Category Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;?>
                                    @forelse($intakes as $intake)

                                        <tr>
                    <td>{{$i++}}</td>
                    <td >
                        @if($view == 'limit-upload')
                            {{link_to(route('administrations.limit-uploads',[$campus_id,SRS::encode($intake->id)]),$intake->name)}}
                        @elseif($view == 'publish-exam')
                            {{link_to(route('administrations.publish-exams',[$campus_id,SRS::encode($intake->id)]),$intake->name)}}
                        @elseif($view == 'limit-course-registration')
                            {{link_to(route('administrations.limitCourseRegistration',[$campus_id,SRS::encode($intake->id)]),$intake->name)}}

                        @elseif($view == 'vie1')
                        {{link_to(route('administrations.register-student-module',[$campus_id,SRS::encode($intake->id)]),$intake->name)}}
                        
                        {{-- @elseif($view == 'course_allocation')
                        {{link_to(route('courses.assign-course-staffs',[$campus_id,SRS::encode($intake->id)]),$intake->name)}}
                         --}}
                        @endif
                        
                        Intake
                    </td>



                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="bg-inverse white">{{"No Batches"}}</td>
                                        </tr>
                                    @endforelse
                                    <?php $i++?>
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

