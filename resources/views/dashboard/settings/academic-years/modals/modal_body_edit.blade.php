{!! Form::model($ac_year, ['method' => 'PATCH','route' => ['academic-years.update', SRS::encode($ac_year->id)]]) !!}
@include('dashboard.settings.academic-years.modals.form')

{!! Form::close() !!}
