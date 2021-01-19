@extends('layouts.app')

@section('title'){{ Auth::user()->name }}@endsection

@section('description'){{ __('Admin panel page a ministry with stand.') }}@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            @include('layouts.nav')

            <div class="col-md-8 col-lg-9">

                <div class="card border-0 shadow">

                    <div class="card-header d-flex flex-row justify-content-between border-0">
                        <h5 class="m-0 align-self-center">{{ Auth::user()->name }}</h5>
                        <a href="{{ route( 'admin.users.edit', [app()->getLocale(), Auth::user()->id] ) }}"
                           class="btn btn-dark">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen-fill" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                            </svg>
                        </a>
                    </div>

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="row">

                            <div class="col-lg-4 d-flex mb-4 mb-lg-0">

                                @if(Auth::user()->img_src)
                                    <div class="user-avatar shadow m-auto">
                                        <img src="{{ asset( 'storage/' . Auth::user()->img_src ) }}"
                                             alt="{{ Auth::user()->name }}">
                                    </div>
                                @else
                                    <span class="m-auto text-secondary">
                                        <svg width="100" height="100" viewBox="0 0 16 16" class="bi bi-person-circle"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path
                                              d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                          <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                          <path fill-rule="evenodd"
                                                d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                        </svg>
                                    </span>
                                @endif

                            </div>

                            <div class="col-lg-8">

                                <p>
                                    <span class="pr-3 text-secondary">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                    </span>
                                    {{ Auth::user()->name ? Auth::user()->name : 'N/A' }}
                                </p>
                                <p>
                                    <span class="pr-3 text-secondary">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                        </svg>
                                    </span>
                                    @if(Auth::user()->email)
                                        <a class="text-dark"
                                           href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                                    @else
                                        N/A
                                    @endif
                                </p>
                                <p>
                                    <span class="pr-3 text-secondary">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd"
                                                d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                          <path fill-rule="evenodd"
                                                d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                                        </svg>
                                    </span>
                                    {{ Auth::user()->address ? Auth::user()->address : 'N/A' }}
                                </p>
                                <p>
                                    <span class="pr-3 text-secondary">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
                                        </svg>
                                    </span>
                                    @if(Auth::user()->phone)
                                        <a class="text-dark"
                                           href="tel:{{ Auth::user()->phone }}">{{ Auth::user()->phone }}</a>
                                    @else
                                        N/A
                                    @endif
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                @if($territories->count())

                    <div class="card mt-4 border-0 shadow">

                        <div class="card-header d-flex flex-row justify-content-between border-0">
                            <h5 class="m-0 align-self-center">{{ __('adminpanel.territories.your-title') }}</h5>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-borderless table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">№</th>
                                        <th scope="col">{{ __('adminpanel.territories.address') }}</th>
                                        <th scope="col">{{ __('adminpanel.territories.time-to') }}</th>
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
                                            <td>
                                                @if($territory->status == 'pending')
                                                    {{ __('adminpanel.territories.status.' . $territory->status) }}
                                                    <span class="territory-warning territory-has-label text-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                                            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                                        </svg>
                                                        <span class="territory-label">{{ __( 'adminpanel.territories.message.territory-warning-user' ) }}</span>
                                                    </span>
                                                @endif

                                                @foreach($territory->territoryPeriod as $period)
                                                    @if($period->in_process)
                                                        {{ $dt->createFromFormat( 'Y-m-d', $period->time_start )->addMonth( 4 )->locale(app()->getLocale())->translatedFormat('d F Y') }}

                                                        @if($dt->toDay() > $dt->createFromFormat( 'Y-m-d', $period->time_start )->addMonth( 4 ))
                                                            <span class="territory-time-end territory-has-label text-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                     height="20" fill="currentColor"
                                                                     class="bi bi-exclamation-circle-fill"
                                                                     viewBox="0 0 16 16">
                                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                                                </svg>
                                                                <span class="territory-label">{{ __('adminpanel.territories.message.territory-end') }}</span>
                                                            </span>
                                                        @endif

                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="text-right">
                                                <button class="btn text-white {{ $territory->status == 'processed' ? 'btn-success' : 'btn-info' }}"
                                                        data-update-url="{{ route('user.territories.update', [app()->getLocale(), $territory]) }}"
                                                        data-territory="{{ $territory->name }}" data-toggle="modal"
                                                        data-target="#update-territory-modal"
                                                        role="button">{{ __('adminpanel.territories.btn-end') }}</button>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>

                @endif

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
                    <p>{{ __('adminpanel.territories.popup.update-end') }} - <span id="territory-name">#</span>?</p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"
                            role="button">{{ __('adminpanel.territories.popup.btn-no') }}</button>

                    <form id="update-form" method="POST" action="#">

                        @method('PATCH')
                        @csrf

                        <input id="status" type="hidden" name="status" value="2">
                        <input id="user-id" type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <button type="submit" class="btn btn-dark"
                                role="button">{{ __('adminpanel.territories.popup.btn-yes') }}</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
