@extends('layouts.dashboard')

@section('title-content')

<title>{{ config('app.name') }} School | Index</title>

@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="boxpane">
            <div class="boxpane-header">
                <h2 class="blue">
                    School
                </h2>

            </div>
            <div class="boxpane-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext">
                            The following is the list of school(s) available click School name to continue
                        </p>
                        <div class="table-responsive">
                            <table id="campusTable" class="table table-bordered table-hover" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Institution Name</th> <th>School Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                @foreach($institution as $inst)
                                <tr>
                                    @if(count($inst->campuses)>0)
                                    <th rowspan="{{count($inst->campuses)+1}}">
                                        {{$inst->institution_name}}
                                    </th>
                                    @else
                                    <th rowspan="2"> {{$inst->institution_name}}</th>
                                    @endif

                                </tr>

                                @forelse($inst->campuses as $campus)
                                <tr>
                                    <td >
{{--                                        @if($view == 'limit-upload')--}}
                                            {{link_to(route('administrations.intakes',[$view,SRS::encode($campus->id)]),$campus->campus_name)}}
{{--                                        @elseif($view == 'publish-exam')--}}
{{--                                            {{link_to(route('administrations.intakes',[$view,SRS::encode($campus->id)]),$campus->campus_name)}}--}}

{{--                                        @endif--}}


                                    </td>



                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="bg-inverse white">{{"No School Found"}}</td>
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

