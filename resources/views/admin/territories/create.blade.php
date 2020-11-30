@extends('layouts.app')

@section('title'){{ __('adminpanel.user.add-new') }}@endsection

@section('description'){{ __('Admin panel page a ministry with stand.') }}@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('admin.nav')

            <div class="col-md-8 col-lg-9">

                <div class="card border-0 shadow">

                    <div class="card-header d-flex flex-row justify-content-between border-0">
                        <h5 class="m-0 align-self-center">{{ __('Додати нову територію') }}</h5>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.territories.store', app()->getLocale()) }}">

                            @csrf

                            <div class="form-group row">
                                <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Номер') }}</label>

                                <div class="col-md-6">
                                    <input id="number" type="number" min="1"
                                           class="form-control @error('number') is-invalid @enderror" name="number"
                                           value="{{ old('number') ?? $territory->number }}" required autofocus>

                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Адреса') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') ?? $territory->name }}" required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="map-lat-lng" class="col-md-4 col-form-label text-md-right">{{ __('Координати') }}</label>

                                <div class="col-md-6">
                                    <input id="map-lat-lng" type="text"
                                           class="form-control @error('map_lat_lng') is-invalid @enderror" name="map_lat_lng"
                                           value="{{ old('map_lat_lng') ?? $territory->map_lat_lng }}" required>

                                    @error('map_lat_lng')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Опис') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ old('description') ?? $territory->description }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Статус') }}</label>

                                <div class="col-md-6">
                                    <select id="status" class="form-control @error('status') is-invalid @enderror"
                                            name="status"
                                            value="{{ old('status') ?? '2'  }}" required>
                                            <option value="2">Вільна</option>
                                            <option value="1">Опрацьоіується</option>
                                            <option value="3">Очікує</option>
                                    </select>

                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Призначити віснику') }}</label>

                                <div class="col-md-6">
                                    <select id="user" class="form-control @error('user_id') is-invalid @enderror"
                                            name="user_id"
                                            value="{{ old('user_id') ?? ''  }}" required>

                                        <option value="0">{{ __('Нікому') }}</option>
                                        @foreach($users as $user)
                                            <option
                                                value="{{ $user->id }}" {{ $territory->user_id == $user->id || old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach

                                    </select>

                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Додати територію') }}
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
