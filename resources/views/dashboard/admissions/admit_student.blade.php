@extends('layouts.dashboard')


@section('title-content')

    <title>{{ config('app.name') }} | Admit Student</title>

@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Admission Process: Select Category
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6">
                        <h2>Undergraduate Students</h2>
                        <ul class="nav-item">
                            <li><a class="nav-link" href="{{route('admit.new.level.student','bachelor-degree')}}">Bachelor Degree Student</a> </li>
                            <li><a class="nav-link" href="{{route('admit.new.level.student','ordinary-diploma')}}">Ordinary Diploma Student</a> </li>
                            <li><a class="nav-link" href="{{route('admit.new.level.student','basic-certificate')}}">Basic Certificate Student</a> </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h2>Postgraduate Students</h2>

                        <ul class="nav-item">
                            <li><a class="nav-link" href="{{route('admit.new.level.student','master-degree')}}">Master Degree Student</a> </li>
                            <li><a class="nav-link" href="{{route('admit.new.level.student','postgraduate-diploma')}}">Postgraduate Diploma Student</a> </li>

                        </ul>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
