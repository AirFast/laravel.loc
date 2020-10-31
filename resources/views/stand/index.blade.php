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
                                <h4>{{ $dt->format('l, d F Y') }}</h4>

                                <div class="btn-group" role="group" aria-label="Navigation by weeks">
                                    <a class="btn btn-outline-secondary"
                                       href="{{ url('/user/stand?date=' . $startOfWeek->subDay()->toDateString()) }}"
                                       role="button">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-left-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                        </svg>
                                    </a>
                                    <a class="btn btn-outline-secondary"
                                       href="{{ url('/user/stand?date=' . $today->toDateString()) }}" role="button">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                             class="bi bi-calendar-check-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                        </svg>
                                    </a>
                                    <a type="button" class="btn btn-outline-secondary"
                                       href="{{ url('/user/stand?date=' . $endOfWeek->addDay()->toDateString()) }}" role="button">
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
                                               href="{{ url('/user/stand?date=' . $startOfWeek->addDay()->toDateString()) }}">{{ $startOfWeek->dayName }}</a>
                                        </li>

                                    @endfor

                                </ul>

                            </div>

                            <div class="card-body">

                                @if (session('status'))
                                    <div class="alert alert-success col-12 col-md-10 ml-auto text-center" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if (session('message'))
                                    <div class="alert alert-success ol-12 col-md-10 ml-auto text-center" role="alert">
                                        {{ session('message') }}
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

                                @guest

                                    @for($i = 8; $i <= 20; $i++)

                                        <div class="row py-2">

                                            <div class="col-2 d-flex">
                                                <span class="m-auto">{{ $i >= 10 ? $i : '0' . $i }}:00</span>
                                            </div>

                                            <div class="col-5">
                                                <button class="btn btn-outline-secondary w-100">Sign up</button>
                                            </div>

                                            <div class="col-5">
                                                <button class="btn btn-success w-100">Andrew Petryk</button>
                                            </div>

                                        </div>

                                    @endfor

                                @else

                                    @for($i = 8; $i <= 20; $i++)

                                        <div class="row py-2">

                                            <div class="col-2 d-flex">
                                                <span class="m-auto">{{ $i >= 10 ? $i : '0' . $i }}:00</span>
                                            </div>

                                            @if($stands->contains('time', $i))
                                                @foreach($stands as $stand)

                                                    @if($stand->time == $i)

                                                        @if(!empty($stand->user_id_1))

                                                            <div class="col-5">
                                                                <button class="btn {{ Auth::user()->id == $stand->user_id_1 ? 'btn-success' : 'btn-secondary' }} w-100"
                                                                        data-stand-id="{{ $stand->id }}"
                                                                        data-time="{{ $i }}"
                                                                        data-user-id-1="{{ Auth::user()->id }}"
                                                                        data-toggle="{{ Auth::user()->id == $stand->user_id_1 ? 'modal' : '' }}"
                                                                        data-target="#edit-modal">{{ $stand->userOne->name }}
                                                                </button>
                                                            </div>

                                                        @else

                                                            <div class="col-5">
                                                                <button class="btn btn-outline-secondary w-100"
                                                                        data-stand-id="{{ $stand->id }}"
                                                                        data-time="{{ $i }}"
                                                                        data-user-id-1="{{ Auth::user()->id }}"
                                                                        data-toggle="modal"
                                                                        data-target="#edit-modal" role="button">Sign up
                                                                </button>
                                                            </div>

                                                        @endif

                                                        @if(!empty($stand->user_id_2))

                                                            <div class="col-5">
                                                                <button class="btn {{ Auth::user()->id == $stand->user_id_2 ? 'btn-success' : 'btn-secondary' }} w-100"
                                                                        data-stand-id="{{ $stand->id }}"
                                                                        data-time="{{ $i }}"
                                                                        data-user-id-2="{{ Auth::user()->id }}"
                                                                        data-toggle="{{ Auth::user()->id == $stand->user_id_2 ? 'modal' : '' }}"
                                                                        data-target="#edit-modal">{{ $stand->userTwo->name }}
                                                                </button>
                                                            </div>

                                                        @else

                                                            <div class="col-5">
                                                                <button class="btn btn-outline-secondary w-100"
                                                                        data-stand-id="{{ $stand->id }}"
                                                                        data-time="{{ $i }}"
                                                                        data-user-id-2="{{ Auth::user()->id }}"
                                                                        data-toggle="modal"
                                                                        data-target="#edit-modal" role="button">Sign up
                                                                </button>
                                                            </div>

                                                        @endif

                                                    @endif

                                                @endforeach

                                            @else

                                                <div class="col-5">
                                                    <button class="btn btn-outline-secondary w-100"
                                                            data-time="{{ $i }}"
                                                            data-user-id-1="{{ Auth::user()->id }}" data-toggle="modal"
                                                            data-target="#confirmation-modal" role="button">Sign up
                                                    </button>
                                                </div>

                                                <div class="col-5">
                                                    <button class="btn btn-outline-secondary w-100"
                                                            data-time="{{ $i }}"
                                                            data-user-id-2="{{ Auth::user()->id }}" data-toggle="modal"
                                                            data-target="#confirmation-modal" role="button">Sign up
                                                    </button>
                                                </div>

                                            @endif

                                        </div>

                                    @endfor

                                @endguest


                            </div>

                        @endif

                    @endauth

                </div>

            </div>

        </div>
    </div>

    @auth

        @if (Auth::user()->isAdmin() || Auth::user()->isUser())

            <div class="modal border-0 fade" id="confirmation-modal" tabindex="-1" role="dialog"
                 aria-labelledby="confirmationModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLongTitle">Dear, {{ Auth::user()->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to sign up for the ministry with a stand at <span
                                    id="confirmation-modal-time">8:00</span> on {{ $dt->format('l, d F Y') }}?</p>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">No</button>

                            <form action="stand" method="POST">

                                @csrf

                                <input id="store-time" type="text" name="time" hidden>
                                <input type="text" name="date" hidden value="{{ $dt->toDateString() }}">
                                <input id="store-user-id-1" type="text" name="user_id_1" hidden>
                                <input id="store-user-id-2" type="text" name="user_id_2" hidden>

                                <button type="submit" class="btn btn-dark">Yes, I want</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal border-0 fade" id="edit-modal" tabindex="-1" role="dialog"
                 aria-labelledby="confirmationModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLongTitle">Dear, {{ Auth::user()->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to delete yourself from the ministry with a stand at <span
                                    id="edit-modal-time">8:00</span> on {{ $dt->format('l, d F Y') }}?</p>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">No</button>

                            <form id="edit-form" action="stand" method="POST">

                                @csrf
                                @method('PATCH')

                                <input id="edit-user-id-1" type="text" name="user_id_1" hidden>
                                <input id="edit-user-id-2" type="text" name="user_id_2" hidden>

                                <button type="submit" class="btn btn-dark">Yes, I want</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        @endif

    @endauth

@endsection
