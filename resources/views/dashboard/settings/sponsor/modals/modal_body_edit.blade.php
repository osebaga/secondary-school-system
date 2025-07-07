{!! Form::model($sponsor, ['method' => 'PATCH','route' => ['sponsor.update', SRS::encode($sponsor->id)]]) !!}
@include('dashboard.settings.sponsor.modals.form')

{!! Form::close() !!}
