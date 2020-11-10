@extends('layouts.app')

@section('title')
    {{ $user->name }}
@endsection

@section('description')
    {{ __('Admin panel page a ministry with stand.') }}
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('admin.nav')

            <div class="col-md-8 col-lg-9">

                <div class="card border-0 shadow">

                    <div class="card-header d-flex flex-row justify-content-between border-0">
                        <h5 class="m-0 align-self-center">{{ $user->name }}</h5>
                    </div>

                    <div class="card-body">



                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection
