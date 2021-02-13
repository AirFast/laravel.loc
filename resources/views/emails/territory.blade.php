@component('mail::message')

<h1 style="text-align: center">{{ __('emails.territory.title') }}</h1>
<h1>{{ __('emails.greeting') }}</h1>

<p>{{ __('emails.territory.text', ['name' => $mailData['name'], 'number' => $mailData['number'], 'address' => $mailData['address']]) }}</p>

@component('mail::button', ['url' => $mailData['url']])
    {{ __('emails.territory.btn') }}
@endcomponent

<br>
<hr style="border:none; height: 1px; background: #edf2f7">
<br>

<p><small>{{ __('emails.info', ['url' => $mailData['url']]) }}</small></p>

@endcomponent
