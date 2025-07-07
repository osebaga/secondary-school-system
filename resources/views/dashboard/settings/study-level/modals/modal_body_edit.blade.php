{!! Form::model($level, ['method' => 'PATCH','route' => ['study-level.update', SRS::encode($level->id)]]) !!}
@include('dashboard.settings.study-level.modals.form')

{!! Form::close() !!}
