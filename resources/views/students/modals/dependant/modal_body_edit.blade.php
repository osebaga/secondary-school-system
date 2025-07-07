<form action="{{ route('students.modal.update.dependant') }}" method="POST">
@csrf
@include('students.modals.dependant.form')

</form>
