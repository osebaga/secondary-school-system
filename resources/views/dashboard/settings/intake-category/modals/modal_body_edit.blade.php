{!! Form::model($intake, ['method' => 'PATCH','route' => ['intake-categories.update', SRS::encode($intake->id)]]) !!}
@include('dashboard.settings.intake-category.modals.form')

{!! Form::close() !!}
