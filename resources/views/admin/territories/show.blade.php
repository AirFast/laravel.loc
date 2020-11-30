@extends('layouts.app')

@section('title'){{ $territory->name }}@endsection

@section('description'){{ __('Admin panel page a ministry with stand.') }}@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('admin.nav')

            <div class="col-md-8 col-lg-9">

                <div class="card border-0 shadow">

                    <div class="card-header d-flex flex-row justify-content-between border-0">
                        <h5 class="m-0 align-self-center">Територія №{{ $territory->number }}</h5>
                        <a href="#"
                           class="btn btn-dark">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen-fill" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                            </svg>
                        </a>
                    </div>

                    <div class="card-body">

                        <div id="google-map" class="territory-map mb-5" data-map-lat-lng="{{ $territory->map_lat_lng }}"
                             data-map-zoom="{{ config('settings.map_zoom') }}" data-map-zoom-control="{{ config('settings.map_zoom_control') }}"
                             data-map-type-control="{{ config('settings.map_type_control') }}" data-map-street-view-control="{{ config('settings.map_street_view_control') }}"
                             data-map-full-screen-control="{{ config('settings.map_full_screen_control') }}" data-map-scroll-wheel="{{ config('settings.map_scroll_wheel') }}"
                             data-map-marker-icon="{{ asset('css/marker-icon.png') }}" data-map-marker-title="{{ __('Твоя територія тут') }}"
                             data-map-info-window-title="{{ $territory->name }}">
                        </div>

                        <h4>{{ $territory->name }}</h4>

                        <p>{!! nl2br( e($territory->description) ) !!}</p>

                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwni-fw_bVIcbUlGlAthGMxIJ8BdZICPk&language={{ app()->getLocale() }}" defer></script>
@endpush
