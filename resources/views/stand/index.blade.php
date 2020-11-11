@extends('layouts.app')

@section('title')
    {{ Auth::user()->name }}
@endsection

@section('description')
    {{ __('User page a ministry with stand.') }}
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">

                <div class="card border-0 shadow">

                    @auth

                        @if (Auth::user()->isAdmin() || Auth::user()->isUser())

                            <div class="card-header d-flex flex-row justify-content-between border-0">
                                <h4 class="m-0 align-self-center">{{ Str::ucfirst($dt->locale(app()->getLocale())->translatedFormat('l, d F Y')) }}</h4>

                                <div class="btn-group" role="group" aria-label="Navigation by weeks">
                                    <a class="btn btn-outline-secondary"
                                       href="{{ route( 'user.stand.index', [app()->getLocale(), 'date' => $startOfWeek->subDay()->toDateString()] ) }}"
                                       role="button" title="{{ __('stand.prev-week') }}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-left-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                        </svg>
                                    </a>
                                    <a class="btn btn-outline-secondary"
                                       href="{{ route( 'user.stand.index', [app()->getLocale(), 'date' => $now->toDateString()] ) }}"
                                       role="button" title="{{ __('stand.today') }}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                             class="bi bi-calendar-check-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                        </svg>
                                    </a>
                                    <a type="button" class="btn btn-outline-secondary"
                                       href="{{ route('user.stand.index', [app()->getLocale(), 'date' => $endOfWeek->addDay()->toDateString()] ) }}"
                                       role="button" title="{{ __('stand.next-week') }}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-right-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="card-header">

                                <ul class="nav nav-tabs card-header-tabs">

                                    @for($i = 1; $i <= 7; $i++)

                                        <li class="nav-item">
                                            <a class="nav-link text-dark{{ ($dt->dayOfWeek == $i || (7 == $i && 0 == $dt->dayOfWeek)) ? ' active' : '' }}"
                                               href="{{ route('user.stand.index', [app()->getLocale(), 'date' => $startOfWeek->addDay()->toDateString()] ) }}">{{ Str::ucfirst($startOfWeek->dayName) }}</a>
                                        </li>

                                    @endfor

                                </ul>

                            </div>

                            <div class="card-body">

                                @if (session('create'))
                                    <div class="alert alert-success ol-12 col-md-10 ml-auto text-center" role="alert">
                                        {{ session('create') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if (session('delete'))
                                    <div class="alert alert-danger ol-12 col-md-10 ml-auto text-center" role="alert">
                                        {{ session('delete') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if ($errors->count() > 0)
                                    @foreach($errors->all() as $error)

                                        <div class="alert alert-danger col-10 ml-auto text-center" role="alert">
                                            {{ $error }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    @endforeach
                                @endif

                                @for($i = 8; $i <= 20; $i++)

                                    <div class="row py-2">

                                        <div class="col-2 d-flex text-center">
                                            <span
                                                class="m-auto {{ ($now->hour == $i) && ($now->toDateString() == $dt->toDateString()) ? 'btn btn-secondary' : '' }}">{{ $i >= 10 ? $i : '0' . $i }}:00</span>
                                        </div>

                                        @if($stands->contains('time', $i))

                                            @foreach($stands as $stand)

                                                @if($stand->time == $i)

                                                    @if(!empty($stand->user_id_1))

                                                        <div class="col-5">

                                                            @if(Auth::user()->id == $stand->user_id_1)

                                                                <button
                                                                    class="btn btn-success btn-block"
                                                                    data-update-url="{{ route('user.stand.update', [app()->getLocale(), $stand]) }}"
                                                                    data-crt-dlt-sign="delete"
                                                                    data-time="{{ $i }}"
                                                                    data-user-id-1="{{ Auth::user()->id }}"
                                                                    data-toggle="modal"
                                                                    data-target="#update-modal"
                                                                    role="button">{{ $stand->userOne->name }}
                                                                </button>

                                                            @else

                                                                <button
                                                                    class="btn btn-secondary btn-block">{{ $stand->userOne->name }}</button>

                                                            @endif

                                                        </div>

                                                    @else

                                                        <div class="col-5">
                                                            <button class="btn btn-outline-secondary btn-block"
                                                                    data-update-url="{{ route('user.stand.update', [app()->getLocale(), $stand]) }}"
                                                                    data-crt-dlt-sign="create"
                                                                    data-time="{{ $i }}"
                                                                    data-user-id-1="{{ Auth::user()->id }}"
                                                                    data-toggle="modal"
                                                                    data-target="#update-modal" role="button">{{ __('stand.sign') }}
                                                            </button>
                                                        </div>

                                                    @endif

                                                    @if(!empty($stand->user_id_2))

                                                        <div class="col-5">

                                                            @if(Auth::user()->id == $stand->user_id_2)

                                                                <button
                                                                    class="btn btn-success btn-block"
                                                                    data-update-url="{{ route('user.stand.update', [app()->getLocale(), $stand]) }}"
                                                                    data-crt-dlt-sign="delete"
                                                                    data-time="{{ $i }}"
                                                                    data-user-id-2="{{ Auth::user()->id }}"
                                                                    data-toggle="modal"
                                                                    data-target="#update-modal"
                                                                    role="button">{{ $stand->userTwo->name }}
                                                                </button>

                                                            @else

                                                                <button
                                                                    class="btn btn-secondary btn-block">{{ $stand->userTwo->name }}</button>

                                                            @endif

                                                        </div>

                                                    @else

                                                        <div class="col-5">
                                                            <button class="btn btn-outline-secondary btn-block"
                                                                    data-update-url="{{ route('user.stand.update', [app()->getLocale(), $stand]) }}"
                                                                    data-crt-dlt-sign="create"
                                                                    data-time="{{ $i }}"
                                                                    data-user-id-2="{{ Auth::user()->id }}"
                                                                    data-toggle="modal"
                                                                    data-target="#update-modal" role="button">{{ __('stand.sign') }}
                                                            </button>
                                                        </div>

                                                    @endif

                                                @endif

                                            @endforeach

                                        @else

                                            <div class="col-5">
                                                <button class="btn btn-outline-secondary btn-block"
                                                        data-time="{{ $i }}"
                                                        data-user-id-1="{{ Auth::user()->id }}" data-toggle="modal"
                                                        data-target="#create-modal" role="button">{{ __('stand.sign') }}
                                                </button>
                                            </div>

                                            <div class="col-5">
                                                <button class="btn btn-outline-secondary btn-block"
                                                        data-time="{{ $i }}"
                                                        data-user-id-2="{{ Auth::user()->id }}" data-toggle="modal"
                                                        data-target="#create-modal" role="button">{{ __('stand.sign') }}
                                                </button>
                                            </div>

                                        @endif

                                    </div>

                                @endfor

                            </div>

                        @endif

                    @endauth

                </div>

            </div>

        </div>
    </div>

    @auth

        @if (Auth::user()->isAdmin() || Auth::user()->isUser())

            <div class="modal border-0 fade" id="create-modal" tabindex="-1" role="dialog"
                 aria-labelledby="createModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLongTitle">Dear, {{ Auth::user()->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to create entry?</br><span id="create-modal-time">8:00</span>
                                on {{ $dt->format('l, d F Y') }}</p>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" role="button">
                                No
                            </button>

                            <form action="{{ route('user.stand.store', app()->getLocale()) }}" method="POST">

                                @csrf

                                <input id="store-time" type="text" name="time" hidden>
                                <input type="text" name="date" hidden value="{{ $dt->toDateString() }}">
                                <input id="store-user-id-1" type="text" name="user_id_1" hidden>
                                <input id="store-user-id-2" type="text" name="user_id_2" hidden>

                                <button type="submit" class="btn btn-dark" role="button">Yes, I want</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal border-0 fade" id="update-modal" tabindex="-1" role="dialog"
                 aria-labelledby="updateModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLongTitle">Dear, {{ Auth::user()->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to <span id="crt-dlt-sign">#</span> an entry?</br><span
                                    id="update-modal-time">8:00</span> on {{ $dt->format('l, d F Y') }}</p>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" role="button">
                                No
                            </button>

                            <form id="edit-form" action="#" method="POST">

                                @csrf
                                @method('PATCH')

                                <input id="edit-user-id-1" type="text" name="user_id_1" hidden>
                                <input id="edit-user-id-2" type="text" name="user_id_2" hidden>

                                <button type="submit" class="btn btn-dark" role="button">Yes, I want</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        @endif

    @endauth

@endsection
