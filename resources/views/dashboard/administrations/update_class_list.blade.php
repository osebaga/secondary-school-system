@extends('layouts.dashboard')

@section('title-content')
    <title>{{ config('app.name') }} | Updated Students</title>
@endsection


@section('content')



    <section class="content">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    {{-- Registered Students-<b class="black"> [{{$campus->campus_name}}]</b> --}}
                </h2>

                <div class="boxpane-icon">

                </div>
            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">
                            Use the filter below to Update the students to another class.
                        </p>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                {{-- <div class="icheck-primary m-3 pull-right">
                                    {{Form::checkbox('admission-filter',old('admission-filter'),null,['id'=>'admission-filter'])}}
                                    {!! Form::label('admission-filter','Filter For Student') !!}

                                </div> --}}
                            </div>
                        </div>


                        <div class="center showgo">
                            <form action="{{ route('get.class.lists') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="campus"><b>School</b></label>
                                        <select class="form-control campus_id" name="campus_id">
                                            <option value="">Select School </option>
                                            @foreach ($campus as $c)
                                                <option value="{{ $c->id }}">{{ $c->campus_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- <div class="col-md-3">
                                    <label for="faculty_id"><b>Faculty</b></label>
                                    <select class="form-control dependants faculty_id" name="faculty_id">
                                        <option value="">Select Faculty </option>
                                    </select>
                                   </div> --}}

                                    {{-- <div class="col-md-3">
                                    <label for="faculty_id"><b>Program Type</b></label>
                                    <select class="form-control dependants program_type" name="program_type">
                                        <option value="">Select Type</option>
                                    </select>
                                   </div> --}}

                                    <div class="col-md-3">
                                        <label for="program_id"><b>Program</b></label>
                                        <select class="form-control program_id" name="program_id">
                                            <option value=""> Select Program </option>
                                            @foreach ($programs as $pr)
                                                <option value="{{ $pr->id }}">{{ $pr->program_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="campus"><b>Class Category</b></label>
                                        <select class="form-control" name="intake_category_id">
                                            <option value=""> Select class </option>
                                            @foreach ($intakes as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="campus"><b>Year</b></label>
                                        <select class="form-control" name="year_id">
                                            <option value="">Select Year</option>
                                            @foreach ($years as $c)
                                                <option value="{{ $c->id }}">{{ $c->year }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- <div class="col-md-3">
                                                <label for="year_of_study"><b>Year Of Study</b></label>
                                                    <select class="form-control" name="year_of_study">
                                                        <option value=""update-c>Select Year of Study</option>
                                                        <option value="1">First Year</option>
                                                        <option value="2">Second Year</option>
                                                        <option value="3">Third Year</option>
                                                    </select>
                                            </div> --}}

                                    <div class="col-md-2" style="margin-top: 2.2%">

                                        <button type="submit" class="btn btn-primary btn-sm go">Seach</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <br>


                        <div class="table-responsive">
                            @if (session('students'))
                                <hr>


                                <div class="center  showto">
                                    <form action="{{ route('register.class.lists') }}" method="POST" role="form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h3 class="text-center" style="margin-top:50px; color:green "><b>Update
                                                        Students Class To</b> </h3>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="campus"><b>Class Group</b></label>
                                                <select class="form-control" name="class_group">
                                                    <option value=""> Select class </option>
                                                    @foreach ($intakes as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="year_id"><b>Year</b></label>
                                                <select class="form-control" name="year_id">
                                                    <option>Select Year</option>
                                                    @foreach ($years as $c)
                                                        <option value="{{ $c->id }}">{{ $c->year }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-primary btn-sm to"
                                                    style="margin-top:35px;">Update</button>
                                            </div>
                                        </div>

                                </div>
                                <br>
                                <div class="text-center">
                                    <a href="#" class="btn btn-primary btn-sm checkall">check all</a>
                                    <a href="#" class="btn btn-primary btn-sm uncheckall">uncheck all</a>
                                </div>
                                <div class="">
                                    <table class="tablex table-bordered table-hover table-striped table-responsive-sm"
                                        style="width: 100%;" id="">
                                        <thead>
                                            <tr>
                                                <th style="width:20px">S/No</th>
                                                <th>Select</th>
                                                <th>Student Name</th>
                                                <th>RegNo</th>
                                                <th>Program</th>
                                                <th>Class Group</th>
                                                <th>School</th>
                                                <th>Year</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @if (session()->has('students') && count(session('students')) > 0)
                                                @foreach (session('students') as $s)
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td>
                                                            <input type="checkbox" name="id[]"
                                                                value="{{ $s->reg_no }}">
                                                        </td>
                                                        <td>{{ $s->first_name . '  ' . $s->last_name }}</td>
                                                        <td>{{ $s->reg_no }}</td>
                                                        <td>{{ $s->program->program_acronym }}</td>
                                                        <td>{{ $s->intake_category->name }}</td>
                                                        <td>{{ SRS::school_name($s->campus_id) }}</td>
                                                        <td>{{ SRS::year($s->year_id) }}</td>

                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="9" class="text-center">
                                                        <div class="alert alert-warning">No Data Found</div>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                            @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('scripts')
    <script src="{{ asset('assets/dashboard/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        $('#tab_semII').DataTable({});

        $(document).ready(function() {
            // Check All
            $('.checkall').click(function() {
                $(":checkbox").attr("checked", true);
            });
            // Uncheck All
            $('.uncheckall').click(function() {
                $(":checkbox").attr("checked", false);
            });

            //populating select-inputs
            $(document).on('change', '.campus_id', function() {
                $('.dependants').find('option:not(:first)').remove();
                var campus_id = this.value;
                console.log(campus_id);

                if (campus_id > 0) {
                    $.ajax({
                        'url': '/get-faculties/' + campus_id,
                        success: function(data) {
                            // console.log(data);
                            options = '';
                            data.forEach(function(item) {
                                options += '<option value="' + item.id + '">' + item
                                    .faculty_name + '</option>';
                            });
                            console.log(options);
                            $('.faculty_id').append(options);
                        }
                    });
                }
            })

            $(document).on('change', '.faculty_id', function() {
                $('.dependants:not(:nth-child(1)):not(:nth-child(2))').find('option:not(:first)').remove();
                var faculty_id = this.value;
                console.log(faculty_id);

                if (faculty_id > 0) {
                    $.ajax({
                        'url': '/get-program-types/' + faculty_id,
                        success: function(data) {
                            console.log(data);
                            options = '';
                            data.forEach(function(item) {
                                options += '<option value="' + item.program_type +
                                    '">' + item.program_type + '</option>';
                            });
                            console.log(options);
                            $('.program_type').append(options);
                        }
                    });
                }
            })

            $(document).on('change', '.program_type', function() {
                $('.dependants:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3))').find(
                    'option:not(:first)').remove();
                var program_type = this.value;
                console.log(program_type);

                if (program_type != "") {
                    $.ajax({
                        'url': '/get-programs/types/' + program_type,
                        success: function(data) {
                            console.log(data);
                            options = '';
                            data.forEach(function(item) {
                                options += '<option value="' + item.id + '">' + item
                                    .program_acronym + '</option>';
                            });
                            console.log(options);
                            $('.program_id').append(options);
                        }
                    });
                }
            })

        });
    </script>
@endsection
