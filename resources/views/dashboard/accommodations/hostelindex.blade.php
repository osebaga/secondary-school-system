@extends('layouts.dashboard')

@section('title-content')

    <title>{{ config('app.name') }} Hostel Register| Index</title>

@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <div class="boxpane-icon">
                    <a href="{{route('register.hostel')}}" class="btn btn-sm btn-primary p-1 m-1">
                        <i class="fa fa-plus-circle"></i>
                        {{"Add Hostel"}}
                    </a>
                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">
                            The following is the list of hostels.
                        </p>
                           <div class="table-responsive">
                                <table  id="hostel" class="table table-bordered table-hover table-striped" style="width: 100%;">
                                    <thead>
                                    <tr class="">
                                        <th>SNo.</th>
                                        <th>Code</th>
                                        <th>Hostel Name</th>
                                        <th>Location</th>
                                        <th>Capacity</th>                            
                                        <th>Address</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($hostels as $h )
                                           <tr>
                                               <td>{{ $i++ }}</td>
                                               <td>{{ $h->code }}</td>
                                               <td>{{ $h->hostel_name }}</td>
                                               <td>{{ $h->location }}</td>
                                               <td>{{ $h->hostel_capacity }}</td>
                                               <td>{{ $h->address }}</td>
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
            $('#hostel').DataTable({
                processing: true,
                serverSide: false,
            });

         


        });
    </script>


@endsection
