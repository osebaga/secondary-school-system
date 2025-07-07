@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Program</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="boxpane">
                <div class="boxpane-header">
                    <h2 class="blue">
                    Programme List
                    </h2>
                    <div class="boxpane-icon">


                        <a href="{{route('programs.create')}}" class="btn btn-sm btn-primary p-1 m-1">
                            <i class="fa fa-plus-circle"></i>
                            {{"Add New"}}
                        </a>


                        </ul>
                    </div>

                </div>
                <div class="boxpane-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="introtext">
                                The following is the list of Programmes available 
                            </p>
                            <div class="table-responsive">
                                <table id="campusTable" class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>SN</th> <th>Name</th><th>Duration</th><th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;?>
                                    @foreach($module_programs as $p)
                                   
                                   
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td>
                                                    {{$p->program_name}}
                                                </td>
                                                <td >
                                                    {{ $p->program_duration == 1 ? 'One Year' : 
                                                    ($p->program_duration == 2 ? 'Two Years' : 
                                                    ($p->program_duration == 3 ? 'Three Years' : '')) }}
                                                </td>
                                                <td>
                                                    <?php
                                                    $config_link = link_to(route('program-courses.program-config', SRS::encode($p->id)), '<i class="ion-android-settings p-2"></i>Add Semester Modules', 'class="sledit"');
                                                    $edit_link = link_to(route('programs.edit', SRS::encode($p->id)), '<i class="fa fa-edit  p-2"></i>', 'class="sledit"');
                                                    $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Program") . "</b>' data-content=\"<p>"
                                                        . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('programs.destroy', SRS::encode($p->id)) . "'>"
                                                        . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
                                                        . "</a>";
                                                    $action = html_entity_decode($config_link).html_entity_decode($edit_link) . html_entity_decode($delete_link);
                                                    ?>
                                                    {!! $action !!}
                                                </td>
                                            </tr>
                                      
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

@section('scripts')
    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

        })
    </script>


@endsection
