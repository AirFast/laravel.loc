@extends('layouts.app')

@section('title')
    {{ __('Admin Panel') }}
@endsection

@section('description')
    {{ __('Admin panel page a ministry with stand.') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow">
                    <div class="card-header border-0">{{ __('Menu') }}</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-md-8 col-lg-9">
                <div class="card border-0 shadow">
                    <div class="card-header border-0">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
