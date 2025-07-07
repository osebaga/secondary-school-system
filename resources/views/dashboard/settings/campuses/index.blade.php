@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">School </h2>
               @can('campus-create')
                <div class="boxpane-icon">
                    <a href="#" data-url="{{route('campus.create')}}" class="btn btn-sm btn-primary p-1 m-1"
                       id="resource-campus-add-button"> <i class="fa fa-pencil"></i> Add New School</a>
                </div>
                @endcan
            </div>
            
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">@lang('app.intro-text')</p>
                    <div class="table-responsive">
                        <table id="campusTable" class="table table-bordered table-hover" style="width: 100%;">
                           <thead>
                           <tr>
                               {{-- <th>Institution Name</th>    --}}
                               <th>School Name</th> 
                               <th>School Acronym</th>
                               <th>Actions</th>
                           </tr>
                           </thead>
                            <tbody>

                            <?php $i=1;?>
                            @foreach($institutions as $institution)
                                {{-- <tr>
                                    @if(count($institution->campuses)>0)
                                        <th rowspan="{{count($institution->campuses)+1}}">
                                            {{$institution->institution_name}}
                                        </th>
                                    @else
                                        <th rowspan="2">{{$institution->institution_name}}</th>
                                    @endif

                                </tr> --}}

                                @forelse($institution->campuses as $c)
                                    <tr>
                                        <td >

                                            {{$c->campus_name}}

                                        </td>
                                        <td>{{$c->campus_acronym}}</td>
                                        <td>
                                           <?php
                                           $edit_link ="";
                                           $delete_link ="";
                                           if (Gate::allows('campus-edit')) {
                                            $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-campus-edit-button" data-url="' . route('campus.edit', SRS::encode($c->id)) . '"');

                                           }

                                            if (Gate::allows('campus-delete')) {
                                                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete  =>" . $c->campus_name) . "</b>' data-content=\"<p>"
                                                . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('campus.destroy', SRS::encode($c->id)) . "'>"
                                                . trans('app.i_m_sure') . "</a> <a href='#' class='btn po-close btn-primary'>" . trans('app.no') . "</a>\"  rel='popover'><i class=\"fa fa fa-trash-o pl-2 red\"></i> "
                                                . "</a>";
                                            }
                                            $action = html_entity_decode($edit_link) . html_entity_decode($delete_link);
                                            ?>
                                            {!! $action !!}
                                        </td>


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="bg-inverse white">{{"No Schools"}}</td>
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

@section('modals')
    @include('dashboard.settings.campuses.modals.campus_modal')
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/custombox.min.css')}}">

@endsection
@section('scripts')
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/custombox.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/legacy.min.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            {{--$('#campusTable').DataTable({--}}
            {{--    processing: true,--}}
            {{--    serverSide: true,--}}
            {{--    ajax: '{{route('campus.get-campuses')}}',--}}
            {{--    columns: [--}}
            {{--        {data: 'id', name: 'id'},--}}
            {{--        {data: 'campus_name', name: 'campus_name'},--}}
            {{--        {data: 'campus_acronym', name: 'campus_acronym'},--}}
            {{--        {data: 'institution_id', name: 'institution_id'},--}}

            {{--        {data: 'action', name: 'action', orderable: false, searchable: false}--}}
            {{--    ]--}}
            {{--});--}}
        })
    </script>


@endsection
