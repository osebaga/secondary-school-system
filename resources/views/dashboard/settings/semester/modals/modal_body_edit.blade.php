{!! Form::model($semester, ['method' => 'PATCH','route' => ['semesters.update', SRS::encode($semester->id)]]) !!}
@include('dashboard.settings.semester.modals.form')

{!! Form::close() !!}
