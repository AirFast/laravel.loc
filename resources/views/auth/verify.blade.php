@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow">
                <div class="card-header border-0">{{ __('Verify Your Email Address') }}</div>

                <img class="card-img-top" src="https://assetsnffrgf-a.akamaihd.net/assets/m/501100017/univ/art/501100017_univ_lsr_xl.jpg" alt="Card image cap">

                <div class="card-body">
                    @if (session('resent'))
                        <div class="col-md-8 mx-auto alert alert-success text-center" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="col-md-8 mx-auto mb-3">
                        <p>{{ __('Before proceeding, please check your email for a verification link. If you did not receive the email click button to request another.') }}</p>

                        <form class="d-inline" method="POST" action="{{ route('verification.resend', app()->getLocale()) }}">
                            @csrf
                            <button type="submit" class="btn btn-dark">
                                {{ __('Send again') }}
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
