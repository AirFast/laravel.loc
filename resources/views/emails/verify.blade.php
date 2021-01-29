@component('mail::message')

<h1>{{ __('Verify Your Email Address') }}</h1>

<p>{{ __('Please click the button below to verify your email address.') }}</p>

@component('mail::button', ['url' => $verificationUrl])
{{ __('adminpanel.territories.popup.btn-yes') }}
@endcomponent

<p>{{ __('Thank you for your appeal!') }}</p>

<br>
<hr style="border:none; height: 1px; background: #edf2f7">
<br>

<p><small>{{ __('If you’re having trouble clicking the button, copy and paste the URL below into your web browser: ') . $verificationUrl }}</small></p>

@endcomponent
