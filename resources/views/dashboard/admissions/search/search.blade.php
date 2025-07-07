    @extends('layouts.dashboard')


    @section('title')
        Search Student Record
    @endsection

    @section('content')
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="boxpane">
                        <div class="boxpane-header">
                            <h2 class="blue">Student Record</h2>
                        </div>
                        <div class="boxpane-content">
                            {!! Form::open([
                                'route' => 'admissions.student-search',
                                'class' => 'search-student',
                                'method' => 'POST',
                                'role' => 'form',
                            ]) !!}


                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::text(
                                        'search',
                                        old('search'),
                                        $errors->has('search')
                                            ? ['placeholder' => 'Search Student.', 'class' => 'form-control is-invalid', 'id' => 'search']
                                            : ['placeholder' => 'Search Student', 'class' => 'form-control', 'id' => 'search'],
                                    ) !!}
                                </div>
                                <div class="col-md-1">
                                    {!! Form::button('Search', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm pull-right']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}

                            
                            <div class="row" style="margin-top: 5%">
                                @if (!is_null($result))
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Registration Number</th>
                                                <th>Sex</th>
                                                <th>Programme</th>
                                                <th>Entry Year</th>
                                                {{-- <th>INVOICE</th>
                                    <th>PAID</th>
                                    <th>BALANCE</th> --}}
                                                @if (Auth::user()->roles()->first()->name == 'AdmissionOfficer')
                                                    <th>Action</th>
                                                @endif
                                                <!--<th>ACTION</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!is_null($result))
                                                @foreach ($result as $k => $r)
                                                    <tr>
                                                        <td>{{ ++$k }}</td>
                                                        <td>{{ $r['name'] }}</td>
                                                        <td>{{ $r['sex'] }}</td>
                                                        <td>{{ $r['program'] }}</td>
                                                        <td>{{ $r['entryYear'] }}</td>
                                                        {{-- <td></td>
                                    <td></td>
                                    <td></td> --}}
                                                        @if (Auth::user()->roles()->first()->name == 'AdmissionOfficer')
                                                            <td><a class="rounded-circle thumb-sm"
                                                                    href="{{ route('student-panel.students.profile', ['user_id' => SRS::encode($r['user_id']), 'id' => SRS::encode($r['id'])]) }}">View
                                                                    Profile</a></td>
                                                        @endif
                                                        {{-- <img class="rounded-circle thumb-sm" src="{{$r['photo']}}"></td> --}}
                                                        {{-- <td>
                                        {!!  html_entity_decode(link_to(route('admissions.show', SRS::encode($r['id'])), '<i class="fa fa-2x fa-pencil" aria-hidden="true"></i>'))!!}
                                    </td> --}}
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                @else
                                    @if ($isSearchRequested)
                                        <div class="alert alert-info col-12">
                                            No. Record Found
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    @endsection
    @section('modals')
    @endsection
    @section('css')
        <link rel="stylesheet" href="{{ asset('assets/dashboard/css/custombox.min.css') }}">
    @endsection
    @section('scripts')
        <script src="{{ asset('assets/dashboard/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/modal/custombox.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/modal/legacy.min.js') }}"></script>

        <script type="text/javascript">
            var coursesTable = $('#coursesTable').DataTable({
                processing: true,
                serverSide: false,
                language: {
                    sLoadingRecords: '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>'
                },

            })
        </script>
    @endsection
