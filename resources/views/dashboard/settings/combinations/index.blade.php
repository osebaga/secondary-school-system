@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} | Index</title>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">Combinations </h2>
                @can('institutions-create')
                <div class="boxpane-icon">
                    <a href="#" class="btn btn-sm btn-primary p-1 m-1"
                       id="resource-combination-add-button"> <i class="fa fa-pencil"></i> Add Combination</a>
                </div>
                @endcan
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">@lang('app.intro-text')</p>
                    <div class="table-responsive">
                        <table id="combTable" class="table table-bordered table-hover" style="width: 100%;">
                           <thead>
                           <tr>
                               <th>Programme</th> 
                               <th>Combination Code</th>
                               <th>Combination Name</th> 
                               <th>Action</th>
                           </tr>
                           </thead>
                            <tbody>
                                @foreach ($combinations as $combination)
                                <tr>
                                    <td>{{$combination->programs->program_name}}</td>
                                    <td>{{$combination->combination_code}}</td>
                                    <td>{{$combination->description}}</td>
                                    <td><a style="  text-decoration: underline;" href="{{ route('combination.courses', [ 'id' => $combination->id ]) }}">Add Courses</a></td>
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

@section('modals')
    @include('dashboard.settings.combinations.modals.comb_modal')
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/custombox.min.css')}}">

@endsection
@section('scripts')

    <script src="{{asset('assets/dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>


    <script type="text/javascript">

        $(document).ready(function () {
            $('#combTable').DataTable({
                processing: true,
                // serverSide: true,
                // ajax: '{{route('combinations.get-combinations')}}',
                // columns: [
                //     {data: 'id', name: 'id'},
                //     {data: 'institution_name', name: 'institution_name'},
                //     {data: 'institution_acronym', name: 'institution_acronym'},
                //     {data: 'action', name: 'action', orderable: false, searchable: false}
                // ]
            });
        })
    </script>


@endsection
