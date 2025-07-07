@extends('layouts.dashboard')


@section('title')
    Upload Limit
@endsection

@section('content')
    <div class="content">

        <div class="row">
            <div class="col-12">
                <div class="boxpane">
                    <div class="boxpane-header">
                        <h2 class="blue">
                            Upload Limit-[{{ $campus->campus_name }}]-Intake of [{{ $intake->name }}]
                        </h2>

                        <div class="boxpane-icon">
                            <a class="btn btn-sm btn-primary p-1 m-1" href="{{ url()->previous() }}"><i
                                    class="fa fa-arrow-circle-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="boxpane-content">
                        <div class="row">
                            <div class="col-md-6 p-3">
                                <fieldset class="customLegend row">
                                    <legend>
                                        <h2 class="blue pb-0 mb-0">
                                            Semester (I) Upload</h2>
                                    </legend>
                                    <table class="table table-bordered table-striped" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Upload Status :</th>

                                                <th>
                                                    @if (is_null($sem1_upload))
                                                        Upload is currently closed
                                                    @else
                                                        Upload is currently opened
                                                    @endif

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td></td>
                                            <td>
                                                <ul class="list-group">
                                                    <li class="list-unstyled">
                                                        <span class="pull-left p-2">
                                                            @if (is_null($sem1_upload))
                                                                {!! Form::open([
                                                                    'route' => 'administrations.open-upload-sem-one',
                                                                    'class' => 'open-sem1-upload',
                                                                    'method' => 'POST',
                                                                    'role' => 'form',
                                                                ]) !!}
                                                                {!! Form::hidden('campus_id', $campus_id) !!}
                                                                {!! Form::hidden('intake_category_id', $intake_id) !!}
                                                                {!! Form::button('[Open Upload]', ['type' => 'submit', 'class' => 'btn btn-sm btn-primary p-2']) !!}
                                                                {!! Form::close() !!}
                                                            @else
                                                                {!! Form::open([
                                                                    'route' => 'administrations.close-upload-sem-one',
                                                                    'class' => 'close-sem2-upload',
                                                                    'method' => 'POST',
                                                                    'role' => 'form',
                                                                ]) !!}
                                                                {!! Form::hidden('campus_id', $campus_id) !!}
                                                                {!! Form::hidden('intake_category_id', $intake_id) !!}
                                                                {!! Form::button('[Close Upload]', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger p-2']) !!}
                                                                {!! Form::close() !!}
                                                            @endif

                                                        </span>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </div>
                            <div class="col-md-6 p-3">
                                <fieldset class="customLegend row">
                                    <legend>
                                        <h2 class="blue pb-0 mb-0">
                                            Semester (II) Upload</h2>
                                    </legend>
                                    <table class="table table-bordered table-striped" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Upload Status :</th>

                                                <th>
                                                    @if (is_null($sem2_upload))
                                                        Upload is currently closed
                                                    @else
                                                        Upload is currently opened
                                                    @endif

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td></td>
                                            <td>
                                                <ul class="list-group">
                                                    <li class="list-unstyled">
                                                        <span class="pull-left p-2">
                                                            @if (is_null($sem2_upload))
                                                                {!! Form::open([
                                                                    'route' => 'administrations.open-upload-sem-two',
                                                                    'class' => 'open-sem1-upload',
                                                                    'method' => 'POST',
                                                                    'role' => 'form',
                                                                ]) !!}
                                                                {!! Form::hidden('campus_id', $campus_id) !!}
                                                                {!! Form::hidden('intake_category_id', $intake_id) !!}
                                                                {!! Form::button('[Open Upload]', ['type' => 'submit', 'class' => 'btn btn-sm btn-primary p-2']) !!}
                                                                {!! Form::close() !!}
                                                            @else
                                                                {!! Form::open([
                                                                    'route' => 'administrations.close-upload-sem-two',
                                                                    'class' => 'close-sem2-upload',
                                                                    'method' => 'POST',
                                                                    'role' => 'form',
                                                                ]) !!}
                                                                {!! Form::hidden('campus_id', $campus_id) !!}
                                                                {!! Form::hidden('intake_category_id', $intake_id) !!}
                                                                {!! Form::button('[Close Upload]', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger p-2']) !!}
                                                                {!! Form::close() !!}
                                                            @endif

                                                        </span>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
