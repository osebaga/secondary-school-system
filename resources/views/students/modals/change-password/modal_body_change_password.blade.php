{!! Form::open(['method' => 'PATCH','route' => ['students.updateNewPassword'], 'enctype'=>"multipart/form-data"]) !!}

 @include('students.modals.change-password.form')

{!! Form::close() !!}
