@component('mail::message')

<h1 style="text-align: center">{{ __('emails.verify.title') }}</h1>
<h1>{{ __('emails.greeting') }}</h1>

<p>{{ __('emails.verify.text') }}</p>

@component('mail::button', ['url' => $verificationUrl])
{{ __('emails.verify.btn') }}
@endcomponent

<p>{{ __('emails.salutation') }}</p>

<br>
<hr style="border:none; height: 1px; background: #edf2f7">
<br>

<p><small>{{ __('emails.info', ['url' => $verificationUrl]) }}</small></p>

@endcomponent
