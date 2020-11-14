@extends('layouts.app')

@section('title')
    {{ __('adminpanel.admin.title') }}
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
                    <div class="card-header border-0">
                        <h5 class="m-0">{{ __('adminpanel.menu.settings') }}</h5>
                    </div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form action="{{ route('admin.settings.update', app()->getLocale()) }}" method="POST">

                            @method('PATCH')

                            @csrf

                            <div class="row mt-3">

                                <div class="form-group col">

                                    <h5>{{ __('adminpanel.admin.settings.stand.title') }}</h5>

                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-12 col-md-6">

                                    <label for="stand-time-start"
                                           class="col-form-label">{{ __('adminpanel.admin.settings.stand.time-start') }}</label>

                                    <select id="stand-time-start"
                                            class="form-control @error('stand_time_start') is-invalid @enderror"
                                            name="stand_time_start"
                                            value="{{ old('stand_time_start') ?? config('settings.stand_time_start')  }}"
                                            required>

                                        @for($i = 0; $i <= 23; $i++)
                                            <option
                                                value="{{ $i }}" {{ $i == config('settings.stand_time_start') ? 'selected' : '' }}>{{ $i >= 10 ? $i : '0' . $i }}:00
                                            </option>
                                        @endfor

                                    </select>

                                    @error('stand_time_start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">

                                    <label for="stand-time-end"
                                           class="col-form-label">{{ __('adminpanel.admin.settings.stand.time-end') }}</label>

                                    <select id="stand-time-end"
                                            class="form-control @error('stand_time_end') is-invalid @enderror"
                                            name="stand_time_end"
                                            value="{{ old('stand_time_end') ?? config('settings.stand_time_end')  }}"
                                            required>

                                        @for($i = 0; $i <= 23; $i++)
                                            <option
                                                value="{{ $i }}" {{ $i == config('settings.stand_time_end') ? 'selected' : '' }}>{{ $i >= 10 ? $i : '0' . $i }}:00
                                            </option>
                                        @endfor

                                    </select>

                                    @error('stand_time_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mt-5">

                                <div class="form-group col">

                                    <h5>{{ __('adminpanel.admin.settings.records.title') }}</h5>

                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-12 col-md-6">

                                    <label for="count-per-page"
                                           class="col-form-label">{{ __('adminpanel.admin.settings.records.per-page') }}</label>

                                    <input id="count-per-page" type="number" step="1" min="1" max="100"
                                           class="form-control @error('count_per_page') is-invalid @enderror"
                                           value="{{ old('count_per_page') ?? config('settings.count_per_page') }}"
                                           name="count_per_page" required>

                                    @error('count_per_page')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mt-5">

                                <div class="form-group col">

                                    <h5>{{ __('adminpanel.admin.settings.message.title') }}</h5>

                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-12">

                                    <label for="global-admin-message"
                                           class="col-form-label">{{ __('adminpanel.admin.settings.message.global-msg') }}</label>

                                    <textarea class="form-control @error('global_admin_message') is-invalid @enderror" name="global_admin_message" id="global-admin-message" rows="5">{{ old('global_admin_message') ?? config('settings.global_admin_message')  }}</textarea>

                                    @error('global_admin_message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                            </div>

                            <div class="form-row mt-5">

                                <div class="form-group col-12 text-right">

                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Update') }}
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
