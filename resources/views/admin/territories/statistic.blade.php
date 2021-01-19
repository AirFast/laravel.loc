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
                            <h5 class="m-0 align-self-center">{{ __('adminpanel.territories.statistics') }}</h5>
                        </div>

                    </div>

                    <div class="card-body">

                        @if ($territories->count())

                            <div class="table-responsive">

                                @foreach($territories as $territory)

                                    <table class="table table-borderless table-striped mb-5">
                                        <thead>
                                        <tr>
                                            <th colspan="3">{{ __('adminpanel.territories.title') }} № {{ $territory->number }} ({{ $territory->name }})</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">{{ __('adminpanel.territories.user') }}</th>
                                            <th scope="col">{{ __('adminpanel.territories.time-start') }}</th>
                                            <th scope="col">{{ __('adminpanel.territories.time-end') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if($territory->territoryPeriod->count())
                                            @foreach($territory->territoryPeriod as $period)
                                                <tr>
                                                    <td>{{ $period->user->name }}</td>
                                                    <td>{{ $dt->createFromFormat( 'Y-m-d', $period->time_start )->locale(app()->getLocale())->translatedFormat('d F Y') }}</td>
                                                    <td>{{ $period->time_end ? $dt->createFromFormat( 'Y-m-d', $period->time_end )->locale(app()->getLocale())->translatedFormat('d F Y') : '' }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr><td colspan="3">{{ __('adminpanel.territories.no-data') }}</td></tr>
                                        @endif

                                        </tbody>
                                    </table>

                                @endforeach

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

@endsection
