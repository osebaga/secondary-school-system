{!! Form::model($campus, ['method' => 'PATCH','route' => ['campus.update', $campus->id]]) !!}

@include('dashboard.settings.campuses.modals.form')

{!! Form::close() !!}
