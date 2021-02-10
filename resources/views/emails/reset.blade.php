@component('mail::message')

<h1 style="text-align: center">{{ __('emails.reset.title') }}</h1>
<h1>{{ __('emails.greeting') }}</h1>

<p>{{ __('emails.reset.text') }}</p>

@component('mail::button', ['url' => $url])
    {{ __('emails.reset.btn') }}
@endcomponent

<p>{{ __('emails.reset.expire', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]) }}</p>
<p>{{ __('emails.reset.info') }}</p>

<p>{{ __('emails.salutation') }}</p>

<br>
<hr style="border:none; height: 1px; background: #edf2f7">
<br>

<p><small>{{ __('emails.info', ['url' => $url]) }}</small></p>

@endcomponent
