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

                            <a href="{{ route( 'admin.territories.create', app()->getLocale() ) }}"
                               class="btn btn-dark">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </a>
                        </div>

                        <div class="mt-3 mb-2">
                            <a href="{{ route( 'admin.territories.index', app()->getLocale() ) }}"
                               class="btn mt-1 btn-sm {{ !request()->has('status') ? 'btn-secondary' : 'btn-outline-secondary' }}">{{ __('adminpanel.territories.status.all') }}</a>

                            @foreach($territory->statusOptions() as $statusOptionKey => $statusOptionValue)
                                <a href="{{ route( 'admin.territories.index', [app()->getLocale(), 'status' => $statusOptionKey] ) }}"
                                   class="btn mt-1 btn-sm {{ request()->query('status') == $statusOptionKey ? 'btn-secondary' : 'btn-outline-secondary' }}">{{ __('adminpanel.territories.status.' . $statusOptionValue) }}</a>
                            @endforeach
                        </div>

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

                        @if ($territories->count())

                            <div class="table-responsive">

                                <table class="table table-borderless table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">№</th>
                                        <th scope="col">{{ __('adminpanel.territories.address') }}</th>
                                        <th scope="col">{{ __('adminpanel.territories.user') }}</th>
                                        <th scope="col">{{ __('adminpanel.territories.status.title') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($territories as $territory)

                                        <tr>
                                            <td>{{ $territory->number }}

                                                @if($territory->user_id == 0 && $territory->status == 'pending')
                                                    <a href="{{ route( 'admin.territories.edit', [app()->getLocale(), $territory->id] ) }}">
                                                        <span class="territory-warning territory-has-label right-side text-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                                            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                                        </svg>
                                                        <span class="territory-label">{{ __( 'adminpanel.territories.message.territory-warning' ) }}</span>
                                                    </span>
                                                    </a>
                                                @endif

                                                @if($territory->user_id != 0 && $territory->status == 'pending')
                                                    <a href="{{ route( 'admin.territories.edit', [app()->getLocale(), $territory->id] ) }}">
                                                        <span class="territory-pending territory-has-label right-side text-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                        </svg>
                                                        <span class="territory-label">{{ __( 'adminpanel.territories.message.territory-pending', [ 'name' => $territory->user->name ] ) }}</span>
                                                    </span>
                                                    </a>
                                                @endif

                                                @foreach($territory->territoryPeriod as $period)

                                                    @if($period->in_process)

                                                        @if($dt->toDay() > $dt->createFromFormat( 'Y-m-d', $period->time_start )->addMonth( 4 ))
                                                            <a href="{{ route( 'admin.territories.edit', [app()->getLocale(), $territory->id] ) }}">
                                                                <span class="territory-time-end territory-has-label right-side text-danger">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                         height="20" fill="currentColor"
                                                                         class="bi bi-exclamation-circle-fill"
                                                                         viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                                                    </svg>
                                                                    <span class="territory-label">{{ __( 'adminpanel.territories.message.territory-end-short' ) }}</span>
                                                                </span>
                                                            </a>
                                                        @endif

                                                    @endif

                                                @endforeach

                                            </td>
                                            <td>
                                                <a href="{{ route( 'admin.territories.show', [app()->getLocale(), $territory] ) }}"
                                                   class="text-dark">{{ $territory->name }}</a>
                                            </td>
                                            <td>{{ $territory->user_id !== 0 ? $territory->user->name : '-' }}</td>
                                            <td>{{ __('adminpanel.territories.status.' . $territory->status) }}</td>
                                            <td class="text-right">
                                                <a href="{{ route( 'admin.territories.edit', [app()->getLocale(), $territory->id] ) }}"
                                                   class="btn btn-sm btn-dark">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                         class="bi bi-pen-fill"
                                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                    </svg>
                                                </a>
                                                <button class="btn btn-sm btn-danger"
                                                        data-delete-url="{{ route('admin.territories.destroy', [app()->getLocale(), $territory]) }}"
                                                        data-territory="{{ $territory->name }}"
                                                        data-toggle="modal" data-target="#delete-territory-modal"
                                                        role="button">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                         class="bi bi-trash-fill" fill="currentColor"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                                    </svg>
                                                </button>
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

    <div class="modal border-0 fade" id="delete-territory-modal" tabindex="-1" role="dialog"
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
                    <p>{{ __('adminpanel.territories.popup.delete') }} - <span id="territory-name">#</span>?</p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"
                            role="button">{{ __('adminpanel.territories.popup.btn-no') }}</button>

                    <form id="delete-form" method="POST" action="#">

                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-dark"
                                role="button">{{ __('adminpanel.territories.popup.btn-yes') }}</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
