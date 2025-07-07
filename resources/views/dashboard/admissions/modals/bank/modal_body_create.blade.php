{!! Form::open(['route' => 'admissions.store.bank-info','class'=>'create-bank','method'=>'POST','role' => 'form']) !!}

@include('dashboard.admissions.modals.bank.form')

{!! Form::close() !!}
