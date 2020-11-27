@extends('layouts.app')

@section('title'){{ __('adminpanel.menu.users') }}@endsection

@section('description'){{ __('Admin panel page a ministry with stand.') }}@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('admin.nav')

            <div class="col-md-8 col-lg-9">

                <div class="card border-0 shadow">
                    <div class="card-header d-flex flex-row justify-content-between border-0">
                        <h5 class="m-0 align-self-center">{{ __('adminpanel.menu.users') }}</h5>
                        <a href="{{ route( 'admin.users.create', app()->getLocale() ) }}" class="btn btn-dark">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </a>
                    </div>

                    <div class="card-body">

                        @if (session('create'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('create') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session('delete'))
                            <div class="alert alert-danger text-center" role="alert">
                                {{ session('delete') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div id="google-map" class="territory-map" data-map-latitude="49.79724860773186"
                             data-map-longitude="24.045091697303622" data-map-zoom="17" data-map-zoom-control="false"
                             data-map-type-control="false" data-map-street-view-control="false"
                             data-map-full-screen-control="false" data-map-scroll-wheel="false"
                             data-map-marker-icon="{{ asset('css/marker-icon.png') }}" data-map-marker-title="I am here!"
                             data-map-info-window-title="Hi friends!"
                             data-map-info-window-text="<strong>I am here!</strong> My name is Daniel McKinnon. I look forward to working with you.">
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="modal border-0 fade" id="delete-modal" tabindex="-1" role="dialog"
         aria-labelledby="deleteModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ Auth::user()->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('adminpanel.user.popup.delete') }} <span id="user-name">#</span>?</p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"
                            role="button">{{ __('adminpanel.user.popup.btn-no') }}</button>

                    <form id="delete-form" method="POST" action="#">

                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-dark"
                                role="button">{{ __('adminpanel.user.popup.btn-yes') }}</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwni-fw_bVIcbUlGlAthGMxIJ8BdZICPk&language={{ app()->getLocale() }}" defer></script>
@endpush
