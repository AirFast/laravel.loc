@extends('layouts.app')

@section('title')
    {{ __('adminpanel.user.add-new') }}
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
