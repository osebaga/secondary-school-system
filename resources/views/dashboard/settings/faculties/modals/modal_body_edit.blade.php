{!! Form::model($faculty, ['method' => 'PATCH','route' => ['faculties.update', $faculty->id]]) !!}

@include('dashboard.settings.faculties.modals.form')

{!! Form::close() !!}
