@component('mail::message')
#WelcometotheCompany

Fill in the form below and get login details

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login/user', 'color' => 'success'])
Form
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
