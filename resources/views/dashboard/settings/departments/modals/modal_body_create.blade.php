{!! Form::open(['route' => 'departments.store','class'=>'create-departments','method'=>'POST','role' => 'form']) !!}

@include('dashboard.settings.departments.modals.form')

{!! Form::close() !!}
