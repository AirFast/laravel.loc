@extends('layouts.app')

@section('title'){{ $territory->name }}@endsection

@section('description'){{ __('Admin panel page a ministry with stand.') }}@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('layouts.nav')

            <div class="col-md-8 col-lg-9">

                <div class="card border-0 shadow">

                    <div class="card-header d-flex flex-row justify-content-between border-0">
                        <h5 class="m-0 align-self-center">{{ __('adminpanel.territories.title') }} №{{ $territory->number }}</h5>
                    </div>

                    <div class="card-body">

                        <div id="google-map" class="territory-map mb-5" data-map-lat-lng="{{ $territory->map_lat_lng }}"
                             data-map-zoom="{{ config('settings.map_zoom') }}" data-map-zoom-control="{{ config('settings.map_zoom_control') }}"
                             data-map-type-control="{{ config('settings.map_type_control') }}" data-map-street-view-control="{{ config('settings.map_street_view_control') }}"
                             data-map-full-screen-control="{{ config('settings.map_full_screen_control') }}" data-map-scroll-wheel="{{ config('settings.map_scroll_wheel') }}"
                             data-map-marker-icon="{{ asset('css/marker-icon.png') }}" data-map-marker-title="{{ __('adminpanel.territories.marker-title') }}"
                             data-map-info-window-title="{{ $territory->name }}">
                        </div>

                        <h4 class="mb-5">{{ $territory->name }}</h4>

                        <p>{!! nl2br( e($territory->description) ) !!}</p>

                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection

@section('app-bg')

    <div class="app-background" style="background-image: url('{{ asset('img/' . mt_rand(1, 17) . '.jpg') }}')"></div>

@endsection

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwni-fw_bVIcbUlGlAthGMxIJ8BdZICPk&language={{ app()->getLocale() }}" defer></script>
@endpush
