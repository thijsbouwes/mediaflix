@component('mail::message')
# Dear {{ $user->name }}

Welcome to {{ config('app.name') }} your account has been created!

@component('mail::button', ['url' => config('app.url').'admin'])
    View Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent