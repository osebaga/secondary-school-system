@component('mail::message')
Hi, {{ $body['name'] }}

You are new request password is  {{ $body['password'] }} .

@component('mail::button', ['url' => route("login")])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
