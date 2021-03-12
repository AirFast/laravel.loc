@extends('layouts.app')

@section('title'){{ __('forms.general.login') }}@endsection

@section('description'){{ __('Home page a ministry with stand.') }}@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow">
                <div class="card-header border-0">{{ __('forms.general.login') }}</div>

                <img class="card-img-top" src="{{ asset('img/' . mt_rand(1, 20) . '.jpg') }}" alt="Card image">

                <div class="card-body">
                    <form method="POST" action="{{ route('login', app()->getLocale()) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('forms.general.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('forms.general.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('forms.login.remember') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('forms.general.login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-dark" href="{{ route('password.request', app()->getLocale()) }}">
                                        {{ __('forms.login.forgot') }}
                                    </a>
                                @endif

                                <div class="mt-5">{{ __('forms.login.info') }}
                                    <a class="text-dark" href="{{ route('register', app()->getLocale()) }}">{{ __('forms.general.link') }}</a>.
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
