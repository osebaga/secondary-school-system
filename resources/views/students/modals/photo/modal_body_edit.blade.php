{!! Form::model($user, ['method' => 'PATCH','route' => ['admissions.update.avatar', $srs->encode($user->id)], 'enctype'=>"multipart/form-data"]) !!}
@include('dashboard.admissions.modals.photo.form')

{!! Form::close() !!}
