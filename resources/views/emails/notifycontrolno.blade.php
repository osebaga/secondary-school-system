@component('mail::message')
Hi, {{ $mailData['std_name'] }}

Your control number is:  {{ $mailData['control_number'] }} <br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
