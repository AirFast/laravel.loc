@extends('layouts.app')

@section('title'){{ __('adminpanel.user.add-new') }}@endsection

@section('description'){{ __('Admin panel page a ministry with stand.') }}@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('layouts.nav')

            <div class="col-md-8 col-lg-9">

                <div class="card border-0 shadow">

                    <div class="card-header d-flex flex-row justify-content-between border-0">
                        <h5 class="m-0 align-self-center">{{ $user->name }}</h5>
                        <a href="{{ route( 'admin.users.show', [app()->getLocale(), $user] ) }}" class="btn btn-dark">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-left-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                            </svg>
                        </a>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.users.update', [app()->getLocale(), $user]) }}" enctype="multipart/form-data">

                            @method('PATCH')

                            @include('admin.users.form')

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Update User') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection

@section('app-bg')

    <div class="app-background" style="background-image: url('{{ asset('img/' . mt_rand(1, 17) . '.jpg') }}')"></div>

@endsection
