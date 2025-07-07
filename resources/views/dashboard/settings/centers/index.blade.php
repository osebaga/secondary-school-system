@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Center </h2>
               @can('center-create')
                <div class="boxpane-icon">
                    <a href="#" data-url="{{route('center.create')}}" class="btn btn-sm btn-primary p-1 m-1"
                       id="resource-center-add-button"> <i class="fa fa-pencil"></i> Add New Center</a>
                </div>
                @endcan
            </div>
            
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">@lang('app.intro-text')</p>
                    <div class="table-responsive">
                        <table id="CenterTable" class="table table-bordered table-hover" style="width: 100%;">
                           <thead>
                           <tr>
                               <th>campus Name</th>   
                               <th>Center Name</th> 
                               <th>Center Address</th>
                               <th>Center Telephone</th> 
                               <th>Center Email</th>
                               <th>Action</th>
                           </tr>
                           </thead>
                            <tbody>

                            <?php $i=1;?>
                            @foreach($campuses as $campus)
                                <tr>
                                    @if(count($campus->centers)>0)
                                        <th rowspan="{{count($campus->centers)+1}}">
                                            {{$campus->campus_name}}
                                        </th>
                                    @else
                                        <th rowspan="2">{{$campus->campus_name}}</th>
                                    @endif

                                </tr>

                                @forelse($campus->centers as $c)
                                    <tr>
                                        <td>

                                            {{$c->center_name}}

                                        </td>
                                        <td>{{$c->address}}</td>
                                        <td>{{$c->telephone}}</td>
                                        <td>{{$c->email}}</td>

                                        <td>
                                           <?php
                                           $edit_link ="";
                                           $delete_link ="";
                                           if (Gate::allows('center-edit')) {
                                            $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-center-edit-button" data-url="' . route('center.edit', SRS::encode($c->id)) . '"');

                                           }

                                            if (Gate::allows('center-delete')) {
                                                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete  =>" . $c->Center_name) . "</b>' data-content=\"<p>"
                                                . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('center.destroy', SRS::encode($c->id)) . "'>"
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
                                        <td colspan="2" class="bg-inverse white">{{"No Data"}}</td>
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
    @include('dashboard.settings.centers.modals.center_modal')
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/custombox.min.css')}}">

@endsection
@section('scripts')
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/custombox.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/legacy.min.js')}}"></script>
@endsection
