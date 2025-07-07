{!! Form::model($department, ['method' => 'PATCH','route' => ['departments.update', $department->id]]) !!}

  @include('dashboard.settings.departments.modals.form')

{!! Form::close() !!}
