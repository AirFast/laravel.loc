@extends('layouts.app')

@section('title'){{ __('adminpanel.territories.form.add-new.title') }}@endsection

@section('description'){{ __('Admin panel page a ministry with stand.') }}@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('layouts.nav')

            <div class="col-md-8 col-lg-9">

                <div class="card border-0 shadow">

                    <div class="card-header d-flex flex-row justify-content-between border-0">
                        <h5 class="m-0 align-self-center">{{ __('adminpanel.territories.form.add-new.title') }}</h5>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.territories.store', app()->getLocale()) }}">

                            @include('admin.territories.form')

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('adminpanel.territories.form.add-new.btn') }}
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
