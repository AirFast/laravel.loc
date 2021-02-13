@component('mail::message')

<h1 style="text-align: center">{{ __('emails.territory.title') }}</h1>
<h1>{{ __('emails.greeting') }}</h1>

<p>{{ __('emails.territory.text', ['name' => $data['name'], 'number' => $data['number'], 'address' => $data['address']]) }}</p>

@component('mail::button', ['url' => $data['url']])
    {{ __('emails.territory.btn') }}
@endcomponent

<br>
<hr style="border:none; height: 1px; background: #edf2f7">
<br>

<p><small>{{ __('emails.info', ['url' => $data['url']]) }}</small></p>

@endcomponent
