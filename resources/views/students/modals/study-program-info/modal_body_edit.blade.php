{!! Form::model($std, ['method' => 'PATCH','route' => ['admissions.update.study-program', $srs->encode($std->id)], 'enctype'=>"multipart/form-data"]) !!}
@include('dashboard.admissions.modals.study-program-info.form')

{!! Form::close() !!}
