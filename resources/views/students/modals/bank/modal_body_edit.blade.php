
<form action="{{ route('students.modal.update.bank')  }}" method="POST">
@csrf

@include('students.modals.bank.form')

</form>

