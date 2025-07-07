{!! Form::model($user, ['method' => 'PATCH','route' => ['admissions.update.avatar', SRS::encode($user->id)], 'enctype'=>"multipart/form-data"]) !!}
@include('dashboard.admissions.modals.photo.form')

{!! Form::close() !!}
