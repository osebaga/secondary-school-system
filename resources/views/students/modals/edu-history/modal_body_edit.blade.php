
{!! Form::model(['method' => 'PATCH','route' => ['students.modal.edit.eduHistory'], 'enctype'=>"multipart/form-data"]) !!}

@include('dashboard.admissions.modals.edu-history.form')

{!! Form::close() !!}

