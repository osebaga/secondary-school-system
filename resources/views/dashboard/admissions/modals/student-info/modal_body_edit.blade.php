{!! Form::model($std, ['method' => 'PATCH','route' => ['admissions.modal.update.studentinfoupdate', SRS::encode($std->id)], 'enctype'=>"multipart/form-data"]) !!}
@include('dashboard.admissions.modals.student-info.form')

{!! Form::close() !!}
