{!! Form::model($cat, ['method' => 'PATCH','route' => ['exam-category.update', SRS::encode($cat->id)]]) !!}
@include('dashboard.settings.exam-category.modals.form')

{!! Form::close() !!}
