{!! Form::model($center, ['method' => 'PATCH','route' => ['center.update', $center->id]]) !!}

@include('dashboard.settings.centers.modals.form')

{!! Form::close() !!}
