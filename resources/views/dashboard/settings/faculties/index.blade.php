@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Faculties</title>

@endsection


@section('content')

    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Faculty </h2>

                <div class="boxpane-icon">
                    <a href="#" data-url="{{route('faculties.create')}}" class="btn btn-sm btn-primary p-1 m-1"
                       id="resource-faculty-add-button"> <i class="fa fa-pencil"></i> Add Faculty</a>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">@lang('app.intro-text')</p>
                    <div class="table-responsive">
                        <table id="factTable" class="table table-bordered table-hover" style="width: 100%;">
                           <thead>
                           <tr>
                                   <th>Institution Name</th>
                                   <th>Faculty Name</th>
                                   <th>Faculty Acronym</th>
                                   <th>Campus</th> 
                                   <th>Actions</th>
                           </tr>
                           </thead>
                            <tbody>

                            <?php $i=1;?>
                            @foreach($campuses as $campus)
                                <tr>
                                    @if(count($campus->faculties)>0)
                                        <th rowspan="{{count($campus->faculties)+1}}">
                                            {{$campus->institution->institution_name ?? ''}}
                                        </th>
                                    @else
                                        <th rowspan="2">{{$campus->campus_name}}</th>
                                    @endif

                                </tr>

                                @forelse($campus->faculties as $f)
                                    <tr>
                                        <td >{{$f->faculty_name}}</td>

                                        <td>{{$f->faculty_acronym}}</td>
                                        <td>{{$f->campus->campus_name ?? ''}}</td>
                                        <td>
                                            <?php
                                            $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-faculty-edit-button" data-url="' . route('faculties.edit', $srs->encode($f->id)) . '"');
                                            $delete_link = "<a href='#' class='po' title='<b>" . ("Delete  =>" . $f->faculty_name) . "</b>' data-content=\"<p>"
                                                . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('faculties.destroy', $srs->encode($f->id)) . "'>"
                                                . trans('app.i_m_sure') . "</a> <a href='#' class='btn po-close btn-primary'>" . trans('app.no') . "</a>\"  rel='popover'><i class=\"fa fa fa-trash-o pl-2 red\"></i> "
                                                . "</a>";
                                            $action = html_entity_decode($edit_link) . html_entity_decode($delete_link);
                                            ?>
                                            {!! $action !!}
                                        </td>


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="bg-inverse white">{{"No Faculties"}}</td>
                                    </tr>
                                @endforelse
                                <?php $i++?>
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

@section('modals')
    @include('dashboard.settings.faculties.modals.faculty_modal')
@endsection
@section('css')
    {{-- <link rel="stylesheet" href="{{asset('assets/dashboard/css/custombox.min.css')}}"> --}}
@endsection
@section('scripts')
   {{--  <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/custombox.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/modal/legacy.min.js')}}"></script> --}}

    <script type="text/javascript">

        $(document).ready(function () {

            {{--    $('#factTable').DataTable({--}}
            {{--        processing: true,--}}
            {{--        serverSide: true,--}}
            {{--        ajax: '{{route('faculties.get-faculties')}}',--}}
            {{--        columns: [--}}
            {{--            {data: 'id', name: 'id'},--}}
            {{--            {data: 'faculty_name', name: 'faculty_name'},--}}
            {{--            {data: 'faculty_acronym', name: 'faculty_acronym'},--}}
            {{--            {data: 'campus_id', name: 'campus_id'},--}}
            {{--            {data: 'action', name: 'action', orderable: false, searchable: false}--}}
            {{--        ]--}}
            {{--    });--}}
        

            $(document).on('change','.institution',function(){
                $('#campus_id').empty();
                var institution_id = this.value;
                // console.log(institution_id);
                if(institution_id >0){
                    $.ajax({
                        'url':'/get-campuses/'+institution_id,
                        success:function(data){
                          // console.log(data);
                           options = '<option></option>';
                           data.forEach(function(item){
                              options += '<option value="'+item.id+'">'+item.campus_name+'</option>'
                           });
                          // console.log(options);
                          $('#campus_id').append(options);
                    }
                });
                }
             })
        });
    </script>


@endsection
