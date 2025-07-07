<form action="{{ route('students.modal.update.nextOfKin') }}" method="POST">
    @csrf
@include('students.modals.next-of-kin.form')
</form>
