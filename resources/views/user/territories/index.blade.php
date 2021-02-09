@extends('layouts.app')

@section('title'){{ __('adminpanel.menu.territories') }}@endsection

@section('description'){{ __('Admin panel page a ministry with stand.') }}@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('layouts.nav')

            <div class="col-md-8 col-lg-9">

                <div class="card border-0 shadow">
                    <div class="card-header border-0">

                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="m-0 align-self-center">{{ __('adminpanel.menu.territories') }}</h5>
                        </div>

                    </div>

                    <div class="card-body">

                        @if ($territories->count())

                            <div class="table-responsive">

                                <table class="table table-borderless table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">№</th>
                                        <th scope="col">{{ __('adminpanel.territories.address') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($territories as $territory)

                                        <tr>
                                            <td>{{ $territory->number }}</td>
                                            <td>
                                                <a href="{{ route( 'user.territories.show', [app()->getLocale(), $territory] ) }}"
                                                   class="text-dark">{{ $territory->name }}</a>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-success" data-update-url="{{ route('user.territories.update', [app()->getLocale(), $territory]) }}" data-territory="{{ $territory->name }}" data-toggle="modal" data-target="#update-territory-modal" role="button">{{ __('adminpanel.territories.btn-start') }}</button>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>

                            </div>

                        @else

                            <p>{{ __('adminpanel.territories.no-territories') }}</p>

                        @endif

                    </div>

                    {{ $territories->withQueryString()->links() }}

                </div>

            </div>

        </div>
    </div>

    <div class="modal border-0 fade" id="update-territory-modal" tabindex="-1" role="dialog"
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
                    <p>{{ __('adminpanel.territories.popup.update-start') }} - <span id="territory-name">#</span>?</p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"
                            role="button">{{ __('adminpanel.territories.popup.btn-no') }}</button>

                    <form id="update-form" method="POST" action="#">

                        @method('PATCH')
                        @csrf

                        <input id="status" type="hidden" name="status" value="3">
                        <input id="user-id" type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <button type="submit" class="btn btn-dark"
                                role="button">{{ __('adminpanel.territories.popup.btn-yes') }}</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('app-bg')

    <div class="app-background" style="background-image: url('{{ asset('img/' . mt_rand(1, 17) . '.jpg') }}')"></div>

@endsection
