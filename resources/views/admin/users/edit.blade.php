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
                            @csrf

                            <div class="form-group row">
                                <label for="image"
                                       class="col-md-4 col-form-label text-md-right">{{ __('User Image') }}</label>

                                <div class="col-md-6">
                                    <div class="custom-file @error('img_src') is-invalid @enderror">
                                        <input type="file" class="custom-file-input" name="img_src" id="image">
                                        <label class="custom-file-label" for="image">{{ __('Choose Image') }}</label>
                                    </div>

                                    @error('img_src')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ $user->name }}" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ $user->email }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                           class="form-control @error('address') is-invalid @enderror" name="address"
                                           value="{{ $user->address }}" autocomplete="address">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="tel" pattern="[+]{1}[0-9]{12}"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ $user->phone }}" autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Select Role') }}</label>

                                <div class="col-md-6">
                                    <select id="role" class="form-control @error('role_id') is-invalid @enderror" name="role_id" value="{{ old('role_id') }}" required>

                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ $role->id == $user->role->id ? 'selected' : '' }}>{{ Str::ucfirst( $role->name ) }}</option>
                                        @endforeach

                                    </select>

                                    @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

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
