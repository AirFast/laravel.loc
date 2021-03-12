@extends('layouts.app')

@section('title'){{ __('forms.verify.title') }}@endsection

@section('description'){{ __('Home page a ministry with stand.') }}@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow">
                <div class="card-header border-0">{{ __('forms.verify.title') }}</div>

                <img class="card-img-top" src="{{ asset('img/' . mt_rand(1, 20) . '.jpg') }}" alt="Card image">

                <div class="card-body">
                    @if (session('resent'))
                        <div class="col-md-8 mx-auto alert alert-success text-center" role="alert">
                            {{ __('forms.verify.message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="col-md-8 mx-auto mb-3">
                        <p>{{ __('forms.verify.info') }}</p>

                        <form class="d-inline" method="POST" action="{{ route('verification.resend', app()->getLocale()) }}">
                            @csrf
                            <button type="submit" class="btn btn-dark">
                                {{ __('forms.verify.btn') }}
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
