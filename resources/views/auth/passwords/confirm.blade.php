@extends('layouts.app')

@section('title'){{ __('forms.general.confirm-pass') }}@endsection

@section('description'){{ __('Home page a ministry with stand.') }}@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow">
                <div class="card-header border-0">{{ __('forms.general.confirm-pass') }}</div>

                <div class="landscape">

                    <div class="mountain"></div>
                    <div class="mountain mountain-2"></div>
                    <div class="mountain mountain-3"></div>
                    <div class="sun-container sun-container-1">
                    </div>
                    <div class="sun-container">
                        <div class="sun"></div>
                    </div>
                    <div class="cloud"></div>
                    <div class="cloud cloud-1"></div>
                    <div class="sun-container sun-container-reflection">
                        <div class="sun"></div>
                    </div>
                    <div class="light"></div>
                    <div class="light light-1"></div>
                    <div class="light light-2"></div>
                    <div class="light light-3"></div>
                    <div class="light light-4"></div>
                    <div class="light light-5"></div>
                    <div class="light light-6"></div>
                    <div class="light light-7"></div>
                    <div class="water"></div>
                    <div class="splash"></div>
                    <div class="splash delay-1"></div>
                    <div class="splash delay-2"></div>
                    <div class="splash splash-4 delay-2"></div>
                    <div class="splash splash-4 delay-3"></div>
                    <div class="splash splash-4 delay-4"></div>
                    <div class="splash splash-stone delay-3"></div>
                    <div class="splash splash-stone splash-4"></div>
                    <div class="splash splash-stone splash-5"></div>
                    <div class="lotus lotus-1"></div>
                    <div class="lotus lotus-2"></div>
                    <div class="lotus lotus-3"></div>
                    <div class="front">
                        <div class="stone"></div>
                        <div class="grass"></div>
                        <div class="grass grass-1"></div>
                        <div class="grass grass-2"></div>
                        <div class="reed"></div>
                        <div class="reed reed-1"></div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="col-md-8 mx-auto alert alert-success text-center" role="alert">
                        {{ __('forms.general.confirm-info') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" action="{{ route('password.confirm', app()->getLocale()) }}">
                        @csrf

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
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('forms.general.confirm-pass') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-dark" href="{{ route('password.request', app()->getLocale()) }}">
                                        {{ __('forms.login.forgot') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
