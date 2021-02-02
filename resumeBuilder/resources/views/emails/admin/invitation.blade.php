@component('mail::message')
# Hi {{ $user->name }},
{{ $subject }} Please visit the app. 

@component('mail::button', ['url' => $url])
Accept Invitation
@endcomponent

Note: If the button is not working please go to the link below directly.
{{ $url }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent