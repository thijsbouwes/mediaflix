@component('mail::message')
# Dear {{ $user->name }}

Welcome to {{ config('app.name') }} your account has been created!

![Welcome image](https://media.giphy.com/media/3o6ZtpxSZbQRRnwCKQ/giphy.gif "Logo Title Text 1")

@component('mail::button', ['url' => config('app.url').'admin'])
    View Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent