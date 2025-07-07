{!! Form::open(['route' => 'post-election-candidate','class'=>'create-edu','method'=>'POST','role' => 'form']) !!}

@include('dashboard.registrar.election.modals.formcandidate')

{!! Form::close() !!}
