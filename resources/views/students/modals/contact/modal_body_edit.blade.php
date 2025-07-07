{!! Form::model($std->contact, ['method' => 'PATCH','route' => ['admissions.update.contact-info', $srs->encode($std->id)], 'enctype'=>"multipart/form-data"]) !!}

 @include('dashboard.admissions.modals.contact.form')

{!! Form::close() !!}
