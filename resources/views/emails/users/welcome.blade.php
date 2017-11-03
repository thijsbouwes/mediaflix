@component('mail::message')
    # Dear {{ $user->name }}

    Your order has been shipped!

    @component('mail::button', ['url' => '/admin'])
        View Account
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent