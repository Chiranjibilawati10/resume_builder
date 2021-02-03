@component('mail::message')
# Hi {{ $user->name }},

{{ $subject }}


@component('mail::button', ['url' => $url])
Visit App
@endcomponent

Note: If the button is not working please go to the link below directly.
{{ $url }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
